<?php
$type=0;
if(filter_has_var(INPUT_POST, 'betalen')){
    $type=filter_input(INPUT_POST, 'methode', FILTER_SANITIZE_NUMBER_INT);
}

$view='views/payment.php';
$sectionActive='betaling';
require_once 'template.php';