<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Factuur Nummer</th>
                            <th scope="col">Datum</th>
                            <th scope="col" class="text-center">Bezorgd</th>
                            <th scope="col" class="text-right">Totaal Bedrag</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $list as $order){?>
                        <tr>
                            <td><?php echo $order['InvoiceID'];?></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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