<?php
include_once 'FormsDoc.php';
class ContactThanksDoc extends BasicDoc
{
    private function showThankYou()
    {
        echo '<h1>Thank you for filling in the contact form!</h1>';
    }
    private function showDetails()
    {
        echo '<div>Your details are: '.$this->model->sal.' '.$this->model->name.'</div>';
    }
    private function showEmail()
    {
        echo '<div>Email: '.$this->model->email.'</div>';
    }
    private function showPhone()
    {
        echo '<div>Telephone: '.$this->model->phone.'</div>';
    }
    private function showCommunicationPreference()
    {
        echo '<div>Communication preference: '.$this->model->compref.'</div>';
    }
    private function showMessage()
    {
        echo '<div>Message: '.$this->model->mess.'</div>';
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