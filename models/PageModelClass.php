<?php

class PageModel
{
    public $page;
    public function __construct()
    {
        $this->page = $page
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
}

?>