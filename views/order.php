<center><h1>Mijn bestellingen</h1><br>
    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <a href="/webshop/accountdetails.php" name="shipping" class="list-group-item">Persoonlijke Informatie</a>
                <a href="/webshop/wijzigingwachtwoord.php" name="changepassword" class="list-group-item">Wachtwoord Veranderen</a>
                <a href="/webshop/myorders.php" name="orders" class="list-group-item">Mijn Bestellingen</a>
            </div>
        </div>
    </div>
</center>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col"></th>
                        <th scope="col" class="text-center">Prijs per stuk</th>
                        <th scope="col" class="text-center">Aantal</th>
                        <th sccpe="col" class="text-center">Belasting</th>
                        <th scope="col" class="text-right">Totaal Bedrag</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if($line['StockItemPhoto'] == ''){ ?>
                                <td><img src="https://dummyimage.com/50x50/55595c/fff"></td>
                            <?php }else{ ?>
                                <td><img class="cart-img" src="<?php echo $line['StockItemPhoto'];?>"></td>
                            <?php } ?>
                            <td><?php echo $line['StockItemName'];?></td>
                            <td class="text-center"><?php echo "$".$line['RecommendedRetailPrice']; ?></td>
                            <td class="text-center"><?php echo $line['Quantity'];?></td>
                            <td class="text-center"><?php echo "$".$line['TaxAmount']; ?></td>
                            <td class="text-right"><?php echo "$".$line['ExtendedPrice'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>