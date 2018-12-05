<div class="login-page">
    <div class="form">
        <?php
        if($type==1 /*Betalen vooraf met iDEAL*/){
            ?>
            <a href="/orderConfirmation.php"><img src="img/iDEAL.jpeg"></a>
            <?php
        }elseif($type==2 /*Betalen vooraf met paypal*/){
            ?>
            <a href="/orderConfirmation.php"><img src="img/paypal.png"></a>
            <?php
        }elseif($type==3 /*Betalen achteraf met iDEAL*/){
            ?>
            <h4><a href="/orderConfirmation.php"></a></h4>
            <?php
        }
        ?>
    </div>
</div>
