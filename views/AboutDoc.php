<?php 
require_once 'BasicDoc.php';

class AboutDoc extends BasicDoc 
{
    protected function showContent() 
    {
        $this->model->showAboutContent();
    }
}
?>