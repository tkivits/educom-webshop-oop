<?php

class PageModel
{
    public $page;
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
    public function showHeader() 
    {
        echo '<h1 class="header">'.$this->page.'</h1>';
    }
    public function createMenu()
    {
        $this->showMenuStart();
        $this->showMenuItem('Home');
        $this->showMenuItem('About');
        //$this->showMenuItem('Contact');
        //$this->showMenuItem('Webshop');
        //geen login
        //$this->showMenuItem('Register');
        //$this->showMenuItem('Login');
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
    public function showHomeContent()
    {
        echo 'Welcome on this site!';
    }
    public function showAboutContent()
    {
        echo "My name is Teun Kivits. I am 28 years old and i live together with my girlfriend and our two cats.<br>Below you can see a list of some of my hobby's:
                <ul>
                <li>Strength sports like powerlifting and strongman</li>
                <li>Listening to music</li>
                <li>Going out with friends</li>
                <li>Walks</li>
                </ul>
             Recently, I've started a traineeship at Educom where i'm learning to build websites like this one. Hopefully this will become a functional webshop!<br>
             Right now i'm still learning though, as you can clearly see on this site."; 
    }
    public function showFooter() 
    {
        echo '<footer class="foot"><p>&copy; 2022 Teun Kivits</p></footer>';
    }
}

?>