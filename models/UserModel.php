<?php
require_once 'PageModel.php';

class UserModel extends PageModel
{
    public $name = '';
    public $namerr = '';
    public $email = '';
    public $emailerr = '';
    public $phone = '';
    public $phonerr= '';
    public $compref = '';
    public $compreferr = '';
    public $mess = '';
    public $messerr = '';
    public $valid = False;
    public function __construct($pageModel)
    {
        PARENT::__construct($pageModel);
    }
    function validateContactForm() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
          if(empty($_POST["sal"])) {
          $this->salErr = "Salutation is required";
          } else {
            $this->sal = testInput($_POST["sal"]);
          }
          if(empty($_POST["name"])) {
            $this->namErr = "Name is required";
          } else { 
          $this->name = testInput($_POST["name"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$this->name)) {
            $this->namErr = "Only letters and spaces are allowed";
            }
          }
          if(empty($_POST["email"])) {
            $this->emailErr = "E-mail is required";
          } else {
            $this->email = testInput($_POST["email"]);
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
              $this->emailErr = "Invalid e-mail";
            }
          }
          if(empty($_POST["phone"])) {
            $this->phonErr = "Phone number is required";
          } else {
            $this->phone = testInput($_POST["phone"]);
            if (!preg_match("/^0[0-9]{1,3}-{0,1}[0-9]{6,8}$/",$this->phone)) {
                $this->phonErr = "Invalid phone number";
            }
          }
          if(empty($_POST["compref"])) {
            $this->comprefErr = "Communication preference is required";
          } else {
            $this->compref = testInput($_POST["compref"]);
          }
          if(empty($_POST["mess"])) {
            $this->messErr = "A message is required";
          } else {
            $this->mess = testInput($_POST["mess"]);
          }
          if(empty($this->salErr) && empty($this->namErr) && empty($this->emailErr) && empty($this->phonErr) && empty($this->comprefErr) && empty($this->messErr)) {
            $this->valid = True;
          }
        }
    }
}

?>