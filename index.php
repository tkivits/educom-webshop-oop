<?php
session_start();
$parent = dirname(__FILE__);
require_once $parent.'/controllers/PageController.php';
require_once $parent.'/models/PageModel.php';
require_once $parent.'/Crud.php';

$crud = new Crud();
$model = new PageModel(null, $crud);
$controller = new PageController($model);
$controller->handleRequest();

?>