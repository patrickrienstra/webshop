<?php
require('inc/config.php');

$persoonsgegevens=array();

// ophalen persoonsgegevens
if(isset($_SESSION['logged_in'])) {
    //ophalen persoonsgegevens
    $query='SELECT Username, FullName, Email, PhoneNumber, City, Zipcode, Address FROM webcustomer WHERE CustomerID=:ID';
    $stmt=$db->prepare($query);
    $stmt->bindValue(':ID', $_SESSION['CustomerID']);
    if($stmt->execute()){
        $persoonsgegevens=$stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$view = "views/accountdetails.php";
$sectionActive = "Controlpanel";

include_once $template;
?>
