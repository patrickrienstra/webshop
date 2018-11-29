<?php
if(!$products == ''){
    ?>
    <div class="container">
        <div class="row">
            <?php
            foreach ($products as $product) { ?>
                <div class="thumbnail"><?php if ($product['photo'] == '') {
                        ?>
                        <img class="workshop" src="http://placehold.it/320x150">
                    <?php } else { ?>
                        <img class="workshop" src="<? echo $product['photo']; ?>">
                    <?php } ?>
                    <div class="caption">
                        <h4><?php echo $product['stockitemname'];
                            print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo $product['brand'];
                            print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo $product['unitprice'];
                            print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo($product['unitprice'] * $product['amount']);
                            print("<br>"); ?></h4>
                        <form method="post" action="change.php">
                            <input type="number" name="qty" value="<?php echo $product['amount'];?>">
                            <input type="hidden" name="id" value="<?php echo $product['stockitemid'];?>">
                            <input type="submit" name="wijzig" value="wijzigen">
                            <input type="submit" name="del" value="verwijder">
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <form method="post" action="persoonsgegevens.php">
            <button>Bestellen</button>
        </form>
        <form method="post" action="cart.php">
            <input type="submit" name="ec" value="Empty Cart">
        </form>
    </div>
    <?php
}else{
    ?>
    <div class="container">
        <div class="row">
            <div class="caption">
            <h4><? echo 'Winkelwagen is leeg'; ?>
            </div>
        </div>
    </div>
<?php
}
?>