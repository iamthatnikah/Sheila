<!Doctype html>
<html lang="en">
<?php include 'include/Head.php';
if (!isset($_SESSION['User_Id'])) {
	header('Location: include/Login.php');
}
?>
	<body>
		<!--Aside Bar-->
		<?php include 'include/Aside.php';?>
		<!--Main-Content-Header Section-->
		<?php include 'include/Header.php';?>
		<section class="main-content">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Add Users</h5>
				</div>
				<div class="panel-body">
					<?php
					if (isset($_POST['Add'])) {
						$User_Image = $_FILES['User_Image']['name'];
						$User_Image_Temp = $_FILES['User_Image']['tmp_name'];


						$User_FirstName = $_POST['User_FirstName'];
						$User_LastName = $_POST['User_LastName'];
						$User_EmailAddress = $_POST['User_EmailAddress'];
						$User_Gender = $_POST['User_Gender'];
						$User_Branch = $_POST['User_Branch'];
						$User_Password = $_POST['User_Password'];
						$User_Status = $_POST['User_Status'];

						move_uploaded_file($User_Image_Temp, "Assets/img/Users/$User_Image");


						if ($User_FirstName == "" || empty($User_FirstName)) {
							echo "This field should not be empty.";
						} elseif ($User_LastName == "" || empty($User_LastName)){
							echo "This field should not be empty.";
						}elseif ($User_EmailAddress == "" || empty($User_EmailAddress)) {
							echo "This field should not be empty.";
						}elseif ($User_Branch == "" || empty($User_Branch)) {
							echo "This field should not be empty.";
						}else{
							$Query = "INSERT INTO Users (User_Id,User_FirstName,User_Password,User_EmailAddress,User_Branch,User_LastName,User_Image, User_Gender, User_Status)";
							$Query .= "VALUES(Null,'$User_FirstName','$User_Password','$User_EmailAddress','$User_Branch','$User_LastName','$User_Image','$User_Gender', 'Unapproved')";
							$Create_User = mysqli_query($connection, $Query);

							if (!$Create_User) {
								die('QUERY FAILED' . mysqli_error($connection));
							}
						}
						
					}?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>User Image</label>
							<br>
							<input class="form-control" type="file" name="User_Image" placeholder="User Image">
							<label>First Name</label>
							<input class="form-control" type="text" name="User_FirstName" placeholder="User FirstName" required>
							<label>Last Name</label>
							<input class="form-control" type="text" name="User_LastName" placeholder="User LastName" required>
							<label>Email Address</label>
							<input class="form-control" type="email" name="User_EmailAddress" placeholder="User EmailAddress" required>
							<label>Gender</label>
							<select class="form-control" type="text" name="User_Gender" placeholder="User Gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<label>Branch</label>
							<select class="form-control" type="text" name="User_Branch" placeholder="User Branch">
								<?php
									$query = "SELECT * FROM Branches";
									$All_Branches = mysqli_query($connection,$query);

									while($row = mysqli_fetch_assoc($All_Branches)) {
										$Branch_Id = $row['Branch_Id'];
										$Branch_Name = $row['Branch_Name'];
										$Branch_Location = $row['Branch_Location'];
										$Branch_Region = $row['Branch_Region'];

										echo "<option>";
										echo "{$Branch_Name}";
										echo "</option>";
									} 
									?>
								<!-- <option>Total Grace</option>
								<option>Greater Grace</option>
								<option>Grace Temple</option>
								<option>Grace Fountain</option>
								<option>Dominion Temple</option> -->
							</select>
							<label>Password</label>
							<input class="form-control" type="password" name="User_Password" placeholder="User Password">
						</div>
						<button name="Add" type="Submit" class="btn btn-primary">Add User</button>
					</form>
				</div>
			</div>
			<br>
			<br>
				<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Current Users</h5>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label style="font: 18px sans-serif;">User Accounts</label>
						<br>
						<?php
						$Query = "SELECT * FROM Users";
						$Select_Users = mysqli_query($connection, $Query);
						?>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Image</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Gender</th>
									<th>Branch</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
									<?php
									while($row = mysqli_fetch_assoc($Select_Users)) {
										$User_Id = $row['User_Id'];
										$User_Image = $row['User_Image'];
										$User_FirstName = $row['User_FirstName'];
										$User_LastName = $row['User_LastName'];
										$User_EmailAddress = $row['User_EmailAddress'];
										$User_Gender = $row['User_Gender'];
										$User_Branch = $row['User_Branch'];
										$User_Status = $row['User_Status'];

										echo "<tr>";
										echo "<td>{$User_Id}</td>";
										echo "<td><img class='img-responsive'; width='50px;' src='Assets/Img/Users/{$User_Image}'></td>";
										echo "<td>{$User_FirstName}</td>";
										echo "<td>{$User_LastName}</td>";
										echo "<td>{$User_EmailAddress}</td>";
										echo "<td>{$User_Gender}</td>";
										echo "<td>{$User_Branch}</td>";
										echo "<td>{$User_Status}</td>";
										echo "<td><a href='Users.php?approve={$User_Id}'>Approve</a></td>";
										echo "<td><a href='Users.php?unapprove={$User_Id}'>Unapprove</a></td>";
										echo "<td><a href='Users.php?view={$User_Id}'>View</a></td>";
										echo "<td><a href='Users.php?delete={$User_Id}'>Delete</a></td>";
										echo "</tr>";
										}
									?>

									<?php
									if (isset($_GET['approve'])) {
										$the_User_Id = $_GET['approve'];
										$Query = "UPDATE Users SET User_Status = 'Approved' WHERE User_Id = {$the_User_Id}";
										$Change_User_Status = mysqli_query($connection, $Query);
										header("Location: Users.php");
									}
									?>
									<?php
									if (isset($_GET['unapprove'])) {
										$the_User_Id = $_GET['unapprove'];
										$Query = "UPDATE Users SET User_Status = 'Unapproved' WHERE User_Id = {$the_User_Id}";
										$Change_User_Status = mysqli_query($connection, $Query);
										header("Location: Users.php");
									}
									?>
									<?php
									if (isset($_GET['delete'])) {
										$the_User_Id = $_GET['delete'];
										$Query = "DELETE FROM Users WHERE User_Id = {$the_User_Id}";
										$delete_User = mysqli_query($connection, $Query);
										header("Location: Users.php");
									}
									?>
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</section>
		<!-- Footer Section-->
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>