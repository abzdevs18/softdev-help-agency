<?php foreach ($data['jobs'] as $jobs) : ?>
<div class="result-dash-s" data-postID="<?=$jobs->jId;?>" data-usr="<?=$_SESSION['uId'];?>">
	<?php if($jobs->jType == 'Freelance'):?>
		<a href="#" style="background:#456B80;">Freelance</a>
	<?php elseif($jobs->jType == 'Part Time'):?>
		<a href="#" style="background:#0054FF;">Part Time</a>
	<?php else:?>
		<a href="#" style="background:#FF9000;">Full Time</a>
	<?php endif;?>
	<div class="j-search-res">
		<div class="j-search-data">
			<h3><?=$jobs->jTitle;?></h3>
			<p><?=$jobs->jDesc;?></p>
		</div>
		<div class="j-search-stat">
			<p>P<?=$jobs->jSalary;?>.00</p>
			<span>OPEN</span>
		</div>	
	</div>
	<div style="width: 100%;">
		<ul class="j-search-tag">
			<?php 
			$tags = $jobs->jTags;
			$tag = explode(', ', $tags);
			foreach($tag as $val) : ?>				
			<li>
				<a href="#" data-tag="<?=strtolower($val);?>"><?=ucfirst($val);?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php endforeach; ?>