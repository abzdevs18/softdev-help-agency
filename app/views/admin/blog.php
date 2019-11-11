<?php require_once APP_ROOT . '/views/admin/inc/header.php'; ?>

	<section class="tg-dash">
		<h1>Blog</h1>
	</section>
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head" style="display:flex;flex-direction:row;">
                <h2>Blog Listing</h2>
                <div style="vertical-align: middle;line-height: 60px;">
                    <a href="<?=URL_ROOT;?>/admin/add_blog"><i class="far fa-plus"></i> Add blog</a>
                </div>
			</div>
			<div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter" id="filter-all">All <span>(<?=$data['blog']['rowCount']?>)</span></li>
					<!-- <li id="filter-featured">Featured <span>(10)</span></li>
					<li id="filter-open">Active <span>(10)</span></li>
					<li>Expired <span>(10)</span></li>
					<li>Deleted <span>(10)</span></li> -->
				</ul>
			</div><!-- End of filter tabs -->
			<div class="job-list-tables" style="margin-top: 30px;">
				<table>
					<thead>
						<tr>
							<th style="text-align: center;"><input type="checkbox" name=""></th>
							<th>Blog Image</th>
							<th>Blog Tittle</th>
							<th>Content</th>
							<th>Date Posted</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<!-- if job is close add row with class name "sold" -->
						<?php foreach($data['blog']['row'] AS $blog) : ?>
						<tr valign="middle">
							<td style="text-align: center;">
								<input type="checkbox" name="">
							</td>
							<td>
                                <div style="background-image: url('<?=URL_ROOT . '/img/blog/' . $blog->blogImage;?>');background-repeat: no-repeat;background-size: cover;background-position: center;width: 100px;height: 100px;margin: 0 auto;border: 2px solid #191623;border-radius: 4px;"></div>
							</td>
							<td class="tittle-id">
								<h3><?=$blog->blogTitle;?></h3>
								<span>Ad ID: <?=$blog->blogId;?></span>
							</td>
							<td class="item-cat">
								<span><?=$blog->blogContent;?></span>	
							</td>
							<td class="price-loc">								
								<h3><?=$blog->blogDate;?></h3>
							</td>
							<td class="action-btn">
								<!-- <span class="eye" data-bId="<?=$blog->blogId;?>"><i class="fal fa-eye"></i></span> -->
								<span class="pencil updateBlogData" data-bId="<?=$blog->blogId;?>"><i class="fal fa-pencil-alt"></i></span>
								<span class="trash deleteBlog" data-bId="<?=$blog->blogId;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>