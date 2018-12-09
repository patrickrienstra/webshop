<div class="row">
    <center>
        <div class="col-lg-3">
            <div class="list-group">
                <a href="shop.php?category=Novelty%20Items&page=1" name="novelty" class="list-group-item">Novelty Items</a>
                <a href="shop.php?category=Clothing&page=1" name="clothing" class="list-group-item">Clothing</a>
                <a href="shop.php?category=Mugs&page=1" name="mugs" class="list-group-item">Mugs</a>
                <a href="shop.php?category=T-shirts&page=1" name="tshirts" class="list-group-item">T-Shirts</a>
                <a href="shop.php?category=Airline%20Novelties&page=1" name="airline" class="list-group-item">Airline
                    Novelties</a>
                <a href="shop.php?category=Computing%20Novelties&page=1" name="computing" class="list-group-item">Computing
                    Novelties</a>
                <a href="shop.php?category=USB%20Novelties&page=1" name="usb" class="list-group-item">USB Novelties</a>
                <a href="shop.php?category=Furry%20Footwear&page=1" name="furry" class="list-group-item">Furry Footwear</a>
                <a href="shop.php?category=Toys&page=1" name="toys" class="list-group-item">Toys</a>
                <a href="shop.php?category=Packaging%20Materials&page=1" name="packaging" class="list-group-item">Packaging
                    Materials</a>
            </div>
        </div>
</div></center>
<div class="login-page">
    <div class="form">
        <div class="login-form">
            <a>Uw bestelling is verwerkt</a><br>
            <a>Uw bestelnummer is <?php echo $invoiceID;?></a>
        </div>
    </div>
</div>

        <div class="row shop-tracking-status">
            <div class="col-md-11">
                <div class="order-status">
                    <div class="order-status-timeline">
                        <!-- class names: c0 c1 and c2 -->
                        <div class="order-status-timeline-completion c3"></div>
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