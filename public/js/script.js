$(document).on('keyup','#prof-query',function(){
	var varl = $(this).val();

	if (varl.length != "") {
		$("#clear-search").show(100);
	}else{
		$("#clear-search").hide(100);
	}
});

$(document).on('click','#clear-search',function(){
	$('#prof-query').val('');
	$("#clear-search").hide(100);
});

$(document).on('click','.filter-btn',function(){
	$(".content-tbl").hide();
	var data = $(this).attr('data-filter');
	if (data == 'activeBids') {
		$('.activeBids').show();
	}else if (data == 'currentWork'){
		$('.currentWork').show();
	}else if (data == 'inviteToWork'){
		$('.inviteToWork').show();
	}else if (data == 'pastWork'){
		$('.pastWork').show();
	}
});

/*From somewhere else*/
$(document).on('click', '.latest-job', function(){
	var id = $(this).attr('data-postID');
	window.location.href = "pages/jobDetails/" + id;
});

/*Clicking the link to the Worker's profile*/
$(document).on('click','.candidate', function(){
	window.location.href = "../pages/worker_details";
});

$(document).on('click', '#company-link', function(){
	window.location.href = "../pages/companyProfile";
});

$(document).on('click','.ctl-msg',function(){
	$('.ctl-msg label').hide();
	$(this).focusout(function(e){
		console.log($(this).text().length);
	});
});

/**
* @title: Dashboard Script
* @desc: This is the script for job posting in dashboard of a client
*/

$(document).on('click', '#nxt_postJob', function(){

	var current_form,next_form,prev_form;

	current_form = $(this).parent();
	next_form = $(this).parent().next();

	/**
	* @desc we use serializeArray() to add a value from a non form inputs in 
	* this case life getting value from span
	*/
	var fd = $('form').serializeArray();
	var feat = $('.f-job span.f-active').attr('data-feature');
	fd.push({name: "feat", value: feat});
	
	$.ajax({
		url: "../dashboard/primaryValidation",
		type: 'POST',
		dataType: 'json',
		data: $.param(fd),
		beforeSend: function(){
			console.log("Sendding");
		},
		success: function(data){
			if (data["status"] == 1) {
				feedbackDefault('f-form');
				// $('.jobPost-progress div').eq($(".job-d fieldset").index(next_form)).removeClass('active');
				$('.jobPost-progress div').eq($(".job-d fieldset").index(next_form)).addClass('active');


				current_form.hide();
				next_form.show();
			}else {
				if (data['jTitle_err']) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("jTitle", data['jTitle_err']);
				} else{
					feedbackHide("jTitle");
				}
				if (data['jDesc_err']) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("jDesc", data['jDesc_err']);
				} else{
					feedbackHide("jDesc");
				}
			}
		},
		error: function(err){
			console.log(err);
		}
	});
});

$(document).on('click', '#back_postJob', function(){

	var current_form,next_form,prev_form;

	current_form = $(this).parent();
	prev_form = $(this).parent().prev();
	current_form.hide();
	prev_form.show();
});

$(document).on('click','.f-job span',function(){
	var feat;
	$('.f-job span').removeAttr('class');
	$(this).addClass('f-active');

	feat = $(this).attr('data-feature');
	console.log(feat);
});

$(document).on('click', '#submit-job', function(e){
	e.preventDefault();
	var current_form,next_form,prev_form;

	current_form = $(this).parent();
	next_form = $(this).parent().next();


	/**
	* @desc we use serializeArray() to add a value from a non form inputs in 
	* this case life getting value from span
	*/
	var fd = $('form').serializeArray();
	var feat = $('.f-job span.f-active').attr('data-feature');
	fd.push({name: "feat", value: feat});
	
	$.ajax({
		url: "../dashboard/additionalValidation",
		type: 'POST',
		dataType: 'json',
		data: $.param(fd),
		beforeSend: function(){
			console.log("Sendding");
		},
		success: function(data){
			if (data["status"] == 1) {
				feedbackDefault('f-form');
				// $('.jobPost-progress div').eq($(".job-d fieldset").index(next_form)).removeClass('active');
				$('.jobPost-progress div').eq($(".job-d fieldset").index(next_form)).addClass('active');

				$.ajax({
					url: "../dashboard/submitJob",
					type: 'POST',
					dataType: 'json',
					data: $.param(fd),
					beforeSend: function(){
						console.log("Sendding");
					},
					success: function(data){
						console.log(data + " Ohhhh");
						current_form.hide();
						next_form.show();
					},
					error:function(err){
						console.log(err);
					}
				});
			}else {
				if (data['jType_err']) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("jType", data['jType_err']);
				} else{
					feedbackHide("jType");
				}
				if (data['jLoc_err']) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("jLoc", data['jLoc_err']);
				} else{
					feedbackHide("jLoc");
				}
				if (data['jDead_err']) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("jDead", data['jDead_err']);
				} else{
					feedbackHide("jDead");
				}
			}
			console.log('s');
			console.log(data);
		},
		error: function(err){
			console.log(err);
		}
	});
});

/*This two function below will show and hide the feedback during the validation process*/
function feedbackDefault(container){
	$('.' + container + ' .ins-wrapper > input').removeClass('invalid-box-shadow');
	$('.' + container + ' .invalid-feedback').hide();
}

function feedbackShow(container, data){
	$('.' + container + ' .ins-wrapper > input').addClass('invalid-box-shadow');
	$('.' + container + ' .invalid-feedback').show().text(data);
}

function feedbackHide(container){
	$('.' + container + ' .ins-wrapper > input').removeClass();
	$('.' + container + ' .invalid-feedback').hide();
}