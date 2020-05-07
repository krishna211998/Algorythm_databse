<?php session_start(); error_reporting(0); ?>
<html>
<title>Book Info</title>
<h3>BOOKS IN LIBRARY</h3>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/DSW PROJ/CSSstylesheet.css">
</head>
<body>

		<div class="col-md-6">
		    <div class=navbar>
		<!-- <a href="http://localhost/DSW PROJ/Page1.php"><img src="http://localhost/DSW PROJ/home3.png" style="position:relative; left:7px; top:7px; align:center; width:40px; height:40px;"></a> -->
		<form action="bookinfo.php" method=post style="position:fixed; top:0px; right:5px;" >
		        
		<?php if(!is_null($_SESSION['mail'])) echo "<input style='float:right; padding:10px; height:45px;' type=submit class=button name=signOut value='Sign Out'>"; ?>         
		</form>
		</div>

			</div>
			</div>
			<br><br><br>
			<div class="col-md-6">
				<a href=" signin.php " class=" button"> <button type="button" onclick="alert('Go in signin page??')">signIN</button> </a>   
			</div>
		</div>
			
		<?php

		if(isset($_POST['signOut']))
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
	
$connect= mysqli_connect($host,$username,$password,$db_name);
if(!$connect)
{
	echo "<script type='text/javascript'>alert(' Can't connect to the Database ');	</script>";
}

$table = mysqli_query($connect,"SELECT * FROM bookinfo");
$numOfRows = mysqli_num_rows($table);
$numOfFields = mysqli_num_fields($table);
$colName = mysqli_query($connect,"SHOW COLUMNS FROM bookinfo");



echo "<div style='text-align:center;
					margin:auto;
					position:relative;
					top:11vh;
					box-shadow:0px 0px 0px black;
					border-radius:6px;
					text-shadow:0px 0px 0px black;
					width:20vw;
					background-color:rgba(0,0,0,0);'>
					</div>";

//--------------------------------------------------------------------------------  PRINTING TABLE
echo "<center><form action='bookinfo.php' method=post><div class=table><table>";
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
echo "</table></div></form></center>";
echo "<br><br><br><br><br><br><br>";

?>

</body>
</html>