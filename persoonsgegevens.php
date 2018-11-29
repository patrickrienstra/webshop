<?php
require_once 'inc/package.inc.php';
require_once 'inc/config.php';

if(isset($_SESSION['logged_in'])){
    header('location: orderConfirm.php');
}


$view='views/persoonsgegevens.php';
$sectionActive = "Cart";
require_once $template;