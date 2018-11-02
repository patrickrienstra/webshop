<?php
if ($stmt -> execute()){
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="thumbnail">
                <img class="productimg" src=<?php echo $row["photo"] ?>>
                <div class="caption">
                    <h4 class="pull-right"><?php echo $row["unitprice"]; ?></h4>
                    <h4><?php echo $row["stockitemname"]; ?></h4>
                    <p><?php echo $row["brand"]; ?></p>
                    <p><?php echo $row["size"]; ?></p>
                    <p><?php echo $row["leadtimedays"]; ?></p>
                    <p><?php echo $row["ischillerstock"]; ?></p>
                    <p><?php echo $row["taxrate"]; ?></p>
                    <p><?php echo $row["unitprice"]; ?></p>
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