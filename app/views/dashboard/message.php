<?php require_once APP_ROOT . '/views/dashboard/inc/header.php'; ?>
	<section class="container-msgs">
		<div id="msg-container">
			<div class="list-of-connections">
				<div id="connection-search">
					<input type="text" name="search" placeholder="Search">
					<i class="far fa-search"></i>
				</div>	
				<div id="users">
					<?php for($i = 0; $i < 2; $i++):?>
						<div class="user-items">
							<div class="convo-prof">
								<img src="<?php echo URL_ROOT. '/img/profiles/prof.png' ?>">
							</div>
							<div class="convo-">
								<div class="list-data">
									<h3>Name of worker</h3>
									<span>10:23 am</span>								
								</div>
								<div class="convo-inf">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</div>
			<div class="conversation">
					<div class="msgs-3-col-item">
						<div class="message-container" class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark">
							<?php for($i = 0; $i < 20; $i++):?>
								<div class="message-reciever">
									<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
									<div class="msg-content">
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur.</p>
										<span>Jan. 13, 2019</span>
									</div>
								</div>
								<div class="current-user-sender icon-receiver">
									<div class="msg-content">
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur.</p>
										<span>Jan. 13, 2019 <i class="far fa-check"></i></span>
									</div>
									<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
								</div>
								<div class="message-reciever">
									<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
									<div class="msg-content">
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur.</p>
										<span>Jan. 13, 2019</span>
									</div>
								</div>
							<?php endfor; ?>
						</div>
						<div class="input-msgs-content">
							<div class="container-of-msgs">
								<div class="ctl-msg" contenteditable>
									
									<label for="typing-msg">Type here your message</label>
								</div>
								<div class="cta-buttons">
									<i class="fal fa-thumbs-up"></i>
									<i class="fal fa-thumbs-down"></i>
									<span id="sendbtn"><?=$data['workID'];?>Send</span>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="conversation-details">
				<div class="conversation-about">
					<h3>Project details</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. </p>
					<p class="project-for"><i class="far fa-link"></i> Project for <span>Clint Anthony Abueva</span></p>
				</div>
				<div class="conversation-about">
					<h3>People in Chat</h3>
					<div class="peps-chat">
						<div class="pep-wrap">
							<div class="pep-img">
								<img src="<?php echo URL_ROOT. '/img/profiles/prof2.jpg' ?>">
								<span class="status-avail"></span>
							</div>
							<div class="pep-links">
								<a href="#">Clint Anthony Abueva</a>
								<span>Last seen 3 months ago</span>
							</div>
						</div><!-- End of pep-wrapper -->
						<div class="pep-wrap">
							<div class="pep-img">
								<img src="<?php echo URL_ROOT. '/img/profiles/prof2.jpg' ?>">
								<span class="status-avail"></span>
							</div>
							<div class="pep-links">
								<a href="#">Diomar (You)</a>
								<span>Last seen 3 months ago</span>
							</div>
						</div><!-- End of pep-wrapper -->
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>