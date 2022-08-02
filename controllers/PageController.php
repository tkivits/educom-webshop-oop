<?php
require_once('models/PageModel.php');
require_once('models/UserModel.php');

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
        $this->processRequest();
        $this->showResponse();
    }
    private function getRequest()
    {
        $this->model->getRequestedPage();
    }
    private function processRequest()
    {
        switch($this->model->page)
        {
            case 'Contact';
            $this->model = new UserModel($this->model);
            $this->model->validateContactForm();
            if ($this->model->valid)
            {
                $this->model->page = 'Thanks';
            } else {
                $this->model->page = 'Contact';
            }
            break;
        }
    }
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
            case 'Contact';
            include_once "views/ContactDoc.php";
            $view = new ContactDoc($this->model);
            $view->show();
            break;
            case 'Thanks';
            include_once "views/ContactThanksDoc.php";
            $view = new ContactThanksDoc($this->model);
            $view->show();
            break;
        }
    }
}

?>