<?php
$parent = dirname(dirname(__FILE__));
require_once $parent.'/models/PageModel.php';
require_once $parent.'/StaticUtilClass.php';
require_once $parent.'/Crud.php';

use PHPUnit\Framework\TestCase;

class PageModelTest extends TestCase
{
    public function testConstructEmpty()
    {
        $result = new PageModel(null, null);
        $this->assertNotEmpty($result);
    }
    public function testConstructWithCopy()
    {
        $copy = new PageModel(null, null);
        $copy->page = 'test';
        $result = new PageModel($copy, null);
        $this->assertNotEmpty($result);
        $this->assertEquals('test', $result->page);
    }
    public function testConstructWithCrud()
    {
        $crud = new Crud;
        $result = new PageModel(null, $crud);
        $this->assertNotEmpty($result);
    }
    public function testConstructNotEmpty()
    {
        $copy = new PageModel(null, null);
        $copy->page = 'Home';
        $crud = new Crud;
        $result = new PageModel($copy, $crud);
        $this->assertNotEmpty($result);
        $this->assertEquals('Home', $result->page);
    }
    public function testGetRequestedPage()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = 'Home';
        $sut = new PageModel(null, null);
        $sut->getRequestedPage();
        $this->assertEquals('Home', $sut->page);
    }
    public function testGetRequestedPageWithoutPage()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $sut = new PageModel(null, null);
        $sut->getRequestedPage();
        $this->assertEquals('Home', $sut->page);
    }
    public function testSetHeaderEmpty()
    {
        $sut = new PageModel(null, null);
        $this->assertEquals('Home', $sut->header);
    }
    Public function testSetHeaderOnGet()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = 'Home';
        $sut = new PageModel(null, null);
        $this->assertEquals('Home', $sut->header);
    }
    public function testSetHeaderSwitch()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = 'EmptyCart';
        $sut = new PageModel(null, null);
        $this->assertEquals('Shopping cart', $sut->header);
    }
    public function testSetMenuItems()
    {
        $sut = new PageModel(null, null);
        $menuitems = array('Home', 'About', 'Contact', 'Webshop', 'Register', 'Login');
        $this->assertEquals($menuitems, $sut->menuitems);
    }
    public function testSetMenuItemsOnLogin()
    {
        $sut = new PageModel(null, null);
        $menuitems = array('Home', 'About', 'Contact', 'Webshop', 'Cart', 'Logout');
        $this->assertEquals($menuitems, $sut->menuitemslogin);
    }
}

?>