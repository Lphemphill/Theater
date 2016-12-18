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
<title>Showings</title>
</head>

<body>

<?php
  $host="localhost";
  $user="root";
  $pw="root";
  $db="theater";

  
   //$name = $_GET['name'];
   //$name = "Down";
   
  $con = new mysqli ($host, $user, $pw, $db);
  $name = $_POST["username"]; 
  if ($con->connect_error) {
     die('Error : ('. $con->connect_errno .') '. $con->connect_error);
  }

  
  $query="SELECT * FROM showings where movie_name='$name'"; // add order by statement
  $result=$con->query($query);
  
  $row = $result->fetch_assoc();
  //echo $row['price'];
  
?>

<h4>Showings</h4>
<table border="2" cellspacing="2" cellpadding="2">
  <tr>
    <th><font face="Arial, Helvetica, sans-serif">
  Movie Name</font></th>
    <th><font face="Arial, Helvetica, sans-serif">
Showtime</font></th>
    <th><font face="Arial, Helvetica, sans-serif">
Theater Number</font></th>
    <th><font face="Arial, Helvetica, sans-serif">
Price</font></th>
  </tr>
  

<?php
    
  while ($row = $result->fetch_assoc()) {
$showtime = $row["showtime"];
$theater_num = $row["theater_num"];
$price = $row["price"];
  $name = $row["movie_name"];

echo '<tr>';
  echo '<td>'. $name .'</td>';
echo '<td>'. $showtime .'</td>';
    echo '<td>'. $theater_num .'</td>';
    echo '<td>'. $price .'</td>';
    echo '</tr>';
    
 }

echo '</table>';

$result->free();
$con->close();

?>


</body>
</html>
