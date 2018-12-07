<div class="container">
    <center><img src="img/homepagina wwi.png" alt="homepagina foto"></center>
    <br>
    <h1>Uitgelichte producten</h1>
<?php
foreach($list as $id => $value) {
?>
    <ul class="hot-products">
        <li>
            <a href="product.php?id=<?php echo $value['stockitemid']; ?>">
                <img src="<?php echo $value['StockItemPhoto']; ?>">
                <h4><?php echo $value['stockitemname']; ?></h4>
            </a>
        </li>
    </ul>

    <?php
    }
    if(isSet($_SESSION['key'])){
        //Access your POST variables
        $key = $_SESSION['key'];
    }
    ?>
</div>
