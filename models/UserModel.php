<?php
class UserModel extends PageModel
{
  public $sal = '';
  public $salerr = '';
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
  public $pw = '';
  public $pwerr = '';
  public $pwrepeat = '';
  public $pwrepeaterr = '';
  public $valid = False;
  public function __construct($pageModel)
  {
      PARENT::__construct($pageModel);
  }
  function validateContactForm() 
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(empty($_POST["sal"])) {
        $this->salerr = "Salutation is required";
      } else {
        $this->sal = $this->testInput($_POST["sal"]);
      }
      if(empty($_POST["name"])) {
        $this->namerr = "Name is required";
      } else { 
        $this->name = $this->testInput($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$this->name)) {
        $this->namerr = "Only letters and spaces are allowed";
        }
      }
      if(empty($_POST["email"])) {
        $this->emailerr = "E-mail is required";
      } else {
        $this->email = $this->testInput($_POST["email"]);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
          $this->emailerr = "Invalid e-mail";
        }
      }
      if(empty($_POST["phone"])) {
        $this->phonerr = "Phone number is required";
      } else {
        $this->phone = $this->testInput($_POST["phone"]);
        if (!preg_match("/^0[0-9]{1,3}-{0,1}[0-9]{6,8}$/",$this->phone)) {
          $this->phonerr = "Invalid phone number";
        }
      }
      if(empty($_POST["compref"])) {
        $this->compreferr = "Communication preference is required";
      } else {
        $this->compref = $this->testInput($_POST["compref"]);
      }
      if(empty($_POST["mess"])) {
        $this->messerr = "A message is required";
      } else {
        $this->mess = $this->testInput($_POST["mess"]);
      }
      if(empty($this->salerr) && empty($this->namerr) && empty($this->emailerr) && empty($this->phonerr) && empty($this->compreferr) && empty($this->messerr)) {
        $this->valid = True;
      }
    }
  }
  function validateRegistration() 
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->name = $this->testInput($_POST['name']);
      $this->email = $this->testInput($_POST['email']);
      $this->pw = $this->testInput($_POST['pw']);
      $this->pwrepeat = $this->testInput($_POST['pwrepeat']);
      if (empty($_POST["name"])) {
        $this->namerr = "Name is required";
      } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $this->name)) {
        $this->namerr = "Only letters and spaces are allowed";
      }
      if (empty($_POST["email"])) {
        $this->emailerr = "E-mail is required";
      } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->emailerr = "Invalid e-mail";
        }
      if (empty($_POST["pw"])) {
        $this->pwerr = "Password is required";
      }
      if (empty($_POST["pwrepeat"])) {
        $this->pwrepeaterr = "Please repeat your password";
      } elseif ($this->pw !== $this->pwrepeat) {
        $this->pwrepeaterr = "Entered passwords do not match";
      }
      $user = findUserByEmail($this->email);
      if (isset($user['email'])) {
        $this->emailerr = "E-mail already exists";
      }
      if (empty($this->namerr) && empty($this->emailerr) && empty($this->pwerr) && empty($this->pwrepeaterr)) {
        try {
          registerNewUser($this->email, $this->name, $this->pw);
          $this->valid = True;
        } catch (Exception $e) {
          logError($e);
        }
      }
    }
  }
}

?>