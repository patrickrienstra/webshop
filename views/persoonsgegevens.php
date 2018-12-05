<?php
if(isset($_POST['wijzig'])){
    ?>
    <div class="form">
        <h4>* is verplicht</h4>
        <form class="register-form" method="post" action="orderConfirm.php">
            <input type="text" name="naam" placeholder="Full Name*" value="<?php echo $persoonsgegevens['FullName'];?>" required>
            <input type="text" name="address" placeholder="Street and Number*" value="<?php echo $persoonsgegevens['Address'];?>" required>
            <input type="text" name="postcode" placeholder="Postalcode*" value="<?php echo $persoonsgegevens['Zipcode'];?>" required>
            <input type="text" name="plaats" placeholder="City*" value="<?php echo $persoonsgegevens['City'];?>" required>
            <input type="email" name="email" placeholder="Email*" value="<?php echo $persoonsgegevens['Email']?>" required>
            <input type="text" name="phonenumber" placeholder="Phone Number" value="<?php echo $persoonsgegevens['PhoneNumber']; ?>">
            <input type="submit" name="submit" value="Next">
        </form>
    </div>
<?php
}else{
?>
    <div class="loginpageformright">
    <div class="form">
        <h4>* is verplicht</h4>
        <form class="register-form" method="post" action="orderConfirm.php">
            <input type="text" name="naam" placeholder="Full Name*" required>
            <input type="text" name="address" placeholder="Street and Number*" required>
            <input type="text" name="postcode" placeholder="Postalcode*" required>
            <input type="text" name="plaats" placeholder="City*" required>
            <input type="email" name="email" placeholder="Email*" required>
            <input type="text" name="phonenumber" placeholder="Phone Number">
            <input type="submit" name="submit" value="Next">
        </form>
    </div>
</div>
<div class="loginpageformleft">
    <div class="login-form">
        <div class="form">
            <?php
                if(isset($_SESSION['login_fail'])) {
                ?>
                <div>
                    Username and/or password invalid. Please try again.<br>
                </div>
                <?php
                    unset($_SESSION['login_fail']);
                }
                ?>
                <form class="login-form" action="logincheck.php" method="POST">
                    <input type="text" name="username" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="hidden" name="location" value="persoonsgegevens">
                    <input type="submit" name="login" value="Login" class="login-submit">
                </form>
        </div>
    </div>
</div>
<?php
}
?>