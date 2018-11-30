<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';
$persoonsgegevens=array();
if (isset($_POST){
    $persoonsgegevens['naam'] = filter_input(INPUT_POST, 'voornaam', FILTER_SANITIZE_STRING) . " " . filter_input(INPUT_POST, 'achternaam', FILTER_SANITIZE_STRING);
    $persoonsgegevens['address'] = filter_input(INPUT_POST, 'straat', FILTER_SANITIZE_STRING) . " " . filter_input(INPUT_POST, 'huisnr', FILTER_SANITIZE_STRING);
    $persoonsgegevens['city'] = filter_input(INPUT_POST, 'plaats', FILTER_SANITIZE_STRING);
    $persoonsgegevens['postalcode'] = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
    $persoonsgegevens['email'] = filter_input(INPUT_POST, 'email');
    $persoonsgegevens['phone'] = filter_input(INPUT_POST, 'phonenumber');
}elseif(isset($_SESSION['logged_in'])) {
    //query
    $query='SELECT FullName, EmailAddress, PhoneNumber FROM people WHERE PersonID=:ID';
    $stmt=$db->prepare($query);
    $stmt->bindValue(':ID', $_SESSION['userID']);

}
$view='views/orderConfirm.php';
$sectionActive = "Cart";
require_once 'template.php';