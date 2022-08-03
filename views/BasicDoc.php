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
    protected function showMenu()
    {
        $this->model->createMenu();
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