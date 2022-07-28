<?php
require_once 'BasicDoc.php';
abstract class ProductDoc extends BasicDoc 
{
    public function __construct($page, $productid, $productname, $productprice, $productdescription, $productimage,)
    {
        $this->page = $page;
        $this->id = $productid;
        $this->name = $productname;
        $this->price = $productprice;
        $this->description = $productdescription;
        $this->image = $productimage;
    }
    abstract protected function showProductImage();
    abstract protected function showProductName();
    abstract protected function showProductPrice();
    abstract protected function showAddToCartButton();
}
?>