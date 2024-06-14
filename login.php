<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
	body {
		background-image: url(''wallpaper.jpg'');
	    background-size: 50% 330%;
		background-color: lightblue;
	}	
</style>
</head>
<body>
	<center><br><br><br><br>
	<h1> STUDENT MANAGEMENT SYSTEM</h1><br>
	<form action="" method="POST"><br>
		<input style="font-size:20px;" type="submit" name="admin_login" value="Admin Login" required>
		<input style="font-size:20px;" type="submit" name="student_login" value="Student Login" required>
	</form>
	<?php
		if(isset($_POST['admin_login'])){
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			header("Location: student_login.php");
		}
	?>
	</center>
</body>
</html>