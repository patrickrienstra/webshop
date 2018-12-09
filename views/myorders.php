<center><h1>Mijn bestellingen</h1><br>
    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <a href="/webshop/accountdetails.php" name="shipping" class="list-group-item">Persoonlijke
                    Informatie</a>
                <a href="/webshop/wijzigingwachtwoord.php" name="changepassword" class="list-group-item">Wachtwoord
                    Veranderen</a>
                <a href="/webshop/myorders.php" name="orders" class="list-group-item">Mijn Bestellingen</a>
            </div>
        </div>
    </div>
</center>
<div class="container mb-4">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    if (isset($list)) {
    for ($i = 1; $i <= $paginas; $i++) {
        if ($page == $i) {
            echo "<li class='active'><a href='?page=" . $i . "'>" . $i . "</a></li>";
        } else {
            echo "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
        }
    } ?>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $order) {
                        if ($order['InvoiceID'] >= $max * ($page - 1) && $order['InvoiceID'] < $max * $page) { ?>
                            <tr>
                                <td>
                                    <a href="order.php?invoice=<?php echo $order['InvoiceID']; ?>"><?php echo "#" . $order['InvoiceID']; ?></a>
                                </td>
                                <td><?php echo $order['InvoiceDate']; ?></td>
                                <?php if ($order['ConfirmedDeliveryTime'] == '') { ?>
                                    <td class="text-center">nee</td>
                                <?php } else { ?>
                                    <td class="text-center">ja</td>
                                <?php } ?>
                                <td class="text-right"><?php echo "$ " . $order['TotalPrice']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="container mb-4">
        <center>
            <a>U hebt nog niks besteldt.</a>
        </center>
    </div>
<?php } ?>