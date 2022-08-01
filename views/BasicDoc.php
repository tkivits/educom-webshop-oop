<?php
require_once "HtmlDoc.php";

class BasicDoc extends HtmlDoc 
{
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    protected function showContent() 
    {
        echo '';
    }
    protected function showBodyContent()
    {
        $this->model->showHeader();
        $this->model->createMenu();
        $this->showContent();
        $this->model->showFooter();
    }
}
?>