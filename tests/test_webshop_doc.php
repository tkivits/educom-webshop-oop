<?php

include_once "../views/WebshopDoc.php";
$data = array('page' => 'Webshop');

$product1 = new WebshopDoc($data['page'], '1', 'Daar Waar De Rivierkreeften Zingen', '10.00', '', '../Images/Daar_Waar_De_Rivierkreeften_Zingen.png');
$product1->show();

?>