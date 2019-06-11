<!Doctype html>
<html lang="en">
<?php include 'include/Head.php';
if (!isset($_SESSION['User_Id'])) {
	header('Location: include/Login.php');
}
?>
	<body>
		<?php include 'include/Aside.php';?>
		<?php include 'include/Header.php';?>
		<section class="main-content">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 style="font-family: 'Alegreybold';" class="panel-title">Evangelism Uploads</h5>
				</div>
				<div class="panel-body">
				<form action="" method="Post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Images</label>
						<br>
						<input class="form-control" type="file" name="Image">
					</div>
					<div class="form-group">
						<label>Branch:</label>
						<br>
						<select class="form-control" name="Evan_Branch">
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
					<div class="form-group">
						<label>Uploaded By:</label>
						<select class="form-control" name="Uploaded_By">
							<option>
								<?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName'];?>
							</option>
						</select>
					</div>
					<br>
					<button class="btn btn-full" name="Upload">Upload</button>
					<button class="btn btn-full">Save</button>
					<?php
					if (isset($_POST['Upload'])) {

						$Evan_Image = $_FILES['Image']['name'];
						$Evan_Image_Temp = $_FILES['Image']['tmp_name'];
						move_uploaded_file($Evan_Image_Temp, "Assets/img/Evangelism/$Evan_Image");
						
						$Evan_Branch = $_POST['Evan_Branch'];
						$$Uploaded_By = $_POST['Uploaded_By'];
						$Uploaded_Date = DATE['Y D'];


						$Query = "INSERT INTO Evangelism (Evan_Id,Evan_Image,Evan_Branch,Uploaded_By,Uploaded_Date)";
						$Query .= "VALUES(Null,'$Evan_Image','$Evan_Branch','$Uploaded_By',NOW())";
						$Add_Evan = mysqli_query($connection, $Query);

							if (!$Add_Evan) {
								die('QUERY FAILED' . mysqli_error($connection));
							}
						}
					?>
				</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Uploaded Sermons</h4>
				</div>
				<div class="panel-body">
					<div id="Admin-Sermon" class="container-fluid" align="center">
						<div>
							<?php
					$Query = "SELECT * FROM Evangelism";
						$Select_AllEvan = mysqli_query($connection, $Query);

						while($row = mysqli_fetch_assoc($Select_AllEvan)) {
							$Id = $row['Evan_Id'];
							$By = $row['Uploaded_By'];
							$Image = $row['Evan_Image'];
							$Date= $row['Uploaded_Date'];
							$Branch = $row['Evan_Branch'];


							echo "<div>";
							echo "<img style='width: 150px;' class='img-responsive' src='Assets/img/Evangelism/{$Image}'>";
							echo "<p><b>Branch:</b> {$Branch}</p>";
							echo "<p><b>Uploaded by:</b> {$By}</p>";
							echo "<p><b>Date Uploaded:</b> {$Date}</p>";
							echo "<a href='Evangelism.php?update={$Id}'>Update</a>";
							echo "<a href='Evangelism.php?delete={$Id}'>Delete</a>";
							echo "</div>";
							}
						?>
						<?php
						if (isset($_GET['delete'])) {
							$The_Evan_Id = $_GET['delete'];
							$Query = "DELETE FROM Evangelism WHERE Evan_Id = {$The_Evan_Id}";
							$delete_Serm = mysqli_query($connection, $Query);
							header("Location: Evangelism.php");
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>
