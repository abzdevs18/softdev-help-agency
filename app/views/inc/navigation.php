	<nav>
		<div id="nav_container">
			<div id="logo">
				<a href="<?=URL_ROOT;?>"><img src="<?=URL_ROOT;?>/img/black-logo.png"></a>
			</div>
			<ul>
				<li class="nav" data-page="home"><a href="<?=URL_ROOT;?>">HOME</a></li>
				<li class="nav" data-page="employee"><a href="<?=URL_ROOT . '/pages/employee';?>">EMPLOYEERS</a></li>
				<li class="nav" data-page="job"><a href="<?=URL_ROOT . '/pages/job_oppotunities';?>">JOB OPPORTUNITIES</a></li>
				<li class="nav" data-page="contact"><a href="<?=URL_ROOT . '/pages/how_it_works';?>">HOW IT WORKS</a></li>
				<li class="nav" data-page="about"><a href="<?=URL_ROOT . '/pages/about';?>">ABOUT US</a></li>
			</ul>
			<div class="post_job_btn nav-action-btn">
				<!-- <a href="#">Login</a> -->
				<a href="#">Login</a>
				<a href="<?=URL_ROOT . '/users/signup';?>">create account &nbsp;<i class="fas fa-plus-circle"></i></a>
			</div>			
		</div>
	</nav>