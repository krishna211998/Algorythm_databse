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
 $connect = mysqli_connect("localhost", "root", "", "libr");  
$qry="SELECT s.finame,s.laname, s.phone,s.dept, p.serial, p.title ,p.author,p.mail FROM userinfo s INNER JOIN student_books p on s.mail = p.mail INNER join bookinfo b on b.serial=p.serial";


 $result = mysqli_query($connect, $qry);
 echo '<table style="border-style:solid;">;
 <tr>
 <tr>
 <th> finame</th>
  <th> laname</th>
   <th> phone</th>
    <th> dept</th>
    <th> serial</th>
     <th> title</th>
      <th> author</th>
       <th> mail</th>
      <th>Delete</th>
        
      		</tr>';

 while ($row=mysqli_fetch_assoc($result))
 	{
 			echo '<tr>
 			<td>' .$row['finame'].'</td>
 			<td>' .$row['laname'].'</td>
 			<td>' .$row['phone'].'</td>
      <td>' .$row['dept'].'</td>
 			<td>' .$row['serial'].'</td>
 			<td>' .$row['title'].'</td>
 			<td>' .$row['author'].'</td>
 			<td>' .$row['mail'].'</td>

 			<td><a href="delete.php?mail='.$row['mail'].'">Delete</td>


 			</tr>';
 	}
 	
 	
  echo '</table>';
  ?>  

  <a href="userProf.php"><button>Back</button></a>

   <a href="signup.php"><button> SignUp</button></a>
 </body>
 </html>


