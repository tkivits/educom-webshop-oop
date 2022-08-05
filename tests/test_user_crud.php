<?php
require_once '../Crud.php';
require_once '../UserCrud.php';

$crud = new Crud;
$userCrud = new UserCrud($crud);

$result = $userCrud->createNewUser('t.kivits@hotmail.com', 'Teun Kivits', 'test');
var_dump($result);
echo '<br>';
$result = $userCrud->readUserByEmail('coach@man-kind.nl');
var_dump($result);

?>