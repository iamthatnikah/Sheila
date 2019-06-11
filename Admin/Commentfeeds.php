<!Doctype html>
<html lang="en">
	<?php include 'Include/Head.php';
	if (!isset($_SESSION['User_Id'])) {
	header('Location: include/Login.php');
}?>
	<body>
		<!--Aside Bar-->
		<?php include 'Include/Aside.php';?>
		<!--Main-Content-Header Section-->
		<?php include 'Include/Header.php';?>
		<section class="main-content">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Comment Feeds</h5>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Full Name</th>
								<th>Email Address</th>
								<th>Comments</th>
							</tr>
						</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM Visiters";
						$All_Visiters = mysqli_query($connection,$query);

						while($row = mysqli_fetch_assoc($All_Visiters)) {
							$Visiter_Id = $row['Visiter_Id'];
							$Visiter_Name = $row['Visiter_FullName'];
							$Visiter_EmailAddress = $row['Visiter_EmailAddress'];
							$Visiter_Comment = $row['Visiter_Comment'];

							echo "<tr>";
							echo "<td>{$Visiter_Id}</td>";
							echo "<td>{$Visiter_Name}</td>";
							echo "<td>{$Visiter_EmailAddress}</td>";
							echo "<td>{$Visiter_Comment}</td>";
							echo "<td><a href='Commentfeeds.php?delete={$Visiter_Id}'>Delete</a></td>";
							echo "</tr>";
						} 

						if (isset($_GET['delete'])) {
							$The_Visiter_Id = $_GET['delete'];
							$Query = "DELETE FROM Visiters WHERE Visiter_Id = {$The_Visiter_Id}";
							$delete_User = mysqli_query($connection, $Query);
							header("Location: Commentfeeds.php");
						}
						?>
					</tbody>
				</div>
				</table>
		</section>
		<!-- Footer Section-->
		<?php include 'Include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'Include/Jquery.php';?>
</html>