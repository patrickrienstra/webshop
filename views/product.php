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
                    <p><?php if($row['ischillerstock'] != 0){
                        print("gekoeld bewaren");} ?></p>
                    <p><?php echo $row["taxrate"]; ?></p>
                    <p><?php echo $row["marketingcomments"]; ?></p>
                    <p><?php echo $row["customfields"]; ?></p>
                    <p><?php echo $row["colorname"]; ?></p>
                    <p><?php if ($row['quantityonhand'] > 0){
                        echo $row["quantityonhand"];
                    }else{
                        print('Dit product is niet op voorraad');} ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
