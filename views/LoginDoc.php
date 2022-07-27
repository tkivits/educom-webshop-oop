<?php
include_once 'FormsDoc.php';
class LoginDoc extends FormsDoc
{
    protected function showFormStart()
    {
        echo '<form class="form" method="post">';
    }
    protected function showEmailInput()
    {
        echo '<div><label for="email">E-mail:</label><input type="email" id="email" name="email"></div>';
    }
    private function showPasswordInput()
    {
        echo '<div><label for="password">Password:</label><input type="password" id="pw" name="pw"></div>';
    }
    protected function showSubmitButton()
    {
        echo '<input type="submit" value="Login">';
    }
    protected function showFormEnd()
    {
        echo '</form>';
    }
    protected function showContent()
    {
        $this->showFormStart();
        $this->showEmailInput();
        $this->showPasswordInput();
        $this->showSubmitButton();
        $this->showFormEnd();
    }
}
?>