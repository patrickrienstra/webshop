<head>
    <link rel="stylesheet" type="text/css" href="/css/accountdetails.css"/>
</head>
<div class="register-page">
    <center><h1>Wachtwoord wijzigen</h1><br>
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="/webshop/accountdetails.php" name="shipping" class="list-group-item">Shipping Information</a>
                    <a href="/webshop/wijzigingwachtwoord.php" name="changepassword" class="list-group-item">Change Password</a>
                    <a href="?myorders" name="orders" class="list-group-item">My Orders</a>
                </div>
            </div>
        </div></center>
    <form class="form" action="wijzigingwachtwoord.php" method="post">
        <input type="password" name="currentpassword" placeholder="Current Password">
        <input type="password" name="newpassword" placeholder="New password">
        <input type="password" name="newpassword2" placeholder="Repeat new password">
        <input type="submit" name="wachtwoordwijzigen" value="Wijzig wachtwoord">
    </form>
</div>