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

    <h1>Welcome to the first Page Of participation</h1>
     <h1>fill the page and click next to got to second page of participation </h1>
<form action="insert.php" method="post">
    

     <p>
        <label for="username">username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="name">Student Name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
    </p>

    <p>
        <label for="department">Department :</label>
        <input type="text" name="department" id="department">
    </p>

     <p>
        <label for="password">password:</label> 
        <input type="password" name="password" id="password">
    </p>
     <input type="submit" name="submit" value="next">



</form>
</body>
</html>
<?php




if(isset($_POST['submit'])){
    $Reg_id=$_POST['username'];
    $St_name=$_POST['name'];
    $email=$_POST['email'];
     $department=$_POST['department'];
    $password=$_POST['password'];

    $q="INSERT INTO student_page (username,name,email,department,password) VALUES('$username','$name','$email',$department','$password')";
    $run=mysqli_query($con,$q);

   // $q2="INSERT INTO participation (reg_id,game_name,game_type,game_code) VALUES('$Reg_id','','','')";
   // $run2=mysqli_query($con,$q2);
    if($run){
       // echo "OK Done";
       header('location: insert2.php');
    }
}


//SELECT participation.reg_id as Reg_id,student_info.st_name,participation.game_name,participation.game_type FROM `student_info` INNER JOIN participation ON participation.reg_id=student_info.reg_id;

?>


