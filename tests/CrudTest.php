<?php
$parent = dirname(dirname(__FILE__));
require_once $parent.'/StaticUtilClass.php';
require_once $parent.'/Crud.php';

use PHPUnit\Framework\TestCase;

class CrudTest extends TestCase
{
    public function testConstructEmpty()
    {
        //test
        $sut = new Crud(null);

        //result
        $this->assertNotEmpty($sut);
    }
    public function testConstructNotEmpty()
    {
        //prepare
        $crud = new Crud(null);

        //test
        $sut = new Crud($crud);

        //result
        $this->assertNotEmpty($sut);
    }
    public function testCreateUserRow()
    {
        //prepare
        $sut = new Crud(null);
        $params = array(':email' => 'test@mail.com', ':name' => 'Tes Ting', ':pw' => 'test');

        //test
        $result = $sut->createUserRow($params);

        //result
        $this->assertNotEmpty($result);
    }
    public function testCreateOrderRow()
    {
        //prepare
        $sut = new Crud(null);
        $params = array(':user_id' => '100');

        //test
        $result = $sut->createOrderRow($params);

        //result
        $this->assertNotEmpty($result);
    }
    public function testCreateOrderItemsRow()
    {
        //prepare
        $sut = new Crud(null);
        $order_id = '123454321';
        $params = array('100' => '10');

        //test
        $result = $sut->createOrderItemsRow($order_id, $params);

        //result
        $this->assertNotEmpty($result);
    }
    public function testReadOneRow()
    {
        //prepare
        $sut = new Crud(null);
        $table = 'users';
        $row = 'email';
        $value = 'test@mail.com';

        //test
        $result = $sut->readOneRow($table, $row, $value);

        //result
        $this->assertIsObject($result);
    }
    public function testReadMultipleRows()
    {
        //prepare
        $sut = new Crud(null);
        $table = 'orders';
        $row = 'user_id';
        $value = '2';

        //test
        $result = $sut->readMultipleRows($table, $row, $value);

        //result
        $this->assertIsArray($result);
    }
    public function testTable()
    {
        //prepare
        $sut = new Crud(null);
        $table = 'product';

        //test
        $result = $sut->readTable($table);

        //result
        $this->assertIsArray($result);
    }
}

?>