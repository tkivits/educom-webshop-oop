<?php

include_once "../views/DetailDoc.php";
$data = array('page' => 'Webshop');

$product1 = new WebshopDoc($data['page'], '1', 'Daar Waar De Rivierkreeften Zingen', '10.00', '', '../Images/Daar_Waar_De_Rivierkreeften_Zingen.png');
$product2 = new WebshopDoc($data['page'], '2', 'De Geheimen Van De Kostschool', '14.99', '', '../Images/De_Geheimen_Van_De_Kostschool.png' );
//.... meer producten
$product1->show();
?>