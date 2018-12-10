<?php
require('inc/config.php');

$i = 1;
if (isset($e)) {
    header('location: error.php');
}

$list = array();
$date = date('Y-m-d');
$query = "SELECT s.stockitemid, s.stockitemname, s.StockItemPhoto, f.quantity
          FROM stockitems s
          JOIN web_invoicelines f on s.stockitemid = f.stockitemid
          JOIN web_invoices w on w.invoiceid = f.invoiceid
          WHERE invoicedate = \"2018-12-10\"
          GROUP BY s.stockitemid
          ORDER BY SUM(quantity) DESC
          LIMIT 6";
$query_prepare = $db->prepare($query);
$query_prepare->bindValue(':date', $date);
if ($query_prepare->execute()) {
    while ($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
        $list[] = $row;
    }
}

$view = "views/index.php";
$sectionActive = "Home";

require_once $template;
?>
