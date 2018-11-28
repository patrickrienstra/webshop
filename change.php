<?php
require_once 'inc/config.php';
$key = '';
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$cart = $_SESSION['cart'];
if(isset($_POST['wijzig'])) {
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);

    foreach ($cart as $sleutel => $product) {
        if ($product['id'] == $id) {
            $product['qty'] = $qty;
            $replace = $product;
            $key = $sleutel;
        }
    }

    $cart[$key] = $replace;
    $_SESSION['cart'] = $cart;
}

if(isset($_POST['del'])){
    foreach($cart as $sleutel => $product){
        if($product['id']==$id){
            $key=$sleutel;
        }
    }
    unset($cart[$key]);
    $_SESSION['cart']=$cart;
}
header('location: cart.php');

