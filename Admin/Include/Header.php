<!-- Content Header section -->
<section class="content-header">
	<div class="dash-form-group">
		<form action="" method="REQUEST">
			<input name="search" style="font-family: 'Alegrey'; font-weight: 900;" class="dash-search-area" type="text" placeholder="Search" id="search">
			<button name="submit" type="submit" ><img src="Assets/icon/Search.ico" id="Searchicon" aria-hidden="true"></button>
		</form>
	</div>
	<!-- the profile area within the main-content -->
	<div class="profile-area">
		<div class="profile-area-icons">
			<li><a href="#"><i class="fa fa-bell-o" aria-hidden="true">
				<?php
					$query = "SELECT * FROM Visiters LIMIT 100";
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
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count</span>";
					}elseif ($count >= 10) {
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count +</span>";
					}else{
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>0</span>";
					}
				?>
				</i></a></li>
			<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true">
				<?php
					$query = "SELECT * FROM Visiters LIMIT 20";
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
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count</span>";
					}elseif ($count >= 10) {
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count +</span>";
					}else{
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>0</span>";
					}
				?>
			</i></a></li>
			<li><a href="#"><i class="fa fa-globe" aria-hidden="true">
				<?php
					$query = "SELECT * FROM Visiters LIMIT 20";
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
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count</span>";
					}elseif ($count >= 10) {
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count +</span>";
					}else{
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>0</span>";
					}
				?>
			</i></a></li>
			<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true">
				<?php
					$query = "SELECT * FROM Visiters LIMIT 100";
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
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count</span>";
					}elseif ($count >= 10) {
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count +</span>";
					}else{
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>0</span>";
					}
				?>
			</i></a></li>
			<li><a href="#"><i class="fa fa-thumbs-down" aria-hidden="true">
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
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count</span>";
					}elseif ($count >= 10) {
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>$count +</span>";
					}else{
						echo "<span style='font-size: 15px; font-family: 'Alegrey'; font-weight: 900;'>0</span>";
					}
				?>
			</i></a></li>
		</div>
		<div class="profile-area-img">
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-target="#Profile-Area-Drop" role="button"><?php echo "<img height='35px' width='35px;' style='border-radius: 50%;' src='Assets/Img/Users/{$_SESSION['Profile']}'>";?><i class="fa fa-caret-down" aria-hidden="true"></i></a>
				<ul id="#Profile-Area-Drop" class="dropdown-menu" role="menu" aria-expanded="false">
					<li role="presentation"><a href="include/Logout.php"><img id="flaticons" src="assets/icon/Logout.ico"></a></li>
					<li role="presentation"><a href=""><img id="flaticons" src="assets/icon/Validation.ico"></a></li>
					<li role="presentation"><a href=""><img id="flaticons" src="assets/icon/Services.ico"></a></li>
				</ul>
		</div>
	</div>
	<!-- end of the profile area within the main-content -->
	<?php
		if(isset($_REQUEST['submit'])) {
			$search = $_REQUEST['search'];

			$query = "SELECT * FROM Posts WHERE Post_Tags LIKE '%$search%' ";
			$query = "SELECT * FROM Sermons WHERE Serm_Tag LIKE '%$search%' ";
			$query = "SELECT * FROM Branches WHERE Branch_Name LIKE '%$search%' ";
			$query = "SELECT * FROM Ministers WHERE Minister_Title LIKE '%$search%' ";
			$query_search = mysqli_query($connection, $query);

			if (!$query_search) {
				die("QUERY FAILED" . mysqli_error($connection) );
			}

			$count = mysqli_num_rows($query_search);

			if ($count == 0) {
				echo "<h5>NO RESULTS.</h5>";
			}
		}
	?>
</section>
<hr id="hr">