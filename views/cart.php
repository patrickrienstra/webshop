<?php
if(!$products == ''){
    ?>
    <div class="container cartcontainer">
        <div class="row">
            <?php
            foreach ($products as $product) { ?>
                <div class="thumbnail"><?php if ($product['photo'] == '') {
                        ?>
                        <div class="pull-left">
                        <img class="workshop" src="http://placehold.it/320x150">
                    <?php } else { ?>
                        <img class="workshop" src="<? echo $product['photo']; ?>">
                    <?php } ?>
                        </div>
                    <div class="caption">
                        <h4><?php echo $product['stockitemname'];
                            print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo $product['brand'];
                            print("<br>"); ?></h4>
                        <h4 class="pull-right"><?php echo '$ '.$product['unitprice']; ?></h4><br>
                        <h4 class="pull-right"><?php echo '$ '.($product['unitprice'] * $product['amount']); ?></h4><br>
                        <form method="post" action="change.php">
                            <input type="number" name="qty" value="<?php echo $product['amount'];?>" max="25" min="1">
                            <input type="hidden" name="id" value="<?php echo $product['stockitemid'];?>">
                            <input type="submit" class="btn btn-add" name="wijzig" value="wijzigen">
                            <input type="submit" class="btn btn-danger" name="del" value="x">
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="container cartcontainer">
        <div class="row">
            <div class="center">
                <p><?php print('Winkelwagen is leeg'); ?></p>
            </div>
        </div>
    </div>
<?php
}
?>
<aside>
    <?php foreach($products as $product){
        $subtotaal= $subtotaal +(($product['unitprice']*$product['amount']));
    }
    foreach($products as $product){
        $tototaal= $totaal +(($product['unitprice']*$product['amount'])*(1+($product['taxrate'])/100));
    }

    ?>
    <div class="cart-total">
        <div class="form">
            <form>
                Subtotaal <br>
                <input type="text" value="<?php print('$ '.$subtotaal);?>" class="center" disabled><br>
                Totaal <br>
                <input type="text" value="<?php print('$ '.$subtotaal);?>" class="center" disabled>
            </form>
            <form method="post" action="persoonsgegevens.php">
                <?php if($products == ""){?>
                    <input type="submit" class="btn btn-add" value="Bestellen" disabled>
                <?php }else{?>
                    <input type="submit" class="btn btn-add" value="Bestellen">
                <?php } ?>
            </form>
            <form method="post" action="cart.php">
                <input type="submit" class="btn btn-danger" name="ec" value="Empty Cart">
            </form>
        </div>
    </div>
</aside>

