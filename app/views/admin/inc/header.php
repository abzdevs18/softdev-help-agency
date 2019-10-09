<!DOCTYPE html>
<html>
<head>
	<title><?=SITE_NAME;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="<?=URL_ROOT?>/img/cap.ico">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/admin_style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>


	<script src="<?=URL_ROOT;?>/js/admin_script.js"></script>
	<style type="text/css">		
		@import url("<?=URL_ROOT;?>/css/static_style.css");
	</style>
</head>
<body style="width: auto !important;">
	<main>
		<header class="dashboard-nav">
			<div id="add-post">
				<a href="<?=URL_ROOT;?>/admin/jobPost"><i class="fal fa-bookmark"></i> Post Job</a>
				<div id="notif-icon">
					<button><i class="fal fa-bell"></i></button>
				</div>
			</div>
			<section id="side-navigation">				
				<div class="clip-path">
					<span>
						<i class="fal fa-angle-left caret-left caret"></i>
						<i class="fal fa-angle-right caret-right caret"></i>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="67" viewBox="0 0 20 67">
							<metadata>
								<!--?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?-->
									<x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01">
										<rdf:rdf xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
											<rdf:description rdf:about=""></rdf:description>
										</rdf:rdf>
									</x:xmpmeta>
								<!--?xpacket end="w"?-->
							</metadata>
							<path id="bg" class="cls-1" d="M20,27.652V39.4C20,52.007,0,54.728,0,67.265,0,106.515.026-39.528,0-.216-0.008,12.32,20,15.042,20,27.652Z"></path>
						</svg>						
					</span>
				</div>
				<div id="navigation-scroll" data-simplebar>			
					<div id="logo-admin" dir="ltr"> 
						<div>
							<img src="<?=URL_ROOT;?>/img/logo1.png" id="logo-icon">
						</div>
					</div>
					<div id="admin-profile">
						<div id="profile-container" class="adm-prof">
							<div id="admin-icon">
								<img src="<?=URL_ROOT;?>/img/prof.png">
							</div>
							<div id="admin-details">
								<h3>Hi! I'm Angela</h3>
								<p>Administrator</p>
							</div>
							<div id="admin-edit">
								<a href="<?=URL_ROOT;?>/admin/profile"><i class="fal fa-pencil"></i></a>
							</div>
						</div>
					</div>
					<nav>
						<ul id="menus-nav">
							<li data-link="<?=URL_ROOT;?>/admin" class="menu-active">
								<i class="fal fa-chart-bar"></i>
								<a href="#"> Insights</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/profile">
								<i class="fal fa-cog"></i>
								<a href="#"> Profile settings</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/posted">
								<i class="fal fa-cubes"></i>
								<a href="#"> Posted Jobs</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/biddings">
								<i class="fal fa-envelope"></i>
								<a href="#"> Biddings/Messages</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/payments">
								<i class="fal fa-shopping-cart"></i>
								<a href="#"> Payments</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/favorites">
								<i class="fal fa-heart"></i>
								<a href="#"> My favorites</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/privacy">
								<i class="fal fa-shield-check"></i>
								<a href="#"> Privacy settings</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/users/signout">
								<i class="fal fa-sign-out"></i>
								<a href="#"> Logout</a>
							</li>
						</ul>
					</nav>
				</div>
			</section>
		</header>
	