<head>
	<link rel="stylesheet" type="text/css" href="/css/login.scss"/>
</head>
<div class="login-page">
  <div class="form">
      <?php
      if(isset($_SESSION['empty_field'])) {
          ?>
          <div>
              Username and/or password can't be empty
              <br>
              <br>
          </div>
          <?php
          unset($_SESSION['msg']);
      }
      if(isset($_SESSION['registered'])) {
          ?>
          <div>
              Your account has succesfully been created. You can now log in.
              <br>
              <br>
          </div>
          <?php
          unset($_SESSION['registered']);
      }
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
	  <input type="text" name="username" placeholder="username"/>
	  <input type="password" name="password" placeholder="password"/>
	  <input type="submit" name="login" value="Login" class="login-submit">
        <a href="registreer.php">Nog geen account? Registreer hier!</a>
	</form>
  </div>
</div>