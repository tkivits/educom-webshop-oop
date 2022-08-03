<?php
class ShopModel extends PageModel
{
    public $allproducts;
    public $itemsincart;
    public $valid = False;
    public function __construct($pagemodel)
    {
        PARENT::__construct($pagemodel);
        $this->itemsincart = $this->getItemsInCart();
        try
        {
            $this->allproducts = getAllProducts();
        } catch (Exception $e) {
            Util::logError($e);
        }
    }
    public function addToCart()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'AddToCart'){
            $id = Util::getPOSTvar('CartID');
            if (empty($_SESSION['cart'])) {
                try {
                    $_SESSION['cart'] = array();
                    while ($row = mysqli_fetch_array($this->allproducts)) {
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
            $item_id = Util::getPOSTvar('CartID');
            $amount = Util::getPOSTvar('amountCart');
            $_SESSION['cart'][$item_id] = $amount;
        } elseif(isset($_POST['placeOrder']) && $_POST['action'] == 'placeOrder') {
            registerOrder();
            unset($_SESSION['cart']);
            $this->valid = True;
        }
    }
    private function getItemsInCart()
    {
        $items = array();
        if (!empty($_SESSION['cart']))
        {
            $items = array_filter($_SESSION['cart']);
        }
        return $items;
    }
    public function setProductID()
    {
        $this->productID = Util::getGETvar('page');
    }
    public function setSingleProduct()
    {
        try
        {
            $this->singleproduct = getSingleProduct($this->productID);
        } catch (Exception $e) {
            Util::logError($e);
        }
        
    }
}
?>