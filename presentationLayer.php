<?php
//Prerequisites
session_start();
require 'businessLayer.php';
require 'dataLayer.php';

//showBodyStart
function showDocStart() {
    echo 
        '<!DOCTYPE html>
        <html>
        <head>
        <link rel="stylesheet" href="CSS/stylesheet.css">
        </head>
        <body>';
}

//showBodyEnd
function showDocEnd() {
    echo 
        '</body>
        </html>';
}

//showHeader
function showHeader($page) {
	if ($page == 'Product') {
		echo '<h1 class="header">Webshop</h1>';
	} else {
		echo '<h1 class="header">'.$page.'</h1>';
	}
}

//showMenu
function showMenu() {
	include 'Pages/menu.php';
}

//showFooter
function showFooter() {
	include 'Pages/footer.php';
}

//showActionForm
function showActionForm($productID, $buttonValue, $action, $amount=NULL) {
	echo '<form method="post">';
	echo '<input type="hidden" name="CartID" value="'.$productID.'">';
	if (!empty($amount)) {
		echo '<input type="number" class="count" id="amountCart" name="amountCart" value="'.$amount.'">';
	}
	echo '<input type="hidden" name="action" value="'.$action.'">';
	echo '<input class="cartButton" type="submit" value="'.$buttonValue.'">';
	echo '</form>';
}

//showDetailOfProduct
function showDetailOfProduct($id, $image, $name, $price) {
	echo '<a href="?page='.$id.'">';
	echo '<img class="productimg" src="'.$image.'" alt="'.$name.'"/>';
	echo '</a>';
	echo '<div class="title">'.$name.'</div></li>';
	echo '<div class="price">'.$price.'</div></li>';
}

//showHomePage
function showHomePage() {
	include 'Pages/home.php';
}

//showAboutpage
function showAboutPage() {
	include 'Pages/about.php';
}

//showContactPage
function showContactPage($data) {
	include 'Pages/contact.php';
}

//showContactThanksPage
function showContactThanksPage($data) {
	include 'Pages/contactthanks.php';
}

//showProductOverview
function showProductOverview() {
	try {
		$products = getAllProducts();
		while ($product = mysqli_fetch_array($products))
		{
			echo '<div class="menu">';
			showDetailOfProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
			if (isset($_SESSION['login'])){
				showActionForm($product['ID'], 'Add to Cart', 'add');
			}
			echo '</div>';
		}
	} catch (Exception $e) {
		logError($e);
		echo 'There seems to be a technical issue. Please try again later.';
	}
}

//showWebshopPage
function showWebshopPage() {
	showProductOverview();
	addToCart();
}

//showProductDetailPage
function showProductDetailPage() {
	$itemId = $_GET['page'];
	try {
		$data = getSingleProduct($itemId);
		$product = mysqli_fetch_array($data);
		echo '<div class="menu">';
		showDetailOfProduct($product['ID'], $product['filename_image'], $product['name'], $product['price']);
		echo '<div>'.$product['item_description'].'</div></li>';
		if (isset($_SESSION['login'])) {
			showActionForm($product['ID'], 'Add to Cart', 'add');
		}
		echo '</div>';
	} catch (Exception $e) {
		logError($e);
		echo 'There seems to be a technical issue. Please try again later.';
	}
	addToCart();
}

//showRegisterPage
function showRegisterPage($data) {
	include 'Pages/register.php';
}

//showLoginPage
function showLoginPage($data) {
	include 'Pages/login.php';
}

//showItemsCart
function showItemsCart($array){
	$items = array_filter($array);
	setSessionTotal();
	try {
		$products = getAllProducts();
		while ($product = mysqli_fetch_array($products))
    	{
        if (array_key_exists($product['ID'], $items)) {
		    $item_total = number_format($items[$product['ID']] * $product['price'], 2);
		    echo '<div class="cartitems">';
		    echo '<div class="imagecontainer"><a href="?page='.$product['ID'].'"><img class="productimg" src="'.$product['filename_image'].'" alt="'.$product['name'].'"/></a></div>';
		    echo '<div class="about">';
		    echo '<div class="itemtitle">'.$product['name'].'</div>';
		    echo '<div class="itemprice">'.$product['price'].'</div>';
		    echo '</div>';
		    echo '<div class="countcontainer">';
			showActionForm($product['ID'], 'Update', 'updateCart', $items[$product['ID']]);
			echo '</div>';
		    echo '<div class="pricetotalcontainer"><div class="priceitemtotal">'.$item_total.'</div></div>';
		    echo '</div>';
		    array_push($_SESSION['total'], $item_total);
        }
		}
	} catch (Exception $e) {
		logError($e);
		echo 'There seems to be a technical issue. Please try again later.';
	}
}

//showCheckoutButton
function showPlaceOrder() {
	if (isset($_SESSION['total'])) {
		$total = number_format(array_sum($_SESSION['total']), 2);
		echo '<div class="price">Total amount: '.$total.'</div>';
		echo '<div>';
		echo '<form method="post">';
		echo '<div class="accept"><input type="checkbox" id="agree" name="termAgree" value="agree"><label for="agree">I accept all terms & conditions</label></div>';
		echo '<input class="cartButton" type="submit" value="Place order!">';
		echo '<input type="hidden" name="placeOrder>';
		echo '</form>';
		echo '</div>';
	}
}

//showShoppingCart
function showShoppingCartPage() {
	echo '<div class="cartcontainer">';
	if (!isset($_SESSION['cart'])) {
		include 'Pages/emptycartPage.php';
	} else {
		showItemsCart($_SESSION['cart']);
        showPlaceOrder();
	}
	echo '</div>';

}

//showYourOrder
function showYourOrder(){
	unset($_SESSION['cart']);
	unset($_SESSION['total']);
	echo '<div class="title">Thank you for your order!</div>';
}

//getRequestedPage
function getRequestedPage(){
	if(!isset($_GET['page'])){
		return 'Home';
	}
	else {
		return $_GET['page'];
	}
}

//processRequest
function processRequest($page) {
	switch($page)
	{
		case 'Contact';
			$data = testContact();
			if (isset($data['valid']) && $data['valid'] == True) {
				$page = 'Thanks';
			}
			break;
		case 'Register';
			$data = checkRegistration();
			if (isset($data['valid']) && $data['valid'] == True) {
				$page = 'Login';
			}
			break;
		case 'Login';
			$data = logInUser();
			if (isset($data['valid']) && $data['valid'] == True) {
				$page = 'Home';
			}
			break;
		case 'Webshop';
			addToCart();
			break;
		case 'Cart';
			$data = updateCart();
			if ($data['valid'] == True) {
				$page = 'Order complete';
			} elseif (empty($_SESSION['cart'])) {
				$page = 'Empty cart';
			} else {
				$page = 'Cart';
			}
			break;
		case is_numeric($page);
			$data['productID'] = $page;
			$page = 'Product';
			break;
		case 'Logout';
			logOutUser();
			$page = 'Home';
			break;
	}
	$data['page'] = $page;
	return $data;
}

//showResponsePage
function showResponsePage($data){
	switch($data['page'])
	{
		case 'Home';
		  include_once "views/HomeDoc.php";
		  $view = new HomeDoc($data['page']);
		  $view->show();
		  break;
		case 'About';
		  include_once "views/AboutDoc.php";
		  $view = new AboutDoc($data['page']);
		  $view->show();
		  break;
		case 'Contact';
		  include_once "views/ContactDoc.php";
		  $view = new ContactDoc($data['page'], $data['sal'], $data['salerr'], $data['name'], $data['namerr'], $data['email'], $data['emailerr'], $data['phone'], $data['phonerr'], $data['compref'], $data['compreferr'], $data['mess'], $data['messerr']);
		  $view->show();
		  break;
		case 'Thanks';
		  include_once "views/ContactThanksDoc.php";
		  $view = new ContactThanksDoc($data['page'], $data['sal'], $data['name'], $data['email'], $data['phone'], $data['compref'], $data['mess']);
		  $view -> show();
		  break;
		case 'Webshop';
		  include_once "views/WebshopDoc.php";
		  $view = new WebshopDoc($data['page']);
		  $view->show();
		  break;
		case 'Product';
		  include_once "views/DetailDoc.php";
		  $view = new DetailDoc($data['page'], $data['productID']);
		  $view->show();
		  break;
		case 'Empty cart';
		  include_once "views/EmptyCartDoc.php";
		  $view = new EmptyCartDoc($data['page']);
		  $view->show();
		  break;
		case 'Cart';
		  include_once "views/CartDoc.php";
		  $view = new CartDoc($data['page']);
		  $view->show();
		  break;
		case 'Order complete';
		  include_once "views/OrderCompleteDoc.php";
		  $view = new OrderCompleteDoc($data['page']);
		  $view->show();
		  break;
		case 'Register';
		  include_once "views/RegisterDoc.php";
		  $view = new RegisterDoc($data['page'], $data['name'], $data['namerr'], $data['email'], $data['emailerr'], $data['pw'], $data['pwerr'], $data['pwrepeat'], $data['pwrepeaterr']);
		  $view->show();
		  break;
		case 'Login';
		  include_once "views/LoginDoc.php";
		  $view = new LoginDoc($data['page'], $data['email'], $data['emailerr'], $data['pw'], $data['pwerr']);
		  $view -> show();
		  break;
		default; 
		  showHomePage();
	}
}

?>