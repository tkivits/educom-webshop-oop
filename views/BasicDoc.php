<?php
require_once "HtmlDoc.php";

class BasicDoc extends HtmlDoc {
    public $page;
    public function __construct($page)
    {
        $this->page = $page;
    }
    protected function showHeader() {
        echo '<h1 class="header">{$this->page}</h1>';
    }
    protected function showMenu() {
        include '../Pages/menu.php';
    }
    protected function showFooter() {
        include '../Pages/footer.php';
    }
    public function show(){
        $this->showDocStart();
        $this->showHeader();
        $this->showMenu();
        $this->showFooter();
        $this->showDocEnd();
    }
}

?>