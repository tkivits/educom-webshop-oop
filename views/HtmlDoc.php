<?php

class HtmlDoc {
    //Methods
    protected function showDocStart() {
        echo 
            '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="CSS/stylesheet.css">
            </head>
            <body>';
    }
    protected function showDocEnd() {
        echo 
            '</body>
            </html>';
    }
    public function show() {
        $this->showDocStart();
        $this->showDocEnd();
    }
}

?>