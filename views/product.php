<?php

$query="
SELECT stockitemname, s.stockitemid, brand, size, leadtimedays, ischillerstock, taxrate, unitprice, marketingcomments, photo, customfields, colorname, quantityonhand
FROM stockitems s
LEFT JOIN colors c ON s.colorid = c.colorid
JOIN stockitemholdings f ON s.stockitemid = f.stockitemid
WHERE s.StockItemID = 199";

$stmt = $db->prepare($query);
if($stmt->execute()){
    print("succeed");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        print('succes');
        print($row["stockitemname"]);
        ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="thumbnail">
                <?php
                if($row["photo"] == ""){
                    ?>
                    <img class="productimg" src="https://www.britax-roemer.nl/on/demandware.static/Sites-Britax-EU-Site/-/default/dwf9277f59/images/britax/PlaceholderProductImage.jpg" width="500" height="500">
                    <?php
                }
                ?>
                <img class="productimg" src=<?php echo $row["photo"]; ?>>
                <div class="caption">
                    <h4 class="pull-right"><?php echo $row["unitprice"]; ?></h4>
                    <h4><?php echo $row["stockitemname"]; ?></h4>
                    <p><?php echo $row["brand"]; ?></p>
                    <p><?php echo $row["size"]; ?></p>
                    <p><?php echo $row["leadtimedays"]; ?></p>
                    <p><?php echo $row["ischillerstock"]; ?></p>
                    <p><?php echo $row["taxrate"]; ?></p>
                    <p><?php echo $row["marketingcomments"]; ?></p>
                    <p><?php echo $row["customfields"]; ?></p>
                    <p><?php echo $row["colorname"]; ?></p>
                    <p><?php echo $row["quantityonhand"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>