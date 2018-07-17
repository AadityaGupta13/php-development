<?php session_start(); ?>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
	<?php 
	if(isset($_SESSION['username'])) {
		echo "<h2>Welcome ".$_SESSION['username']."!! </h2>";
		?>
		<a href="logout.php">Logout</a>
		<?php
	}
	else{
		header("location:login.php");
	}
		?>
		
	</div>
	<div class="main">
		<?php 
			require "connect.php";
			$records = mysqli_query($con,'SELECT * FROM data_tb');
			?><table id="datatb">
			<?php
			while($col=mysqli_fetch_field($records)){
				?>
	<th><?php echo $col->name;?></th>
		<?php
		}
		?>
		<tbody>
		<?php
		while($record = mysqli_fetch_object($records)){
		?>
			<tr>
				<td><?php echo $record->id;?></td>	
				<td><?php echo $record->firstname;?></td>
				<td><?php echo $record->lastname;?></td>
				<td><?php echo $record->email;?></td>
				<td><?php echo $record->address;?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
	</div>
	<div class="footer">
	
	</div>
</body>
</html>