<?php
require_once 'inc/config.php';
require_once 'inc/package.inc.php';

if(isset($_POST['wachtwoordwijzigen'])) {
    $newpassword=filter_input(INPUT_POST, 'newpassword');
    $newpassword2=filter_input(INPUT_POST, 'newpassword2');
    $oldpassword=filter_input(INPUT_POST, 'currentpassword');

    $query1 = "SELECT Username, HashedPassword FROM webcustomer WHERE CustomerID=:id";
    $stmt=$db->prepare($query1);
    $stmt->bindValue(':id', $_SESSION['CustomerID']);

    $query2 = 'UPDATE webcustomer SET HashedPassword=:new WHERE CustomerID=:id';
    $stmt2 = $db->prepare($query2);
    $stmt2->bindValue(':id', $_SESSION['CustomerID']);

    if($stmt->execute()){
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        if($newpassword==$newpassword2 && $data['HashedPassword']==hash('sha256', $data['Username'].$oldpassword) ){
            $keynew = hash('sha256', $data['Username'].$newpassword);
            $stmt2->bindValue(':new', $keynew);
            $stmt2->execute();
        }
    }

}

$view = "views/wijzigingwachtwoord.php";
$sectionActive = "Controlpanel";

include_once $template;
?>