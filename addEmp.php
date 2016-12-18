<!DOCTYPE html>
<html>
	<head>
	<title>Add Employee</title>
	</head>
<body>

<h4>Employee Information</h4>

<?php
	$host="localhost";
	$user="root";
	$pw="root";
	$db="company";
  
	$con = new mysqli ($host, $user, $pw, $db);

	$ssn = $con->real_escape_string($_POST["ssn"]);  
	$fname = $con->real_escape_string($_POST["fname"]); 
	$init = $con->real_escape_string($_POST["minit"]); 
	$lname = $con->real_escape_string($_POST["lname"]); 
	$address = $con->real_escape_string($_POST["address"]);
	$sal = $con->real_escape_string($_POST["salary"]);

	$query="SELECT * FROM employee where ssn=$ssn";
	$result=$con->query($query);
	$rows=$result->num_rows;

	if ($rows == 1) {
		echo "The ssn exists in the employee table.";
	}
	else {

		$query="INSERT INTO employee (ssn, fname, minit, lname, address, salary) VALUES ('$ssn', '$fname', '$init', '$lname', '$address', '$sal')";

		$result=$con->query($query);

    
		if ($result) { echo "Data successfully added."; }
		else { echo "Error inserting data."; }
	}
	$con->close();
?>


</body>
</html>
