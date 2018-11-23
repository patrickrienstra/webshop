<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';
$cart=array();
if(isset($_POST) && $_POST != ""){
    $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $qty=filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);
    $cart[$id]=$qty;
    print($cart[$id]);
    header('location: product.php?id=' . $_SESSION['id']);
}


?>
