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
  public $user = array();
  public $valid = False;
  public function __construct($pageModel)
  {
      PARENT::__construct($pageModel);
  }
  public function validateContactForm() 
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(empty($_POST["sal"])) {
        $this->salerr = "Salutation is required";
      } else {
        $this->sal = Util::getPOSTvar('sal');
      }
      if(empty($_POST["name"])) {
        $this->namerr = "Name is required";
      } else { 
        $this->name = Util::getPOSTvar('name');
      if (!preg_match("/^[a-zA-Z-' ]*$/", $this->name)) {
        $this->namerr = "Only letters and spaces are allowed";
        }
      }
      if(empty($_POST["email"])) {
        $this->emailerr = "E-mail is required";
      } else {
        $this->email = Util::getPOSTvar('email');
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
          $this->emailerr = "Invalid e-mail";
        }
      }
      if(empty($_POST["phone"])) {
        $this->phonerr = "Phone number is required";
      } else {
        $this->phone = Util::getPOSTvar('phone');
        if (!preg_match("/^0[0-9]{1,3}-{0,1}[0-9]{6,8}$/",$this->phone)) {
          $this->phonerr = "Invalid phone number";
        }
      }
      if(empty($_POST["compref"])) {
        $this->compreferr = "Communication preference is required";
      } else {
        $this->compref = Util::getPOSTvar('compref');
      }
      if(empty($_POST["mess"])) {
        $this->messerr = "A message is required";
      } else {
        $this->mess = Util::getPOSTvar('mess');
      }
      if(empty($this->salerr) && empty($this->namerr) && empty($this->emailerr) && empty($this->phonerr) && empty($this->compreferr) && empty($this->messerr)) {
        $this->valid = True;
      }
    }
  }
  public function validateRegistration() 
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->name = Util::getPOSTvar('name');
      $this->email = Util::getPOSTvar('email');
      $this->pw = Util::getPOSTvar('pw');
      $this->pwrepeat = Util::getPOSTvar('pwrepeat');
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
          Util::logError($e);
        }
      }
    }
  }
  public function validateUser() 
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->email = Util::getPOSTvar('email');
      $this->pw = Util::getPOSTvar('pw');
      if (empty($this->email)) {
        $this->emailerr = "E-mail is required";
      } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->emailerr = "Invalid e-mail";
      }
      if (empty($this->pw)) {
        $this->pwerr = "Password is required";
      }
      if(empty($this->emailerr) && empty($this->pwerr)) {
        try {
          $this->user = findUserByEmail($this->email);
          if (empty($this->user) || $this->user['email'] !== $this->email) {
            $this->emailerr= "Unknown e-mail";
          }
          if (empty($this->user) || $this->user['password'] !== $this->pw) {
            $this->pwerr = "E-mail doesn't match password";
          }
        } catch (Exception $e) {
          Util::logError($e);
        }
      }
      if(empty($this->emailerr) && empty($this->pwerr)) {
        $this->valid = True;
      }
    }
  }
  public function login()
  {
    $this->doLoginUser();
  }
  private function doLoginUser()
  {
    $_SESSION['user_id'] = $this->user['ID'];
    $_SESSION['email'] = $this->user['email'];
    $_SESSION['name'] = $this->user['name'];
    $_SESSION['login'] = True;
  }
  public function logout()
  {
    $this->doLogoutUser();
  }
  private function doLogoutUser()
  {
    session_unset();
    session_destroy();
  }
}

?>