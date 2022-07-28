<?php

include_once "../views/DetailDoc.php";
$data = array('page' => 'Webshop', 'id' => '1');

$product = new DetailDoc($data['page'], $data['id']);
$product->show();
?>