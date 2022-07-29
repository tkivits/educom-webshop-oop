<?php
include_once 'FormsDoc.php';
class RegisterDoc extends FormsDoc
{
    public $page;
    public $name;
    public $namerr;
    public $email;
    public $emailerr;
    public $pw;
    public $pwerr;
    public $pwrepeat;
    public $pwrepeaterr;
    public function __construct($page, $name, $namerr, $email, $emailerr, $pw, $pwerr, $pwrepeat, $pwrepeaterr)
    {
        $this->page = $page;
        $this->name = $name;
        $this->namerr = $namerr;
        $this->email = $email;
        $this->emailerr = $emailerr;
        $this->pw = $pw;
        $this->pwerr = $pwerr;
        $this->pwrepeat = $pwrepeat;
        $this->pwrepeaterr = $pwrepeaterr;
    }
    protected function showRequiredField()
    {
        echo '<div class="errordiv"><span class="error">Fields with a * are required</span></div>';
    }
    protected function showFormStart()
    {
        echo '<form class="form" method="post">';
    }
    private function showNameInput()
    {
        echo '<div><label for="name">Name:</label><input type="text" id="name" name="name" value="'.$this->name.'">';
        echo '<span class="error">  * '.$this->namerr.'</span></div>';
    }
    protected function showEmailInput()
    {
        echo '<div><label for="email">E-mail:</label><input type="email" id="email" name="email" value="'.$this->email.'">';
        echo '<span class="error">  * '.$this->emailerr.'</span></div>';
    }
    private function showPasswordInput()
    {
        echo '<div><label for="password">Password:</label><input type="password" id="pw" name="pw" value="'.$this->pw.'">';
        echo '<span class="error">  * '.$this->pwerr.'</span></div>';
    }
    private function showRepeatPasswordInput()
    {
        echo '<div><label for="repeat_password">Repeat password:</label><input type="password" id="pwrepeat" name="pwrepeat" value="'.$this->pwrepeat.'">';
        echo '<span class="error">  * '.$this->pwrepeaterr.'</span></div>';
    }
    protected function showSubmitButton()
    {
        echo '<input class="submitbutton" type="submit" value="Register">';
    }
    protected function showFormEnd()
    {
        echo '</form>';
    }
    protected function showContent()
    {
        $this->showRequiredField();
        $this->showFormStart();
        $this->showNameInput();
        $this->showEmailInput();
        $this->showPasswordInput();
        $this->showRepeatPasswordInput();
        $this->showSubmitButton();
        $this->showFormEnd();
    }
}
?>