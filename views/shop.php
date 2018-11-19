<div class="container">
    <div class="row">
        <?php
        $page = $_GET['page'];
        print('<div class="pagenumber">');
        for($i = 1; $i <= $paginas; $i++) {
            echo "<a href='?page=" . $i . "' class='choosepage'>" . $i . "</a>";
        }
        print("</div>");
        foreach($list as $id => $value) {
            if($id <= $max*$page && $id > $max*($page-1)) {?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img class="workshop" src="http://placehold.it/320x150">
                    <div class="caption">
                        <h4 class="pull-right"><?php echo $value['unitprice']; ?></h4>
                        <h4><a href="product.php?id=<?php echo $value['stockitemid']; ?>"><?php echo $value['stockitemname']; ?></a></h4>
                    </div>
                </div>
            </div>
            <?php
            }
        }
            ?>
    </div>
</div>
