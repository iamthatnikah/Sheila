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
					<h5 class="panel-title">Add Ministers</h5>
				</div>
				<form action="" method="Post" class="panel-body" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Minister_Image">Minister Image:</label>
						<br>
						<input name="Minister_Image" class="form-control" type="File">
					</div>
					<div class="form-group">
						<label for="Minister_Title">Title:</label>
						<br>
						<input name="Minister_Title" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Minister_FirstName">Minister FirstName:</label>
						<br>
						<input name="Minister_FirstName" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Minister_LastName">Minister LastName:</label>
						<br>
						<input name="Minister_LastName" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Minister_Branch">Minister Branch:</label>
						<br>
						<select name="Branch_Name" class="form-control" type="text">
							<?php
								$query = "SELECT * FROM Branches";
								$All_Branches = mysqli_query($connection,$query);

								while($row = mysqli_fetch_assoc($All_Branches)) {
									$Branch_Id = $row['Branch_Id'];
									$Branch_Name = $row['Branch_Name'];

									echo "<option>";
									echo "{$Branch_Name}";
									echo "</option>";
								}

							?>
						</select>
					</div>
					<button name="Add_Minister" type="Submit" class="btn btn-full">Add</button>
					<?php
					if (isset($_POST['Add_Minister'])) {


						$Minister_Title = $_POST['Minister_Title'];
						$Minister_FirstName = $_POST['Minister_FirstName'];
						$Minister_LastName = $_POST['Minister_LastName'];
						$Branch_Name = $_POST['Branch_Name'];


						$Minister_Image = $_FILES['Minister_Image']['name'];
						$Minister_Image_Temp = $_FILES['Minister_Image']['tmp_name'];

						move_uploaded_file($Minister_Image_Temp, "Assets/img/Ministers/$Minister_Image");

						$Query = "INSERT INTO Ministers (Minister_Id,Minister_Image,Minister_Title,Minister_FirstName,Minister_LastName,Branch_Name)";
						$Query .= "VALUES(Null,'{$Minister_Image}','{$Minister_Title}','{$Minister_FirstName}','{$Minister_LastName}','{$Branch_Name}')";
						$Add_Minister = mysqli_query($connection, $Query);

							if (!$Add_Minister) {
								die('QUERY FAILED' . mysqli_error($connection));
							}else {

							}
						
					}?>
				</form>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Ministers</h4>
				</div>
				<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Image</th>
							<th>Title</th>
							<th>FirstName</th>
							<th>LastName</th>
							<th>Branch</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM Ministers";
						$All_Ministers = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_Ministers)) {
							$Minister_Id = $row['Minister_Id'];
							$Minister_Image = $row['Minister_Image'];
							$Minister_Title = $row['Minister_Title'];
							$Minister_FirstName = $row['Minister_FirstName'];
							$Minister_LastName = $row['Minister_LastName'];
							$Branch_Name = $row['Branch_Name'];

							$_SESSION['Minister_Image'] = $db_Minister_Image;
							$_SESSION['Minister_Title'] = $db_Minister_Title;
							$_SESSION['Minister_FirstName'] = $db_Minister_FirstName;
							$_SESSION['Minister_LastName'] = $db_Minister_LastName;
							$_SESSION['Minister_Branch'] = $db_Minister_Branch;


							echo "<tr>";
							echo "<td>{$Minister_Id}</td>";
							echo "<td><img class='img-responsive'; width='50px;' src='Assets/img/Ministers/{$Minister_Image}'></td>";
							echo "<td>{$Minister_Title}</td>";
							echo "<td>{$Minister_FirstName}</td>";
							echo "<td>{$Minister_LastName}</td>";
							echo "<td>{$Branch_Name}</td>";
							echo "<td><a href='Ministers.php?delete={$Minister_Id}'>Delete</a></td>";
							echo "<td><a href='Ministers.php?view={$Minister_Id}'>View</a></td>";
							echo "</tr>";
						}

						if (isset($_GET['delete'])) {
								$The_Minister_Id = $_GET['delete'];
								$Query = "DELETE FROM Ministers WHERE Minister_Id = {$The_Minister_Id}";
								$delete_Minister = mysqli_query($connection, $Query);
								header("Location: Ministers.php");
							}							
						?>
						<?php
						if (isset($_GET['view'])) {
								$The_Minister_Id = $_GET['view'];
								$Query = "SELECT * FROM Ministers WHERE Minister_Id = {$The_Minister_Id}";
								$delete_Minister = mysqli_query($connection, $Query);
								header("Location: ViewMinister.php");
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