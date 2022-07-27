<?php
require_once "HtmlDoc.php";

class BasicDoc extends HtmlDoc {
    public $page;
    public function __construct($page)
    {
        $this->page = $page;
    }
    private function showHeader() 
    {
        echo '<h1 class="header">'.$this->page.'</h1>';
    }
    private function showMenu() 
    {
        echo '<div>';
        echo '<ul class="menu">';
        echo '<li><a href="?page=Home">Home</a></li>';
        echo '<li><a href="?page=About">About</a></li>';
        echo '<li><a href="?page=Contact">Contact</a></li>';
        echo '<li><a href="?page=Webshop">Webshop</a></li>';
        if (!isset($_SESSION['login'])) {
            echo '<li><a href="?page=Register">Register</a></li>';
            echo '<li><a href="?page=Login">Login</a></li>';
        } else {
            echo '<li><a href="?page=Cart">Cart</a></li>';
            echo '<li><a href="?page=Logout">Logout '.$_SESSION['name'].'</a></li>';
        }
        echo '</u>';
        echo '</div>';
    }
    private function showFooter() 
    {
        echo '<footer class="foot"><p>&copy; 2022 Teun Kivits</p></footer>';
    }
    protected function showContent() 
    {
        echo '';
    }
    protected function showBodyContent()
    {
        $this->showHeader();
        $this->showMenu();
        $this->showContent();
        $this->showFooter();
    }

}
?>