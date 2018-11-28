<?php
require_once'inc/config.php';

// variables
$id = '';
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
$query = "SELECT * FROM people WHERE EmailAddress = :email OR LogonName = :username";
$stmt = $db->prepare($query);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':username', $username);

//query 2
$query2 = "SELECT MAX(PersonID) FROM people";
$stmt2 = $db->prepare($query2);

//query 3
$query3 = "INSERT INTO people(PersonID, LogonName, HashedPassword, Fullname, PhoneNumber, EmailAddress, IsPermittedToLogon) VALUES(:id, :username, :password, :fullname, :phone, :email, 1)";
$stmt3 = $db->prepare($query3);
$stmt3->bindValue(':password', $key);
$stmt3->bindValue(':fullname', $fullname);
$stmt3->bindValue(':phone', $phone);
$stmt3->bindValue(':email', $email);
$stmt3->bindValue(':username', $username);
$stmt3->bindValue(':id', $id);

if ($stmt->execute()) {
    if ($stmt2->execute()) {
        $personId = $stmt2->fetch(PDO::FETCH_ASSOC);
        foreach ($personId as $person) {
            $id = $person;
            $id++;
        }
        if ($stmt->rowCount() > 0) {
            $_SESSION['registered_fail'] = true;
            header('location: registreer.php');
        }elseif($stmt3->execute()) {
            $_SESSION['registered'] = true;
            header('location: login.php');
        }
    }
}
//while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {}