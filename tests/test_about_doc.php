<?php

include_once "../views/AboutDoc.php";
$data = array('page' => 'About');

$view = new AboutDoc($data['page']);

$view -> show();

?>