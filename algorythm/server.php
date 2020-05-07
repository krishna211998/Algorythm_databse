<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$name=      "";
$department ="";
$password="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'algorythm');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  // mysqli is object oriented implementation of mysql fn

  $username = mysqli_real_escape_string($db, $_POST['username']);

//   $user_name = test_input($_POST["username"]);
// if (!preg_match("/^[a-zA-Z ]*$/",$user_name)) {
//   $nameErr = "Only letters and white space allowed";
// }
// if($nameErr)
// echo "not ok";


  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $department = mysqli_real_escape_string($db, $_POST['department']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "username is required"); }
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
   if (empty($department)) { array_push($errors, "department is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match"); }



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student_page WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username']===$username) {
      array_push($errors, "Username already exists");
    }
  }

  //   if ($user['email']) {
  //     array_push($errors, "email already exists");
  //   }
  // }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query2 = "INSERT INTO student_page (username,name, email,department, password) 
  			  VALUES('$username','$name', '$email','$department', '$password')";
  	$r=mysqli_query($db, $query2);
    echo "$query2";
    if($r){
      //echo "<script>alert('thank you')</script>";
      $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
    }
  	
  }
}

// if a user wants to LOGIN 
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
// check if no error 
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM student_page WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>