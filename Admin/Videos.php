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
		<!-- Footer Section-->
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>
