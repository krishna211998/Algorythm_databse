 <?php  
 
 ob_start();
 session_start();
 $username=$_GET['mail'];
  // $game_code=$_GET['game_code'];
 // $name=$_GET['name'];
 //  $department=$_GET['department'];
$connect = mysqli_connect("localhost", "root", "", "libr"); 
 if(!$connect)
 {
 	die("Database connection error");
 }

 //delete record

 $query="DELETE FROM userinfo WHERE mail='$mail'";
 $result=mysqli_query($connect,$query);
//  $query2="DELETE FROM information WHERE username='$username'";
// $result2=mysqli_query($connect,$query2);3
 $query3="DELETE FROM student_books WHERE mail='$mail'"; 
$result3=mysqli_query($connect,$query3);
echo "ok";

 if($result)
 {
 	echo "successfully deleted";
 	?>
 	<META HTTP-EQUIV="refresh" CONTENT ="0">
 	
 	<?php
 }

 header('location: joinpage.php');
 ?>