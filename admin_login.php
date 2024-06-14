<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
	body {
		background-image: url('sarah-dorweiler-x2Tmfd1-SgA-unsplash.jpg');
	    background-size: 100% 250%;
		background-color:lightblue;
	}
</style>	
</head>
<body>
	<center><br><br><br><br>
		<h2 style="font-size:31px;">Admin Login Page</h2><br>
		<form action="" method="post">
			<body style="font-size:19px;" >Email ID  : <input style="font-size:18px;"  type="text" name="email" required><br><br>
			<body style="font-size:19px;">Password  : <input style="font-size:18px;" type="password" name="password" required><br><br>
			<input style="font-size:19px;" type="submit" name="submit" value="Login"></body>
		</form><br>
		
		<?php
			session_start();
			if(isset($_POST['submit'])){
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from login where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if($row['email'] == $_POST['email']){
						if($row['password'] == $_POST['password']){
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: admin_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
				}
				
			}
		?>
	</center>
</body>
</html>