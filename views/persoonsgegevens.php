<div class="loginpageformright">
    <div class="form">
    <form class="register-form" method="post" action="orderConfirm.php">
        <input type="text" name="voornaam" placeholder="First name" required>
        <input type="text" name="achternaam" placeholder="Surname" required>
        <input type="text" name="straat" placeholder="Street" required>
        <input type="text" name="huisnr" placeholder="Nr." required>
        <input type="text" name="postcode" placeholder="Postalcode" required>
        <input type="text" name="plaats" placeholder="City" required>
        <input type="email" name="email" placeholder="Email" required>
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
                        Username and/or password invalid. Please try again.
                        <br>
                        <br>
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