<?php
require_once 'inc/config.php';

$type=0;
if(isset($_POST)){
    $type=filter_input(INPUT_POST, 'methode', FILTER_SANITIZE_NUMBER_INT);
}

$view='views/payment.php';
$sectionActive='betaling';
require_once 'template.php';