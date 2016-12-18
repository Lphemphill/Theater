<?php
  session_start();
  if(session_id() != $_SESSION['sid']){
    echo('You are not logged in.');
    header ('Location: http://localhost/theaterLogin.html');
  }

?>

<!DOCTYPE html>
<html>
	<head>
	<title>See Info</title>
	</head>

<body>
	<?php
      $username = $_POST['username'];

	  $host="localhost";
	  $user="root";
	  $pw="root";
	  $db="theater";

	  $con = new mysqli ($host, $user, $pw, $db);

	  $query="SELECT usergroup FROM member where username = '$username'";
	  $result=$con->query($query);
	  $usergroup = $result->fetch_assoc()["usergroup"];

	  $con->close();

	  if($usergroup != 'M'){
	  	//redirect to login page?
	  }
	?>

<h4>Schedule New Showing: </h4>
    <form name="addform" action="updateShowings.php" method="post">
	
		<table width="60%" border="0" cellpadding="3" cellspacing="12">
		
		<tr>
			<td width="130"><strong>Movie Name* : </strong></td>
			<td><input name="movie_name" type="text" size="30" maxlength="30"/></td>
		</tr>
    	 
    	<tr>
			<td width="130"><strong>Datetime* (format: XXXX-XX-XX XX:XX:XX) : </strong></td>
			<td><input name="showtime" type="text" size="19" maxlength="19"/></td>
		</tr>

		<tr>
			<td width="130"><strong>Theater Number* : </strong></td>
			<td><input name="theater_num" type="text" size="2" maxlength="2"/></td>
		</tr>

		<tr>
			<td width="130"><strong>Price* : </strong></td>
			<td><input name="price" type="text" size="3" maxlength="3"/></td>
		</tr>
 
		<tr>
			<td width="130"></td>
			<td><input type="reset" name="Reset" value="Reset" />
       
			<input type="submit" name="Submit" value="Submit" /></td>
		</tr>
		
		</table>
	</form>

</body>
</html>
