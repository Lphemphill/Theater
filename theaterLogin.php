<!DOCTYPE html>
<html>
	<head>
	<title>Login</title>
	</head>

<body>

<h4>Member Login</h4>

<?php
  $host="localhost";
  $user="root";
  $pw="root";
  $db="theater";

  $con = new mysqli ($host, $user, $pw, $db);
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $query="SELECT usergroup FROM member where username = '$username' and password = '$password'";
  $result=$con->query($query);

  $con->close();

  $rows=$result->num_rows;
  $usergroup=($result->fetch_assoc())['usergroup'];

  if($rows == 1){

    session_start();
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION['sid'] = session_id();

  	echo "You are logged in as $username.";
    header ('Location: http://localhost/memberView.php?username=' . urlencode($_POST["username"]));
  }
  else{
  	echo "Invalid username or password.";
  }
?>

</body>
</html>
