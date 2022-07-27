<?php
require_once 'BasicDoc.php';
class WebshopDoc extends BasicDoc 
{
    public $productid;
    public $productimage;
    public $productname;
    public $productprice;

    public function __construct($page, $productid, $productimage, $productname, $productprice)
    {
        $this->page = $page;
        $this->id = $productid;
        $this->image = $productimage;
        $this->name = $productname;
        $this->price = $productprice;
    }
    protected function showProduct()
    {
        //Iets met foreach of while
        echo '<div class="menu">';
        echo '<img class="productimg" src="'.$this->image.'" alt="'.$this->name.'"/>';
        echo '<div class="title">'.$this->name.'</div></li>';
        echo '<div class="price">'.$this->price.'</div></li>';
        echo '</div>';
    }
    protected function showAddToCartButton()
    {
        echo '<input class="cartButton" type="submit", value="Add to cart">';
    }
    protected function showContent()
    {
        $this->showProduct();
        $this->showAddToCartButton();
    }
}
?>