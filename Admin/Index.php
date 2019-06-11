<!DOCTYPE Html>
<html>
<?php include 'include/Head.php';?>
<?php if (!isset($_SESSION['User_Id'])) {
			header('Location: include/Login.php');
	}
	?>

<body>
	<header>
		<?php include 'include/Aside.php';?>
		<!-- Content Header section -->
		<?php include 'include/Header.php';?>
		<!-- the main content -->
		<section class="main-content">
			<!-- the welcoming notes for the main-content -->
			<div class="main-content-header">
				<div class="welcome-notes">
					<h3 style="font-family: 'Alegreybold';"><img id="flaticons" src="Assets/icon/Home.ico">My Dashboard</h3>
					<p style="font-size: 18px; font-family: 'Alegrey'; font-weight: 900;">Welcome to your dashboard, Mr. <?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName'];?></p>
				</div>
				<!-- end of the welcoming notes -->
				<div class="widget">
					<ul>
						<li class="btn btn-full"><a href=""><img id="flaticons" src="Assets/icon/Plus.ico">Add New Widget</a></li>
						<li class="btn btn-full"><a href=""><img id="flaticons" src="Assets/icon/Help.ico">Help</a></li>
						<li class="btn btn-full"><a href=""><img id="flaticons" src="Assets/icon/UserShield.ico">System Users</a></li>
					</ul>
				</div>
			</div>
			<?php include 'include/Breadcrumb.php';?>
			<!--  showcse -->
			<div class="showcase">
				<!-- THE CREATE PAGE-->
				<div id="col-1-first" class="col-1 panel panel-default">
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">Blog Post Management</h4>
					</div>
					<div align="center panel-body">
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="CreatePost.php"><img src="Assets/icon/Create.ico">New Post</a></h5>
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="">
							<?php
								$query = "SELECT * FROM Visiters";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['Visiter_Id'];
									$FullName = $row['Visiter_FullName'];
									$EmailAddress = $row['Visiter_EmailAddress'];
									$Comments = $row['Visiter_Comment'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>0</span>";
								}
							?><img src="Assets/icon/Edit_File.ico">Drafts</a>
						</h5>
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="">
							<?php
							$query = "SELECT * FROM Posts";
							$Query_Count = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($Query_Count)) {
								$Id = $row['Post_Id'];
								$Title = $row['Post_Title'];
							}
							if (!$Query_Count) {
								die("QUERY FAILED" . mysqli_error($connection));
							}

							$count = mysqli_num_rows($Query_Count);

							if ($count <= 10){
								echo "<span style='font-size: 25px; font-family: 'Alegrey'; font-weight: 900;'>$count</span>";
							}elseif ($count >= 10) {
								echo "<span style='font-size: 25px; font-family: 'Alegrey'; font-weight: 900;'>$count +</span>";
							}else{
								echo "<span style='font-size: 25px; font-family: 'Alegrey'; font-weight: 900;'>0</span>";
							}
						?><img src="Assets/icon/File.ico">Manage Posts</a>
					</h5>
					</div>
				</div>
				<!--THE LIKE AND THE SHARE BUTTON AREA -->
				<div id="col-1-second" class="col-1 panel panel-default">
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">Social Feeds Management</h4>
					</div>
					<div align="center panel-body">
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="">
							<?php 
							$query = "SELECT * FROM Visiters";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['Visiter_Id'];
									$FullName = $row['Visiter_FullName'];
									$EmailAddress = $row['Visiter_EmailAddress'];
									$Comments = $row['Visiter_Comment'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>0</span>";
								}
							?><img src="Assets/icon/Like.ico">Likes</a></h5>
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="">
							<?php
							$query = "SELECT * FROM Visiters";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['Visiter_Id'];
									$FullName = $row['Visiter_FullName'];
									$EmailAddress = $row['Visiter_EmailAddress'];
									$Comments = $row['Visiter_Comment'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>0</span>";
								}
							?><img src="Assets/icon/Share.ico">Shares</a></h5>
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="">
							<?php 
							$query = "SELECT * FROM Visiters";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['Visiter_Id'];
									$FullName = $row['Visiter_FullName'];
									$EmailAddress = $row['Visiter_EmailAddress'];
									$Comments = $row['Visiter_Comment'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' position: absolute; font-weight: 900;'>0</span>";
								}
							?><img src="Assets/icon/Unlike.ico"> Unlikes</a></h5>
					</div>
				</div>
				<div id="col-1-third" class="col-1 panel panel-default">
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">Sermon Management</h4>
					</div>
					<div align="center panel-body">
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href="Sermon.php">
							<?php
								$query = "SELECT * FROM Sermons";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['Serm_Id'];
									$Title = $row['Serm_Title'];
									$By = $row['Serm_By'];
									$Serm = $row['Serm'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>0</span>";
								}
							?><img src="Assets/icon/Sermon.ico">Sermon</a>
						</h5>
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href=""><img src="Assets/icon/Downloading.ico">Downloads</a></h5>
						<h5 style="font-family: 'Alegrey'; font-weight: 900;"><a href=""><img src="Assets/icon/Uploads.ico">Uploads</a></h5>
					</div>
				</div>
			</div>
			<!-- end of showcase -->

			<!-- showcase-2 -->
			<div class="showcase-2">
				<div class="panel panel-default col-2">
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">User Management</h4>
					</div>
					<div class="panel-body">
						<a href=""><img src="Assets/icon/Add_User.ico"><h5 style="font-family: 'Alegrey';">Add User</h5></a>
						<a href=""><img src="Assets/icon/Remove_User.ico"><h5 style="font-family: 'Alegrey';">Remove User</h5></a>
						<a href="Users.php"><h5 style="font-family: 'Alegrey';">
							<?php
								$query = "SELECT * FROM Users";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['User_Id'];
									$EmailAddress = $row['User_EmailAddress'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>0</span>";
								}?>
							<img src="Assets/icon/FindUser.ico">View Users</h5>
						</a>
					</div>
				</div>
				<div class="panel panel-default col-2">
					<!-- Daily Feeds -->
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">Mail Management</h4>
					</div>
					<div class="panel-body">
						<a href=""><h5 style="font-family: 'Alegrey';">
							<?php
								$query = "SELECT * FROM Visiters";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['Visiter_Id'];
									$EmailAddress = $row['Visiter_EmailAddress'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>0</span>";
								}?><img src="Assets/icon/Inbox.ico">Inbox
						</h5></a>
						<a href=""><h5 style="font-family: 'Alegrey';"><?php
								$query = "SELECT * FROM Users";
								$Query_Count = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($Query_Count)) {
									$Id = $row['User_Id'];
									$EmailAddress = $row['User_EmailAddress'];
								}
								if (!$Query_Count) {
									die("QUERY FAILED" . mysqli_error($connection));
								}

								$count = mysqli_num_rows($Query_Count);

								if ($count <= 10){
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count</span>";
								}elseif ($count >= 10) {
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count +</span>";
								}else{
									echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>0</span>";
								}?><img src="Assets/icon/News.ico">Newsletters</h5></a>
						<a href=""><h5 style="font-family: 'Alegrey';"><?php
							$query = "SELECT * FROM Sermons";
							$Query_Count = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($Query_Count)) {
								$Id = $row['Serm_Id'];
								$Title = $row['Serm_Title'];
							}
							if (!$Query_Count) {
								die("QUERY FAILED" . mysqli_error($connection));
							}

							$count = mysqli_num_rows($Query_Count);

							if ($count <= 10){
								echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count</span>";
							}elseif ($count >= 10) {
								echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>$count +</span>";
							}else{
								echo "<span style='font-size: 25px; font-family: 'Alegrey' display: absolute; font-weight: 900;'>0</span>";
							}?><img src="Assets/icon/Downloading.ico">Downloads</h5></a>
					</div>
				</div>
				<div class="panel panel-default col-3">
					<!--Performance -->
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">News</h4>
					</div>
					<div class="panel-body">
						<?php
						$query = "SELECT * FROM news ORDER BY news_id DESC LIMIT 1";
						$All_News = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_News)) {
							$Id = $row['news_id'];
							$Branch = $row['news_branch'];
							$Content = $row['news_content'];


							echo "<h4 style='color:#000060; text-align:left; font-family: Alegreybold;'>{$Content}<small> {$Branch}</small></h4>";
							echo "<hr>";
						}	
						?>
					</div>
				</div>
			</div>
			<!--showcase-4 -->
			<!-- <div id="showcase-3">
				<div class="panel panel-default col-4"> -->
					<!--Performance -->
					<!-- <div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">Performance</h4>
					</div>
					<div class="panel-body">

					</div>
				</div>
				<div class="panel panel-default col-3"> -->
					<!-- Traffic -->
					<!-- <div class="panel-heading">
						<h5 style="font-family: 'Alegreybold';" class="panel-title">Traffic</h5>
					</div>
					<div class="panel-body">
						<div class="responsive" id="chart_div" style="width: 100%; height: 300px;"></div>
					</div>
				</div>
			</div> -->

			<!-- begigning of the second showcase-3 -->
			<div class="showcase-4">
				<div id="first-col-4" class="panel panel-default col-4">
					<div class="panel-heading">
						<h4 style="font-family: 'Alegreybold';" class="panel-title">Social Media Feeds</h4>
					</div>
					<div class="panel-body">
						<h5>Nii Koby Aryeetey Armah</h5>
						<p>Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div id="second-col-4" class="panel panel-default col-4">
					<div class="panel-heading">
						<h5 style="font-family: 'Alegreybold';" class="panel-title">Comment</h5>
					</div>
					<div class="panel-body">
						<?php
								$query = "SELECT * FROM Visiters ORDER BY Visiter_Id DESC LIMIT 5 ";
								$All_Comments = mysqli_query($connection,$query);

								while($row = mysqli_fetch_assoc($All_Comments)) {
									$Visiter_Id = $row['Visiter_Id'];
									$Visiter_Name = $row['Visiter_FullName'];
									$Visiter_EmailAddress = $row['Visiter_EmailAddress'];
									$Visiter_Comments = $row['Visiter_Comment'];

									echo "<h5 style='font-family: Alegreybold;'>{$Visiter_Name}: <small>{$Visiter_Comments}</small></h5>";
									echo "<hr>";
								}

							?>
					</div>
				</div>
				<div id="third-col-4" class="panel panel-default col-4">
					<div class="panel-heading">
						<h5 style="font-family: 'Alegreybold';" class="panel-title">Latest Activities</h5>
					</div>
					<div class="panel-body">
						<?php
						$query = "SELECT * FROM Events ORDER BY Event_Id DESC LIMIT 3";
						$All_News = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_News)) {
							$Id = $row['news_id'];
							$Title = $row['Event_Title'];
							$Branch = $row['Event_Branch'];


							echo "<h4 style='text-align:left; font-family: Alegreybold;'>{$Title}<small> {$Branch}</small></h4>";
							echo "<hr>";
						}	
						?>
					</div>
				</div>
			</div>
		</section>
	</header>
	<?php include 'include/Footer.php';?>
</body>
<!--Jquery-->
<?php include 'include/Jquery.php';?>
</html>