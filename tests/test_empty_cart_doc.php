<?php

include_once "../views/EmptyCartDoc.php";
$data = array('page' => 'EmptyCart');

$view = new EmptyCartDoc($data['page']);

$view -> show();

?>