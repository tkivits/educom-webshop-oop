<?php

include_once "../views/LoginDoc.php";
$data = array('page' => 'Login', 'email' => 'coach@man-kind.nl', 'emailerr' => '', 'pw' => '', 'pwerr' => 'No password entered');

$view = new LoginDoc($data['page'], $data['email'], $data['emailerr'], $data['pw'], $data['pwerr']);

$view -> show();

?>