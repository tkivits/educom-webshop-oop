<?php 
require_once 'BasicDoc.php';

class HomeDoc extends BasicDoc 
{
    protected function showContent() 
    {
        $this->model->showHomeContent();
    }
}
?>