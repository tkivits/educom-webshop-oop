<?php

class PageModel
{
    public function __construct()
    {
        $this->page = $this->getRequestedPage();
    }
    public function getRequestedPage()
    {
        if(!isset($_GET['page'])){
            $this->page = 'Home';
        }
        else {
            $this->page = $_GET['page'];
        }
    }
    protected function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function logError($msg) {
        echo "LOG TO SERVER: ".$msg;
    }
    public function showHeader() 
    {
        echo '<h1 class="header">'.$this->page.'</h1>';
    }
    public function createMenu()
    {
        $this->showMenuStart();
        $this->showMenuItem('Home');
        $this->showMenuItem('About');
        $this->showMenuItem('Contact');
        //$this->showMenuItem('Webshop');
        //geen login
        $this->showMenuItem('Register');
        $this->showMenuItem('Login');
        //wel login
        //$this->showMenuItem('Cart');
        //$this->showMenuItem('Logout', 'username');
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
    public function showFooter() 
    {
        echo '<footer class="foot"><p>&copy; 2022 Teun Kivits</p></footer>';
    }
}

?>