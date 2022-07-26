<?php 
require_once 'BasicDoc.php';

class AboutDoc extends BasicDoc {
    private function showAboutPage() {
        include '../Pages/about.php';
    }
    public function show(){
        $this->showDocStart();
        $this->showHeader();
        $this->showMenu();
        $this->showAboutPage();
        $this->showFooter();
        $this->showDocEnd();
    }
}

?>