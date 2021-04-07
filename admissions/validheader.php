<div id="navbar" class="navbar navbar-default    navbar-collapse">
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="dashboardhome.php" class="navbar-brand">
						<small>
							MSIT ADMISSIONS <?php  echo YEARTEXT; ?>
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php if($_SESSION["photo_status"]=="yes") echo "authentication/profile_images/".preg_replace('/[^\w\.\- ]/', '', $_SESSION['thumb_pic_url']); else echo "../assets/avatars/user.jpg"; ?>" alt="Photo" />
								<span class="user-info">
									<small><?php echo $_SESSION['username'];?></small>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>