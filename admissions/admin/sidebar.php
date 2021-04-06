<style>
	.sidebar {
	    width: 210px;
	    float: left;
	    position: static;
	    padding-left: 0;
	    padding-right: 0;
	}
</style>
<div id="sidebar" class="sidebar responsive menu-min">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				M
			</button>
			<button class="btn btn-info">
				S
			</button>
			<button class="btn btn-warning">
				I
			</button>
			<button class="btn btn-danger">
				T
			</button>
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>
			<span class="btn btn-info"></span>
			<span class="btn btn-warning"></span>
			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->
	<ul class="nav nav-list">

		<li class="<?php if (basename($_SERVER['PHP_SELF']) == "dashboard.php") echo "active"; ?>" ><a href="dashboard.php"><i class="menu-icon fa fa-home"></i><span class="menu-text"> Dashboard </span></a><b class="arrow"></b></li>
		<?php 
			$user = 'admin';
			if(isset($_SESSION['usertype'])){
				$user = $_SESSION['usertype'];
			}
			
		?>
		
		<?php 
			//If user type is Admin display below Menu itesm
			if($user == 'admin'){
		?>
		
		<!-- <li class="<?php if (basename($_SERVER['PHP_SELF']) == "billdesk.php") echo "active"; ?>" ><a href="billdesk.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text"> BillDesk </span></a><b class="arrow"></b></li>
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "txncheck.php") echo "active"; ?>" ><a href="txncheck.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text"> Txn Check </span></a><b class="arrow"></b></li> -->
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "walkinHT.php") echo "active"; ?>" ><a href="walkinHT.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Walkin HallTicket</span></a><b class="arrow"></b></li>

			<!-- Added by RB on April 6,2018 -->
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "statistics.php") echo "active"; ?>" ><a href="statistics.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">MSIT Statistics</span></a><b class="arrow"></b></li>

			<!-- <li class="<?php if (basename($_SERVER['PHP_SELF']) == "ddPayments.php") echo "active"; ?>" ><a href="ddPayments.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Verify DD</span></a><b class="arrow"></b></li> -->
			
			<!-- <li class="<?php if (basename($_SERVER['PHP_SELF']) == "offlineApplication.php") echo "active"; ?>" ><a href="offlineApplication.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">New Offline App</span></a><b class="arrow"></b></li> -->
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "offlineApps.php") echo "active"; ?>" ><a href="offlineApps.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Offline Apps</span></a><b class="arrow"></b></li>
			<!-- <li class="<?php if (basename($_SERVER['PHP_SELF']) == "distinctApps.php") echo "active"; ?>" ><a href="distinctApps.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Distinct Students</span></a><b class="arrow"></b></li> -->
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "genGatHT.php") echo "active"; ?>" ><a href="genGatHT.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">GAT HallTickets</span></a><b class="arrow"></b></li>
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "genCallLetter.php") echo "active"; ?>" ><a href="genCallLetter.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">GAT CallLetter</span></a><b class="arrow"></b></li>
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "sendHT.php") echo "active"; ?>" ><a href="sendHT.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Send GAT HT</span></a><b class="arrow"></b></li>
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "sendCL.php") echo "active"; ?>" ><a href="sendCL.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Send GAT CL</span></a><b class="arrow"></b></li>
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "genAL.php") echo "active"; ?>" ><a href="genAL.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Admit Letter</span></a><b class="arrow"></b></li>
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "admissionPayments.php") echo "active"; ?>" ><a href="admissionPayments.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Admission Payments</span></a><b class="arrow"></b></li>
			
			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "counselling_registration.php") echo "active"; ?>" ><a href="counselling_registration.php"><i class="menu-icon fa fa-list"></i><span class="menu-text">Counselling Registration</span></a><b class="arrow"></b></li>

			<li class="<?php if (basename($_SERVER['PHP_SELF']) == "web_counseling.php") echo "active"; ?>" ><a href="web_counseling.php"><i class="menu-icon fa fa-chrome"></i><span class="menu-text">Web Counseling</span></a><b class="arrow"></b></li>

		<?php 
			}
			else{
				?>
				<li class="<?php if (basename($_SERVER['PHP_SELF']) == "admissionPayments.php") echo "active"; ?>" ><a href="student_reg_details.php"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Student Registration</span></a><b class="arrow"></b></li>
				
				<li class="<?php if (basename($_SERVER['PHP_SELF']) == "counselling_registration.php") echo "active"; ?>" ><a href="counselling_registration.php"><i class="menu-icon fa fa-list"></i><span class="menu-text">Counselling Registration</span></a><b class="arrow"></b></li>

				<li class="<?php if (basename($_SERVER['PHP_SELF']) == "web_counseling.php") echo "active"; ?>" ><a href="web_counseling.php"><i class="menu-icon fa fa-chrome"></i><span class="menu-text">Web Counseling</span></a><b class="arrow"></b></li>


				<?php
			}
		?>
		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse" style="z-index: 1;">
		 	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		 </div>
		<!--<li class="">
			<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-cogs"></i><span class="menu-text">Administration</span><b class="arrow fa fa-angle-down"></b></a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class=""><a href="colleges.php"><i class="menu-icon fa fa-caret-right"></i>Colleges</a><b class="arrow"></b></li>
				<li class=""><a href="classes.php"><i class="menu-icon fa fa-caret-right"></i>Classes</a><b class="arrow"></b></li>
				<li class=""><a href="durations.php"><i class="menu-icon fa fa-caret-right"></i>Durations</a><b class="arrow"></b></li>
				<li class=""><a href="courses.php"><i class="menu-icon fa fa-caret-right"></i>Courses</a><b class="arrow"></b></li>
				<li class=""><a href="credits.php"><i class="menu-icon fa fa-caret-right"></i>Credits</a><b class="arrow"></b></li>
				<li class=""><a href="mentors.php"><i class="menu-icon fa fa-caret-right"></i>Mentors</a><b class="arrow"></b></li>
				<li class=""><a href="students.php"><i class="menu-icon fa fa-caret-right"></i>Students</a><b class="arrow"></b></li>
			</ul>
		</li>-->
		


	</ul><!-- /.nav-list -->


	<!-- /section:basics/sidebar.layout.minimize -->
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>
