<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';
?>

<?php
if(isset($_POST['ec'])){
    unset($_SESSION['cart']);
}

$products = array();https://github.com/patrickrienstra/webshop/pull/15/conflict?name=.idea%252FdataSources.local.xml&ancestor_oid=076a0c5dd86cb084beeb67a5fd55492304a6ae1c&base_oid=bad141bcedd6452051474a8794c084c7b3e89420&head_oid=e50bbd05725bdfbcc76d19b417680f40fdee1ffb
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