<?php   

session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
<?php
$con=mysqli_connect('localhost','root','','algorythm');


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>

  
<form action="next.php" method="post">
    
   

     <!--<p>
        <label for="Reg_id">Registration Id:</label> 
        <input type="number" name="Reg_id" id="Reg_id">
    </p>-->
    <label for="username">username</label>

    <input type="submit" name="Add">

</form>
</body>
</html>
<?php

if(isset($_POST['Add'])){
    
    $game_name=$_POST['game_name'];

    $game_type=$_POST['game_type'];
    $reg_code=$_POST['game_code'];

    $username=$_POST['username'];
    
    // echo "abc";

    $q="INSERT INTO participation (game_name,game_type,game_code,username) VALUES('$game_name','$game_type','$game_code','$username')";
    $run=mysqli_query($con,$q);

    if($run){
        // echo "$q";
        // header('location:insert2.php')
       header("location:joinpage.php");
    }    

}


?>
<script>
function myFunction() {
  alert("I am an alert box!");
}
exit();
</script>
?>