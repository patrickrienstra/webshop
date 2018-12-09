<?php
require_once'inc/config.php';

$wfullname = filter_input(INPUT_POST, 'w_fullname', FILTER_SANITIZE_STRING);
$waddress = filter_input(INPUT_POST, 'w_address', FILTER_SANITIZE_STRING);
$wcity = filter_input(INPUT_POST, 'w_city', FILTER_SANITIZE_STRING);
$wzipcode = filter_input(INPUT_POST, 'w_zipcode', FILTER_SANITIZE_STRING);
$wphonenumber = filter_input(INPUT_POST, 'w_phone', FILTER_SANITIZE_STRING);
$wemail = filter_input(INPUT_POST, 'w_email', FILTER_SANITIZE_STRING);


if(isset($_POST['wijzigenaccount'])) {
    $query = 'UPDATE webcustomer SET Fullname=:FullName, Email=:Email, PhoneNumber=:PhoneNumber, City=:City, ZipCode=:Zipcode, Address=:Address WHERE CustomerID=:ID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':FullName', $wfullname);
    $stmt->bindValue(':Email', $wemail);
    $stmt->bindValue(':PhoneNumber', $wphonenumber);
    $stmt->bindValue(':City', $wcity);
    $stmt->bindValue(':Zipcode', $wzipcode);
    $stmt->bindValue(':Address', $waddress);
    $stmt->bindValue(':ID', $_SESSION['CustomerID']);
    $stmt->execute();

    header('location:accountdetails.php');
}
?>