<?php
require_once 'ProductDoc.php';
class WebshopDoc extends ProductDoc 
{
    protected function showProductImage()
    {
        echo '<img class="productimg" src="'.$this->image.'" alt="'.$this->name.'"/>';
    }
    protected function showProductName()
    {
        echo '<div class="title">'.$this->name.'</div></li>';
    }
    protected function showProductPrice()
    {
        echo '<div class="price">'.$this->price.'</div></li>';
    }
    private function showProductDescription()
    {
        echo '<div>'.$this->description.'</div>';
    }
    protected function showAddToCartButton()
    {
        echo '<input class="cartButton" type="submit", value="Add to cart">';
    }
    protected function showContent()
    {
        echo '<div class="menu">';
        $this->showProductImage();
        $this->showProductName();
        $this->showProductPrice();
        $this->showProductDescription();
        $this->showAddToCartButton();
        echo '</div>';
    }
}
?>