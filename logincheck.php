<?php
require_once ('inc/config.php');
require_once "inc/package.inc.php";
$logon=array();
$view = "views/login.php";


function checkusername($username, $password){
    $query = "SELECT LogonName, PersonID FROM people WHERE LogoName='$username' AND HashedPassword='$password'";
    $stmt = $db -> prepare($query);
    if ($stmt->execute()) {
        array_push($logon, $stmt->fetch());

        echo "<div id='loginmsg'> Logged in as $username </div>";
        $_SESSION['username'] = $username;
        header('location: index.php');
    }else{
        echo "<div id='loginmsg'>Wrong username and/or password</div>";
    }
}


if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    checkusername($username, $password);
}
