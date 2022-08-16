<?php
require_once $parent.'/controllers/AjaxController.php';
require_once $parent.'/models/UserModel.php';
require_once $parent.'/models/ShopModel.php';
require_once $parent.'/models/AjaxModel.php';
require_once $parent.'/UserCrud.php';
require_once $parent.'/ShopCrud.php';
require_once $parent.'/RatingCrud.php';
require_once $parent.'/StaticUtilClass.php';
require_once $parent.'/dataLayer.php';

class PageController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
        $this->ajaxcontroller = null;
    }
    public function handleRequest()
    {
        $action = Util::getPOSTvar('action');
        if($action != null && $action == 'ajax') {
            echo "success!";
            return;
        } 

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
                $this->model->crud = new UserCrud($this->model->crud);
                $this->model = new UserModel($this->model, $this->model->crud);
                $this->model->validateContactForm();
                if ($this->model->valid)
                {
                     $this->model->page = 'Thanks';
                } else {
                    $this->model->page = 'Contact';
                }
                break;
            case 'Register';
                $this->model->crud = new UserCrud($this->model->crud);
                $this->model = new UserModel($this->model, $this->model->crud);
                $this->model->validateRegistration();
                if ($this->model->valid)
                {
                    $this->model->page = 'Login';
                } else {
                    $this->model->page = 'Register';
                }
                break;
            case 'Login';
                $this->model->crud = new UserCrud($this->model->crud);
                $this->model = new UserModel($this->model, $this->model->crud);
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
                $this->model->crud = new UserCrud($this->model->crud);
                $this->model = new UserModel($this->model, $this->model->crud);
                $this->model->Logout();
                $this->model->page = 'Home';
                break;
            case 'Webshop';
                include_once 'views/Ajaxdoc.php';
                $this->ajaxcontroller = new Ajaxcontroller($this->ajaxcontroller);
                $this->ajaxcontroller->view->JsonEncodeAllRatings();
                $this->model->crud = new ShopCrud($this->model->crud);
                $this->model = new ShopModel($this->model, $this->model->crud);
                $this->model->addToCart();
                $this->model->page = 'Webshop';
                break;
            case is_numeric($this->model->page);
                if ($this->model->page > 5)
                {
                    $this->model->genericerr = 'Something went wrong, please try again later!';
                } else {
                    include_once 'views/Ajaxdoc.php';
                    $this->ajaxcontroller = new Ajaxcontroller($this->ajaxcontroller);
                    $this->ajaxcontroller->view->JsonEncodeAllRatings();
                    $this->model->crud = new ShopCrud($this->model->crud);
                    $this->model = new ShopModel($this->model, $this->model->crud);
                    $this->model->setProductID();
                    $this->model->setSingleProduct();
                    $this->model->addToCart();
                }
                $this->model->page = 'Detail';
                break;
            case 'Cart';
                $this->model->crud = new ShopCrud($this->model->crud);
                $this->model = new ShopModel($this->model, $this->model->crud);
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
