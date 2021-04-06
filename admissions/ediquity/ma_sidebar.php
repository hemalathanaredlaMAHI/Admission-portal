<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
									<li <?php if(basename($_SERVER['PHP_SELF'])=="ma_dashboard.php") echo "class='active'"; ?> >
							<a href="ma_dashboard.php">
								<i class="icon-home"></i>
								<span class="menu-text"> HOME </span>
							</a>
						</li>
						<li <?php if(basename($_SERVER['PHP_SELF'])=="get_userdetails.php") echo "class='active'"; ?> >
							<a href="get_userdetails.php" class="dropdown-toggle">
								<i class="icon-asterisk"></i>
								<span class="menu-text"> Check Walkin User Details </span>
							</a>
					</li>
						<li <?php if(basename($_SERVER['PHP_SELF'])=="ma_date.php") echo "class='active'"; ?> >
							<a href="ma_date.php" class="dropdown-toggle">
								<i class="icon-cloud-download"></i>
								<span class="menu-text"> Download Walkin Details </span>
							</a>
					</li>
					
					<!-- <li <?php if(basename($_SERVER['PHP_SELF'])=="ma_uploadmarks.php") echo "class='active'"; ?> >
							<a href="ma_uploadmarks.php" class="dropdown-toggle">
								<i class="icon-cloud-upload"></i>
								<span class="menu-text"> Upload Marks </span>
							</a>
					</li>
					
					<li <?php if(basename($_SERVER['PHP_SELF'])=="ma_downloadGAT.php") echo "class='active'"; ?> >
							<a href="ma_downloadGAT.php" class="dropdown-toggle">
								<i class="icon-cloud-upload"></i>
								<span class="menu-text"> Download GAT Data </span>
							</a>
					</li> -->
					
					<li <?php if(basename($_SERVER['PHP_SELF'])=="ma_logout.php") echo "class='active'"; ?> >
							<a href="ma_logout.php" class="dropdown-toggle">
								<i class="icon-off"></i>
								<span class="menu-text"> Logout </span>
							</a>
					</li>	
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
