<?php
//Prerequisites
session_start();
require 'businessLayer.php';
require 'dataLayer.php';

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