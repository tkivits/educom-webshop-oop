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
        //test
        $result = new PageModel(null, null);

        //result
        $this->assertNotEmpty($result);
    }
    public function testConstructWithCopy()
    {
        //prepare
        $copy = new PageModel(null, null);
        $copy->page = 'test';

        //test
        $result = new PageModel($copy, null);

        //result
        $this->assertNotEmpty($result);
        $this->assertEquals('test', $result->page);
    }
    public function testConstructWithCrud()
    {
        //prepare
        $crud = new Crud;

        //test
        $result = new PageModel(null, $crud);

        //result
        $this->assertNotEmpty($result);
    }
    public function testConstructNotEmpty()
    {
        //prepare
        $copy = new PageModel(null, null);
        $copy->page = 'Home';
        $crud = new Crud;

        //test
        $result = new PageModel($copy, $crud);

        //result
        $this->assertNotEmpty($result);
        $this->assertEquals('Home', $result->page);
    }
    public function testGetRequestedPage()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = 'Home';
        $sut = new PageModel(null, null);

        //test
        $sut->getRequestedPage();

        //result
        $this->assertEquals('Home', $sut->page);
    }
    public function testGetRequestedPageWithoutPage()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $sut = new PageModel(null, null);

        //test
        $sut->getRequestedPage();

        //result
        $this->assertEquals('Home', $sut->page);
    }
    public function testSetHeaderEmpty()
    {
        //test
        $sut = new PageModel(null, null);

        //result
        $this->assertEquals('Home', $sut->header);
    }
    Public function testSetHeaderOnGet()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = 'Home';

        //test
        $sut = new PageModel(null, null);

        //result
        $this->assertEquals('Home', $sut->header);
    }
    public function testSetHeaderSwitch()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = 'EmptyCart';
        
        //test
        $sut = new PageModel(null, null);

        //result
        $this->assertEquals('Shopping cart', $sut->header);
    }
    public function testSetMenuItems()
    {
        //prepare
        $menuitems = array('Home', 'About', 'Contact', 'Webshop', 'Register', 'Login');

        //test
        $sut = new PageModel(null, null);

        //result
        $this->assertEquals($menuitems, $sut->menuitems);
    }
    public function testSetMenuItemsOnLogin()
    {
        //prepare
        $menuitems = array('Home', 'About', 'Contact', 'Webshop', 'Cart', 'Logout');

        //test
        $sut = new PageModel(null, null);

        //result
        $this->assertEquals($menuitems, $sut->menuitemslogin);
    }
}

?>