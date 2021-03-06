<?php
require('inc/config.php');

$_SESSION['max'] = 24;

$list = array();
$row = array();
echo '<br>';
if (isset($db)) {
    if (isset($_GET['search'])) {
        $data = filter_input(INPUT_GET, 'value', FILTER_SANITIZE_STRING);
        $searchdata = '%' . $data . '%';
        $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.RecommendedRetailPrice, s.StockItemPhoto, f.quantityonhand FROM stockitems s JOIN stockitemholdings f ON s.stockitemid = f.stockitemid WHERE StockItemName LIKE :searchdata OR CustomFields LIKE :searchdata";
        $query_prepare = $db->prepare($query);
        $query_prepare->bindValue(':searchdata', $searchdata);
        if ($query_prepare->execute()) {
            $rowcount = $query_prepare->rowCount();
            $paginas = $rowcount / $_SESSION['max'];
            while ($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
                $list[] = $row;
            }
        }
    } elseif (isset($_GET['category'])) {
        $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
        $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.RecommendedRetailPrice, s.StockItemPhoto, f.quantityonhand FROM stockitems s JOIN stockitemholdings f ON s.stockitemid = f.stockitemid WHERE s.StockItemID IN (SELECT StockItemID  FROM stockitemstockgroups WHERE StockGroupID IN( SELECT StockGroupID FROM stockgroups WHERE StockGroupName =  :category))";
        $query_prepare = $db->prepare($query);
        $query_prepare->bindValue(':category', $category);
        if ($query_prepare->execute()) {
            $rowcount = $query_prepare->rowCount();
            $paginas = $rowcount / $_SESSION['max'];
            while ($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
                $list[] = $row;
            }
        }
    } else {
        $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.RecommendedRetailPrice, s.StockItemPhoto, f.quantityonhand FROM stockitems s JOIN stockitemholdings f ON s.stockitemid = f.stockitemid";
        $query_prepare = $db->prepare($query);
        if ($query_prepare->execute()) {
            $rowcount = $query_prepare->rowCount();
            $paginas = $rowcount / $_SESSION['max'];
            while ($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
                $list[] = $row;
            }
        }
    }
}

if (isset($paginas)) {
    $paginas = ceil($paginas);
}
$view = "views/shop.php";
$sectionActive = "Shop";

require_once $template;

?>