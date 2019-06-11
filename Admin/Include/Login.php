<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include '../Core/init.php';?>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="../Css/Login.css" rel="stylesheet" type="text/css" media="all">
		<link href="../css/extra/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
		<link href="../css/extra/bootstrap-theme.min.css" rel="">
		<link href="../css/extra/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
		<link href="../favicon.png" rel="icon" type="favicon" media="all">
		<link rel="stylesheet" type="text/css" href="../Css/casccademain.css" media="all">
	</head>
	<body>
		<header class="container-full">

			<form class="container" action="Login.php" method="post">
				<div>
					<img src="../Assets/Login.jpg" style=" ">
				</div>
<?php  
if (isset($_POST['Login'])) {
	$Email = $_POST['email'];
	$Password = $_POST['password'];

	$User_EmailAddress = trim($_POST['email']);
	$User_EmailAddress = strip_tags($_POST['email']);
	$User_EmailAddress = mysqli_real_escape_string($connection, $_POST['email']);
	$User_Password = trim($_POST['password']);
	$User_Password = strip_tags($_POST['password']);
	$User_Password = mysqli_real_escape_string($connection, $_POST['password']);
	$User_Password = md5($_POST['password']);

	$query = "SELECT * FROM Users WHERE User_EmailAddress = '{$Email}' AND User_Password = '{$Password}'";
	$select_user = mysqli_query($connection, $query);

	if (!$select_user) {
		die("QUERY FAILED". mysqli_error($connection));
	}
	while ($row = mysqli_fetch_assoc($select_user)) { 
	  	$db_User_Id = $row['User_Id'];
	  	$db_User_EmailAddress = $row['User_EmailAddress'];
	  	$db_User_FirstName = $row['User_FirstName'];
	  	$db_User_LastName = $row['User_LastName'];
	  	$db_User_Password = $row['User_Password'];
		$db_User_Image = $row['User_Image'];
		$db_User_Status = $row['User_Status'];
	}
	if (empty($Email) && empty($Password)) {
		echo "<p class='alert-danger' style='color: #3A070E;'>Please, You need to provide your valid Email Address and your Password, Thank You.</p>";
	}elseif (!empty($Email) && empty($Password)) {
		echo "<p class='alert-danger' style='color: #3A070E;'>You need to enter your Password</p>";
	}elseif (empty($Email) && !empty($Password)) {
		echo "<p class='alert-danger' style='color: #3A070E;'>You need to enter your Email Address</p>";
	}elseif ($Email !== $db_User_EmailAddress && $Password !== $db_User_Password){
		echo "<p class='alert-danger' style='color: #3A070E;'>User EmailAddress & Password cannot be found, Please check and register before logging in. Thank you very much.</p>";
	}elseif ($Email == $db_User_EmailAddress && $Password == $db_User_Password && $db_User_Status == 'Unapproved'){
		echo "<p class='alert-danger' style='color: #3A070E;'>Please Wait Till your Account is Granted Approval By the Administrator, Thanks You Very Much.</p>";
	}elseif ($Email == $db_User_EmailAddress && $Password == $db_User_Password && $db_User_Status == 'Approved'){
		
		$_SESSION['User_Id'] = $db_User_Id;
		$_SESSION['Email'] = $db_User_EmailAddress;
		$_SESSION['FirstName'] = $db_User_FirstName;
		$_SESSION['LastName'] = $db_User_LastName;
		$_SESSION['LastName'] = $db_User_LastName;
		$_SESSION['Profile'] = $db_User_Image;

		header('Location: ../Index.php');
	}else{
		header('Location: Login.php');
		exit();
	}
}

?>
				<div class="email-input">
					<input type="email" name="email" placeholder="Email Address">
				</div>
				<div class="password-input">
					<input type="password" name="password" placeholder="Password">
				</div>
				<div style="margin-top: 50px;">
					<button class="btn btn-half" alt="Login Button" type="Submit" name="Login"> Login</button>
				</div>
				<div class="password-forgot">
					<li><a href="Reset.php">Forgotten Password...?</a></li>
				</div>
			</form>
		</header>
	</body>
</html>