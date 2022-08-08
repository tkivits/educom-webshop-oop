<?php
require_once 'ProductDoc.php';
require_once 'dataLayer.php';
class CartDoc extends ProductDoc 
{
    protected function showProduct($id, $image, $name, $price) 
    {
        echo '<div class="cartitems">';
        echo '<div class="imagecontainer"><a href="?page='.$id.'"><img class="productimg" src="'.$image.'" alt="'.$name.'"/></a></div>';
        echo '<div class="about">';
        echo '<div class="itemtitle">'.$name.'</div>';
        echo '<div class="itemprice">'.$price.'</div>';
        echo '</div>';
    }
    protected function showCartButton($productid, $container = NULL)
    {
        echo '<div class="countcontainer">';
        echo '<form method="post">';
        echo '<div><input type="number" class="count" id="amountCart" name="amountCart" value="'.$container.'"></div>';
        echo '<input type="hidden" name="CartID", value="'.$productid.'">';
        echo '<input type="hidden" name="action" value="update">';
        echo '<input class="cartButton" type="submit", value="Update">';
        echo '</form>';
        echo '</div>';
    }
    private function showItemTotal($total)
    {
        echo '<div class="pricetotalcontainer"><div class="priceitemtotal">'.$total.'</div></div>';
    }
    private function showPlaceOrderButton() 
    {
        if (isset($_SESSION['total'])) {
            $total = number_format(array_sum($_SESSION['total']), 2);
            echo '<div class="price">Total amount: '.$total.'</div>';
            echo '<div>';
            echo '<form method="post">';
            echo '<input type="hidden" name="placeOrder" value="placeOrder">';
            echo '<input type="hidden" name="action" value="placeOrder">';
            echo '<input class="cartButton" type="submit" value="Place order!">';
            echo '</form>';
            echo '</div>';
        }
    }
    protected function showContent()
    {

        $_SESSION['total'] = array();
        $items = array_filter($_SESSION['cart']);
        foreach ($this->model->allproducts as $product)
        {
            $product = (array)$product;
            if (array_key_exists($product['ID'], $items)) 
            {
                $item_total = number_format($_SESSION['cart'][$product['ID']] * $product['price'], 2);
                $this->showProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
                $this->showCartButton($product['ID'], $_SESSION['cart'][$product['ID']]);
                $this->showItemTotal($item_total);
                echo '</div>';
                array_push($_SESSION['total'], $item_total);
            }
        }
        $this->showPlaceOrderButton();
    }
}
?>