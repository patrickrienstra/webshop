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
<?php
if ($products == array()) {
    ?>
    <div class="container cartcontainer">
        <div class="row">
            <div class="center">
                <p><?php print('Winkelwagen is leeg'); ?></p>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Beschikbaarheid</th>
                            <th scope="col" class="text-center">Hoeveelheid</th>
                            <th scope="col" class="text-right">Prijs</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($products as $product) {
                            if (!isset($subtotaal)) {
                                $subtotaal = $product['RecommendedRetailPrice'] * $product['amount'];
                            } else {
                                $subtotaal += $product['RecommendedRetailPrice'] * $product['amount'];
                            }
                            if (!isset($taxamount)) {
                                $taxamount = $product['RecommendedRetailPrice'] * $product['amount'] * ($product['taxrate'] / 100);
                            } else {
                                $taxamount += $product['RecommendedRetailPrice'] * $product['amount'] * ($product['taxrate'] / 100);
                            }
                            if (!isset($totaal)) {
                                $totaal = $product['RecommendedRetailPrice'] * $product['amount'] * ($product['taxrate'] / 100 + 1);
                            } else {
                                $totaal += $product['RecommendedRetailPrice'] * $product['amount'] * ($product['taxrate'] / 100 + 1);
                            }
                            $subtotaal = number_format((float)$subtotaal, 2, '.', '');
                            $taxamount = number_format((float)$taxamount, 2, '.', '');
                            $totaal = number_format((float)$totaal, 2, '.', '');
                        }
                        foreach ($products as $product) { ?>
                            <tr>
                                <?php
                                if ($row["stockitemphoto"] == "") {
                                    ?>
                                    <td><img src="https://dummyimage.com/50x50/55595c/fff"></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><img class="cartimg" src=<?php echo $row["stockitemphoto"]; ?>></td>
                                <?php } ?>
                                <td><?php echo $product['stockitemname']; ?></td>
                                <td>Op voorraad</td>
                                <form method="post" action="change.php">
                                    <td><input class="form-control" type="number" name="qty"
                                               value="<?php echo $product['amount']; ?>" max="25" min="1"></td>
                                    <td class="text-right"><?php echo '$ ' . ($product['RecommendedRetailPrice'] * $product['amount']); ?></td>
                                    <input type="hidden" name="id" value="<?php echo $product['stockitemid']; ?>">
                                    <td class="text-right"><input type="submit" class="btn btn-add" name="wijzig"
                                                                  value="wijzigen"></td>
                                    <td class="text-right"><input type="submit" class="btn btn-danger" name="del"
                                                                  value="x"></td>
                                </form>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Totaal</td>
                            <td class="text-right"><?php echo "$" . $subtotaal; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>BTW</strong></td>
                            <td class="text-right"><strong><?php echo "$" . $taxamount; ?></strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Totaal</strong></td>
                            <td class="text-right"><strong><?php echo "$" . $totaal; ?></strong></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="shop.php?page=1">
                            <button class="btn btn-block btn-light">Verder winkelen</button>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <form method="post" action="persoonsgegevens.php"><input type="submit" name="submit"
                                                                                 class="btn btn-lg btn-block btn-success text-uppercase"
                                                                                 value="Bestellen"/></form>
                    </div>
                </div>
            </div>
            <div class="row shop-tracking-status">
                <div class="col-md-11">
                    <div class="order-status">
                        <div class="order-status-timeline">
                            <!-- class names: c0 c1 and c2 -->
                            <div class="order-status-timeline-completion c0"></div>
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
        </div>
    </div>
    <?php
}
?>