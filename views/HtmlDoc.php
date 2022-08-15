<?php

class HtmlDoc 
{
    private function showDocStart() 
    {
        echo 
            '<!DOCTYPE html>
            <html>';
    }
    private function showHeadStart() 
    {
        echo '<head>';
    }
    protected function showHeadContent() 
    {
        echo '<link rel="stylesheet" href="CSS/stylesheet.css">';
    }
    private function showHeadEnd() 
    {
        echo '</head>';
    }
    private function showBodyStart() 
    {
        echo '<body>';
    }
    protected function showBodyContent() 
    {
        echo '';
    }
    private function showBodyEnd() 
    {
        echo '</body>';
    }
    private function showDocEnd() 
    {
        echo '</html>';
    }
    public function show() 
    {
        $this->showDocStart();
        $this->showHeadStart();
        $this->showHeadContent();
        $this->showHeadEnd();
        $this->showBodyStart();
        $this->showBodyContent();
        $this->showBodyEnd();
        $this->showDocEnd();
    }
}
?>