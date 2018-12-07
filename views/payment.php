<div class="login-page">
    <div class="form">
        <?php
        if($type==1 /*Betalen vooraf met iDEAL*/){
            ?>
            <a href="orderConfirmation.php"><img src="img/iDEAL.jpeg"></a>
            <?php
        }elseif($type==2 /*Betalen vooraf met paypal*/){
            ?>
            <a href="orderConfirmation.php"><img src="img/paypal.png"></a>
            <?php
        }elseif($type==3 /*Betalen achteraf met iDEAL*/){
            ?>
            <h4><a href="orderConfirmation.php"></a></h4>
            <?php
        }
        ?>
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
