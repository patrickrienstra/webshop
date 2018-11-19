<?php
require_once 'inc/config.php';
if(!isset($_SESSION['key'])){
$_SESSION['qty']=array();
$_SESSION['key']=array();
}
if(isset($_POST) && $_POST != ""){
    $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $qty=filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);
    array_push($_SESSION['qty'], $qty);
    array_push($_SESSION['key'], $id);
    header('location: product.php?id=' . $_SESSION['id']);
}

?>
