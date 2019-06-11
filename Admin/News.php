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
					<h5 class="panel-title">Add News</h5>
				</div>
				<form action="" method="Post" class="panel-body">
					<div class="form-group">
						<label>Uploaded By:</label>
						<br>
						<select class="form-control" name="Uploaded_By">
							<option>
								<?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName'];?>
							</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Branch">Branch:</label>
						<br>
						<select name="News_Branch" class="form-control">
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
						<label for="News_Content">Content:</label>
						<br>
						<textarea name="News_Content" class="ckeditor form-control" type="text"></textarea>
					</div>
					<button name="Add_News" type="Submit" class="btn btn-full">Add</button>
					<?php
					if (isset($_POST['Add_News'])) {

						$Branch = $_POST['News_Branch'];
						$Content = $_POST['News_Content'];
						$By = $_POST['Uploaded_By'];


						$Query = "INSERT INTO News (News_Id,News_Branch,News_Content,Uploaded_By)";
						$Query .= "VALUES(Null,'{$Branch}','{$Content}','{$By}')";
						$Add_News = mysqli_query($connection, $Query);

							if (!$Add_News) {
								die('QUERY FAILED' . mysqli_error($connection));
							}else {

							}
						
					}?>
				</form>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">News</h4>
				</div>
				<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Branch</th>
							<th>News</th>
							<th>Uploaded_By</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM news";
						$All_News = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_News)) {
							$Id = $row['news_id'];
							$Branch = $row['news_branch'];
							$Content = $row['news_content'];
							$By = $row['Uploaded_By'];



							echo "<tr>";
							echo "<td>{$Id}</td>";
							echo "<td>{$Branch}</td>";
							echo "<td>{$Content}</td>";
							echo "<td>{$By}</td>";
							echo "<td><a href='News.php?view={$Id}'>View</a></td>";
							echo "<td><a href='News.php?update={$Id}'>Update</a></td>";
							echo "<td><a href='News.php?delete={$Id}'>Delete</a></td>";
							echo "</tr>";
						}

						if (isset($_GET['delete'])) {
								$The_News_Id = $_GET['delete'];
								$Query = "DELETE FROM News WHERE News_Id = {$The_News_Id}";
								$delete_Minister = mysqli_query($connection, $Query);
								header("Location: News.php");
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
