<?php
require_once 'inc/config.php';
require_once "inc/package.inc.php";
$view = "views/login.php";
if(isset($_POST['login'])) {
    $username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $message = "";
    $key=hash('sha256', $username.$password);
    if (empty($username) || empty($password)) {
        $message = "Username and/or password can't be empty";
    } else {
        $query = "SELECT LogonName, PersonID FROM people WHERE LogonName=? AND HashedPassword=? AND IsPermittedToLogon = 1";
        $stmt = $db->prepare($query);
        $stmt->execute(array($username, $key));

        if ($stmt->rowCount() == 1) {
            $_SESSION['user'] = $username;
            $_SESSION['logged_in'] = true;
            $message = "Login succesful";
            if(isset($_POST['location']) && $_POST['location']== 'persoonsgegevens'){
                header('location: orderconfirm.php');
            }else{
                header('location: index.php');
            }
        }
        else {
            $_SESSION['login_fail'] = true;
            if(isset($_POST['location']) && $_POST['location'] == 'persoonsgegevens'){
                header('location: persoonsgegevens.php');
            }else{
            header('location: login.php');
        }
    }
    }
}
print($message);