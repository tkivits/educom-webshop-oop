<?php

include_once "../views/WebshopDoc.php";
$data = array('page' => 'Webshop');

$view = new WebshopDoc($data['page']);
$view->show();

?>