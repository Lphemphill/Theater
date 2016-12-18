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
	<title>Update Info</title>
	</head>
<body>

<h4>Update Member Info</h4>

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
	$saved_credit_card = $_POST["saved_credit_card"];
	$username = $_POST["username"];
	

	$query="SELECT * FROM member where username='$username'";
	$result=$con->query($query);
	$rows=$result->num_rows;

	if ($fname == "" || $lname == ""){
		echo "Please fill in all fields with asterisk.";
	}
	else {

		$query="update member set first_name = '$fname', last_name = '$lname', phone_num = $phone_num, email = '$email', saved_credit_card = $saved_credit_card where username = '$username'";

		$result=$con->query($query);

    
		if ($result) { echo "Data successfully updated."; }
		else { echo "Error updating data."; }
	}
	$con->close();
?>

	<button onclick="goBack()">Back</button>

	<script>
	function goBack() {
	    window.history.back();
	}
	</script>


</body>
</html>
