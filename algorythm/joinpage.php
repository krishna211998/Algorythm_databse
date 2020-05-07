 <!DOCTYPE html>
 <html>
 <head>
 	<title> Result</title>
 	<style type="text/css">
 		th,td{
 			border: 2px solid black;

 		}
 	</style>
 </head>
 <body>
 		
      	 <h1> Result after join operation </h1>
      	  <?php  
 $connect = mysqli_connect("localhost", "root", "", "algorythm");  
$qry="SELECT s.username,s.name, s.department, p.game_name, p.game_type ,p.game_code FROM student_page s INNER JOIN participation p on s.username = p.username";



 $result = mysqli_query($connect, $qry);
 echo '<table style="border-style:solid;">;
 <tr>
 <tr>
 <th> username</th>
  <th> name</th>
   <th> department</th>
    <th> game_name</th>
     <th> game_type</th>
      <th> game_code</th>
      <th>Delete</th>
        
      		</tr>';

 while ($row=mysqli_fetch_assoc($result))
 	{
 			echo '<tr>
 			<td>' .$row['username'].'</td>
 			<td>' .$row['name'].'</td>
 			<td>' .$row['department'].'</td>
 			<td>' .$row['game_name'].'</td>
 			<td>' .$row['game_type'].'</td>
 			<td>' .$row['game_code'].'</td>
 			
 			<td><a href="delete.php?username='.$row['username'].'&game_code='.$row['game_code'].'">Delete</td>

 			</tr>';
 	}
 	
 	
 	echo '</table>';
  ?>  
  <a href="logout.php"><button>Louout</button></a>
 </body>
 </html>


