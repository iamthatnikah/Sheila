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
			<div class="panel panel-default contact-form">
				<div class="panel-heading">
					<h5 class="panel-title">Add Branches</h5>
				</div>
				<form action="" method="Post" class="panel-body" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Branch_Logo">Branch Logo:</label>
						<br>
						<input name="Branch_Logo" class="form-control" type="File">
					</div>
					<div class="form-group">
						<label for="Branch_Name">Branch Name:</label>
						<br>
						<input name="Branch_Name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Branch_Location">Branch Location:</label>
						<br>
						<input name="Branch_Location" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Branch_Region">Branch Region:</label>
						<br>
						<input name="Branch_Region" class="form-control" type="text">
					</div>
					<button name="Add_Branch" type="Submit" class="btn btn-full">Add</button>
					<?php
					if (isset($_POST['Add_Branch'])) {


						$Branch_Name = $_POST['Branch_Name'];
						$Branch_Location = $_POST['Branch_Location'];
						$Branch_Region = $_POST['Branch_Region'];


						$Branch_Logo = $_FILES['Branch_Logo']['name'];
						$Branch_Logo_Temp = $_FILES['Branch_Logo']['tmp_name'];
						move_uploaded_file($Branch_Logo_Temp, "Assets/img/BranchImg/$Branch_Logo");

						$Query = "INSERT INTO Branches (Branch_Id,Branch_Logo,Branch_Name,Branch_Location,Branch_Region)";
						$Query .= "VALUES(Null,'{$Branch_Logo}','{$Branch_Name}','{$Branch_Location}','{$Branch_Region}')";
						$Add_Branch = mysqli_query($connection, $Query);

							if (!$Add_Branch) {
								die('QUERY FAILED' . mysqli_error($connection));
							}else {

							}
						
					}?>
				</form>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Branches</h4>
				</div>
				<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Branch_Id</th>
							<th>Branch_Logo</th>
							<th>Branch_Name</th>
							<th>Branch_Location</th>
							<th>Branch_Region</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM Branches";
						$All_Branches = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_Branches)) {
							$Branch_Id = $row['Branch_Id'];
							$Branch_Name = $row['Branch_Name'];
							$Branch_Logo = $row['Branch_Logo'];
							$Branch_Location = $row['Branch_Location'];
							$Branch_Region = $row['Branch_Region'];

							echo "<tr>";
							echo "<td>{$Branch_Id}</td>";
							echo "<td><img class='img-responsive'; width='50px;' src='Assets/Img/BranchImg/{$Branch_Logo}'></td>";
							echo "<td>{$Branch_Name}</td>";
							echo "<td>{$Branch_Location}</td>";
							echo "<td>{$Branch_Region}</td>";
							echo "<td><a href='Branches.php?delete={$Branch_Id}'>Delete</a></td>";
							echo "<td><a href='Branches.php?update={$Branch_Id}'>Update</a></td>";
							echo "</tr>";
						} 
						if (isset($_GET['delete'])) {
							$The_Branch_Id = $_GET['delete'];
							$Query = "DELETE FROM Branches WHERE Branch_Id = {$The_Branch_Id}";
							$delete_User = mysqli_query($connection, $Query);
							header("Location: Branches.php");
						}
						?>
					</tbody>
				</table>
				</div>
			</div>
		</section>
		<!-- Footer Section-->
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>