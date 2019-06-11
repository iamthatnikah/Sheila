<!Doctype html>
<html lang="en">
<?php include 'include/Head.php';
if (!isset($_SESSION['User_Id'])) {
	header('Location: include/Login.php');
}
?>
	<body>
		<?php include 'include/Aside.php';?>
		<?php include 'include/Header.php';?>

		<section class="main-content">
			<div id="Event" class="panel panel-default contact-form">
				<div class="panel-heading">
					<h5 class="panel-title">Events</h5>
				</div>
				<div class="panel-body">
					<?php 
					if (isset($_POST['Add'])) {
						$EventImage = $_FILES['EventImage']['name'];
						$EventImage_Temp = $_FILES['EventImage']['tmp_name'];
						move_uploaded_file($EventImage_Temp, "Assets/Img/Events/$EventImage");


						$EventTitle = $_POST['EventTitle'];
						$EventHost = $_POST['EventHost'];
						$EventGuest = $_POST['EventGuest'];
						$EventDayStart = $_POST['EventDayStart'];
						$EventDayEnd = $_POST['EventDayEnd'];
						$EventTimeStart = $_POST['EventTimeStart'];
						$EventTimeStartAfix = $_POST['EventTimeStartAfix'];
						$EventTimeEnd = $_POST['EventTimeEnd'];
						$EventTimeEndAfix = $_POST['EventTimeEndAfix'];
						$EventBranch = $_POST['EventBranch'];
						$EventVenue = $_POST['EventVenue'];



						if ($EventTitle == "" || empty($EventTitle)) {
							echo "This field should not be empty.";
						}else{
							$Query = "INSERT INTO Events(Event_Id,Event_Image,Event_Title,Event_Host,Event_Guest,Event_DayStart,Event_DayEnd,Event_TimeStart,Event_TimeStartAfix,Event_TimeEnd,Event_TimeEndAfix,Event_Branch,Event_Venue)";
							$Query .= "VALUES(Null,'$EventImage','$EventTitle','$EventHost','$EventGuest','$EventDayStart','$EventDayEnd','$EventTimeStart','$EventTimeStartAfix','$EventTimeEnd','$EventTimeEndAfix','$EventBranch','$EventVenue')";
							$Create_Event = mysqli_query($connection, $Query);

							if (!$Create_Event) {
								die('QUERY FAILED' .' '. mysqli_error($connection));
							}
						}
						
					}?>
				<form action="" method="Post"  enctype="multipart/form-data">
					<div>
						<label>Event Image</label>
						<input class="form-control" type="file" name="EventImage">
					</div>
					<br>
					<div class="form-group">
						<label>Event Title</label>
						<input class="form-control" type="text" name="EventTitle">
					</div>
					<br>
					<div id="Host-Guest" class="form-group">
						<div>
							<label>Event Host</label>
							<input class="form-control" type="text" name="EventHost">
						</div>
						<div>
							<label>Event Guest</label>
							<input class="form-control" type="text" name="EventGuest">
						</div>
					</div>
					<br>
					<div id="Host-Guest" class="form-group">
						<div>
							<label>Event Start</label>
							<select class="form-control" type="text" name="EventDayStart">
								<option>Sunday</option>
								<option>Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
								<option>Saturday</option>
							</select>
						</div>
						<div>
							<label>Event End</label>
							<select class="form-control" type="text" name="EventDayEnd">
								<option></option>
								<option>Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
								<option>Saturday</option>
								<option>Sunday</option>
							</select>
						</div>
					</div>
					<br>
					<div id="Time" class="form-group">
						<div>
							<label>Starting Time</label>
							<select class="form-control" type="text" name="EventTimeStart">
								<option>1:00</option>
								<option>2:00</option>
								<option>3:00</option>
								<option>4:00</option>
								<option>5:00</option>
								<option>6:00</option>
								<option>7:00</option>
								<option>8:00</option>
								<option>9:00</option>
								<option>10:00</option>
								<option>11:00</option>
								<option>12:00</option>
							</select>
						</div>
						<div>
							<label>AM / PM</label>
							<select class="form-control" type="text" name="EventTimeStartAfix">
								<option>AM</option>
								<option>PM</option>
							</select>
						</div>
						<div>
							<label>Ending Time</label>
							<select class="form-control" type="text" name="EventTimeEnd">
								<option>13:00</option>
								<option>14:00</option>
								<option>15:00</option>
								<option>16:00</option>
								<option>17:00</option>
								<option>18:00</option>
								<option>19:00</option>
								<option>20:00</option>
								<option>21:00</option>
								<option>22:00</option>
								<option>23:00</option>
								<option>00:00</option>
							</select>
						</div>
						<div>
							<label>PM / AM</label>
							<select class="form-control" type="text" name="EventTimeEndAfix">
								<option>PM</option>
								<option>AM</option>
							</select>
						</div>
					</div>
					<br>
					<div id="Host-Guest" class="form-group">
						<div class="form-group">
							<label>Branch:</label>
							<br>
							<select class="form-control" name="EventBranch">
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
						<div>
							<label>Venue</label>
							<input class="form-control" type="text" name="EventVenue">
						</div>
					</div>
					<br>
					<button class="btn btn-full" type="submit" name="Add">Upload</button>
					<button class="btn btn-full">Save</button>
				</form>
				</div>
			</div>
			<div id="Event" class="panel panel-default contact-form">
				<div class="panel-heading">
					<h5 class="panel-title">Uploaded Events</h5>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Image</th>
								<th>Title</th>
								<th>Host</th>
								<th>Day</th>
								<th>Time</th>
								<th>Venue</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$Query = "SELECT * FROM Events";
								$All_Events = mysqli_query($connection, $Query);

								while ($row = mysqli_fetch_assoc($All_Events)) {

									$Id = $row['Event_Id'];
									$Image = $row['Event_Image'];
									$Title = $row['Event_Title'];
									$Host = $row['Event_Host'];
									$Guest = $row['Event_Guest'];
									$DayStart = $row['Event_DayStart'];
									$DayEnd = $row['Event_DayEnd'];
									$TimeS = $row['Event_TimeStart'];
									$StartAfix = $row['Event_TimeStartAfix'];
									$TimeE = $row['Event_TimeEnd'];
									$EndAfix = $row['Event_TimeEndAfix'];
									$Venue = $row['Event_Venue'];


									echo "<tr>";
									echo "<td style='text-align:left;'>{$Id}</td>";
									echo "<td><img style='Width:100%;' class='img-responsive'; src='Assets/Img/Events/{$Image}'></td>";
									echo "<td style='text-align:left;'>{$Title}</td>";
									echo "<td style='text-align:left;'>{$Host}</td>";
									echo "<td style='text-align:left;'>{$DayStart}</td>";
									echo "<td style='text-align:left;'>{$TimeS}{$StartAfix}</td>";
									echo "<td style='text-align:left;'>{$Venue}</td>";
									echo "<td><a href='Events.php?update={$Id}'>Update</a><a style='margin-left: 20px;' href='Events.php?delete={$Id}'>Delete</a></td>";
									echo "</tr>";
								}
								?>
							</tr>
						</tbody>
					</table>
				<?php
					if (isset($_GET['delete'])) {
						$Event_Id = $_GET['delete'];
						$Query = "DELETE FROM Events WHERE Event_Id = {$Event_Id}";
						$Delete_Event = mysqli_query($connection, $Query);
						header("Location: Events.php");
					}
					?>
				</div>
			</div>
		</section>
		<!-- Footer Section-->
		<?php include 'include/Footer.php';?>
	</body>
	<!--Jquery-->
	<?php include 'include/Jquery.php';?>
</html>