<?php
require_once 'inc/config.php';
if (isset($e)) {
    header('location: error.php');
}

$invoice = filter_input(INPUT_GET, 'invoice', FILTER_SANITIZE_NUMBER_INT);
$query='SELECT StockItemName, RecommendedRetailPrice, Quantity, TaxAmount, ExtendedPrice, StockItemPhoto FROM web_invoicelines w JOIN stockitems s on w.StockItemID = s.StockItemID WHERE InvoiceID = :invoiceid';
$stmt=$db->prepare($query);
$stmt->bindValue(':invoiceid', $invoice);
if($stmt->execute()){
    $line=$stmt->fetch(PDO::FETCH_ASSOC);
}

$view='views/order.php';
$sectionActive = 'Controlpanel';
require_once $template;