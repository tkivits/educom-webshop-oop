<?php 
require_once 'BasicDoc.php';

class HomeDoc extends BasicDoc {
    private function showHomePage() {
        include 'Pages/home.php';
    }
    public function show(){
        $this->showDocStart();
        $this->showHeader();
        $this->showMenu();
        $this->showHomePage();
        $this->showFooter();
        $this->showDocEnd();
    }
}

?>