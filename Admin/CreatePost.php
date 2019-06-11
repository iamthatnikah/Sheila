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
		<!--Header-->
		<?php include 'include/Header.php';?>
		<!--Main-Content-Header Section-->
		<section class="main-content">
			<div class="panel panel-default contact-form">
				<div class="panel-heading">
					<h5 class="panel-title">Blog</h5>
				</div>
				<form action="" method="Post" enctype="multipart/form-data">
					<div class="panel-body">
					<div class="form-group">
						<label for="Post_Title">Post Title:</label>
						<br>
						<input name="Post_Title" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Post_Sub_Title">Post Sub Title:</label>
						<br>
						<input name="Post_Sub_Title" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="Post_By">Post By:</label>
						<br>
						<select class="form-control" name="Post_By">
							<option>
								<?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName'];?>
							</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Post_Author">Post Author:</label>
						<br>
						<select name="Post_Author" class="form-control" type="text">
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
						<label for="Post_Content">Post Content</label>
						<br>
						<textarea class="ckeditor form-control" name="Post_Content" rows="20" cols="139" placeholder="" type="text"></textarea>
					</div>
					<button name="Draft_Post" type="Submit" class="btn btn-full">Draft</button>
					<button name="Publish_Post" type="Submit" class="btn btn-full">Publish</button>
					<?php
					if (isset($_POST['Publish_Post'])) {

						$Post_Image = $_FILES['Post_Image']['name'];
						$Post_Image_Temp = $_FILES['Post_Image']['tmp_name'];

						$Post_Title = $_POST['Post_Title'];
						$Post_Sub_Title = $_POST['Post_Sub_Title'];
						$Post_Author = $_POST['Post_Author'];
						$Post_Date = $_POST['Post_Date'];
						$Post_Content = $_POST['Post_Content'];
						$Post_Comment_Count = $_POST['Post_Comment_Count'];
						$Post_By = $_POST['Post_By'];

						move_uploaded_file($Post_Image_Temp, "../Assets/img/$Post_Image");

						$Query = "INSERT INTO Posts (Post_Id,Post_Cat_Id,Post_Title,Post_Sub_Title,Post_Author,Post_Date,Post_Content,Post_Comment_Count,Post_Status,Post_By)";
						$Query .= "VALUES(Null,' ','$Post_Title','$Post_Sub_Title','$Post_Author',NOW(),'$Post_Content','$Post_Comment_Count','$Post_Status','$Post_By')";
						$Result = mysqli_query($connection, $Query);

							if (!$Result) {
								die('QUERY FAILED' . mysqli_error($connection));
							}
						
					}?>
				</div>
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
							<th>Title</th>
							<th>Author</th>
							<th>Uploader</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM posts";
						$All_posts = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_posts)) {
							$Post_Id = $row['Post_Id'];
							$Post_Title = $row['Post_Title'];
							$Post_Author = $row['Post_Author'];
							$Post_By = $row['Post_By'];
							$Post_Date = $row['Post_Date'];

							echo "<tr>";
							echo "<td>{$Post_Id}</td>";
							echo "<td>{$Post_Title}</td>";
							echo "<td>{$Post_Author}</td>";
							echo "<td>{$Post_By}</td>";
							echo "<td>{$Post_Date}</td>";
							echo "<td><a href='CreatePost.php?delete={$Post_Id}'>Delete</a></td>";
							echo "<td><a href='CreatePost.php?update={$Post_Id}'>Update</a></td>";
							echo "</tr>";
						}

						if (isset($_GET['delete'])) {
							$The_Post_Id = $_GET['delete'];
							$Query = "DELETE FROM Posts WHERE Post_Id = {$The_Post_Id}";
							$delete_Minister = mysqli_query($connection, $Query);
							header("Location: CreatePost.php");
							}							
						?>
						<?php
						if (isset($_GET['view'])) {
							$The_Post_Id = $_GET['view'];
							$Query = "SELECT * FROM Posts WHERE Post_Id = {$The_Post_Id}";
							$delete_Minister = mysqli_query($connection, $Query);
							header("Location: CreatePost.php");
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
	<script type="text/javascript">
$("#txteditor").Editor()
</script>
</html>