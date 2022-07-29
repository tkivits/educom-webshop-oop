<?php
require_once 'ProductDoc.php';
require_once 'dataLayer.php';
class CartDoc extends ProductDoc 
{
    protected function showProduct($id, $image, $name, $price) 
    {
        echo '<a href="?page='.$id.'">';
        echo '<img class="productimg" src="'.$image.'" alt="'.$name.'"/>';
        echo '</a>';
        echo '<div class="title">'.$name.'</div></li>';
        echo '<div class="price">'.$price.'</div></li>';
    }
    protected function showCartButton()
    {
        echo '<input class="cartButton" type="submit", value="Update">';
    }
    function showPlaceOrder() 
    {
        if (isset($_SESSION['total'])) {
            $total = number_format(array_sum($_SESSION['total']), 2);
            echo '<div class="price">Total amount: '.$total.'</div>';
            echo '<div>';
            echo '<form method="post">';
            echo '<div class="accept"><input type="checkbox" id="agree" name="termAgree" value="agree"><label for="agree">I accept all terms & conditions</label></div>';
            echo '<input class="cartButton" type="submit" value="Place order!">';
            echo '<input type="hidden" name="placeOrder>';
            echo '</form>';
            echo '</div>';
        }
    }
    protected function showContent()
    {
        try {
            $products = getAllProducts();
            while ($product = mysqli_fetch_array($products))
            {
            if (array_key_exists($product['ID'], $_SESSION['cart'])) {
                $item_total = number_format($_SESSION['cart'][$product['ID']] * $product['price'], 2);
                echo '<div class="cartitems">';
                echo '<div class="imagecontainer"><a href="?page='.$product['ID'].'"><img class="productimg" src="'.$product['filename_image'].'" alt="'.$product['name'].'"/></a></div>';
                echo '<div class="about">';
                echo '<div class="itemtitle">'.$product['name'].'</div>';
                echo '<div class="itemprice">'.$product['price'].'</div>';
                echo '</div>';
                echo '<div class="countcontainer">';
                echo '<input type="number" class="count" id="amountCart" name="amountCart" value="'.$_SESSION['cart'][$product['ID']].'">';
                $this->showCartButton();
                echo '</div>';
                echo '<div class="pricetotalcontainer"><div class="priceitemtotal">'.$item_total.'</div></div>';
                echo '</div>';
                array_push($_SESSION['total'], $item_total);
            }
            }
        } catch (Exception $e) {
            logError($e);
            echo 'There seems to be a technical issue. Please try again later.';
        }
        $this->showPlaceOrder();
    }
}
?>