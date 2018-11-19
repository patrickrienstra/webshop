<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';

echo '<br>';
$cart=array();
$products=array();
$row=array();
if(isset($_SESSION['qty'])) {
    $cart = array_combine($_SESSION['key'], $_SESSION['qty']);
    $query = "SELECT stockitemid, stockitemname, brand, unitprice, photo FROM stockitems WHERE stockitemid = :id";
    foreach ($cart as $id => $amount) {
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $row['amount']=$amount;
            array_push($products, $row);
            }
        }
}else{
    echo'winkelmagen is leeg';
}
$view = 'views/cart.php';

require_once $template;