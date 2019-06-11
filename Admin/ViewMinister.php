<!Doctype html>
<html lang="en">
<?php include 'include/Head.php';
if (!isset($_SESSION['User_Id'])) {
	header('Location: include/Login.php');
}
?>
<?php
if (isset($_GET['Minister'])) {
	# code...
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
						<input name="Minister_Title" value"<?php echo "$Minister_Title";?>" class="form-control" type="text">
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
					<button name="Add_Minister" type="Submit" class="btn btn-full">Update</button>
					<?php
					if (isset($_POST['Update'])) {
						
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
		</section>
		<!-- Footer Section-->
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>