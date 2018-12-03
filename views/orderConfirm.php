<div class="loginpageformleft">
    <div class="form">
        <form class="login-form">
            Name:<br> <input type="text" name="name" value="<?php echo $persoonsgegevens['FullName']; ?>" disabled><br>
            Address: <br><input type="text" name="adres" value="<?php echo $persoonsgegevens['Address'];?>" disabled><br>
            <input type="text" name="city" value="<?php echo $persoonsgegevens['City'];?>" disabled><br>
            Postalcode: <br><input type="text" name="postalcode" value="<?php echo $persoonsgegevens['Zipcode'];?>" disabled><br>
            Email: <br><input type="email" name="email" value="<?php echo $persoonsgegevens['Email']?>" disabled><br>
            Phone Number<br><input type="text" name="phonenumber" value="<?php echo $persoonsgegevens['PhoneNumber']; ?>" disabled>
        </form>
        <?php
        if(!isset($_SESSION['logged_in'])){
            ?>
        <form method="post" action="persoonsgegevens.php">
            <input type="submit" name="wijzig" value="wijzig">
        </form>
        <?php } ?>
    </div>
    <div class="pull-right">
        <div class="">
            <h4></h4>
        </div>
    </div>
</div>
<div class="loginpageformright">
    <div class="form">
        <div class="login-form">
        <?php
        echo 'Sub Totaal: ';
        echo '$ '.$subtotaal;
        echo '<br>';
        echo 'BTW: ';
        echo '$ '.$taxamount;
        echo '<br>';
        echo 'Totaal: ';
        echo '$ '.$totaal;
            ?>
        </div>
    </div>
</div>
<div class="loginpageformright">
    <div>
        <form method="post" action="payment.php">
            <input type="radio" name="methode" value="1" required> Vooraf(Ideal)<br>
            <input type="radio" name="methode" value="2" required> Paypal<br>
            <input type="radio" name="methode" value="3" required> Achteraf(Ideal)<br>
            <input class="btn btn-add" type="submit" name="betaal" value="betalen">
        </form>
    </div>
</div>