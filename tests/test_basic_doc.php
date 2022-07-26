<?php

include_once "../views/BasicDoc.php";
$data = array('page' => 'basic');

$view = new BasicDoc($data['page']);

$view -> show();

?>