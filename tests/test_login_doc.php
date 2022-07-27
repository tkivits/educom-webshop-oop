<?php

include_once "../views/LoginDoc.php";
$data = array('page' => 'Login');

$view = new LoginDoc($data['page']);

$view -> show();

?>