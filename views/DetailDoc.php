<?php
require_once 'ProductDoc.php';
require_once 'dataLayer.php';
class DetailDoc extends ProductDoc 
{
    protected function showProduct($id, $image, $name, $price) 
    {
        echo '<a href="?page='.$id.'">';
        echo '<img class="productimg" src="'.$image.'" alt="'.$name.'"/>';
        echo '</a>';
        echo '<div class="title">'.$name.'</div></li>';
        echo '<div class="price">'.$price.'</div></li>';
    }
    protected function showCartButton($productid, $container = NULL)
    {
        echo '<form method="post">';
        echo '<input type="hidden" name="CartID", value="'.$productid.'">';
        echo '<input type="hidden" name="action" value="AddToCart">';
        echo '<input class="cartButton" type="submit", value="Add to cart">';
        echo '</form>';
    }
    protected function showContent()
    {
	    try {
		    $product = mysqli_fetch_array($this->model->singleproduct);
		    echo '<div class="menu">';
		    $this->showProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
		    echo '<div>'.$product['item_description'].'</div></li>';
		    if (isset($_SESSION['login'])) 
            {
			    $this->showCartButton($product['ID']);
		    }
		    echo '</div>';
	    } 
        catch (Exception $e) 
        {
		    Util::logError($e);
		    echo 'There seems to be a technical issue. Please try again later.';
	    }
    }
}
?>