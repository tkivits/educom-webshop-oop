<?php
include_once 'FormsDoc.php';
class ContactDoc extends FormsDoc
{
    protected function showRequiredField()
    {
        echo '<div class="errordiv"><span class="error">Fields with a * are required</span></div> ';
    }
    protected function showFormStart()
    {
        echo '<form class="form" method="post">';
    }
    private function showSalutationInput()
    {
        echo '<div><label for="salutation"></label>';
        echo '<select id="sal" name="sal">';
        echo '<option value="">Choose</option>';
        echo '<option value="Mr."';
        if ($this->model->sal == "Mr.") {echo "selected";};
        echo '>Mr.</option>';
        echo '<option value="Mrs"';
        if ($this->model->sal == "Mrs") {echo "selected";};
        echo '>Mrs</option>';
        echo '</select><span class="error">  * '.$this->model->salerr.'</span></div>';
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
    private function showPhoneInput()
    {
        echo '<div><label for="phone">Phone number:</label><input type="tel" id="phone" name="phone" value="'.$this->model->phone.'">';
        echo '<span class="error">  * '.$this->model->phonerr.'</span></div>';
    }
    private function showCommunicationPreferenceInput()
    {
        echo '<div><label for="compref">What is your communication preference?</label>';
        echo '<input type="radio" name="compref" value="E-mail"';
        if ($this->model->compref == "E-mail") {echo "checked";};
        echo '><label for="email">E-mail</label>';
        echo '<input type="radio" name="compref" value="Telephone"';
        if ($this->model->compref == "Telephone") {echo "checked";};
        echo '><label for="telephone">Telephone</label>';
        echo '<span class="error">  * '.$this->model->compreferr.'</span></div>';
    }
    private function showMessageInput()
    {
        echo '<div><textarea id="mess" name="mess" rows="8" cols="50" placeholder= "Tell us why you want to contact us!">';
        if (isset($this->model->mess)) {echo $this->model->mess;};
        echo '</textarea>';
        echo '<span class="error">  * '.$this->model->messerr.'</span></div>';
    }
    protected function showSubmitButton()
    {
        echo '<input class="submitbutton" type="submit" value="Send">';
    }
    protected function showFormEnd()
    {
        echo '</form>';
    }
    protected function showContent()
    {
        $this->showRequiredField();
        $this->showFormStart();
        $this->showSalutationInput();
        $this->showNameInput();
        $this->showEmailInput();
        $this->showPhoneInput();
        $this->showCommunicationPreferenceInput();
        $this->showMessageInput();
        $this->showSubmitButton();
        $this->showFormEnd();
    }
}
?>