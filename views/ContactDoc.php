<?php
include_once 'FormsDoc.php';
class ContactDoc extends FormsDoc
{
    public $page;
    public $name;
    public $namerr;
    public $email;
    public $emailerr;
    public $phone;
    public $phonerr;
    public $compref;
    public $compreferr;
    public $mess;
    public $messerr;
    public function __construct($page, $sal, $salerr, $name, $namerr, $email, $emailerr, $phone, $phonerr, $compref, $compreferr, $mess, $messerr)
    {
        $this->page = $page;
        $this->sal = $sal;
        $this->salerr = $salerr;
        $this->name = $name;
        $this->namerr = $namerr;
        $this->email = $email;
        $this->emailerr = $emailerr;
        $this->phone = $phone;
        $this->phonerr = $phonerr;
        $this->compref = $compref;
        $this->compreferr = $compreferr;
        $this->mess = $mess;
        $this->messerr = $messerr;
    }
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
        if ($this->sal == "Mr.") {echo "selected";};
        echo '>Mr.</option>';
        echo '<option value="Mrs"';
        if ($this->sal == "Mrs") {echo "selected";};
        echo '>Mrs</option>';
        echo '</select><span class="error">  * '.$this->salerr.'</span></div>';
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
    private function showPhoneInput()
    {
        echo '<div><label for="phone">Phone number:</label><input type="tel" id="phone" name="phone" value="'.$this->phone.'">';
        echo '<span class="error">  * '.$this->phonerr.'</span></div>';
    }
    private function showCommunicationPreferenceInput()
    {
        echo '<div><label for="compref">What is your communication preference?</label>';
        echo '<input type="radio" name="compref" value="E-mail"';
        if ($this->compref == "E-mail") {echo "checked";};
        echo '><label for="email">E-mail</label>';
        echo '<input type="radio" name="compref" value="Telephone"';
        if ($this->compref == "Telephone") {echo "checked";};
        echo '><label for="telephone">Telephone</label>';
        echo '<span class="error">  * '.$this->compreferr.'</span></div>';
    }
    private function showMessageInput()
    {
        echo '<div><textarea id="mess" name="mess" rows="8" cols="50" placeholder= "Tell us why you want to contact us!">';
        if (isset($this->mess)) {echo $this->mess;};
        echo '</textarea>';
        echo '<span class="error">  * '.$this->messerr.'</span></div>';
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