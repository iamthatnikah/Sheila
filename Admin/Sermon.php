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
			<?php include 'include/Breadcrumb.php';?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 style="font-family: 'Alegreybold';" class="panel-title">Sermon Uploads</h5>
				</div>
				<div class="panel-body">
				<form action="" method="Post" enctype="multipart/form-data">
					<div>
						<label>File</label>
						<input class="form-control" type="file" name="Serm_Content">
					</div>
					<br>
					<div class="form-group">
						<label>Sermon Title:</label>
						<br>
						<input class="form-control" type="text" name="Serm_Title">
					</div>
					<div class="form-group">
						<label>Branch:</label>
						<br>
						<select class="form-control" name="Serm_Branch">
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
						<label>Sermon By:</label>
						<br>
						<select class="form-control" name="Serm_By">
							<?php
							$query = "SELECT * FROM Ministers";
							$All_Ministers = mysqli_query($connection,$query);

							while($row = mysqli_fetch_assoc($All_Ministers)) {
								$Minister_Title = $row['Minister_Title'];
								$Minister_FirstName = $row['Minister_FirstName'];
								$Minister_LastName = $row['Minister_LastName'];

								echo "<option>";
								echo "{$Minister_Title} {$Minister_FirstName} {$Minister_LastName}";
								echo "</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Category:</label>
						<select class="form-control" name="Serm_Cat">
							<?php
							$query = "SELECT * FROM Categories";
							$All_Categories = mysqli_query($connection,$query);

							while($row = mysqli_fetch_assoc($All_Categories)) {
								$Cat_Id = $row['Cat_Id'];
								$Cat_Title = $row['Cat_Title'];

								echo "<option>";
								echo "{$Cat_Title}";
								echo "</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tag:</label>
						<br>
						<select class="form-control" type="text" name="Serm_Tag">
							<?php
							$query = "SELECT * FROM Tags";
							$All_Tags = mysqli_query($connection,$query);

							while($row = mysqli_fetch_assoc($All_Tags)) {
								$Tag_Id = $row['Tag_Id'];
								$Tag_Title = $row['Tag_Title'];

								echo "<option>";
								echo "{$Tag_Title}";
								echo "</option>";
							} 
							?>

						</select>
					</div>
					<div class="form-group">
						<label>Uploaded By:</label>
						<br>
						<select class="form-control" name="Uploaded_By">
							<option>
								<?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName'];?>
							</option>
						</select>
					</div>
					<br>
					<button class="btn btn-full" name="Upload">Upload</button>
					<button class="btn btn-full" name="Save">Save</button>
					<?php
					if (isset($_POST['Upload'])) {

					
						$Serm_Title = $_POST['Serm_Title'];
						$Serm_Branch = $_POST['Serm_Branch'];
						$Serm_By = $_POST['Serm_By'];
						$Serm_Date = Date['Y-F-D'];
						$Serm_Cat = $_POST['Serm_Cat'];
						$Serm_Tag = $_POST['Serm_Tag'];
						$Uploaded_By = $_POST['Uploaded_By'];

						$Serm_Content = $_FILES['Serm_Content']['name'];
						$Serm_Content_Temp = $_FILES['Serm_Content']['tmp_name'];
						move_uploaded_file($Serm_Content_Temp, "Assets/Sermon/$Serm_Content");

						$ext_error = false;
						$extensions = array('mp3','mp4');
						$file_exts = explode('.', $_FILES['Serm_Content']['name']);
						if (!in_array($file_exts, $extensions)) {
							$ext_error = true;
						}

						$Query = "INSERT INTO Sermons (Serm_Id,Serm_Title,Serm_Branch,Serm_By,Serm_Cat,Serm_Tag,Uploaded_By,Serm,Serm_Date)";
						$Query .= "VALUES(Null,'$Serm_Title','$Serm_Branch','$Serm_By','$Serm_Cat','$Serm_Tag','$Uploaded_By','$Serm_Content', NOW())";
						$Add_Sermon = mysqli_query($connection, $Query);

							if (!$Add_Sermon) {
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
					$Query = "SELECT * FROM Sermons ORDER BY Serm_Id DESC LIMIT 16";
						$Select_Sermons = mysqli_query($connection, $Query);

						while($row = mysqli_fetch_assoc($Select_Sermons)) {
							$Sermon_Id = $row['Serm_Id'];
							$Sermon = $row['Serm'];
							$Sermon_Title = $row['Serm_Title'];
							$Sermon_By = $row['Serm_By'];
							$Uploaded_By = $row['Uploaded_By'];
							$Date_Uploaded = $row['Serm_Date'];
							$Sermon_Branch = $row['Serm_Branch'];
							$Sermon_Tag = $row['Serm_Tag'];


							echo "<div>";
							echo "<audio controls src='Assets/Sermon/{$Sermon}'></audio>";
							echo "<h5 style='font-family: Alegreybold; font-size: 15px;'><b>Title :</b> {$Sermon_Title}</h5>";
							echo "<p style='font-family: Alegreybold; font-size: 15px;'><b>Sermon by :</b> {$Sermon_By}</p>";
							echo "<p style='font-family: Alegreybold; font-size: 15px;'><b>Uploaded by :</b> {$Uploaded_By}</p>";
							echo "<p style='font-family: Alegreybold; font-size: 15px;'><b>Branch :</b> {$Sermon_Branch}</p>";
							echo "<p style='font-family: Alegreybold;'><b>Date Uploaded :</b>{$Date_Uploaded}</p>";
							echo "<a style='font-family: Alegreybold; margin-right: 10px;' href='Sermon.php?update={$Sermon_Id}'>Update</a>";
							echo "<a style='font-family: Alegreybold; margin-left: 10px;' href='Sermon.php?delete={$Sermon_Id}'>Delete</a>";
							echo "</div>";
							}
						?>
						<?php
						if (isset($_GET['delete'])) {
							$The_Serm_Id = $_GET['delete'];
							$Query = "DELETE FROM Sermons WHERE Serm_Id = {$The_Serm_Id}";
							$delete_Serm = mysqli_query($connection, $Query);
							header("Location: Sermon.php");
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