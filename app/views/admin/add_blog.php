<?php require_once APP_ROOT . '/views/admin/inc/header.php'; ?>

	<section class="tg-dash">
		<h1>Post new Blog</h1>
	</section>
	<section class="offices-msgs">
		<div class="alerts-notif" style="width: 60%;margin: 0 auto;">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Blog Content</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<strong>Title:</strong>
						<input type="text" id="blog_title" placeholder="Blog Title" class="form-control">
					</div>
					<div class="form-group">
						<strong>Photo:</strong>
						<input type="file" id="blog_photo" name="blog_photo" placeholder="Username" class="form-control">
					</div>
                    <div class="input-msgs-content">
						<strong>Content:</strong>
                        <div class="container-of-msgs" style="position: relative;">
                            <div class="ctl-msg blog_content" contenteditable></div>
                            <label for="typing-msg" id="label_blog">Type here your message</label>
                        </div>
                    </div>
					<div class="form-group" style="visibility:hidden;">
						<input type="text" name="password" placeholder="First Name*" class="form-control">
					</div>
					<button class="tg-btn post_blog" type="button">Post Blog</button>
				</div>
			</div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>