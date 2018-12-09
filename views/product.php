<div class="row">
    <center>
        <div class="col-lg-3">
            <h3>Productcategorieën</h3>
            <div class="list-group">
                <a href="shop.php?category=Novelty%20Items&page=1" name="novelty" class="list-group-item">Novelty Items</a>
                <a href="shop.php?category=Clothing&page=1" name="clothing" class="list-group-item">Clothing</a>
                <a href="shop.php?category=Mugs&page=1" name="mugs" class="list-group-item">Mugs</a>
                <a href="shop.php?category=T-shirts&page=1" name="tshirts" class="list-group-item">T-Shirts</a>
                <a href="shop.php?category=Airline%20Novelties&page=1" name="airline" class="list-group-item">Airline
                    Novelties</a>
                <a href="shop.php?category=Computing%20Novelties&page=1" name="computing" class="list-group-item">Computing
                    Novelties</a>
                <a href="shop.php?category=USB%20Novelties&page=1" name="usb" class="list-group-item">USB Novelties</a>
                <a href="shop.php?category=Furry%20Footwear&page=1" name="furry" class="list-group-item">Furry Footwear</a>
                <a href="shop.php?category=Toys&page=1" name="toys" class="list-group-item">Toys</a>
                <a href="shop.php?category=Packaging%20Materials&page=1" name="packaging" class="list-group-item">Packaging
                    Materials</a>
            </div>
        </div>
</div></center>
<div class="container">
    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <article class="gallery-wrap"> 
                    <div class="img-big-wrap">
                      <div> <a href="#">        
                            <?php
                            if($row["stockitemphoto"] == ""){
                            ?>
                            <img class="productimg" src="https://www.britax-roemer.nl/on/demandware.static/Sites-Britax-EU-Site/-/default/dwf9277f59/images/britax/PlaceholderProductImage.jpg" width="500" height="500">
                            <?php
                            }
                            ?>
                            <img class="productimg" src=<?php echo $row["stockitemphoto"]; ?>></a></div>
                    </div> <!-- slider-product.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h3 class="title mb-3"><?php echo $row["stockitemname"]; ?></h3>

                    <p class="price-detail-wrap"> 
                        <span class="price h3 text-warning"> 
                                <span class="currency">US</span><span class="num"><?php echo ' $ '. number_format((float)$row["RecommendedRetailPrice"], 2, '.', ''); ?></span>
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