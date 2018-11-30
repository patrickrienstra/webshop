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
        $_SESSION['empty field'] = true;
        header('location: login.php');
    } else {
        $query = "SELECT CustomerID FROM webcustomer WHERE Username=? AND HashedPassword=?";
        $stmt = $db->prepare($query);
        $stmt->execute(array($username, $key));

        if ($stmt->rowCount() >= 1) {
            $_SESSION['user'] = $username;
            $_SESSION['CustomerID']=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['logged_in'] = true;
            $message = "Login succesful";
            header('location: index.php');
        }
        else {
            header('location: login.php');
            $_SESSION['login_fail'] = true;
        }
    }
}
print($message);