<head>
    <link rel="stylesheet" type="text/css" href="/css/register.css"/>
</head>
<div class="register-page">
    <div class="form">
        <?php
        if(isset($_SESSION['registered_fail'])) {
            ?>
        <div>
            Username and/or email address is already in use. Please try again.
            <br>
            <br>
        </div>
        <?php
            unset($_SESSION['registered_fail']);
        }
        ?>
        <form class="register-form" action="dbregistreer.php" method="POST">
            <input type="text" name="r_username" placeholder="Username" required/>
            <input type="password" name="r_password" placeholder="Password" required/>
            <input type="password" name="r_passwordcheck" placeholder="Repeat password" required/>
            <input type="text" name="r_name" placeholder="First name" required/>
            <input type="text" name="r_surname" placeholder="Last name" required/>
            <input type="text" name="r_address" placeholder="Street address" required/>
            <input type="text" name="r_zipcode" placeholder="Zip code" required/>
            <input type="text" name="r_city" placeholder="City" required/>
            <input type="text" name="r_phone" placeholder="Mobile number"/>
            <input type="text" name="r_email" placeholder="Email address" required/>
            <input type="submit" name="register" value="Register" class="register-submit">
        </form>
    </div>
</div>
