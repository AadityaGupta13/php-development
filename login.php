<?php 
session_start();
if(isset($_SESSION['name'])) {
	header("location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Login</h2>
		<form id="login-form" method="POST">
			<?php 
				if(isset($_POST['submit'])){
					$name = $_POST['uname'];
					$pass = $_POST['pass'];

					require "connect.php" ;
					$records = mysqli_query($con,"SELECT * FROM user_tb WHERE username='$name' AND password='$pass'");

					if(mysqli_num_rows($records)==1){

						$record = mysqli_fetch_assoc($records);
						$_SESSION['id'] = $record['id'];
						$_SESSION['username'] = $record['username'];
						$_SESSION['email'] = $record['email'];
						
						#redirect to home after verifying user
						header("location:home.php");
					}
					else{
						?>
						<div class="message warning">Username and Password combination is incorrect!</div>
						<?php
					}
				}
			?>
			<table>
				<tr>
					<td>Username:</td>					
					<td><input type="text" name="uname"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="pass"></td>	
				</tr>
				<tr>
					<td></td>
					<td><a href="">forgot username or password</a></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>