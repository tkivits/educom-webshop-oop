<?php 
require_once 'BasicDoc.php';

class EmptyCartDoc extends BasicDoc 
{
    protected function showContent() 
    {
        echo '<div class="title"> Your shopping cart is empty!</div>';
        echo '<div class="cart">You can buy products in our <a href="?page=Webshop">webshop</a></div>';
    }
}
?>