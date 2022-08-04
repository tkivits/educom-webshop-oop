<?php
require_once '../Crud.php';

$crud = new Crud;
$result = $crud->readMultipleRows('orders', 'user_id', '1');
var_dump($result);
echo '<br>';
$result = $crud->readOneRow('users', 'email', 'coach@man-kind.nl');
var_dump($result);
echo '<br>';
$result = $crud->createUserRow('t.kivits@hotmail.com', 'Teun Kivits', 'test');
var_dump($result);

?>