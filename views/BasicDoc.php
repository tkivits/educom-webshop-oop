<?php
require_once "HtmlDoc.php";

class BasicDoc extends HtmlDoc 
{
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    protected function showHeader() 
    {
        echo '<h1 class="header">'.$this->model->header.'</h1>';
    }
    protected function showMenuStart()
    {
        echo '<div>';
        echo '<ul class="menu">';
    }
    protected function showMenuItem($name)
    {
        switch($name)
        {
            case 'Logout';
            echo '<li><a href="?page='.$name.'">'.$name.' '.$_SESSION['name'].'</a></li>';
            break;
            default;
            echo '<li><a href="?page='.$name.'">'.$name.'</a></li>';
        }
    }
    protected function showMenuEnd()
    {
        echo '</u>';
        echo '</div>';
    }
    private function createMenu()
    {
        $this->showMenuStart();
        if (!isset($_SESSION['login'])) {
            foreach ($this->model->menuitems as $menuitem)
            {
                $this->showMenuItem($menuitem);
            }
        } else {
            foreach ($this->model->menuitemslogin as $menuitem)
            {
                $this->showMenuItem($menuitem);
            } 
        }
        $this->showMenuEnd();
    }
    protected function showMenu()
    {
        $this->createMenu();
    }
    protected function showFooter() 
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