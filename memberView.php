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
<title>Home Page</title>
</head>

<body>

<?php
  $host="localhost";
  $user="root";
  $pw="root";
  $db="theater";

  $username=$_GET['username'];
  
  $con = new mysqli ($host, $user, $pw, $db);

  if ($con->connect_error) {
     die('Error : ('. $con->connect_errno .') '. $con->connect_error);
  }
  
  $query="SELECT * FROM 
  member where username='$username'";
  $result=$con->query($query);
  $row = $result->fetch_assoc();
  $usergroup = $row["usergroup"];

  echo '<h4>Home Page</h4>';
  echo '<td>Usergroup: </b>'.$row["usergroup"].'<br/>';
  echo '<td>Name: </b>'. $row["first_name"] .' '.$row["last_name"] . '<tbr/>';
  echo '<h4>Options: </h4>';  
  echo '<td><a href="SearchMovie.php?username='.$username. '">' ."View Showings". '</a><br>';
  echo '<td><a href="seeInfo.php?username='.$username. '">' ."View Account". '</a><br>';

  if ($usergroup== 'E'){
      

  }else if ($usergroup== 'M'){
      echo '<td><a href="scheduleShowings.php?username='.$username. '">' ."Schedule Showings". '</a><br>';
  }

    echo "Click <a href='logout.php'>here</a> to logout.";

$result->free();
$con->close();

?>

</body>
</html>
