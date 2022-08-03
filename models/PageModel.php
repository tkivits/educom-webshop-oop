<?php

class PageModel
{
    public $page;
    public $header;
    public function __construct()
    {
        $this->page = $this->getRequestedPage();
        $this->header = $this->setHeader();
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
        if (empty($page)) {
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
    public function createMenu()
    {
        $this->showMenuStart();
        $this->showMenuItem('Home');
        $this->showMenuItem('About');
        $this->showMenuItem('Contact');
        $this->showMenuItem('Webshop');
        if (!isset($_SESSION['login']))
        {
            $this->showMenuItem('Register');
            $this->showMenuItem('Login');
        } else {
            $this->showMenuItem('Cart');
            $this->showMenuItem('Logout', $_SESSION['name']);
        }
        $this->showMenuEnd();
    }
    private function showMenuStart()
    {
        echo '<div>';
        echo '<ul class="menu">';
    }
    private function showMenuItem($name, $optional = NULL)
    {
        echo '<li><a href="?page='.$name.'">'.$name.' '.$optional.'</a></li>';
    }
    private function showMenuEnd()
    {
        echo '</u>';
        echo '</div>';
    }
}
?>