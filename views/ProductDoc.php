<?php
require_once 'BasicDoc.php';
abstract class ProductDoc extends BasicDoc 
{
    abstract protected function showProduct($id, $image, $name, $price);
    abstract protected function showAddToCartButton();
}
?>