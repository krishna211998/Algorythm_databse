 <?php  
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "libr"); 
 if(!$connect)
 {
 	die("Database connection error");
 }


 //delete record

 // $query="UPDATE  bookinfo SET quantity='$book[3]'";
 $query="UPDATE bookinfo SET quantity = '$book[3]' WHERE serial='$ser'";
  // $query="UPDATE  student_page SET username='',name='',department='', Email=''";
 $result=mysqli_query($connect,$query);

 if($result)
 	echo "Record updated successfully";
 else
 	echo "Record not updated,try again";
 header('location: userProf.php');

 ?>