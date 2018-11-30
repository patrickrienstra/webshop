<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';
?>

<?php
if(isset($_POST['ec'])){
    unset($_SESSION['cart']);
}

$products = array();
$row = array();
$subtotaal = 0;
$totaal = 0;

if(isset($_SESSION['cart'])) {
    $query = "SELECT stockitemid, stockitemname, brand, unitprice, photo, taxrate FROM stockitems WHERE stockitemid = :id";
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
