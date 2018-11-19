<head>
	<link rel="stylesheet" type="text/css" href="/css/login.css"/>
</head>
<div class="login-page">
  <div class="form">
	  <?php
	  if(isSet($_SESSION['error'])){
		  //Access your POST variables
		  $temp = $_SESSION['error'];
		  echo $temp."<br/>";
		  //Unset the useless session variable
		  unset($_SESSION['error']);
	  }?>
	<form class="login-form" action="logincheck.php" method="POST">
	  <input type="text" name="username" placeholder="username"/>
	  <input type="password" name="password" placeholder="password"/>
	  <input type="submit" name="login" value="Login" class="login-submit">
        <a href="registreer.php">Nog geen account? Registreer hier!</a>
	</form>
  </div>
</div>
