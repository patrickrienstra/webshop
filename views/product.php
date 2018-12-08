<div class="container">	
    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <article class="gallery-wrap"> 
                    <div class="img-big-wrap">
                      <div> <a href="#">        
                            <?php
                            if($row["photo"] == ""){
                            ?>
                            <img class="productimg" src="https://www.britax-roemer.nl/on/demandware.static/Sites-Britax-EU-Site/-/default/dwf9277f59/images/britax/PlaceholderProductImage.jpg" width="500" height="500">
                            <?php
                            }
                            ?>
                            <img class="productimg" src=<?php echo $row["photo"]; ?>></a></div>
                    </div> <!-- slider-product.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h3 class="title mb-3"><?php echo $row["stockitemname"]; ?></h3>

                    <p class="price-detail-wrap"> 
                        <span class="price h3 text-warning"> 
                                <span class="currency">US</span><span class="num"><?php echo ' $ '. number_format((float)$row["unitprice"], 2, '.', ''); ?></span>
                        </span> 
                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                      <dt>Beschrijving: </dt>
                      <dd><?php echo $row["marketingcomments"]; ?></dd>
                      <dd><?php echo "verwachte levertijd: " . $row["leadtimedays"] . " dagen."; ?></dd>
                    </dl>
                    <br>
                    <dl class="param param-feature">
                       <dt>Voorraad: </dt>
                        <dd><?php if ($row['quantityonhand'] > 0){ echo $row["quantityonhand"]; } else { print('Dit product is niet op voorraad');} ?></dd>
                    </dl>  <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                      <dd><?php if($row['ischillerstock'] != 0){ print("gekoeld bewaren");} ?></dd>
                    </dl>  <!-- item-property-hor .// -->
                    <br>
                    <dl class="param param-feature">
                        <dt>Kleur:</dt>
                        <dd><?php echo $row["colorname"]; ?></dd>
                    </dl>  <!-- item-property-hor .// -->

                    <br>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="param param-inline">
                                <dt>Aantal: </dt>
                                <dd>
                                    <form method="post" action="inCart.php">
                                        <select name="qty" class="form-control form-control-sm" style="width:70px;">
                                            <?php
                                            print($id);
                                            for($i=1; $i<=25; $i++){
                                                ?>
                                                <option name="qty" value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
                                            }?>
                                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>"
                                        </select>
                                        <br>
                                        <input type="submit" class="btn btn-add" name="product" value="in winkelmand">
                                    </form>
                                </dd>
                            </dl>  <!-- item-property .// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </article> <!-- card-body.// -->
                    </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card.// -->


</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="thumbnail2">
                <?php
                if($row["stockitemphoto"] == ""){
                    ?>
                    <img class="productimg" src="https://www.britax-roemer.nl/on/demandware.static/Sites-Britax-EU-Site/-/default/dwf9277f59/images/britax/PlaceholderProductImage.jpg" width="500" height="500">
                    <?php
                }else{
                ?>
                <img class="productimg" src=<?php echo $row["stockitemphoto"]; ?>>
                <?php }  ?>
                <div class="caption">
                    <h4 class="pull-right"><?php echo '$ '.$row["unitprice"]; ?></h4>
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
                        print('Dit product is niet op voorraad');
                    } ?></p>
                    <form method="post" action="inCart.php">
                        quantity <select name="qty">
                            <?php
                            print($id);
                            for($i=1; $i<=25; $i++){
                                ?>
                                <option name="qty" value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                            }?>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>"
                        </select>
                        <input type="submit" class="btn btn-add" name="product" value="in winkelmand">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>