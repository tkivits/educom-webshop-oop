<?php

include_once "../views/CartDoc.php";
$data = array('page' => 'Shoppingcart');
$_SESSION['cart'] = array('1' => '1', '2' => '1', '4' => '2', '5' => '5');
$_SESSION['total'] = array();

$cart = new CartDoc($data['page']);
$cart -> show();
?>