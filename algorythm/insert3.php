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

    <h1>Welcome to the last page Of participation</h1>
     <h1>fill the page to secure your participation </h1>
<form action="insert3.php" method="post">
    
    <p>
         <label for="game_code">Game code:</label>
    <select name="game_code"> 
        <option>
            <?php
                                                        $sql="select * from participation";
                                                        $res=mysqli_query($con,$sql) or die(mysqli_error($con));
                                                        $i=0;
                                                        while($fetch=mysqli_fetch_array($res))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $fetch['game_code'];?>"><?php echo $fetch['game_code'];?></option>
                                                        <?php } ?>  
        </option>
    </select>
    </p>

    <p>
    <label for="username">Username :</label>
    <select name="username"> 
        <option>
            <?php
                                                        $sql="select * from student_page";
                                                        $res=mysqli_query($con,$sql) or die(mysqli_error($con));
                                                        $i=0;
                                                        while($fetch=mysqli_fetch_array($res))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $fetch['username'];?>"><?php echo $fetch['username'];?></option>
                                                        <?php } ?>  
        </option>
    </select>
   </p>

     <h1>Click submit button to see the join result else log out button for registration </h1>

    <input type="submit" name="Add">
 <!--  <a href="logout.php">Log Out Btn</a> -->

</form>
</body>
</html>
<?php

if(isset($_POST['Add'])){
    
    $game_code=$_POST['game_code'];
    $username=$_POST['username'];

    $q="INSERT INTO information (game_code,username) VALUES('$game_code','$username')";
    $run=mysqli_query($con,$q);

    if($run){

        echo "Congrats! you have secured your participation";
        header('location: joinpage.php');
    }    

}


?>
<script>
function myFunction() {
  alert("I am an alert box!");
}
</script>