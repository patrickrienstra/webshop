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
        $subtotaal = number_format((float)$subtotaal, 2, '.', '');
        $taxamount = number_format((float)$taxamount, 2, '.', '');
        $totaal = number_format((float)$totaal, 2, '.', '');
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
            <input class="btn btn-add" type="submit" name="betaal" value="betalen">
        </form>
    </div>
</div>
        <div class="row shop-tracking-status">
            <div class="col-md-11">
                <div class="order-status">
                    <div class="order-status-timeline">
                        <!-- class names: c0 c1 and c2 -->
                        <div class="order-status-timeline-completion c2"></div>
                    </div>
                    <div class="image-order-status image-order-status-new active img-circle">
                        <span class="status">Winkelwagen</span>
                        <div class="icon"></div>
                    </div>
                <div class="image-order-status image-order-status-active active img-circle">
                    <span class="status">Gegevens</span>
                    <div class="icon"></div>
                </div>
                    <div class="image-order-status image-order-status-intransit active img-circle">
                        <span class="status">Betaling</span>
                        <div class="icon"></div>
                    </div>
                    <div class="image-order-status image-order-status-completed active img-circle">
                        <span class="status">Afgerond</span>
                        <div class="icon"></div>
                    </div>
                </div>
            </div>
        </div>