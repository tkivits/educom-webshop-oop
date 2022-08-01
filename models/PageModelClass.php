<?php

class PageModel
{
    public $page;

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