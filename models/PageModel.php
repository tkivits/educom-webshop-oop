<?php

class PageModel
{
    public $page;
    public $header;
    public $menuitems;
    public function __construct()
    {
        $this->page = $this->getRequestedPage();
        $this->header = $this->setHeader();
        $this->menuitems = $this->createMenuItems();
    }
    public function getRequestedPage()
    {
        $page = Util::getGETvar('page');
        if (!isset($page))
        {
            $page = 'Home';
        }
        return $page;
    }
    protected function setHeader()
    {
        $header = Util::getGETvar('page');
        switch($header)
        {
            case empty($header);
            $header = 'Home';
            break;
            case 'Login';
            $header = 'Home';
            break;
            case 'Logout';
            $header = 'Home';
            break;
            case 'Thanks';
            $header = 'Contact';
            break;
            case 'Detail';
            $header = 'Webshop';
            break;
            case 'EmptyCart';
            $header = 'Shopping cart';
            break;
            case 'Cart';
            $header = 'Shopping cart';
            break;
            case 'OrderComplete';
            $header = 'Shopping cart';
            break;
        }
        return $header;
    }
    private function createMenuItems()
    {
        $menuitems = array('Home', 'About', 'Contact', 'Webshop');
        if (!isset($_SESSION['login'])) {
            array_push($menuitems, 'Register', 'Login');
        } else {
            array_push($menuitems, 'Cart', 'Logout');
        }
        return $menuitems;
    }
}
?>