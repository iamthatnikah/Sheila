<!DOCTYPE html>
<html lang="en">
<?php include '../Core/init.php';?>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link href="../Css/Register.css" rel="stylesheet" type="text/css" media="all">
		<link href="../css/extra/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
		<link href="../css/extra/bootstrap-theme.min.css" rel="stylesheet" media="all">
		<link href="../css/extra/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
		<link href="../favicon.png" rel="icon" type="favicon" media="all">
		<link rel="stylesheet" type="text/css" href="../Css/casccademain.css" media="all">
	</head>
	<body>
		<header>
			<form action="" method="Post" enctype="multipart/form-data">
				<div class="container">
					<div class="upload">
						<input name="User_Image" type="file">
					</div>
					<?php
						if (isset($_POST['Submit'])){


							$User_FirstName = $_POST['User_FirstName'];
							$User_LastName = $_POST['User_LastName'];
							$User_EmailAddress = $_POST['User_EmailAddress'];
							$Confirm_User_EmailAddress = $_POST['ConfirmEmail'];
							$User_Password = $_POST['User_Password'];
							$Confirm_User_Password = $_POST['ConfirmPassword'];
							$User_Branch = $_POST['User_Branch'];
							$User_Gender = $_POST['User_Gender'];

							$User_Image = $_FILES['User_Image']['name'];
							$User_Image_Temp = $_FILES['User_Image']['tmp_name'];
							move_uploaded_file($User_Image_Temp, "../Assets/img/Users/$User_Image");
							$Password = md5($User_Password);

							if (empty($User_EmailAddress) && empty($Confirm_User_EmailAddress)) {
								echo "<p style='color: #fff; text-align: center;'>Please Check Your Email Address, Thank you very much.</p>";
							}elseif ($User_EmailAddress !== $Confirm_User_EmailAddress) {
								echo "<p style='color: #fff; text-align: center;'>Please Your EmailAddress Doesn't Match, Check And Retype.</p>";
							}elseif (empty($User_EmailAddress) && !empty($Confirm_User_EmailAddress)) {
								echo "<p style='color: #fff; text-align: center;'>Please Check your Email Address.</p>";
							}elseif (empty($User_Password) && empty($Confirm_User_Password)) {
								echo "<p style='color: #fff; text-align: center;'>Please Check your Password, The Field shouldn't be empty.</p>";
							}elseif ($User_Password !== $Confirm_User_Password) {
								echo "<p style='color: #fff; text-align: center;'>Your Password Doesnt Match, Please check and retype again, Thank you.</p>";
							}elseif (empty($User_Password) && !empty($Confirm_User_Password)) {
								echo "<p style='color: #fff; text-align: center;'>Your Password Cannot Be Empty, Please check and Retype Again, Thank you.</p>";
							}else{
								
								$query = "INSERT INTO Users (User_Id,User_FirstName,User_Password,User_EmailAddress,User_Branch,User_LastName,User_Image,User_Gender)";
								$query .= "VALUES (NULL,'$User_FirstName','$User_Password','$User_EmailAddress','$User_Branch','$User_LastName','$User_Image','$User_Gender')";
								
								$result = mysqli_query($connection, $query);

								echo "Registered Successfully . Thank you very much.";
								header('Location:Login.php');
								exit();
								if (!$result) {
									die('QUERY FAILED' . mysqli_error($connection));
								}
								
							}

						}
						?>
					<div class="Name-Field">
						<input type="text" placeholder="First Name" name="User_FirstName">
						<input type="text" placeholder="Last Name" name="User_LastName">
					</div>
					<div class="email-input">
						<input type="email" placeholder="Email Address" name="User_EmailAddress">
						<input type="email" placeholder="Confirm Address" name="ConfirmEmail">
					</div>
					<div class="password-input">
						<input type="password" placeholder="Password" name="User_Password">
						<input type="password" placeholder="Confirm Password" name="ConfirmPassword">
					</div>
					<div class="row">
						<select id="Branch" name="User_Branch">
							<?php
									$query = "SELECT * FROM Branches";
									$All_Branches = mysqli_query($connection,$query);

									while($row = mysqli_fetch_assoc($All_Branches)) {
										$Branch_Id = $row['Branch_Id'];
										$Branch_Name = $row['Branch_Name'];
										$Branch_Location = $row['Branch_Location'];
										$Branch_Region = $row['Branch_Region'];

										echo "<option>";
										echo "{$Branch_Name}";
										echo "</option>";
									} 
									?>
						  <!-- <option value="Total Grace">Total Grace</option>
						  <option value="Grace Temple">Grace Temple</option>
						  <option value="Greater Grace">Greater Grace</option>
						  <option value="Dominion Temple">Dominion Temple</option>
						  <option value="Grace Fountain">Grace Fountain</option> -->
						</select>
						<select id="Gender" name="User_Gender">
						  <option value="Male">Male</option>
						  <option value="Female">Female</option>
						</select>
					</div>
					<div style="margin-top: 20px;">
						<button class="btn btn-half" alt="Submit Button" type="Submit" name="Submit">Register</button>
					</div>
					<div>
						<li><a href="../Index.php">Already Have an Account....?</a></li>
						<li><a href="Reset.php">Forgotten Password....?</a></li>
					</div>
				</div>
			</form>
		</header>
	</body>
	<script src="js/jquery.min.js"></script>
</html>
