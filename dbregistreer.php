<?php
require_once'inc/config.php';

if(isset($_POST['register'])) {
    // variables
    $name = filter_input(INPUT_POST, 'r_name', FILTER_SANITIZE_STRING);
    $surname = filter_input(INPUT_POST, 'r_surname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'r_username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'r_password');
    $passwordcheck = filter_input(INPUT_POST, 'r_passwordcheck');
    $address = filter_input(INPUT_POST, 'r_address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'r_city', FILTER_SANITIZE_STRING);
    $zipcode = filter_input(INPUT_POST, 'r_zipcode', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'r_phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'r_email', FILTER_SANITIZE_STRING);
    $fullname = $name . " " . $surname;
    $key = hash('sha256', $username . $password);

    //query 1
    $query = "SELECT * FROM webcustomer WHERE Email = :email OR username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);

    //query 2
    $query2 = "INSERT INTO webcustomer(Username, HashedPassword, Fullname, PhoneNumber, Email, City, Address, ZipCode) VALUES(:username, :password, :fullname, :phone, :email, :city, :address, :zipcode)";
    $stmt2 = $db->prepare($query2);
    $stmt2->bindValue(':password', $key);
    $stmt2->bindValue(':fullname', $fullname);
    $stmt2->bindValue(':phone', $phone);
    $stmt2->bindValue(':email', $email);
    $stmt2->bindValue(':username', $username);
    $stmt2->bindValue(':city', $city);
    $stmt2->bindValue(':address', $address);
    $stmt2->bindValue(':zipcode', $zipcode);

    if($password == $passwordcheck){
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $_SESSION['registered_fail'] = true;
                header('location: registreer.php');
            } elseif ($stmt2->execute()) {
                $_SESSION['registered'] = true;
                header('location: login.php');
            }
        }
    }
}