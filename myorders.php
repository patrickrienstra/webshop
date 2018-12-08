<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';

echo '<br>';

$query="SELECT InvoiceID, TotalPrice, InvoiceDate, ConfirmedDeliveryTime FROM web_invoices WHERE CustomerID=:customerid";
$stmt=$db->prepare($query);
$stmt->bindValue(':customerid', $_SESSION['CustomerID']);
if($stmt->execute()){
    WHILE($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $list[]=$row;
    }
    print_r($list);
}

$view = "views/myorders.php";
$sectionActive = "Controlpanel";

include_once $template;
?>