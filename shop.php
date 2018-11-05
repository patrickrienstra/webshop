 <link rel="stylesheet" href="css/shop.css">
<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');
    
    $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.unitprice, s.photo, f.quantityonhand
    FROM stockitems s
    JOIN stockitemholdings f 
    ON s.stockitemid = f.stockitemid";
    $query_prepare = $db->prepare($query);
    if($query_prepare->execute()) {
    }
    $view = "views/shop.php";
    $sectionActive = "Shop";

    include_once $template;
?>
