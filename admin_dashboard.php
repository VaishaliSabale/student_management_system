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
			width: 10%;
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
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}
	</style>
	<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>
<body style="background-color:powderblue;">
	<div id="header"><br>
	<body style="background-color:powderblue;">
		<center>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name : <?php echo $_SESSION['name'];?> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp	<a href="logout.php">Logout</a>
		</center>
	</div>
	<span id="top_span"><marquee>Note:- This portal is open till 31 December 2021...Plz edit your information, if wrong.</marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<input style="font-size:18px;" type="submit" name="search_student" value="Search Student"><br>
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;" type="submit" name="edit_student" value="Edit Student"><br>
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;" type="submit" name="add_new_student" value="Add New Student"><br>
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;" type="submit" name="delete_student" value="Delete Student"><br>
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;" type="submit" name="add_course" value="Add Course"><br>
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;" type="submit" name="add_sport" value="Add Sport"><br>
					</td>
				</tr>
				<tr>
					<td>
						<br><input style="font-size:18px;" type="submit" name="show teacher" value="Show Teachers"><br>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<body style="background-color:powderblue;">
	<div id="right_side"><br><br>
		<div id="demo">
		<!-- #Code for search student---Start-->
			<?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<h4><b><u>Search    Student</u></b></h4><br><br><b style="font-size:21px;">Enter Roll No :</b>&nbsp;&nbsp; <input style="font-size:19px;" type="text" name="roll_no">
					<input style="font-size:19px;" type="submit" name="search_by_roll_no_for_search" value="Search">
					</form><br><br>
					<h4><b><u>Student's details</u></b></h4><br><br>
					</center>
					<?php
				}
				if(isset($_POST['search_by_roll_no_for_search']))
				{
					$query = "select * from students where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<table><h4><b><u> Search Student Details</u></b></h4><br>
							<tr>
								<td>
									<b> Roll No :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="text" value="<?php echo $row['roll_no']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b> Name :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="text" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>  
									<b> Father's Name :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="text" value="<?php echo $row['father_name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b> Class :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="text" value="<?php echo $row['class']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b> Mobile :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="text" value="<?php echo $row['mobile']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b> Email :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b> Password :</b>
								</td> 
								<td>
									<input style="font-size:17px;"type="password" value="<?php echo $row['password']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b> Remark :</b>
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
		<!-- #Code for edit student details---Start-->
		<?php
			if(isset($_POST['edit_student']))
			{
				?>
				<center>
				<form action="" method="post">
				&nbsp;&nbsp;<h4><b><u>Edit    Student</u></b></h4><br><b style="font-size:21px;">Enter Roll No :</b>&nbsp;&nbsp; <input style="font-size:19px;" type="text" name="roll_no">
				<input style="font-size:19px;" type="submit" name="search_by_roll_no_for_edit" value="Search">
				</form><br><br>
				<h4><b><u>Student's details</u></b></h4><br><br>
				</center>
				<?php
			}
			if(isset($_POST['search_by_roll_no_for_edit']))
			{
				$query = "select * from students where roll_no = $_POST[roll_no]";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="admin_edit_student.php" method="post">
						<table><h4><b><u> Edit Student Details</u></b></h4><br>
						<tr>
							<td>
								<b>Roll No : </b>
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
								<input  style="font-size:17px;"type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name :</b>
							</td> 
							<td>
								<input  style="font-size:17px;"type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class :</b>
							</td> 
							<td>
								<input  style="font-size:17px;" type="text" name="class" value="<?php echo $row['class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile :</b>
							</td> 
							<td>
								<input  style="font-size:17px;"type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email :</b>
							</td> 
							<td>
								<input  style="font-size:17px;"type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input  style="font-size:17px;"type="password" name="password" value="<?php echo $row['password']?>">
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
								<input  style="font-size:17px;" type="submit" name="edit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
		?>
		<!-- #Code for Delete student details---Start-->
		<?php
			if(isset($_POST['delete_student']))
			{
				?>
				<center>
				<form action="delete_student.php" method="post">
				&nbsp;&nbsp;<h4><b><u>Delete   Student</u></b></h4><br><b style="font-size:21px;">Enter Roll No :</b>&nbsp;&nbsp; <input style="font-size:19px;" type="text" name="roll_no">
				<input style= "font-size:19px;"type="submit" name="search_by_roll_no_for_delete" value="Delete">
				</form><br><br>
				</center>
				<?php
			}
			?>

			<?php 
				if(isset($_POST['add_new_student'])){
					?>
					<table><h4><b><u> ADD New Student </u></b></h4><br>
					<h4>Fill the given details</h4>
					<form action="add_student.php" method="post">
						<table>
						<tr>
							<td>
								<b>Roll No :</b>
							</td> 
							<td>
								<input style= "font-size:17px;" type="text" name="roll_no" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name :</b>
							</td> 
							<td>
								<input style= "font-size:17px;" type="text" name="name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="father_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Class :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="class" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="mobile" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark :</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" placeholder="Optional" name="remark"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input style= "font-size:17px;"type="submit" name="add" value="Add Student"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			<?php 
				if(isset($_POST['add_course'])){
					?>
					<table><h4><b><u> Add Course </u></b></h4><br>
					<h4>Fill the given details</h4><br>
					<form action="add_course.php" method="post">
						<table>
						<tr>
							<td>
								<b>Course Id :</b>
							</td> 
							<td>
								<input style= "font-size:17px;" type="text" name="course_id" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Course Name :</b>
							</td> 
							<td>
								<input style= "font-size:17px;" type="text" name="course_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Course Type :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="course_type" required>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><br><input style= "font-size:17px;"type="submit" name="add" value="Add Course"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			<?php 
				if(isset($_POST['add_sport'])){
					?>
					<table><h4><b><u> Add Sport </u></b></h4><br>
					<h4>Fill the given details</h4><br>
					<form action="add_sport.php" method="post">
						<table>
						<tr>
							<td>
								<b>Sport Id :</b>
							</td> 
							<td>
								<input style= "font-size:17px;" type="text" name="sport_id" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Sport Name :</b>
							</td> 
							<td>
								<input style= "font-size:17px;" type="text" name="sport_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Sport Type :</b>
							</td> 
							<td>
								<input style= "font-size:17px;"type="text" name="sport_type" required>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><br><input style= "font-size:17px;"type="submit" name="add" value="Add Sport"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			
			<?php
				if(isset($_POST['show_teacher']))
				{
					?>
					<center>
						<h5>Teacher's Details</h5>
						<table>
							<tr>
								<td id="td"><b>ID</b></td>
								<td id="td"><b>Name</b></td>
								<td id="td"><b>Mobile</b></td>
								<td id="td"><b>Courses</b></td>
								<td id="td"><b>View Detail</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from teachers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td id="td"><?php echo $row['t_id']?></td>
								<td id="td"><?php echo $row['name']?></td>
								<td id="td"><?php echo $row['mobile']?></td>
								<td id="td"><?php echo $row['courses']?></td>
								<td id="td"><a href="#">View</a></td>
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>