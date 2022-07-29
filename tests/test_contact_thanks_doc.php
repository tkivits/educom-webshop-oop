<?php

include_once "../views/ContactThanksDoc.php";
$data = array('page' => 'Thanks', 'sal' => 'Mr.', 'name' => 'Geert Weggemans', 'email' => 'coach@man-kind.nl', 'phone' => '0633355588', 'compref' => 'e-mail', 'mess' => 'test');

$view = new ContactThanksDoc($data['page'], $data['sal'], $data['name'], $data['email'], $data['phone'], $data['compref'], $data['mess']);

$view -> show();

?>