<?php
session_start();

	if(is_null($_SESSION['mail']))
	{
		echo "<script>alert('Please Sign In first');</script>";
		header('refresh:0 URL=signin.php');
	}

?>
<html>
<title>Welcome!</title>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/DSW PROJ/CSSstylesheet.css">
</head>
<body>

		<div class="row">
			<div class="col-md-6">
				<div class="col-md-8">
				<div class=navbar>
		<!-- <a href="http://localhost/DSW PROJ/Page1.php"><img src="http://localhost/DSW PROJ/home3.png" style="position:relative; left:7px; top:7px; align:center; width:40px; height:40px;"></a> -->
		<form action="bookinfo.php" method=post style="position:center; top:0px; right:5px;" >
		<?php if(is_null($_SESSION['mail'])) echo "<input style='padding:10px; float:right; height:45px;' type=submit class=button name=signIn value='Sign In'>"; ?>

		<?php if(!is_null($_SESSION['mail'])) echo "<input style='float:left; padding:10px; height:45px;' type=submit class=button name=signOut value='Sign Out'>"; ?>

		        
		</form>
		</div>
			</div>
			<br><br><br>
			<div class="col-md-6">
				<a href=" adminPage.php " class=" button"> <button type="button" onclick="alert('Are you Sure to Insert Details')">Insert</button> </a>   
			</div>
		</div>


		</div>
			</div>
			<br><br><br>
			<div class="col-md-8">
				<a href=" joinpage.php " class=" button"> <button type="button" onclick="alert('want to see joinpage Details')">join</button> </a>   
			</div>
		</div>


		<?php



		if(isset($_POST['join']))
		{
			
			header('location: joinpage.php');
		}
		elseif(isset($_POST['insert']))
		{
			
			header('location: adminPage.php');
		}
		elseif(isset($_POST['signOut']))
		{
			session_unset();
			header('refresh:0 URL=Page1.php');
		}
		elseif (isset($_POST['signIn']))
		{
			header('refresh:0 URL=signin.php');
		}
		?>

<?php

	$host="localhost";
	$username="root";
	$password="";
	$db_name="libr";

$connect=mysqli_connect($host,$username,$password,$db_name);

?>


<div class=welcome style="text-align:center;
					padding:5px;
					margin:auto;
					position:relative;
					top:0vh;
					box-shadow:0px 0px 5px black;
					border-radius:6px;
					text-shadow: :0px 0px 0px black;
					width:40vw;
					background-color:rgba(0,0,0,0);">
<br>Here are the books You added to your wishlist
</div>


<?php


$mail = $_SESSION['mail'];

	$table = mysqli_query($connect,"SELECT * FROM student_books");
	$numOfRows = mysqli_num_rows($table);
	$numOfFields = mysqli_num_fields($table);
	$colName = mysqli_query($connect,"SHOW COLUMNS FROM student_books");


//--------------------------------------------------------------------------------  PRINTING USER SPECIFIC TABLE
echo "<center><div class=table><table>";
	echo "<tr>";

while($colNameArr = mysqli_fetch_array($colName))
{
	echo "<th>".strtoupper($colNameArr[0])."</th>";
}
	echo "</tr>";

while($tableRow = mysqli_fetch_array($table))
{
	echo "<tr>";
	
	for($i=0;$i<$numOfFields;$i++)
	{
		echo "<td>".$tableRow[$i]."</td>";
	}
	echo "</tr>";
}

echo "</table></div></center>";
echo "<br><br><br><br><br><br><br>";

//--------------------------------------------------------------PRINTING BOOKINFO TABLE FOR USER'S CONVENIENCE

$table = mysqli_query($connect,"SELECT * FROM bookinfo");
$numOfRows = mysqli_num_rows($table);
$numOfFields = mysqli_num_fields($table);
$colName = mysqli_query($connect,"SHOW COLUMNS FROM bookinfo");

?>

<div class=welcome style="text-align:center;
					padding:5px;
					margin:auto;
					position:relative;
					top:0vh;
					box-shadow:0px 0px 5px black;
					border-radius:6px;
					text-shadow: :0px 0px 0px black;
					width:40vw;
					background-color:rgba(0,0,0,0);">
<br>books in library
</div>
<?php



//-------------------------------------------------------------PRINTING TABLE

echo "<center><div class=table><table>";
	echo "<tr>";

while($colNameArr = mysqli_fetch_array($colName))
{
	echo "<th>".strtoupper($colNameArr[0])."</th>";
}
	echo "</tr>";
while($tableRow = mysqli_fetch_array($table))
{
	echo "<tr>";
	for($i=0;$i<$numOfFields;$i++)
	{
		echo "<td>".$tableRow[$i]."</td>";
	}
	echo "</tr>";
}

echo "</table></div></center>";
echo "<br><br><br><br><br><br><br>";


//--------------------------------------------------------------------------ADDING BOOK TO WISHLIST


if(isset($_POST['srl']) )
	{
		$ser = $_POST['srl'];
     }


if (isset($_POST['submitSerial']) )
{

		$book=mysqli_query($connect,"SELECT * FROM bookinfo WHERE serial='$ser' ");
	$book=mysqli_fetch_array($book);


	if($book<=0 )
	{
		echo "<script> alert('Book unavailable in Library'); </script>";
	}


		$book1=mysqli_query($connect,"SELECT * FROM student_books WHERE serial='$ser' and mail='$mail' ");
	    $book2=mysqli_fetch_array($book1);

	    if($book2<=0 && $book>=1 && $book[3]>0 )
	     {
		     if(mysqli_query($connect,"INSERT INTO student_books VALUES('$book[0]','$book[1]','$book[2]','$mail')"))
		     {
		     	$book[3]=$book[3]-1;
			    echo "<script> alert('Added to Wishlist'); </script>";

			     $query="UPDATE bookinfo SET quantity = '$book[3]' WHERE serial='$ser'";

               $result=mysqli_query($connect,$query);

 				if($result)
 				echo "Record updated successfully";
 				else
 				echo "Record not updated,try again";
		     	header('location: userProf.php');
		     }
	     }	
    elseif($book2>=1 && $book[3]>0) echo "<script> alert('Already present in the Wishlist'); </script>";
     elseif($book[3]<=0) echo " <script> alert('not available');</script>";
}


if(isset($_POST['rmv']) )
	{
		$rmvSrl = $_POST['rmv'];
     }
if(isset($_POST['removeSerial']))
{

	// $rmvSrl=$_POST['rmv'];
	$book4=mysqli_query($connect,"SELECT * FROM bookinfo WHERE serial='$rmvSrl' ");
	$book4=mysqli_fetch_array($book4);
	$remove=mysqli_query($connect,"DELETE FROM student_books WHERE serial='$rmvSrl' and mail='$mail'");
	if($remove >0 && $book4[3]>0 )
	{
		$book4[3]=$book4[3]+1;
		echo "<script> alert('Book is removed from your Wishlist'); </script>";
		 $query="UPDATE bookinfo SET quantity = '$book4[3]' WHERE serial='$rmvSrl'";

               $result=mysqli_query($connect,$query);

 				if($result)
 				echo "Record updated successfully";
 				else
 				echo "Record not updated,try again";
		// header('refresh:0');
			header('location: userProf.php');
	}
	elseif($book4[3]<=0) echo "<script> alert('not available :'); </script>";
	else echo "<script> alert('Book is not present in your Wishlist'); </script>";
}

?>

<div class=frm style="position:fixed; top:25vh; left:10px; padding:20px; width:300px; " >
<form method=post action="userProf.php">
<center>
You can add books to your Wishlist<br><br>
<input style="width:205px;" type=text name=srl placeholder="Fill in Serial Number"><br><br>

 <!--  <a href="update.php"><button>update</button></a> -->

  	<!-- <td><a href="update.php?Serial ='.$row['$ser'].'&quantity='.$row['book[3]'].' "><button>update</button></a></td>		 -->

<input class=button type=submit name="submitSerial" value="Add to Wishlist"><br><br>
Or you can remove them<br><br>
<input style="width:250px;" type=text name=rmv placeholder="Serial Number to remove"><br><br>
 <!-- <a href="update.php"><button>update</button></a> -->


  	<!-- <td><a href="update.php?Serial ='.$row['$ser'].'&quantity='.$row['book[3]'].'"><button>update</button></a></td> -->

<input class=button type=submit name=removeSerial value="Remove from Wishlist">
</center>
</form>
</div>
</body>
</html>
