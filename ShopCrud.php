<?php
include_once 'Interfaces/IShopCrud.php';

class ShopCrud implements IShopCrud
{
    private $crud;
    private $genericException;
    public function __construct($crud)
    {
        $this->crud = $crud;
        $this->genericException = 'Something went wrong, please try again later.';
    }
    public function createNewOrder()
    {
        $items = array_filter($_SESSION['cart']);
        $user_id = $_SESSION['user_id'];
        $shopParams = array(':user_id' => $user_id);
        $order_id = $this->crud->createOrderRow($shopParams);
        if (!$order_id)
        {
            throw new Exception($this->genericException);
        }
        $result = $this->crud->createOrderItemsRow($order_id, $items);
        if (!$result)
        {
            throw new Exception($this->genericException);
        }
    }
    public function readSingleProduct($id)
    {
        $table = 'product';
        $row = 'ID';
        $result = $this->crud->readOneRow($table, $row, $id);
        if (!$result)
        {
            throw new Exception ($this->genericException);
        }
        return $result;
    }
    public function readAllProducts()
    {
        $table = 'product';
        $result = $this->crud->readTable($table);
        if (!$result)
        {
            throw new Exception ($this->genericException);
        }
        return $result;
    }
}
?>