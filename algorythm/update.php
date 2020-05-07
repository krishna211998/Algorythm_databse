 <?php  
 $connect = mysqli_connect("localhost", "root", "", "algorythm"); 
 if(!$connect)
 {
 	die("Database connection error");
 }


 //delete record

 $query="UPDATE  student_page SET username='',name='',department='', Email=''";
  $query="UPDATE  student_page SET username='',name='',department='', Email=''";
 $result=mysqli_query($connect,$query);

 if($result)
 	echo "Record updated successfully";
 else
 	echo "Record not updated,try again";
 header('location: joinpage.php');

 ?>