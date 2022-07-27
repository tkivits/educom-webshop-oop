<?php
require_once 'BasicDoc.php';
abstract class ProductDoc extends BasicDoc 
{
    abstract protected function getProduct();
    abstract protected function showProduct();
    abstract protected function showAddToCartButton();
}
?>