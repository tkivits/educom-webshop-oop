<?php
class ShopModel extends PageModel
{
    public $allproducts;
    public $valid = False;
    public function __construct($pagemodel)
    {
        PARENT::__construct($pagemodel);
        $this->allproducts = getAllProducts();
    }
    public function addToCart()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'AddToCart'){
            $id = Util::testInput($_POST['CartID']);
            if (!isset($_SESSION['cart'])) {
                try {
                    $_SESSION['cart'] = array();
                    while ($row = mysqli_fetch_array($this->products)) {
                        $single_id = $row['ID'];
                        $_SESSION['cart'][$single_id] = 0;
                    }
                } catch (Exception $e) {
                    Util::logError($e);
                }
                
            }
            if ($_SESSION['cart'][$id] >= 0) {
                $qty = $_SESSION['cart'][$id];
                $qty++;
                $_SESSION['cart'][$id] = $qty;
            }
        }
    }
    public function updateCart() 
    {
        if(isset($_POST['CartID']) && $_POST['action'] == 'update') {
            $item_id = Util::testInput($_POST['CartID']);
            $amount = Util::testInput($_POST['amountCart']);
            $_SESSION['cart'][$item_id] = $amount;
        } elseif(isset($_POST['placeOrder']) && $_POST['action'] == 'placeOrder') {
            registerOrder();
            unset($_SESSION['cart']);
            $this->valid = True;
        }
    }
    public function setProductID()
    {
        $this->productID = Util::getGETvar('page');
    }
    public function setSingleProduct()
    {
        $this->singleproduct = getSingleProduct($this->productID);
    }
}
?>