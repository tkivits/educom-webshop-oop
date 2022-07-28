<?php
require_once 'ProductDoc.php';
require_once '../dataLayer.php';
class DetailDoc extends ProductDoc 
{
    public $productid;
    public function __construct($page, $productid)
    {
        $this->id = $productid;
    }
    protected function showProduct($id, $image, $name, $price) 
    {
        echo '<a href="?page='.$id.'">';
        echo '<img class="productimg" src="'.$image.'" alt="'.$name.'"/>';
        echo '</a>';
        echo '<div class="title">'.$name.'</div></li>';
        echo '<div class="price">'.$price.'</div></li>';
    }
    protected function showAddToCartButton()
    {
        echo '<input class="cartButton" type="submit", value="Add to cart">';
    }
    protected function showContent()
    {
	    try {
		    $data = getSingleProduct($this->id);
		    $product = mysqli_fetch_array($data);
		    echo '<div class="menu">';
		    $this->showProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
		    echo '<div>'.$product['item_description'].'</div></li>';
		    if (isset($_SESSION['login'])) 
            {
			    $this->showAddToCartButton();
		    }
		    echo '</div>';
	    } 
        catch (Exception $e) 
        {
		    logError($e);
		    echo 'There seems to be a technical issue. Please try again later.';
	    }
    }
}
?>