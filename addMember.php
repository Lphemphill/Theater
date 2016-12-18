<!DOCTYPE html>
<html>
	<head>
	<title>Add Member</title>
	</head>
<body>

<h4>Member Information</h4>

<?php
	$host="localhost";
	$user="root";
	$pw="root";
	$db="theater";
  
	$con = new mysqli ($host, $user, $pw, $db);

	 
	$fname = $_POST["fname"]; 
	$lname = $_POST["lname"]; 
	$phone_num = $_POST["phone_num"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$saved_credit_card = $_POST["saved_credit_card"];
	
	

	$query="SELECT * FROM member where username='$username'";
	$result=$con->query($query);
	$rows=$result->num_rows;

	if ($rows >= 1) {
		echo "The username already exists.";
	}
	else if ($fname == "" || $lname == "" || $username == "" || $password == ""){
		echo "Please fill in all fields with asterisk.";
	}
	else {

		$query="INSERT INTO member 
		(first_name, last_name, phone_num, email, reward_points, saved_credit_card, username, password, usergroup) 
		VALUES ('$fname', '$lname', '$phone_num', '$email', '0', '$saved_credit_card', '$username', '$password', 'C')";

		$result=$con->query($query);

    
		if ($result) { echo "Data successfully added."; }
		else { echo "Error inserting data."; }
	}
	$con->close();
?>


</body>
</html>
