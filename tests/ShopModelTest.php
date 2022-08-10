<?php
$parent = dirname(dirname(__FILE__));
require_once $parent.'/models/ShopModel.php';
require_once $parent.'/StaticUtilClass.php';
require_once $parent.'/Crud.php';
require_once $parent.'/ShopCrud.php';

use PHPUnit\Framework\TestCase;

class ShopModelTest extends TestCase
{
    public function testConstruct()
    {
        //prepare
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);
        $copy = new ShopModel(null, $shopCrud);
        $copy->page = 'Home';

        //test
        $result = new ShopModel($copy, $shopCrud);

        //result
        $this->assertNotEmpty($result);
        $this->assertEquals('Home', $result->page);
    }
    public function testAddToCart()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['action'] = 'AddToCart';
        $_POST['CartID'] = '1';
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);
        $sut = new ShopModel(null, $shopCrud);

        //test
        $sut->addToCart();

        //result
        $this->assertArrayHasKey('1', $_SESSION['cart']);
        $this->assertArrayHasKey('2', $_SESSION['cart']);
        $this->assertArrayHasKey('3', $_SESSION['cart']);
        $this->assertArrayHasKey('4', $_SESSION['cart']);
        $this->assertArrayHasKey('5', $_SESSION['cart']);
        $this->assertArrayNotHasKey('6', $_SESSION['cart']);
    }
    public function testUpdateCartOnUpdate()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['action'] = 'update';
        $_POST['CartID'] = '2';
        $_POST['amountCart'] = '10';
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);
        $sut = new ShopModel(null, $shopCrud);
        
        //test
        $sut->updateCart();

        //result
        $this->assertArrayHasKey('2', $_SESSION['cart']);
        $this->assertContains('10', $_SESSION['cart']);
    }
    public function testUpdateCartOnPlaceOrder()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['action'] = 'placeOrder';
        $_SESSION['user_id'] = '100';
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);
        $sut = new ShopModel(null, $shopCrud);
        
        //test
        $sut->updateCart();

        //result
        $this->assertEmpty($sut->genericerr);
        $this->assertTrue($sut->valid);
        $this->assertArrayNotHasKey('cart', $_SESSION);
    }
    public function testGetItemsInCartEmpty()
    {
        //prepare
        $_SESSION['cart'] = '';
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);

        //test
        $sut = new ShopModel(null, $shopCrud);

        //result
        $this->assertEmpty($sut->itemsincart);
    }
    public function testGetItemsInCartNotEmpty()
    {
        //prepare
        $_SESSION['cart'] = array('1' => '1', '2' => '0', '3' => '10');
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);

        //test
        $sut = new ShopModel(null, $shopCrud);

        //result
        $this->assertNotEmpty($sut->itemsincart);
        $this->assertArrayHasKey('1', $sut->itemsincart);
        $this->assertArrayNotHasKey('2', $sut->itemsincart);
        $this->assertContains('10', $sut->itemsincart);
    }
    public function testSetProductID()
    {
        //prepare
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['page'] = '5';
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);
        $sut = new ShopModel(null, $shopCrud);

        //test
        $sut->setProductID();

        //result
        $this->assertEquals('5', $sut->productID);
    }
    public function testSetSingleProduct()
    {
        //prepare
        $crud = new Crud(null);
        $shopCrud = new ShopCrud($crud);
        $sut = new ShopModel(null, $shopCrud);
        $sut->productID = '5';

        //test
        $sut->setSingleProduct();

        //result
        $this->assertNotEmpty($sut->singleproduct);
    }
}

?>