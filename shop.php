 <link rel="stylesheet" href="css/shop.css">
<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $_SESSION['max'] = 24;


    $list=array();
    $row=array();
    if(isset($_POST['categorie'])){
        $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.unitprice, s.photo, f.quantityonhand FROM stockitems s JOIN stockitemholdings f ON s.stockitemid = f.stockitemid WHERE LIKE '%:category%'";
        $query_prepare = $db->prepare($query);
        $query_prepare->bindValue(':category', $category);
        if ($query_prepare->execute()) {
            $rowcount = $query_prepare->rowCount();
            $paginas = $rowcount / $_SESSION['max'];
            while ($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
                $list[] = $row;
            }
        }
    }else{
        $query = "SELECT s.stockitemid, s.stockitemname, s.brand, s.unitprice, s.photo, f.quantityonhand FROM stockitems s JOIN stockitemholdings f ON s.stockitemid = f.stockitemid";
        $query_prepare = $db->prepare($query);
        if($query_prepare->execute()) {
            $rowcount = $query_prepare->rowCount();
            $paginas = $rowcount / $_SESSION['max'];
            while ($row = $query_prepare->fetch(PDO::FETCH_ASSOC)) {
                $list[] = $row;
            }
        }
    }
    $paginas = round($paginas, 0, PHP_ROUND_HALF_UP);
    $view = "views/shop.php";
    $sectionActive = "Shop";

    require_once $template;
    
?>