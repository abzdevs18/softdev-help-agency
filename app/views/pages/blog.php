<?php require_once APP_ROOT . '/views/inc/header.php'; ?>

	<main style="height: 65vh;width: 100%;z-index: 1;background-image:url('<?=URL_ROOT . '/img/blog/' . $data['blogDetails']->blogImage;?>')" id="specific-job">
	</main>
	<section class="profile-p">
		<div class="prof-container">
			<div class="prof-wrapper">
				<div class="prof">
					<div>					
						<div class="candidate">
							<div class="candidate-details" style="width: auto;">
								<div class="candidate_photo" style="text-align: center;vertical-align: middle;line-height: 80px;font-size: 45px;font-family: time-;">
									<!-- <img src="<?=URL_ROOT?>/img/profiles/prof.png"> -->
									A
								</div>
								<div class="candidate_text-content">
									<span class="candidate_designation" style="font-size:12px !important;"><?=$data['blogDetails']->blogDate;?></span>
									<h4 class="candidate_name"><?=$data['blogDetails']->blogTitle;?></h4>
								
								</div>
							</div>
						</div>	
					</div><!-- End of Candidate Profile -->
					<div class="prof-overview" style="border-top:1px solid #E0E0E0;margin-top: 20px;">
						<!-- <div id="Overview-title">
							<p>Overview</p>
						</div> -->
						<div>
							<p><?=$data['blogDetails']->blogContent;?></p>
						</div>
					</div><!-- End of profile Overview -->
				</div>
			</div>
			<div style="width: 350px;">
				<div id="footer-news-feed" style="margin: 0px 30px;">
                    <h4 class="candidate_name" style="margin-bottom: 30px;">More blog</h4>
					<!-- if job is close add row with class name "sold" -->
					<?php foreach($data['blog'] AS $blog) : ?>
                            <div class="footer-news-feed-item blogPreviewId" data-i="<?=$blog->blogId;?>" style="border-bottom:1px solid #99999952">
                                <div class="news-thumbnail">
                                    <img src="<?=URL_ROOT . '/img/blog/' . $blog->blogImage;?>">
                                </div>
                                <div class="news-metadata">
                                    <p style="color: #444;font-size: 16px;"><?=$blog->blogTitle;?></p>
                                    <p><i class="far fa-clock"></i> <?=$blog->blogDate;?></p>
                                </div>
							</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		
	</section>
	
<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>