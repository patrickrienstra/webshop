<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    if(isset($e)){
    header('location: error.php');
}

    $list= array();
    $date=date('Y-m-d');
    $query = "SELECT s.stockitemid, s.stockitemname, s.StockItemPhoto
    FROM stockitems s
    JOIN web_invoicelines f ON s.stockitemid = f.stockitemid
    JOIN web_invoices w ON w.invoiceid = f.invoiceid
    WHERE invoicedate=:date
    GROUP BY s.stockitemid
    HAVING COUNT(*) > 20";
    $query_prepare  = $db->prepare($query);
    $query_prepare->bindValue(':date', $date);
    if($query_prepare->execute()) {
        while($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
        $list[] = $row;
        }
    }

    $view = "views/index.php";
    $sectionActive = "Home";

    require_once $template;
?>
