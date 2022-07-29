<?php
include_once 'FormsDoc.php';
class ContactThanksDoc extends BasicDoc
{
    public $sal;
    public $name;
    public $email;
    public $phone;
    public $compref;
    public $mess;
    public function __construct($page, $sal, $name, $email, $phone, $compref, $mess)
    {
        $this->page = $page;
        $this->sal = $sal;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->compref = $compref;
        $this->mess = $mess;
    }
    private function showThankYou()
    {
        echo '<h1>Thank you for filling in the contact form!</h1>';
    }
    private function showDetails()
    {
        echo '<div>Your details are: '.$this->sal.' '.$this->name.'</div>';
    }
    private function showEmail()
    {
        echo '<div>Email: '.$this->email.'</div>';
    }
    private function showPhone()
    {
        echo '<div>Telephone: '.$this->phone.'</div>';
    }
    private function showCommunicationPreference()
    {
        echo '<div>Communication preference: '.$this->compref.'</div>';
    }
    private function showMessage()
    {
        echo '<div>Message: '.$this->mess.'</div>';
    }
    protected function showContent()
    {
        $this->showThankYou();
        $this->showDetails();
        $this->showEmail();
        $this->showPhone();
        $this->showCommunicationPreference();
        $this->showMessage();
    }
}
?>