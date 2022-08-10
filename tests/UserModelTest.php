<?php
session_start();
$parent = dirname(dirname(__FILE__));
require_once $parent.'/models/UserModel.php';
require_once $parent.'/StaticUtilClass.php';
require_once $parent.'/Crud.php';
require_once $parent.'/UserCrud.php';

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testConstructEmpty()
    {
        //test
        $result = new UserModel(null, null);

        //result
        $this->assertNotEmpty($result);
    }
    public function testConstructWithCopy()
    {
        //prepare
        $copy = new UserModel(null, null);
        $copy->page = 'test';

        //test
        $result = new UserModel($copy, null);

        //result
        $this->assertNotEmpty($result);
        $this->assertEquals('test', $result->page);
    }
    public function testConstructWithCrud()
    {
        //prepare
        $crud = new UserCrud(null);

        //test
        $result = new UserModel(null, $crud);

        //result
        $this->assertNotEmpty($result);
    }
    public function testConstructNotEmpty()
    {
        //prepare
        $copy = new UserModel(null, null);
        $copy->page = 'Home';
        $crud = new UserCrud(null);

        //test
        $result = new UserModel($copy, $crud);

        //result
        $this->assertNotEmpty($result);
        $this->assertEquals('Home', $result->page);
    }
    public function testValidateContactFormEmpty()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $sut = new UserModel(null, null);

        //test
        $sut->validateContactForm();

        //result
        $this->assertFalse($sut->valid);
    }
    public function testValidateContactFormNotEmpty()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST["sal"] = 'Mr.';
        $_POST["name"] = 'Tes Ting';
        $_POST["email"] = 'test@mail.com';
        $_POST["phone"] = '0612332112';
        $_POST["compref"] = 'Telephone';
        $_POST["mess"] = 'test';
        $sut = new UserModel(null, null);

        //test
        $sut->validateContactForm();

        //result
        $this->assertTrue($sut->valid);
    }
    public function testValidateContactFormEmailFilter()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['email'] = 'test';
        $sut = new UserModel(null, null);

        //test
        $sut->validateContactForm();

        //result
        $this->assertEquals('Invalid e-mail', $sut->emailerr);
    }
    public function testValidateRegistrationEmpty()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $crud = new Crud(null);
        $userCrud = new Usercrud($crud);
        $sut = new UserModel(null, $userCrud);

        //test
        $sut->validateRegistration();

        //result
        $this->assertFalse($sut->valid);
    }
    public function testValidateRegistrationNotEmpty()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST["name"] = 'Tes Ting';
        $_POST["email"] = 'test@mail.com';
        $_POST['pw'] = 'test';
        $_POST['pwrepeat'] = 'test';
        $crud = new Crud(null);
        $userCrud = new Usercrud($crud);
        $sut = new UserModel(null, $userCrud);

        //test
        $sut->validateRegistration();

        //result (assertFalse because this is already registered)
        $this->assertFalse($sut->valid);
    }
    public function testValidateRegistrationPasswordMatching()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST["name"] = 'Tes Ting';
        $_POST["email"] = 'test@mail.com';
        $_POST['pw'] = 'test';
        $_POST['pwrepeat'] = 'testtest';
        $crud = new Crud(null);
        $userCrud = new Usercrud($crud);
        $sut = new UserModel(null, $userCrud);

        //test
        $sut->validateRegistration();

        //result
        $this->assertEquals('Entered passwords do not match', $sut->pwrepeaterr);       
    }
    public function testValidateUserEmpty()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST["email"] = '';
        $_POST['pw'] = '';
        $crud = new Crud(null);
        $userCrud = new Usercrud($crud);
        $sut = new UserModel(null, $userCrud);

        //test
        $sut->validateUser();

        //result
        $this->assertFalse($sut->valid);
    }
    public function testValidateUserNotEmpty()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST["email"] = 'test@mail.com';
        $_POST['pw'] = 'test';
        $crud = new Crud(null);
        $userCrud = new Usercrud($crud);
        $sut = new UserModel(null, $userCrud);

        //test
        $sut->validateUser();

        //result
        $this->assertTrue($sut->valid);
    }
    public function testValidateUserPasswordMatching()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST["email"] = 'test@mail.com';
        $_POST['pw'] = 'testtest';
        $crud = new Crud(null);
        $userCrud = new Usercrud($crud);
        $sut = new UserModel(null, $userCrud);

        //test
        $sut->validateUser();

        //result
        $this->assertEquals("E-mail doesn't match password", $sut->pwerr);       
    }
    public function testLogin()
    {
        //prepare
        $sut = new UserModel(null, null);
        $sut->user['ID'] = '100';
        $sut->user['email'] = 'test@mail.com';
        $sut->user['name'] = 'Tes Ting';

        //test
        $sut->login();

        //result
        $this->assertEquals('100', $_SESSION['user_id']);
        $this->assertEquals('test@mail.com', $_SESSION['email']);
        $this->assertEquals('Tes Ting', $_SESSION['name']);
        $this->assertTrue($_SESSION['login']);
    }
    public function testLogout()
    {
        //prepare
        $_SESSION['user_id'] = '100';
        $_SESSION['email'] = 'test@mail.com';
        $_SESSION['name'] = 'Tes Ting';
        $_SESSION['login'] = True;
        $sut = new UserModel(null, null);

        //test
        $sut->logout();

        //result
        $this->assertArrayNotHasKey('user_id', $_SESSION);
        $this->assertArrayNotHasKey('email', $_SESSION);
        $this->assertArrayNotHasKey('name', $_SESSION);
        $this->assertArrayNotHasKey('login', $_SESSION);
    }
}

?>