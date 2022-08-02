<?php
include_once 'FormsDoc.php';
class RegisterDoc extends FormsDoc
{
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
        echo '<div><label for="name">Name:</label><input type="text" id="name" name="name" value="'.$this->model->name.'">';
        echo '<span class="error">  * '.$this->model->namerr.'</span></div>';
    }
    protected function showEmailInput()
    {
        echo '<div><label for="email">E-mail:</label><input type="email" id="email" name="email" value="'.$this->model->email.'">';
        echo '<span class="error">  * '.$this->model->emailerr.'</span></div>';
    }
    private function showPasswordInput()
    {
        echo '<div><label for="password">Password:</label><input type="password" id="pw" name="pw" value="'.$this->model->pw.'">';
        echo '<span class="error">  * '.$this->model->pwerr.'</span></div>';
    }
    private function showRepeatPasswordInput()
    {
        echo '<div><label for="repeat_password">Repeat password:</label><input type="password" id="pwrepeat" name="pwrepeat" value="'.$this->model->pwrepeat.'">';
        echo '<span class="error">  * '.$this->model->pwrepeaterr.'</span></div>';
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