<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "algorythm");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
 
// Attempt insert query execution
// $sql = "INSERT INTO student_info (reg_id,st_name,Department,Email) VALUES ('$reg_id', '$st_name', '$dep_name','$email')";
	$query = "INSERT INTO student_page (username,name, email, password) 
  			  VALUES('$username',$name, '$email', '$password')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header('location: insert2.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>