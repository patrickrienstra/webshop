<link rel="stylesheet" href="css/shop.css">
<?php
require_once "inc/package.inc.php";
require('inc/config.php');

$id=filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$winkelmand= array();

$query="
SELECT stockitemname, s.stockitemid, brand, size, leadtimedays, ischillerstock, taxrate, unitprice, marketingcomments, photo, customfields, colorname, quantityonhand
FROM stockitems s
LEFT JOIN colors c ON s.colorid = c.colorid
JOIN stockitemholdings f ON s.stockitemid = f.stockitemid
WHERE s.StockItemID = :id";

$stmt = $db->prepare($query);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
if($stmt->execute()) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
$view = "views/product.php";
$sectionActive = "product";
require_once $template;

?>