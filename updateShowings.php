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
	<title>Update Showings</title>
	</head>
<body>

<h4>Update Showings</h4>

<?php
	$host="localhost";
	$user="root";
	$pw="root";
	$db="theater";
  
	$con = new mysqli ($host, $user, $pw, $db);

	 
	$movie_name = $_POST["movie_name"]; 
	$price = $_POST["price"]; 
	$theater_num = $_POST["theater_num"];
	$showtime = $_POST["showtime"];
	

	if ($movie_name == "" || is_null($price) || is_null($theater_num) || $showtime == ""){
		echo "Please fill in all fields with asterisk.";
	}
	else {
		$query="insert into showings values('$showtime', $theater_num, '$movie_name', $price, 0)";

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
