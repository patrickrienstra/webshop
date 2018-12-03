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
            if($id >= $_SESSION['max']*($page-1) && $id < $_SESSION['max']*$page) {?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <?php if($value['StockItemPhoto']=='') {?>
                    <img class="workshop" src="http://placehold.it/320x150">
                    <?php
                    }else{
                        ?>
                    <img src="<?php echo $value['StockItemPhoto'];?>">
                    <?php } ?>
                    <div class="caption">
                        <h4 class="pull-right"><?php echo '$ '.$value['unitprice']; ?></h4>
                        <h4><a href="product.php?id=<?php echo $value['stockitemid']; ?>"><?php echo $value['stockitemname']; ?></a></h4>
                    </div>
                    <form method="post" action="inCart.php">
                        <select name="qty">
                            <?php
                            print($id);
                            for($i=1; $i<=25; $i++){
                                ?>
                                <option name="qty" value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                            }?>
                        <input type="hidden" name="id" value="<?php echo $value['stockitemid'];?>">
                            <input type="hidden" name="page"  value="<?php echo $page ?>">
                        <input type="submit" name="shop" value="in winkelmand" class="btn btn-add">
                    </form>
                </div>
            </div>
            <?php
            }
        }
        if(isset($error)){
            ?>
        <div>
            <p> Deze pagina is op dit moment niet beschikbaar.</p>
            <p> Neem contact op met de service desk.</p>
            <p> Code: <?php echo $error; ?></p>
        </div>
        <?php
        }
            ?>

    </div>
</div>
