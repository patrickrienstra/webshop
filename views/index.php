<div class="row">
    <center>
        <div class="col-lg-3">
            <h3>Productcategorieën</h3>
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
<div class="container">
    <center><img src="img/homepagina wwi.png" alt="homepagina foto"></center>
    <br>
    <h1>Uitgelichte producten</h1>
    <div class="row">
        <?php
        foreach ($list as $value) {
                ?>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail index">
                        <a href="product.php?id=<?php echo $value['stockitemid']; ?>">
                            <?php if ($value['StockItemPhoto'] == '') {
                                ?>
                                <img class="workshop" src="http://placehold.it/320x150">
                            <?php } else { ?>
                                <img class="trendingimg" src="<?php echo $value['StockItemPhoto']; ?>">
                            <?php } ?>
                            <h4><?php echo $value['stockitemname']; ?></h4>
                        </a>
                    </div>
                </div>
                <?php
                $i++;
        }
        ?>
    </div>

    <?php
    if (isSet($_SESSION['key'])) {
        $key = $_SESSION['key'];
    }
    ?>
</div>

