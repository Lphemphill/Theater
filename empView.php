<!DOCTYPE html>
<html>
	<head>
	<title>View Employee Details</title>
	</head>

<body>
<h4>Employee Information</h4>

<?php
  $host="localhost";
  $user="root";
  $pw="root";
  $db="company";

  $con = new mysqli ($host, $user, $pw, $db);

  $essn=$_POST["ssn"];
    
  $query="SELECT * FROM employee where ssn=$essn";
  $result=$con->query($query);
  $rows=$result->num_rows;
  

  if ($rows == 1) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr> 
			<th> SSN </th>
       	    <th> First Name</th>
			<th> Last Name</th>
			<th> Address </th>
			<th> Salary </th> 
		 </tr>";
   
     while ($row = $result->fetch_assoc()) {
       print "<tr>";
       print "<td>".$row['ssn']."</td>";
       print "<td>".$row['fname']."</td>";
       print "<td>".$row['lname']."</td>";
       print "<td>".$row['address']."</td>";
       print "<td>".$row['salary']."</td>";
       print "</tr>";
     }
     echo "</table>";
   }
   else {
     echo "No employee with the ssn.";
   }

?>


</body>
</html>
