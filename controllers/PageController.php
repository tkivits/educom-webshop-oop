<?php
require_once('models/PageModel.php');

class PageController
{
    private $model;

    public function __construct()
    {
        $this->model = new PageModel();
    }
    public function handleRequest()
    {
        $this->getRequest();
        //$this->processRequest();
        $this->showResponse();
    }
    private function getRequest()
    {
        $this->model->getRequestedPage();
    }
    //private function processRequest();
    private function showResponse()
    {
        switch($this->model->page)
        {
            case 'Home';
            include_once "views/HomeDoc.php";
		  	$view = new HomeDoc($this->model);
		  	$view->show();
		  	break;
            case 'About';
            include_once "views/AboutDoc.php";
		  	$view = new AboutDoc($this->model);
		  	$view->show();
		  	break;
        }
    }
}

?>