<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
	</style>
	<?php
		session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>
<body style="background-color:hsla(9, 100%, 64%, 0.5);">
	<div id="header"><br>
		<center>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email : <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name :<?php echo $_SESSION['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="logout.php">Logout</a>
		</center>
	</div>
	<span id="top_span"><marquee>Note:- This portal is open till 31 December 2021...Plz edit your information, if wrong.</marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
		
			<table>
				<tr>
					<td>
						<input style="font-size:18px;"  type="submit" name="edit_detail" value="Edit Detail">
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;"  type="submit" name="show_detail" value="Show Detail">
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;"  type="submit" name="Exam_Registration" value="Exam Registration">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
			<?php
			if(isset($_POST['show_detail']))
			{
				$query = "select * from students where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
				<table><h4><b><u> Show Student Details</u></b></h4><br>
					<tr>
						<td>
							<b>Roll No :</b>
						</td> 
						<td>
							<input style="font-size:17px;" type="text" value="<?php echo $row['roll_no']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Name :</b>
						</td> 
						<td>
							<input style="font-size:17px;" type="text" value="<?php echo $row['name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Father's Name :</b>
						</td> 
						<td>
							<input style="font-size:17px;" type="text" value="<?php echo $row['father_name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Class :</b>
						</td> 
						<td>
							<input style="font-size:17px;"type="text" value="<?php echo $row['class']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Mobile :</b>
						</td> 
						<td>
							<input style="font-size:17px;"  type="text" value="<?php echo $row['mobile']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Email :</b>
						</td> 
						<td>
							<input style="font-size:17px;" type="text" value="<?php echo $row['email']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Password :</b>
						</td> 
						<td>
							<input style="font-size:17px;" type="password" value="<?php echo $row['password']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Remark :</b>
						</td> 
						<td>
							<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
						</td>
					</tr>
				</table>
				<?php
				}	
			}
			?>

			<?php
			if(isset($_POST['edit_detail']))
			{
				$query = "select * from students where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="edit_student.php" method="post">
						<table><h4><b><u> Edit Student Details</u></b></h4><br>
						<tr>
							<td>
								<b>Roll No :</b>
							</td> 
							<td>
								<input style="font-size:17px;"type="text" name="roll_no" value="<?php echo $row['roll_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name :</b>
							</td> 
							<td>
								<input style="font-size:17px;"type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name :</b>
							</td> 
							<td>
								<input style="font-size:17px;" type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class :</b>
							</td> 
							<td>
								<input style="font-size:17px;" type="text" name="class" value="<?php echo $row['class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile :</b>
							</td> 
							<td>
								<input style="font-size:17px;" type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email :</b>
							</td> 
							<td>
								<input style="font-size:17px;" type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password :</b>
							</td> 
							<td>
								<input style="font-size:17px;"type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark :</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input style="font-size:17px;"type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
			?>
			<?php 
				if(isset($_POST['Exam_Registration'])){
					?>
					<table><h4><b><u> Exam Registration</u></b></h4><br>
					<h4>Fill the given details</h4><br>
					<form action="Registration.php" method="post">
						<table>
						
						<tr>
							<td>
								<b>Course Id :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="course_id" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Course Name:</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="course_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Sport Id :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="sport_id" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Sport Name:</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="sport_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Fees Payyment Type:</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="fees_paymenttype" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Account No.:</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="account_no." required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Pin No.:</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="pin_no." required>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><br><input style= "font-size:17px;"type="submit" name="Exam_Registration" value="Exam_Registration"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
		</div>
	</div>
</body>
</html>