<?php
require_once 'inc/config.php';

//checken op errors
if (isset($e)) {
    header('location: error.php');
}

//checken of winkelmand leeg gemaakt moet worden
if(isset($_POST['ec'])){
    unset($_SESSION['cart']);
}

$products = array();
$row = array();
$subtotaal = 0;
$totaal = 0;

// ophalen product gegevens
if(isset($_SESSION['cart'])) {
    $query = "SELECT stockitemid, stockitemname, brand, RecommendedRetailPrice, stockitemphoto, taxrate FROM stockitems WHERE stockitemid = :id";
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

$view = 'views/cart.php';
$sectionActive = "Cart";
require_once $template;
?>