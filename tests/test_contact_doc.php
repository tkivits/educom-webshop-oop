<?php

include_once "../views/ContactDoc.php";
$data = array('page' => 'Contact', 'sal' => 'Mr.', 'salerr' => '', 'name' => '', 'namerr' => 'No name was entered', 'email' => 'coach@man-kind.nl', 'emailerr' => '', 'phone' => '', 'phonerr' => 'No phone number was entered', 'compref' => 'Telephone', 'compreferr' => '', 'mess' => 'testtesttest', 'messerr' => '');

$view = new ContactDoc($data['page'], $data['sal'], $data['salerr'], $data['name'], $data['namerr'], $data['email'], $data['emailerr'], $data['phone'], $data['phonerr'], $data['compref'], $data['compreferr'], $data['mess'], $data['messerr']);

$view -> show();

?>