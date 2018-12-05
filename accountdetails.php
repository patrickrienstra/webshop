<?php
require_once "inc/package.inc.php";
require('inc/config.php');

$persoonsgegevens=array();
if(isset($_SESSION['logged_in'])) {
    //query
    $query='SELECT Username, FullName, Email, PhoneNumber, City, Zipcode, Address FROM webcustomer WHERE CustomerID=?';
    $stmt=$db->prepare($query);
//    $stmt->bindValue(':ID', $_SESSION['CustomerID']);
    if($stmt->execute(array($_SESSION['CustomerID']))){
        $persoonsgegevens=$stmt->fetch(PDO::FETCH_ASSOC);
    }

}

$view = "views/accountdetails.php";
$sectionActive = "Controlpanel";

include_once $template;
?>
