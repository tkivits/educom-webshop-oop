<?php
require_once 'ProductDoc.php';
require_once 'dataLayer.php';
class WebshopDoc extends ProductDoc 
{
    protected function showStars()
    {
        echo '<div class="starcontainer">';
        echo '<span class="star">&starf;</span>';
        echo '<span class="star">&starf;</span>';
        echo '<span class="star">&starf;</span>';
        echo '<span class="star">&starf;</span>';
        echo '<span class="star">&starf;</span>';
        echo '</div>';
    }
    protected function showProduct($id, $image, $name, $price) 
    {
        echo '<a href="?page='.$id.'">';
        echo '<img class="productimg" src="'.$image.'" alt="'.$name.'"/>';
        echo '</a>';
        $this->showStars();
        echo '<div class="title">'.$name.'</div></li>';
        echo '<div class="price">'.$price.'</div></li>';
    }
    protected function showCartButton($productid, $container = NULL)
    {
        echo '<form method="post">';
        echo '<input type="hidden" name="CartID", value="'.$productid.'">';
        echo '<input type="hidden" name="action" value="AddToCart">';
        echo '<input class="cartButton" type="submit", value="Add to cart">';
        echo '</form>';
    }
    protected function showContent()
    {
        foreach ($this->model->allproducts as $product)
        {
            $product = (array)$product;
            echo '<div class="menu">';
            $this->showProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
            if (isset($_SESSION['login']))
            {
                $this->showCartButton($product['ID']);
            }
            echo '</div>';
        }
    }
}
?>