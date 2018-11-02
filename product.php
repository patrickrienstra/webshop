<link rel="stylesheet" href="css/shop.css">
<?php
require_once "inc/package.inc.php";
require('inc/config.php');
require('shop.php');

$view = "views/product.php";
$sectionActive = "product";
$idt=1;
include_once $template;

$query="
SELECT s.stockitemname, s.stockitemid, s.brand, s.size, s.leadtimedays, s.ischillerstock, s.taxrate, s.unitprice, s.marketingcomments, s.photo, s.customfields, c.colorname, f.quantityonhand
FROM stockitems s
JOIN colors c ON s.colorid = c.colorid
JOIN stockitemholdings f ON s.stockitemid = f.stockitemid
WHERE s.StockItemID = $idt";

$stmt = $db->prepare($query);
?>
