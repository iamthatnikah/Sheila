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
				<div class="col-lg-6 form-group">
					<form class="panel panel-default contact-form" action="" method="POST">
					<div class="panel-heading">
						<h5 class="panel-title">Add Tag</h5>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Tag Title:</label>
							<br>
							<input class="form-control" type="text" name="">
						</div>
						<button name="" type="" class="btn btn-full">Save</button>
						<button name="submit" type="submit" class="btn btn-full">Add</button>
					</div>
					
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Tag Id</th>
							<th>Tag Title</th>
						</tr>
					</thead>
					<tbody>
						<?php

					$query = "SELECT * FROM Tags";
					$All_Tags = mysqli_query($connection,$query);

					while($row = mysqli_fetch_assoc($All_Tags)) {
						$Tag_Title = $row['Tag_Title'];

						echo "<tr>";
						echo "<td>{$Tag_Id}</td>";
						echo "<td>{$Tag_Title}</td>";
						echo "<td><a href='Tag-Cat.php?delete={$Tag_Id}'>Delete</a></td>";
						echo "</tr>";
					}
					?>
					<?php
						if (isset($_GET['delete'])) {
							$The_Cat_Id = $_GET['delete'];
							$Query = "DELETE FROM Categories WHERE Cat_Id = {$The_Cat_Id}";
							$delete_User = mysqli_query($connection, $Query);
							header("Location: Tag-Cat.php");
						}
						?>
					</tbody>
				</table>
				</form>
				</div>
				<div class="col-lg-6">
					<form class="panel panel-default contact-form" action="Tag-Cat.php" method="POST">
					<div class="panel-heading">
						<h5 class="panel-title">Add Category</h5>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Category Title:</label>
							<br>
							<input class="form-control" type="text" name="Cat_Title">
						</div>
						<button class="btn btn-full">Save</button>
						<button class="btn btn-full" type="submit" name="Add">Add</button>
					</div>
					<table class="table table-bordered table-hover">
						<?php 
						if (isset($_POST['Add'])) {
						
							$Cat_Title = $_POST['Cat_Title'];

							if ($Cat_Title == "" || empty($Cat_Title)) {
								echo "This field should not be empty.";
							}else{
								$Query = "INSERT INTO Categories (Cat_Id,Cat_Title)";
								$Query .= "VALUES(Null,'$Cat_Title')";
								$Add_Cat = mysqli_query($connection, $Query);

								if (!$Add_Cat) {
									die('QUERY FAILED' . mysqli_error($connection));
								}
							}
							
						}?>
					<thead>
						<tr>
							<th>Category Id</th>
							<th>Category Title</th>
						</tr>
					</thead>
					<tbody>
						<?php

					$query = "SELECT * FROM Categories";
					$All_Categories = mysqli_query($connection,$query);

					while($row = mysqli_fetch_assoc($All_Categories)) {
						$Cat_Id = $row['Cat_Id'];
						$Cat_Title = $row['Cat_Title'];

						echo "<tr>";
						echo "<td>{$Cat_Id}</td>";
						echo "<td>{$Cat_Title}</td>";
						echo "<td><a href='Tag-Cat.php?delete={$Cat_Id}'>Delete</a></td>";
						echo "<td><a href='Tag-Cat.php?update={$Cat_Id}'>Update</a></td>";
						echo "</tr>";
					}
					?>
					<?php
						if (isset($_GET['delete'])) {
							$The_Cat_Id = $_GET['delete'];
							$Query = "DELETE FROM Categories WHERE Cat_Id = {$The_Cat_Id}";
							$delete_Cat = mysqli_query($connection, $Query);
							header("Location: Tag-Cat.php");
						}
						?>
					</tbody>
				</table>
				</form>
				</div>
			</section>
			<!-- Footer Section-->
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>