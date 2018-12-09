<div class="row">
    <center>
        <div class="col-lg-3">
            <h3>Productcategorieën</h3>
            <div class="list-group">
                <a href="?category=Novelty%20Items&page=1" name="novelty" class="list-group-item">Novelty Items</a>
                <a href="?category=Clothing&page=1" name="clothing" class="list-group-item">Clothing</a>
                <a href="?category=Mugs&page=1" name="mugs" class="list-group-item">Mugs</a>
                <a href="?category=T-shirts&page=1" name="tshirts" class="list-group-item">T-Shirts</a>
                <a href="?category=Airline%20Novelties&page=1" name="airline" class="list-group-item">Airline
                    Novelties</a>
                <a href="?category=Computing%20Novelties&page=1" name="computing" class="list-group-item">Computing
                    Novelties</a>
                <a href="?category=USB%20Novelties&page=1" name="usb" class="list-group-item">USB Novelties</a>
                <a href="?category=Furry%20Footwear&page=1" name="furry" class="list-group-item">Furry Footwear</a>
                <a href="?category=Toys&page=1" name="toys" class="list-group-item">Toys</a>
                <a href="?category=Packaging%20Materials&page=1" name="packaging" class="list-group-item">Packaging
                    Materials</a>
                <?php
                if (ISSET($_GET['category'])) {
                ?>
                <a href="?page=1" name="clear" class="list-group-item">Verwijder Filter</a>
                <?php }?>
            </div>
        </div>
</div></center>
<div class="container">
    <div class="row">
        <div class="shop-bar">
            <div class="pages">
                <?php
                if (isset($paginas)) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $pagep = $page - 1;
                $pagen = $page + 1;
                if ($page + 1 > $paginas) {
                    $pagen = $paginas;
                }
                ?>
                <ul class="pagination">
                    <?php
                    if (!ISSET($_GET['category'])) {
                        if ($page != 1) {
                            echo "<li><a href='?page=" . $pagep . "'>previous</a></li>";
                        }
                        for ($i = 1; $i <= $paginas; $i++) {
                            if ($page == $i) {
                                echo "<li class='active'><a href='?page=" . $i . "'>" . $i . "</a></li>";
                            } else {
                                echo "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
                            }
                        }
                        if ($page != $paginas) {
                            echo "<li><a href='?page=" . $pagen . "'>next</a></li>";
                        }
                    } else {
                        if ($page != 1) {
                            echo "<li><a href='?category=" . $_GET['category'] . "&page=" . $pagep . "'>previous</a></li>";
                        }
                        for ($i = 1; $i <= $paginas; $i++) {
                            if ($page == $i) {
                                echo "<li class='active'><a href='?category=" . $_GET['category'] . "&page=" . $i . "'>" . $i . "</a></li>";
                            } else {
                                echo "<li><a href='?category=" . $_GET['category'] . "&page=" . $i . "'>" . $i . "</a></li>";
                            }
                        }
                        if ($page != $paginas) {
                            echo "<li><a href='?category=" . $_GET['category'] . "&page=" . $pagen . "'>next</a></li>";
                        }
                    }
                    }
                    ?>
            </div>
            <form class="product-search" action="shop.php" method="get">
                <input type="text" name="value" placeholder="zoeken">
                <input type="submit" name="search" value="zoeken" class="btn btn-primary">
            </form>

        </div>
        <?php
        print("</ul>");
        foreach ($list as $id => $value) {
            if ($id >= $_SESSION['max'] * ($page - 1) && $id < $_SESSION['max'] * $page) { ?>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <?php if (!isset($value['StockItemPhoto'])) { ?>
                            <img class="workshop" src="http://placehold.it/320x150">
                            <?php
                        } else {
                            ?>
                            <img class="shopimg" src="<?php echo $value['StockItemPhoto']; ?>">
                        <?php } ?>
                        <div class="caption">
                            <h4 class="pull-right"><?php echo '$ ' . $value['RecommendedRetailPrice']; ?></h4>
                            <h4>
                                <a href="product.php?id=<?php echo $value['stockitemid']; ?>"><?php echo $value['stockitemname']; ?></a>
                            </h4>
                            <?php
                            if ($value['quantityonhand'] < 100) {
                                ?>
                                <img class="stockimg" src="img/red_dot.png">
                                <?php
                            } else {
                                ?>
                                <img class="stockimg" src="img/green_dot.png">
                                <?php
                            }
                            ?>
                        </div>
                        <form method="post" action="inCart.php">
                            <select name="qty">
                                <?php
                                print($id);
                                for ($i = 1; $i <= 25; $i++) {
                                    ?>
                                    <option name="qty" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                } ?>
                                <input type="hidden" name="id" value="<?php echo $value['stockitemid']; ?>">
                                <input type="hidden" name="page" value="<?php echo $page ?>">
                                <input type="submit" name="shop" value="in winkelmand" class="btn btn-add">
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
    print('<div><ul class="pagination">');
    if (!ISSET($_GET['category'])) {
        if ($page != 1) {
            echo "<li><a href='?page=" . $pagep . "'>previous</a></li>";
        }
        for ($i = 1; $i <= $paginas; $i++) {
            if ($page == $i) {
                echo "<li class='active'><a href='?page=" . $i . "'>" . $i . "</a></li>";
            } else {
                echo "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
            }
        }
        if ($page != $paginas) {
            echo "<li><a href='?page=" . $pagen . "'>next</a></li>";
        }
    } else {
        if ($page != 1) {
            echo "<li><a href='?category=" . $_GET['category'] . "&page=" . $pagep . "'>previous</a></li>";
        }
        for ($i = 1; $i <= $paginas; $i++) {
            if ($page == $i) {
                echo "<li class='active'><a href='?category=" . $_GET['category'] . "&page=" . $i . "'>" . $i . "</a></li>";
            } else {
                echo "<li><a href='?category=" . $_GET['category'] . "&page=" . $i . "'>" . $i . "</a></li>";
            }
        }
        if ($page != $paginas) {
            echo "<li><a href='?category=" . $_GET['category'] . "&page=" . $pagen . "'>next</a></li>";
        }

    }
    print("</ul></div>");
    ?>
</div>
