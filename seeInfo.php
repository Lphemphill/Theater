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
		$username = $_GET['username'];

	  $host="localhost";
	  $user="root";
	  $pw="root";
	  $db="theater";

	  $con = new mysqli ($host, $user, $pw, $db);

	  $query="SELECT * FROM member where username = '$username'";
	  $result=$con->query($query);
	  $rows = $result->fetch_assoc();

	  $con->close();

	  $firstname=$rows['first_name'];
  	  $lastname=$rows['last_name'];
  	  $email=$rows['email'];
  	  $phone_num=$rows['phone_num'];
  	  $reward_points=$rows['reward_points'];
  	  $saved_credit_card=$rows['saved_credit_card'];
  	  $reward_points = $rows['reward_points'];
	?>

<h4>Member Information: </h4>
    <form name="addform" action="updateInfo.php" method="post">
	
		<table width="60%" border="0" cellpadding="3" cellspacing="12">

		
		
		<tr>
			<td width="130"><strong>First Name* : </strong>*</td>
			<td><input name="fname" type="text" size="30" maxlength="30" value = "<?php echo $firstname; ?>"/></td>
		</tr>
    	
		<tr>
			<td width="130"><strong>Last Name* :</strong>*</td>
			<td><input name="lname" type="text" size="30" maxlength="30" value = "<?php echo $lastname; ?>"/></td>
		</tr>

		<tr>
			<td width="130"><strong>Phone Number :</strong></td>
			<td><input name="phone_num" type="text" size="30" maxlength="30" value = "<?php echo $phone_num; ?>"/></td>
		</tr>

		<tr>
			<td width="130"><strong>Email :</strong></td>
			<td><input name="email" type="text" size="30" maxlength="30" value = "<?php echo $email; ?>"/></td>
		</tr>
		
		<tr>
			<td width="130"><strong>Credit Card Number :</strong></td>
			<td><input name="saved_credit_card" type="text" size="30" maxlength="30" value = "<?php echo $saved_credit_card; ?>"/></td>
		</tr>

		<tr>
			<td width="130"><strong>Username :</strong></td>
			<td><input name="username" type="text" size="30" maxlength="30" value = "<?php echo $username; ?>" readonly/></td>
		</tr> 

		<tr>
			<td width="130"><strong>Reward Points :</strong></td>
			<td><input name="reward_points" type="text" size="30" maxlength="30" value = "<?php echo $reward_points; ?>" readonly/></td>
		</tr>     
 
		<tr>
			<td width="130"><strong>Update Info :</strong></td>
			<td><input type="submit" name="Update" value="Submit" /></td>
		</tr>
		
		</table>
	</form>

</body>
</html>
