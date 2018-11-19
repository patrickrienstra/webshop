<?php
require_once'inc/config.php';

$user="";
if(isset($_POST['register'])) {
    // variables
    $name=filter_input(INPUT_POST, 'r_name', FILTER_SANITIZE_STRING);
    $surname=filter_input(INPUT_POST, 'r_surname', FILTER_SANITIZE_STRING);
    $username=filter_input(INPUT_POST, 'r_username', FILTER_SANITIZE_STRING);
    $password=filter_input(INPUT_POST, 'r_password');
    $passwordcheck=filter_input(INPUT_POST, 'r_passwordcheck');
    $address=filter_input(INPUT_POST, 'r_address', FILTER_SANITIZE_STRING);
    $city=filter_input(INPUT_POST, 'r_city', FILTER_SANITIZE_STRING);
    $zipcode=filter_input(INPUT_POST, 'r_zipcode', FILTER_SANITIZE_STRING);
    $phone=filter_input(INPUT_POST, 'r_phone', FILTER_SANITIZE_STRING);
    $email=filter_input(INPUT_POST, 'r_email', FILTER_SANITIZE_STRING);
    $fullname = $name. " " . $surname;

    //query 1
    $query = "SELECT * FROM people WHERE EmailAddress = :email OR LogonName = :username";
    $stmt = $db -> prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);

    //query 2
    $query2 = "INSERT INTO people(LogonName, HashedPassword, Fullname, PhoneNumber, EmailAddress, IsPermittedToLogon) VALUES(:username, :password, :fullname, :phone, :email, 1)";
    $stmt2= $db -> prepare($query2);
    $stmt2->bindValue(':password', $password);
    $stmt2->bindValue(':fullname', $fullname);
    $stmt2->bindValue(':phone', $phone);
    $stmt2->bindValue(':email', $email);
    $stmt2->bindValue(':username', $username);

    if($stmt->execute()) {
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        }
            if($user == ''){
                if($stmt2->execute()){

                }
        }

    }
}