<?php
require_once 'inc/config.php';

echo '<br>';
$max = 20;


$query = "SELECT InvoiceID, TotalPrice, InvoiceDate, ConfirmedDeliveryTime FROM web_invoices WHERE CustomerID=:customerid ORDER BY InvoiceID DESC";
$stmt = $db->prepare($query);
$stmt->bindValue(':customerid', $_SESSION['CustomerID']);
if ($stmt->execute()) {
    $rowcount = $stmt->rowCount();
    $paginas = $rowcount / $max;
    WHILE ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list[] = $row;
    }

}
$paginas = ceil($paginas);

$view = "views/myorders.php";
$sectionActive = "Controlpanel";

include_once $template;
