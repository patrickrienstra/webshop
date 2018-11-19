 <link rel="stylesheet" href="css/shop.css">
<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $list=array();
    $row=array();
    $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.unitprice, s.photo, f.quantityonhand
    FROM stockitems s
    JOIN stockitemholdings f ON s.stockitemid = f.stockitemid";
    $query_prepare = $db->prepare($query);
    if($query_prepare->execute()) {
        while($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $row;
        }
    }
    $view = "views/shop.php";
    $sectionActive = "Shop";

    include_once $template;
?>