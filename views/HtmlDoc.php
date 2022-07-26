<?php

class HtmlDoc {
    //Methods
    private function showDocStart() {
        echo 
            '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="CSS/stylesheet.css">
            </head>
            <body>';
    }
    private function showDocEnd() {
        echo 
            '</body>
            </html>';
    }
    public function show() {
        showDocStart()
        showDocEnd()
    }
}

?>