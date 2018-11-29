<?php
require_once 'inc/config.php';
$id= '';
$qty= '';
$product=array();
$cart=array();


if(isset($_SESSION['cart'])){
    print_r($_SESSION['cart']);
    echo '<br>';
    $cart=$_SESSION['cart'];
    print_r($cart);
    echo '<br>';
    unset($_SESSION['cart']);
}

if(!isset($_SESSION['cart'])){
$_SESSION['cart']=array();
}

if(isset($_POST) && $_POST != ""){
    $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $qty=filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);
    $product['id']=$id;
    $product['qty']=$qty;
    array_push($cart, $product);
    print_r($product);
    echo '<br>';
    $_SESSION['cart']=$cart;
    print_r($_SESSION['cart']);
    echo '<br>';
    header('location: product.php?id=' . $_SESSION['id']);
}

?>
