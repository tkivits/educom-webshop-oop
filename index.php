<?php
require_once('models/PageModel.php');
require_once('models/UserModel.php');
require_once('controllers/PageController.php');
require_once('dataLayer.php');

$controller = new PageController();
$controller->handleRequest();

?>