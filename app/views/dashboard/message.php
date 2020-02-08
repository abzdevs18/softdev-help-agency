<?php require_once APP_ROOT . '/views/dashboard/inc/header.php'; ?>
	<section class="container-msgs">
		<div id="msg-container">
			<div class="list-of-connections">
				<div id="connection-search">
					<input type="text" name="search" placeholder="Search">
					<i class="far fa-search"></i>
				</div>	
				<div id="users">
					<?php if($data['userData']->userType):?>
						<?php if (!$data['userBid']): ?>
							<b class='n-res'>No result!!</b>	
						<?php else: ?>
						<?php foreach ($data['userBid'] as $user) : ?>
							<div class="user-items msg-u" data-u="<?=$user->bidderId?>">
								<div class="convo-prof">
									<div id="account-thumbnail" style="width:50px;height:50px;background-image: url('<?php echo URL_ROOT . '/img/profiles/' .  $user->imageBidder; ?>');">
									</div>
									<!-- <img src="<?php echo URL_ROOT. '/img/profiles/' . $user->img_path; ?>"> -->
								</div>
								<div class="convo-">
									<div class="list-data">
										<h3 style="text-transform: capitalize;"><?=$user->username?></h3>
										<span><?=$user->msgTime?></span>								
									</div>
									<div class="convo-inf">
										
										<p><span style="font-weight:'bold'"><?php if($user->sender == $_SESSION['uId']){echo 'You: ';}?></span> <?=$user->msgContent?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<?php endif; ?>
					<?php else:?>
						<?php if (!$data['userMessage']): ?>
							<b class='n-res'>No result!!</b>	
						<?php else: ?>
						<?php foreach ($data['userMessage'] as $user) : ?>
							<div class="user-items msg-u" data-u="<?=$user->sender?>">
								<div class="convo-prof">
									<?php if($user->imageBidder) : ?>
										<div id="account-thumbnail" style="width:50px;height:50px;background-image: url('<?php echo URL_ROOT . '/img/profiles/' . $user->imageBidder; ?>');">
										</div>
									<?php else: ?>
										<div id="account-thumbnail" style="width:50px;height:50px;line-height: 50px;vertical-align: middle;text-align: center;background: var(--dark-font);color: #fff;font-size:25px;">
										<?=$user->username[0];?>
										</div>
									<?php endif;?>
									<!-- <div id="account-thumbnail" style="width:50px;height:50px;background-image: url('<?php echo URL_ROOT . '/img/profiles/' .  $user->imageBidder; ?>');">
									</div> -->
									<!-- <img src="<?php echo URL_ROOT. '/img/profiles/' . $user->img_path; ?>"> -->
								</div>
								<div class="convo-">
									<div class="list-data">
										<h3 style="text-transform: capitalize;"><?=$user->username?></h3>
										<span><?=$user->msgTime?></span>								
									</div>
									<div class="convo-inf">
										<p><?=$user->msgContent?></p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<?php endif; ?>
					<?php endif;?>
				</div>
			</div>
			<div class="conversation">
					<div class="msgs-3-col-item hgt">
						<div class="message-container mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark">
							<?php if($data["messagesBid"]) : ?>								
								<?php foreach($data['messagesBid'] as $message) :
										//  $image = URL_ROOT . '/img/profiles/' . $message->sendIconImage;
										?>
										<?php if($message->receiverId == $_SESSION['uId']) : 
											// $GLOBALS['image']= URL_ROOT . '/img/profiles/' . $message->sendIconImage;
											?>
											<div class="message-reciever">
												<!-- <img src="<?=URL_ROOT?>/img/profiles/<?=$message->sendIconImage?>" /> -->
												<div class="msg-content">
													<p><?=$message->msgContent?></p>
													<span><?=$message->msgDate?></span>
												</div>
											</div>
										<?php else :?>
											<div class="current-user-sender icon-receiver">
												<div class="msg-content">
													<p><?=$message->msgContent?></p>
													<!-- <span><?=$message->msgDate?> <i class="far fa-check"></i></span> -->
												</div>
												<!-- <img src="<?php echo URL_ROOT. '/img/profiles/' . $user->img_path; ?>" /> -->
											</div>
										<?php endif;?>
								<?php endforeach;?>
							<?php else : ?>
						
							<?php endif;?>
						</div>
						<div class="input-msgs-content">
							<div class="container-of-msgs" style="position: relative;">
								<div class="ctl-msg" contenteditable></div>
								<label for="typing-msg">Type here your message</label>
								<div class="cta-buttons">
									<!-- <i class="fal fa-thumbs-up"></i>
									<i class="fal fa-thumbs-down"></i> -->
									<span id="sendbtn" data-sr="<?=$_SESSION['uId']?>" data-rv="<?=$_SESSION['workerID'];?>">Send</span>
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
<script src="<?=URL_ROOT;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/tag.js"></script>
<script type="module" src="<?=URL_ROOT;?>/js/script.js"></script>
</body>
</html>