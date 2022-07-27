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
        echo '<option value="Mr.">Mr.</option>';
        echo '<option value="Mrs">Mrs</option>';
        echo '</select><span class="error">  *</span></div>';
    }
    private function showNameInput()
    {
        echo '<div><label for="name">Name:</label><input type="text" id="name" name="name"><span class="error">  *</span></div>';
    }
    protected function showEmailInput()
    {
        echo '<div><label for="email">E-mail:</label><input type="email" id="email" name="email"><span class="error">  *</span></div>';
    }
    private function showPhoneInput()
    {
        echo '<div><label for="phone">Phone number:</label><input type="tel" id="phone" name="phone"><span class="error">  *</span></div>';
    }
    private function showCommunicationPreferenceInput()
    {
        echo '<div><label for="compref">What is your communication preference?</label>';
        echo '<input type="radio" id="email" name="compref" value="E-mail"><label for="email">E-mail</label>';
        echo '<input type="radio" id="telephone" name="compref" value="Telephone"><label for="telephone">Telephone</label>';
        echo '<span class="error">  *</span></div>';
    }
    private function showMessageInput()
    {
        echo '<div><textarea id="mess" name="mess" rows="8" cols="50" placeholder= "Tell us why you want to contact us!"></textarea><span class="error">  *</span></div>';
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