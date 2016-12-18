<!DOCTYPE html>
<html>
	<head>
	<title>Employee Search</title>
	</head>

<body>

<?php
  $host="localhost";
  $user="root";
  $pw="root";
  $db="company";

  $con = new mysqli ($host, $user, $pw, $db);

  $query="SELECT ssn FROM employee";
  $result=$con->query($query);
  $rows=$result->num_rows;

  echo "There are $rows employees.";

?>

<h4>Employee Details for: </h4>
<form method="post" action="empView.php">
	<select name="ssn">

		<?php
  
		while ($ssn = $result->fetch_assoc()) {
			echo "<option>", $ssn['ssn'];
		}
		?>

	</select>

	<input type="submit" value="Get Employee Details">
</form>

</body>
</html>
