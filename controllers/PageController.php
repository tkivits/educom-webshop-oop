<?php

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
            case 'Register';
            $this->model = new UserModel($this->model);
            $this->model->validateRegistration();
            if ($this->model->valid)
            {
                $this->model->page = 'Login';
            } else {
                $this->model->page = 'Register';
            }
            break;
            case 'Login';
            $this->model = new UserModel($this->model);
            $this->model->validateUser();
            if ($this->model->valid)
            {
                $this->model->doLoginUser($this->model->user['ID'], $this->model->user['email'], $this->model->user['name']);
                $this->model->page = 'Home';
            } else {
                $this->model->page = 'Login';
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
            case 'Register';
            include_once "views/RegisterDoc.php";
            $view = new RegisterDoc($this->model);
            $view->show();
            break;
            case 'Login';
            include_once "views/LoginDoc.php";
            $view = new LoginDoc($this->model);
            $view->show();
            break;
        }
    }
}

?>