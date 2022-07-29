<?php 
require_once 'BasicDoc.php';

class OrderCompleteDoc extends BasicDoc 
{
    protected function showContent() 
    {
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        echo '<div class="title">Thank you for your order!</div>';
    }
}
?>