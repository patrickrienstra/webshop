<link rel="stylesheet" href="css/shop.css">
<?php
require_once "inc/package.inc.php";
require('inc/config.php');

$query="
SELECT stockitemname, s.stockitemid, brand, size, leadtimedays, ischillerstock, taxrate, unitprice, marketingcomments, photo, customfields, colorname, quantityonhand
FROM stockitems s
LEFT JOIN colors c ON s.colorid = c.colorid
JOIN stockitemholdings f ON s.stockitemid = f.stockitemid
WHERE s.StockItemID = 227";

$stmt = $db->prepare($query);
if($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view = "views/product.php";
        $sectionActive = "product";
        include_once $template;
    }
}

?>