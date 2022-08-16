<?php
require_once 'ProductDoc.php';

class WebshopDoc extends ProductDoc 
{
    protected function showHeadContent() 
    {
        echo '<link rel="stylesheet" href="CSS/stylesheet.css">';
        echo '<script src="js/jquery.js"></script>';
        echo '<script src="js/Rating.js"></script>';
    }
    protected function showStars($id)
    {
        echo '<div class="starcontainer" data-value="'.$id.'">';
        echo '<span class="star" data-value="1" id-value="'.$id.'"></span>';
        echo '<span class="star" data-value="2" id-value="'.$id.'"></span>';
        echo '<span class="star" data-value="3" id-value="'.$id.'"></span>';
        echo '<span class="star" data-value="4" id-value="'.$id.'"></span>';
        echo '<span class="star" data-value="5" id-value="'.$id.'"></span>';
        echo '</div>';
    }
    protected function showProduct($id, $image, $name, $price) 
    {
        echo '<a href="?page='.$id.'">';
        echo '<img class="productimg" src="'.$image.'" alt="'.$name.'"/>';
        echo '</a>';
        $this->showStars($id);
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