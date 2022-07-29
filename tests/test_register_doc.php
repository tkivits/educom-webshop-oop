<?php

include_once "../views/RegisterDoc.php";
$data = array('page' => 'Register', 'name' => 'Geert Weggemans', 'namerr' => '', 'email' => 'coach@man-kind.nl', 'emailerr' => '', 'pw' => '', 'pwerr' => 'No password entered', 'pwrepeat' => 'gq3mh', 'pwrepeaterr' => 'Entered passwords do not match');

$view = new RegisterDoc($data['page'], $data['name'], $data['namerr'], $data['email'], $data['emailerr'], $data['pw'], $data['pwerr'], $data['pwrepeat'], $data['pwrepeaterr']);

$view -> show();

?>