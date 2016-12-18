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
    <title>SearchMovie</title>
  </head>

  <body>

    <h2>Search Movie Showings</h2>
    
    <form name="addform" action="showings.php" method="post">
	
		<table width="60%" border="0" cellpadding="3" cellspacing="12">

		<tr>
			<td width="130"><strong>Enter Movie Name </strong></td>
			<td><input name="username" type="text" size="30" maxlength="30" /></td>
		</tr>
		
		
 
		<tr>
			<td width="130"></td>
			<td>
       
			<input type="submit" name="Submit" value="Submit" /></td>
		</tr>
		
		</table>
	</form>
  </body>
 </html>
