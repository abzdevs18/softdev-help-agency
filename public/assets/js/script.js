$(document).on('click','.latest-job',function(){
	window.location.href="job-details.php";
});

/*
redirecting to cadidate info
*/

$(document).on('click','.candidate',function(){
	window.location.href="worker.php";
});

$(document).on('click','.nav',function(){
	var page = $(this).data("page");

	if (page == "home") {
		window.location.href="index.php";
	}else if (page == "employee") {
		window.location.href="employeer.php";
	}else if (page == "job") {
		window.location.href="job-op.php";
	}else if (page == "about") {
		window.location.href="about.php";
		$('nav').addClass('fixedNav');
	}else if (page == "contact") {
		window.location.href="contact.php";
	}
});


$(document).on('click','.company-logo',function(){
	var company_link = $(this).data('comname');
	
	window.location.href="company-profile.php";
});