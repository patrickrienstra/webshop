<head>
    <link rel="stylesheet" type="text/css" href="/css/accountdetails.css"/>
</head>
<div class="register-page">
    <center><h1>Gegevens wijzigen</h1></center>
    <div class="form">
        <?php
        if(isset($_POST['wijzigingaccount'])) {

        }
        if(!isset($_POST['wijzig'])){
        ?>
        <form class="register-form">
            <input type="text" name="w_username" value="<?php echo $persoonsgegevens['Username'];?>" disabled>
            <input type="text" name="w_fullname"  value="<?php echo $persoonsgegevens['FullName'];?>" disabled>
            <input type="text" name="w_address" value="<?php echo $persoonsgegevens['Address'];?>" disabled>
            <input type="text" name="w_zipcode" value="<?php echo $persoonsgegevens['Zipcode'];?>" disabled>
            <input type="text" name="w_city" value="<?php echo $persoonsgegevens['City'];?>" disabled>
            <input type="number" name="w_phone" value="<?php echo $persoonsgegevens['PhoneNumber'];?>" disabled">
            <input type="text" name="w_email" value="<?php echo $persoonsgegevens['Email'];?>" disabled>
        </form>
            <form class="register-form" action="accountdetails.php" method="POST">
                <input type="submit" value="Gegevens wijzigen", name="wijzig">
            </form>
            <a href="wijzigingwachtwoord.php">Wachtwoord wijzigen?</a>
        <?php
        }
        if(isset($_POST['wijzig'])){
            ?>
        <form class="register-form" action="wijzigingaccount.php" method="POST">
            <input type="text" name="w_username" value="<?php echo $persoonsgegevens['Username'];?>" disabled/>
            <input type="text" name="w_fullname"  value="<?php echo $persoonsgegevens['FullName'];?>"/>
            <input type="text" name="w_address" value="<?php echo $persoonsgegevens['Address'];?>"/>
            <input type="text" name="w_zipcode" value="<?php echo $persoonsgegevens['Zipcode'];?>"/>
            <input type="text" name="w_city" value="<?php echo $persoonsgegevens['City'];?>"/>
            <input type="number" name="w_phone" value="<?php echo $persoonsgegevens['PhoneNumber'];?>"/>
            <input type="text" name="w_email" value="<?php echo $persoonsgegevens['Email'];?>"/>
            <input type="submit" name="wijzigenaccount" value="Opslaan" class="register-submit">
        </form>
            <a href="wijzigingwachtwoord.php">Wachtwoord wijzigen?</a>
        <?php } ?>
    </div>
</div>
