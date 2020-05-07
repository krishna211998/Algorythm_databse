<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "algorythm");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$game_name = mysqli_real_escape_string($link, $_REQUEST['game_name']);
$game_type = mysqli_real_escape_string($link, $_REQUEST['game_type']);
$game_code = mysqli_real_escape_string($link, $_REQUEST['game_code']);
// $Reg_id = mysqli_real_escape_string($link, $_REQUEST['Reg_id']);
 
// Attempt insert query execution
$sql = "INSERT INTO participation (game_name,game_type,game_code) VALUES ( '$game_name', '$game_type','$game_code')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header('location: insert3.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>