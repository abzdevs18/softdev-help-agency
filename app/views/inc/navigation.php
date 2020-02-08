	<nav>
		<div id="nav_container">
			<div id="logo">
				<a href="<?=URL_ROOT;?>"><img src="<?=SITE_LOGO;?>"></a>
			</div>
				<div style="position: relative;width:45%;">
					<div class="search-field-prof" style="background:#fff;">
						<i class="fas fa-search"></i>
						<input type="hidden" id="userID" value="<?=$_SESSION['uId'];?>">
						<input type="text" name="search" placeholder="search" id="prof-query" autocomplete style="background:none;border:none;">
						<span id="clear-search"><i class="far fa-times"></i></span>
					</div>
					<div class="s-wrapper">
						<!-- Jobs to show here -->
					</div>
				</div>
			<ul>
				<!-- <li class="nav" data-page="home"><a href="<?=URL_ROOT;?>">HOME</a></li>
				<li class="nav" data-page="employee"><a href="<?=URL_ROOT . '/pages/employee';?>">EMPLOYEERS</a></li>
				<li class="nav" data-page="job"><a href="<?=URL_ROOT . '/pages/job_oppotunities';?>">JOB OPPORTUNITIES</a></li> -->
				<!-- <li class="nav" data-page="contact"><a href="<?=URL_ROOT . '/pages/how_it_works';?>">HOW IT WORKS</a></li>
				<li class="nav" data-page="about"><a href="<?=URL_ROOT . '/pages/about';?>">ABOUT US</a></li> -->
			</ul>
			<div class="post_job_btn nav-action-btn">
				<!-- <a href="#">Login</a> -->
				<a href="<?=URL_ROOT . '/users';?>">Login</a>
				<a href="<?=URL_ROOT . '/users/signup';?>">create account &nbsp;<i class="far fa-plus"></i></a>
			</div>			
		</div>
	</nav>