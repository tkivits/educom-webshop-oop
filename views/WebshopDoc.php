<?php
require_once 'ProductDoc.php';
require_once '../dataLayer.php';
class WebshopDoc extends ProductDoc 
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
        echo '<input class="cartButton" type="submit", value="Add to cart">';
    }
    protected function showContent()
    {
        try {
            $products = getAllProducts();
            while ($product = mysqli_fetch_array($products))
            {
                echo '<div class="menu">';
                $this->showProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
                if (isset($_SESSION['login']))
                {
                    $this->showCartButton();
                }
                echo '</div>';
            }
        } catch (Exception $e) {
            logError($e);
            echo 'There seems to be a technical issue. Please try again later.';
        }
    }
}
?>