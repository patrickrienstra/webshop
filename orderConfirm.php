<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';
$persoonsgegevens=array();
$products=array();
$subtotaal='';
$totaal='';
$taxamount='';
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
    $query = "SELECT unitprice, taxrate FROM stockitems WHERE stockitemid = :id";
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
    if(isset($subtotaal)){
        $subtotaal = $product['unitprice']*$product['amount'];
    } else {
        $subtotaal += $product['unitprice'] * $product['amount'];
    }
    if(isset($taxamount)){
        $taxamount = $product['unitprice']*$product['amount']*($product['taxrate']/100);
    }else{
        $taxamount += $product['unitprice']*$product['amount']*($product['taxrate']/100);
    }
    if(isset($totaal)){
        $totaal = $product['unitprice']*$product['amount']*($product['taxrate']/100+1);
    }else{
        $totaal += $product['unitprice']*$product['amount']*($product['taxrate']/100+1);
    }
}

$view='views/orderConfirm.php';
$sectionActive = "Cart";
require_once 'template.php';