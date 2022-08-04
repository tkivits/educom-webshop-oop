<?php
require_once('models/PageModel.php');
require_once('models/UserModel.php');
require_once('models/ShopModel.php');
require_once('StaticUtilClass.php');
require_once('dataLayer.php');

class PageController
{
    private $model;

    public function __construct()
    {
        $this->model = new PageModel($this->model);
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
                    $this->model->login();
                    $this->model->page = 'Home';
                } else {
                    $this->model->page = 'Login';
                }
                break;
            case 'Logout';
                $this->model = new UserModel($this->model);
                $this->model->Logout();
                $this->model->page = 'Home';
                break;
            case 'Webshop';
                $this->model = new ShopModel($this->model);
                $this->model->addToCart();
                $this->model->page = 'Webshop';
                break;
            case is_numeric($this->model->page);
                $this->model = new ShopModel($this->model);
                $this->model->setProductID();
                $this->model->setSingleProduct();
                $this->model->addToCart();
                $this->model->page = 'Detail';
                break;
            case 'Cart';
                $this->model = new ShopModel($this->model);
                $this->model->updateCart();
                if ($this->model->valid)
                {
                    $this->model->page = 'OrderComplete';
                } elseif (empty($_SESSION['cart'])){
                    $this->model->page = 'EmptyCart';
                } else {
                    $this->model->page = 'Cart';
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
            case 'Webshop';
                include_once "views/WebshopDoc.php";
                $view = new WebshopDoc($this->model);
                 $view->show();
                break;
            case 'Detail';
                include_once "views/DetailDoc.php";
                $view = new DetailDoc($this->model);
                $view->show();
                break;
            case 'EmptyCart';
                include_once "views/EmptyCartDoc.php";
                $view = new EmptyCartDoc($this->model);
                $view->show();
                break;
            case 'Cart';
                include_once "views/CartDoc.php";
                $view = new CartDoc($this->model);
                $view->show();
                break;
            case 'OrderComplete';
                include_once "views/OrderCompleteDoc.php";
                $view = new OrderCompleteDoc($this->model);
                $view->show();
                break;
            default;
                include_once "views/HomeDoc.php";
                $view = new HomeDoc($this->model);
                $view->show();
        }
    }
}

?>
