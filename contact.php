
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<form method="POST">
			<h2>Contact</h2>
			<table>
			<?php 
				if(isset($_POST['submit'])){

					$uname = $_POST['uname'];
					$mail = $_POST['email'];
					$mob = $_POST['mobile'];
					$msg = $_POST['message'];

					#connect to db
					require("connect.php");
					
					#insert data to contact table
					mysqli_query($con,"INSERT INTO contact_tb (username,email,mobile,message)
						 VALUES('$uname','$mail',$mob,'$msg') ");

					if(mysqli_affected_rows($con)){
						?>
						<div class="message success">Record added successfuly</div>
					<?php
					}
					else{
						?>
						<div class="message warning">Could not add the record. Try again.</div>
					<?php
					}
				}
			 ?>
				<tr>
					<td><label for="uname">Name:* </label></td>
					<td><input type="text" name="uname" id="uname" required></td>	
				</tr>
				<tr>
					<td><label for="email">Email:* </label></td>
					<td><input type="text" name="email" id="email" required></td>	
				</tr>
				<tr>
					<td><label for="mobile">Mobile:* </label></td>
					<td><input type="text" name="mobile" id="mobile" required></td>	
				</tr>
				<tr>
					<td><label for="message">Message:* </label></td>
					<td><textarea name="message" id="message" required></textarea></td>	
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Send"></td>	
				</tr>
			</table>
					
		</form>
	</div>
</body>
</html>