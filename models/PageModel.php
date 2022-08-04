<?php

class PageModel
{
    public $page;
    public $header;
    public $menuitems;
    public $menuitemslogin;
    public $genericerr = '';
    public function __construct($copy)
    {
        if (empty($copy))
        {
            $this->page = $this->getRequestedPage();
            $this->header = $this->setHeader();
            $this->menuitems = $this->createMenuItems();
            $this->menuitemslogin = $this->createMenuItemsLogin();
        } else {
            $this->page = $copy->page;
            $this->header = $copy->header;
            $this->menuitems = $copy->menuitems;
            $this->menuitemslogin = $copy->menuitemslogin;
        }
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
        $menuitems = array('Home', 'About', 'Contact', 'Webshop', 'Register', 'Login');
        return $menuitems;
    }
    private function createMenuItemsLogin()
    {
        $menuitems = array('Home', 'About', 'Contact', 'Webshop', 'Cart', 'Logout');
        return $menuitems;
    }
}
?>