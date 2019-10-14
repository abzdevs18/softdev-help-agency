	<footer style="width: 100%;background-color: #191623;display: block;">
		<div style="width: 85%;display: flex;flex-direction: row;justify-content: space-between;margin: 0 auto;">			
			<div id="footer-left">
				<h4>subscribe now</h4>
				<form id="subcribe-email">
					<input id="subs-email" type="" name="subscribe" placeholder="enter your email address">
					<input id="subs-btn" type="submit" name="submit" value="submit">
				</form>
			</div>
			<div id="footer-right">
				<ul>
					<li class="social-icon">
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
					</li>
					<li class="social-icon">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
					</li>
					<li class="social-icon">
						<a href="#"><i class="fab fa-dribbble"></i></a>
					</li>
					<li class="social-icon">
						<a href="#"><i class="fab fa-twitter"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div id="footer">
			<div class="footer-items">
				<img src="<?=URL_ROOT;?>/img/logo-white.png">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. <br /> <br />Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</p>
			</div>
			<div class="footer-items">
				<h4>News Feeds</h4>
				<div id="footer-news-feed">
					<div class="footer-news-feed-item">
						<div class="news-thumbnail">
							<img src="<?=URL_ROOT;?>/img/news-update/news_small_2.jpg">
						</div>
						<div class="news-metadata">
							<p>It is a long establish that a reader</p>
							<p><i class="far fa-clock"></i> <span>1 </span> hours ago</p>
						</div>
					</div>
					<div class="footer-news-feed-item">
						<div class="news-thumbnail">
							<img src="<?=URL_ROOT;?>/img/news-update/news_small_2.jpg">
						</div>
						<div class="news-metadata">
							<p>It is a long establish that a reader</p>
							<p><i class="far fa-clock"></i> <span>1 </span> hours ago</p>
						</div>
					</div>
					<div class="footer-news-feed-item">
						<div class="news-thumbnail">
							<img src="<?=URL_ROOT;?>/img/news-update/news_small_2.jpg">
						</div>
						<div class="news-metadata">
							<p>It is a long establish that a reader</p>
							<p><i class="far fa-clock"></i> <span>1 </span> hours ago</p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-items">
				<h4>Photo Gallery</h4>
				
			</div>
		</div>
	</footer>
	<!-- Modals And everythin -->

	<div class="modal profile-prev" style="display: none;">
		<div class="modal-container" style="width: 40%;">
			<section class="form">
				<div class="awesome" style="width: 87%;min-height: 300px;">
					<div class="icon profID">

					</div>
					<div class="add user-btns" style="display: flex;flex-direction: row;">
						<button data-action="cancel">Cancel</button>
						<button data-action="save" style="background-color: green;color: #fff;">Save</button>
					</div>
				</div>
			</section>			
		</div>
	</div>

	<script src="<?=URL_ROOT;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/tag.js"></script>
	<script src="<?=URL_ROOT;?>/js/script.js"></script>
</body>
</html>