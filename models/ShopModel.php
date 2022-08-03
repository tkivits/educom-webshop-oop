<?php
class ShopModel extends PageModel
{
    public $products;
    public function __construct($pagemodel)
    {
        PARENT::__construct($pagemodel);
        $this->products = getAllProducts();
    }
    public function addToCart()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'AddToCart'){
            $id = testInput($_POST['CartID']);
            if (!isset($_SESSION['cart'])) {
                try {
                    $products = getAllProducts();
                    $_SESSION['cart'] = array();
                    while ($row = mysqli_fetch_array($products)) {
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
}
?>