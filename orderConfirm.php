<?php
require_once 'inc/config.php';
$persoonsgegevens=array();
$products=array();
if(isset($_SESSION['logged_in'])) {
    //query
    $query='SELECT FullName, Email, PhoneNumber, City, Zipcode, Address FROM webcustomer WHERE CustomerID=?';
    $stmt=$db->prepare($query);
//    $stmt->bindValue(':ID', $_SESSION['CustomerID']);
    if($stmt->execute(array($_SESSION['CustomerID']))){
        $persoonsgegevens=$stmt->fetch(PDO::FETCH_ASSOC);
    }

}elseif (isset($_POST)) {
    $persoonsgegevens['FullName'] = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
    $persoonsgegevens['Address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $persoonsgegevens['City'] = filter_input(INPUT_POST, 'plaats', FILTER_SANITIZE_STRING);
    $persoonsgegevens['Zipcode'] = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
    $persoonsgegevens['Email'] = filter_input(INPUT_POST, 'email');
    $persoonsgegevens['PhoneNumber'] = filter_input(INPUT_POST, 'phonenumber');
    $_SESSION['naw']=$persoonsgegevens;
}

if(isset($_SESSION['cart'])) {
    $query = "SELECT RecommendedRetailPrice, taxrate FROM stockitems WHERE stockitemid = :id";
    foreach ($_SESSION['cart'] as $product) {
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $product['id'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $row['amount']=$product['qty'];
            array_push($products, $row);
        }
    }
}

foreach($products as $product) {
    if(!isset($subtotaal)){
        $subtotaal = $product['RecommendedRetailPrice']*$product['amount'];
    } else {
        $subtotaal += $product['RecommendedRetailPrice'] * $product['amount'];
    }
    if(!isset($taxamount)){
        $taxamount = $product['RecommendedRetailPrice']*$product['amount']*($product['taxrate']/100);
    }else{
        $taxamount += $product['RecommendedRetailPrice']*$product['amount']*($product['taxrate']/100);
    }
    if(!isset($totaal)){
        $totaal = $product['RecommendedRetailPrice']*$product['amount']*($product['taxrate']/100+1);
    }else{
        $totaal += $product['RecommendedRetailPrice']*$product['amount']*($product['taxrate']/100+1);
    }
}

$view='views/orderConfirm.php';
$sectionActive = "Cart";
require_once 'template.php';