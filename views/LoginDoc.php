<?php
include_once 'FormsDoc.php';
class LoginDoc extends FormsDoc
{
    public $email;
    public $emailerr;
    public $pw;
    public $pwerr;
    public function __construct($page, $email, $emailerr, $pw, $pwerr)
    {
        $this->page = $page;
        $this->email = $email;
        $this->emailerr = $emailerr;
        $this->pw = $pw;
        $this->pwerr = $pwerr;
    }
    protected function showRequiredField()
    {
        echo '<div class="errordiv"><span class="error">Fields with a * are required</span></div> ';
    }
    protected function showFormStart()
    {
        echo '<form class="form" method="post">';
    }
    protected function showEmailInput()
    {
        echo '<div><label for="email">E-mail:</label><input type="email" id="email" name="email", value="'.$this->email.'">';
        echo '<span class="error">  * '.$this->emailerr.'</span></div>';
    }
    private function showPasswordInput()
    {
        echo '<div><label for="password">Password:</label><input type="password" id="pw" name="pw" value="'.$this->pw.'">';
        echo '<span class="error">  * '.$this->pwerr.'</span></div>';
    }
    protected function showSubmitButton()
    {
        echo '<input class="submitbutton" type="submit" value="Login">';
    }
    protected function showFormEnd()
    {
        echo '</form>';
    }
    protected function showContent()
    {
        $this->showRequiredField();
        $this->showFormStart();
        $this->showEmailInput();
        $this->showPasswordInput();
        $this->showSubmitButton();
        $this->showFormEnd();
    }
}
?>