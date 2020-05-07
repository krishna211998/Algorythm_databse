<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>REGISTER </title>
</head>

<body>
  <div class="header">
  	<h2>REGISTER TO PARTICIPATE IN ALGORYTHM</h2>
  </div>
	

  <form method="post" action="registration.php">
  	<?php include('errors.php'); ?>


  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" required>
  	</div>


    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" required>
    </div>


  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required>
  	</div>

    <div class="input-group">
      <label>Department</label>
      <input type="text" name="department" required>
    </div>


  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" required>
  	</div>


  	<div class="input-group">
  	  <label>Confirm Password</label>
  	  <input type="password" name="password_2"required>
  	</div>


  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>

  	<p>
  		Already a member? <a href="login.php">Log In</a>
  	</p>
  </form>
</body>
</html>