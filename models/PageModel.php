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
        $page = Util::getGETvar('page');
        if (empty($page) || $page == 'Login' || $page == 'Logout') {
            $header = 'Home';
        } elseif ($page == 'Thanks') {
            $header = 'Contact';
        } elseif ($page == 'Detail') {
            $header = 'Webshop';
        } elseif ($page == 'EmptyCart' || $page == 'Cart' || $page == 'OrderComplete') {
            $header = 'Shopping cart';
        } else {
            $header = $page;
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