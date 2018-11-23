<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';

$naam=filter_input(INPUT_POST, 'voornaam', FILTER_SANITIZE_STRING)." ".filter_input(INPUT_POST, 'achternaam', FILTER_SANITIZE_STRING);
$address=filter_input(INPUT_POST, 'straat', FILTER_SANITIZE_STRING)." ".filter_input(INPUT_POST, 'huisnr', FILTER_SANITIZE_STRING);
$city=filter_input(INPUT_POST, 'plaats', FILTER_SANITIZE_STRING);
$postalcode=filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST, 'email');
$phone=filter_input(INPUT_POST, 'phonenumber');


$view='views/orderConfirm.php';
require_once 'template.php';