<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>

</head>
<body>
  <div class="header">
  	<h2>Log In</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	

       <div>
        <label for="username">Username :</label>
        <input type="text" name="username" required="">
    </div>


     <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required="">
    </div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Log In</button>
    <!--   header('location:insert.php'); -->
  	</div>
  	<p>
  		Not yet a member? <a href="registration.php">Register</a>
  	</p>
  </form>
</body>
</html>