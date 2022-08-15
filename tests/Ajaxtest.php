<?php
$parent = dirname(dirname(__FILE__));
require_once $parent.'/StaticUtilClass.php';
require_once $parent.'/RatingCrud.php';
require_once $parent.'/Crud.php';
require_once $parent.'/controllers/AjaxController.php';
require_once $parent.'/models/AjaxModel.php';
require_once $parent.'/views/AjaxView.php';

$crud = new Crud(null);
$ratingCrud = new RatingCrud($crud);
$model = new AjaxModel(null, $ratingCrud);
$view = new AjaxDoc($model);

$view->JsonEncodeOneRating();

?>