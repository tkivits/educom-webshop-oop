<?php
class ShopModel extends PageModel
{
    public $allproducts;
    public $itemsincart;
    public $valid = False;
    public function __construct($copy)
    {
        PARENT::__construct($copy);
        if (empty($copy->itemsincart) || empty($copy->allproducts))
        {
            $this->itemsincart = $this->getItemsInCart();
            try
            {
                $this->allproducts = getAllProducts();
            } catch (Exception $e) {
                Util::logError($e);
                $this->genericerr = 'Something went wrong, please try again later!';
            }
        } else {
            $this->itemsincart = $copy->itemsincart;
            $this->allproducts = $copy->allproducts;
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
                    $this->genericerr = 'Something went wrong, please try again later!';
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
        $action = Util::getPOSTvar('action');
        switch ($action)
        {
            case 'update';
                $item_id = Util::getPOSTvar('CartID');
                $amount = Util::getPOSTvar('amountCart');
                $_SESSION['cart'][$item_id] = $amount;
                break;
            case 'placeOrder';
                try {
                    registerOrder();
                } catch (Exception $e) {
                    Util::logError($e);
                    $this->genericerr = 'Something went wrong, please try again later!';
                }
                if (empty($this->genericerr)) {
                    unset($_SESSION['cart']);
                    $this->valid = True;
                }
                break;
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
            $this->genericerr = 'Something went wrong, please try again later!';
        }
        
    }
}
?>