<section id="aside-bar">
		<div class="columnLeft nav">
		<div align="center" class="left-profile">
			<?php echo "<img class='img-reponsive' style='border-radius: 50%; height:120; width:120px; align: center;' src='Assets/Img/Users/{$_SESSION['Profile']}'>"?>
			<div class="left-profile-bottom">
				<h4 style="color:#fff; padding-bottom: 2px; font-family: 'Alegreybold';">Welcome, </h4>
				<h4 style="color: #ccc; font-family: 'Alegrey';"><?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName']?></h4>
				<h4 style="color: #fff; font-family: 'Alegrey'; font-size: 15px;"><?php echo $_SESSION['Email']?></h4>
				<h5 style="color: #fff; margin-top: 10px; font-family: 'Alegreybold'; font-weight: 900;">Online<span class=""></span></h5>
			</div>
		</div>
		<!-- end of the aside bar profile image area -->
		<div class="side-nav">
			<!-- begining of the aside bar navigation -->
			<h5 style="color: #ccc;"><strong>DASHBOARD</strong></h5>
			<ul>
				<li style="font-family: 'Alegreybold';"><a href="Index.php"><img id="flaticons" src="Assets/icon/Dashb.ico"> Dash</a></li>
				<li style="font-family: 'Alegreybold';"><a href="News.php"><img id="flaticons" src="Assets/icon/Image.ico"> News</a></li>
				<li style="font-family: 'Alegreybold';"><a href="#" ><img id="flaticons" src="Assets/icon/Image.ico"> Gallery</a></li>
				<li style="font-family: 'Alegreybold';" class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" data-target="#Up-Drop" role="button"><img id="flaticons" src="Assets/icon/Uploads.ico"> Upload <i class="caret"></i></a>
					<ul id="#Up-Drop" class="dropdown-menu" role="menu" aria-expanded="false">
						<li role="presentation"><a role="menuitem" tabindex="1" href="Sermon.php"><img id="flaticons" src="Assets/icon/Sermon.ico">Sermon</a></li>
						<li role="presentation"><a role="menuitem" tabindex="2" href="CreatePost.php"><img id="flaticons" src="Assets/icon/Create_blog.ico">Blog</a></li>
						<li role="presentation"><a role="menuitem" tabindex="3" href="Events.php"><img id="flaticons" src="Assets/icon/Events.ico">Events</a></li>
					</ul>
				</li>
			</ul>
			<div>
				<li style="font-family: 'Alegreybold';" class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" data-target="#Settings-Drop" role="button"><img id="flaticons" src="Assets/icon/Services.ico"> Settings <i class="fa fa-caret-down"></i></a>
					<ul id="#Settings-Drop" class="dropdown-menu" role="menu" aria-expanded="false">
						<li role="presentation"><a role="menuitem" tabindex="1" href="Tag-Cat.php"><img id="flaticons" src="Assets/icon/Category.ico">Tag / Category</a></li>
						<li role="presentation"><a role="menuitem" tabindex="2" href="Branch.php"><img id="flaticons" src="Assets/icon/Branches.ico">Add Branch</a></li>
						<li role="presentation"><a role="menuitem" tabindex="3" href="Ministers.php"><img id="flaticons" src="Assets/icon/Minister.ico">Add Minister</a></li>
					</ul>
				</li>
			<li style="font-family: 'Alegreybold';"><a href="Evangelism.php"><img id="flaticons" src="Assets/icon/CalendarPlus.ico"> Evangelism</a></li>
				<li style="font-family: 'Alegreybold';" class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" data-target="#Admin-Drop" role="button"><img id="flaticons" src="Assets/icon/Admini.ico"> Administrator <i class="fa fa-caret-down"></i></a>
					<ul id="#Admin-Drop" class="dropdown-menu" role="menu" aria-expanded="false">
						<li role="presentation"><a role="menuitem" tabindex="1" href="Overview.php"><img id="flaticons" src="Assets/icon/Overview.ico">Overview</a></li>
						<li role="presentation"><a role="menuitem" tabindex="2" href="Users.php"><img id="flaticons" src="Assets/icon/Users.ico"> Users</a></li>
						<li role="presentation"><a role="menuitem" tabindex="3" href="Traffic"><img id="flaticons" src="Assets/icon/Traffic.ico">Traffic</a></li>
						<li role="presentation"><a role="menuitem" tabindex="4" href="Commentfeeds.php"><img id="flaticons" src="Assets/icon/Layout.ico">Contact Feeds</a></li>
					</ul>
				</li>
				<li style="font-family: 'Alegreybold';"><a href=""><img id="flaticons" src="Assets/icon/GroupMessage.ico">Social Feeds <i class="fa fa-instagram" aria-hidden="true"></i><i class="fa fa-facebook" aria-hidden="true"></i><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<h5 style="color: #ccc;"><strong>USEFUL LINKS</strong></h5>
				<li style="font-family: 'Alegreybold';"><a href="#"><img id="flaticons" src="Assets/icon/Open.ico" > Documentation</a></li>
				<li style="font-family: 'Alegreybold';" class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" data-target="#Settings-Drop" role="button"><img id="flaticons" src="Assets/icon/Registration.ico"> Profile <i class="fa fa-caret-down"></i></a>
					<ul id="#Settings-Drop" class="dropdown-menu" role="menu" aria-expanded="false">
						<li role="presentation"><a role="menuitem" tabindex="1" href=""><img id="flaticons" src="Assets/icon/Registration.ico"> Update Profile</a></li>
						<li role="presentation"><a role="menuitem" tabindex="2" href="include/Logout.php"><img id="flaticons" src="Assets/icon/Logout.ico"> Logout</a></li>
					</ul>
				</li>
			</div>
		</div>
	</div>
	<!-- end of the navigation bar -->
</section>