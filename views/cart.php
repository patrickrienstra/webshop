<div class="container">
    <div class="row">
        <?php
        foreach($products as $product) {?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <?php if($product['photo'] == ''){ ?>
                    <img class="workshop" src="http://placehold.it/320x150">
                    <?php }else{ ?>
                    <img class="workshop" src="<?echo $product['photo']; ?>">
                    <?php } ?>
                    <div class="caption">
                        <h4><?php echo $product['stockitemname']; print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo $product['brand']; print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo $product['unitprice']; print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo ($product['unitprice']*$product['amount']); print("<br>"); ?></h4>
                        <form method="post" action="cart.php">
                            <input type="text" name="qty">
                            <input type="submit" name="submit" value="wijzigen">
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
            ?>
    </div>
    <form method="post" action="persoonsgegevens.php">
        <button> bestellen</button>
    </form>
</div>
