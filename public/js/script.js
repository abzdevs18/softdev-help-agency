import './main.js';
import { URL_ROOT } from './main.js';
// let URL_ROOT = "";

//For scrollBar
$(".message-container").mCustomScrollbar({
	autoHideScrollbar: true,
	setTop: "-100%"
});

/*ENd ScrollBar*/

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
	$('.s-wrapper').slideUp(100);
});

$(document).on('click','.filter-btn',function(){
	$('.filter-btn').removeClass('active-second-menu');
	$(this).addClass('active-second-menu');
	$(".content-tbl").hide();
	var data = $(this).attr('data-filter');

	if (data == 'activeBids') {
		$('.tbl-active').show();
	}else if (data == 'openJobs'){
		$('.openJobs').show();
	}else if (data == 'currentWork'){
		$('.currentWork').show();
	}else if (data == 'inviteToWork'){
		$('.inviteToWork').show();
	}else if (data == 'pastWork'){
		$('.pastWork').show();
	}
});
/*Hover effects for the dashboard jobs list*/
$('.filter-btn').hover(function(){
	$(this).addClass('hover-second-menu');
});

$('.filter-btn').mouseleave(function(){
	$(this).removeClass('hover-second-menu');
});

/*From bidder list into message*/
$(document).on('click','.bidderImageProfileIcon', function(){
	var workerID = $(this).attr('data-workerID');
	var workId = $(this).attr('data-workId');
	// var da = [workId,workerID];
	bidderMessagingFunction(workId,workerID);
});

$(document).on('click','.bidderProfileName', function(){
	var workerID = $(this).attr('data-workerID');
	var workId = $(this).attr('data-workId');
	// var da = [workId,workerID];
	bidderMessagingFunction(workId,workerID);
});

// Send message function by clicking image and name;

function bidderMessagingFunction(workId, workerID){
	$.ajax({
		url: URL_ROOT + '/dashboard/jobSession',
		type: 'POST',
		data: {
			workID: workId,
			workerID: workerID
		},
		success: function(data){
			window.location.href= URL_ROOT + '/dashboard/message';
			// $('#sendbtn').text(workerID);
			// window.location.href= URL_ROOT + '/dashboard/message';
			console.log(data);
		},
		error: function(err){
			console.log(err);
		}
	});
}
var click_user;
/* Click user in messenger */
$(document).on('click', '.msg-u', function(){
	var receiver = $(this).attr("data-u");
	click_user = receiver;
	$("#sendbtn").attr("data-rv", receiver);

	$.ajax({
		url: URL_ROOT + '/dashboard/chatFrame',
		type: 'POST',
		data: {
			receiver:receiver
		},
		success:function(data){
			$("#mCSB_1_container").html(data);
			// below to line of code make sure to scroll to bottom the 
			// container in order to show the latest message
			var f = $("#mCSB_1_container").height();
			$("#mCSB_1_container").css("top","-"+f+"px");
			// ends here the auto scroll to bottom
			console.log(data);
		},
		error:function(err){
			console.log(err);
		}
	});
});
// setInterval(function(){console.log($("#sendbtn").attr("data-sr"), $("#sendbtn").attr("data-rv"))}, 1000);
// setInterval(realTimeMsg($("#sendbtn").attr("data-sr"), $("#sendbtn").attr("data-rv"), 1000));
// setInterval(
// function realTimeMsg(){
// 	var receiver = click_user;
// 	$("#sendbtn").attr("data-rv", click_user);
// 	$.ajax({
// 		url: URL_ROOT + '/dashboard/chatFrame',
// 		type: 'POST',
// 		data: {
// 			receiver:receiver
// 		},
// 		success:function(data){
// 			$("#mCSB_1_container").html(data);
// 			console.log(data);
// 		},
// 		error:function(err){
// 			console.log(err);
// 		}
// 	});
// }, 3000);
/* Sending Message from Messenger*/
$(document).on('click', '#sendbtn', function(){
	var msg = $('.ctl-msg').text();
	var sr = $(this).attr("data-sr");
	var rv = $(this).attr("data-rv");

	$.ajax({
		url: URL_ROOT + '/dashboard/sendMessage',
		type: 'POST',
		data: {
			sender:sr,
			receiver:rv,
			message:msg
		},
		dataType: 'json',
		success:function(data){
			$('.ctl-msg').text(" ");

			$.ajax({
				url: URL_ROOT + '/dashboard/chatFrame',
				type: 'POST',
				data: {
					receiver:rv
				},
				success:function(data){
					$("#mCSB_1_container").html(data);
				}
			});
			console.log(data);
		},
		error:function(err){
			console.log(err);
		}
	})

	// console.log("SR:"+sr+" RV:"+rv+" MSG:"+msg);
});

/*From somewhere else*/
$(document).on('click', '.latest-job', function(){
	var id = $(this).attr('data-postID');
		window.location.href = URL_ROOT + "/pages/jobDetails/" + id;
});
$(document).on('click', '.row-job', function(){
	var id = $(this).attr('data-id');
		window.location.href = URL_ROOT + "/dashboard/jobDetails/" + id;
});

/*From somewhere else*/
$(document).on('click', '.result-dash-s', function(){
	var id = $(this).attr('data-postID');
	var usr = $(this).attr('data-usr');
	if(usr){
		window.location.href = URL_ROOT + "/dashboard/jobDetails/" + id;
	}else{
		window.location.href = URL_ROOT + "/pages/jobDetails/" + id;
	}
});
/**
*	They work the same with the above code, just that it will return error 
*	in URL because of the directory
*/
// $(document).on('click', '.result-job', function(){
// 	var id = $(this).attr('data-postID');
// 	window.location.href = "../pages/jobDetails/" + id;
// });

/*Clicking the link to the Worker's profile*/
// $(document).on('click','.candidate', function(){
	
// 		window.location.href = URL_ROOT + "/pages/workerDetails";
// });

$(document).on('click', '#company-link', function(){
	window.location.href = URL_ROOT + "/pages/companyProfile";
});

$(document).on('click','.ctl-msg',function(){
	$('.container-of-msgs label').hide();
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
		url: URL_ROOT + "/dashboard/primaryValidation",
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
		url: URL_ROOT + "/dashboard/additionalValidation",
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
					url: URL_ROOT + "/dashboard/submitJob",
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

/**
*	Adding tags 
*/
$(document).ready(function(){
	 $('#jTags').tokenfield({});
});

$(document).on('click', '#tabs > ul > li > a', function(){
	$('#tabs > ul > li > a').removeClass();
	$(this).addClass('active');

	var action = $(this).data('action');
	if (action == "search-job") {
		$('.c-input').hide();
		$('.j-input').show();
	} else if (action == "search-can"){
		$('.c-input').show();
		$('.j-input').hide();		
	}
	console.log(action);
});

$(document).on('click', ".job-skills li a", function(e){
	e.preventDefault();
	var term = $(this).data('tag');
	$.ajax({
		url: URL_ROOT + "/pages/getJobTag/" + term,
		type: 'POST',
		// dataType: 'json',
		success: function(da){
			$('#job-listing').html(da);
			console.log(da);
		},
		error: function(err){
			console.log(err);
		}
	});
});
/* KeyUp for Dashboard Search */
$(document).on('keyup', ".search-field-prof #prof-query", function(){
	var query = $(this).val();
	var userID = $('#userID').val();
	var dash;
	if (query != "") {
	$('.s-wrapper').slideDown(100);
		// alert(window.location.href + " == " + dash  + " == " + URL_ROOT_DASH);
		$.ajax({
			url:  URL_ROOT + "/pages/getJobTitleDash",
			type: 'POST',
			data: {
				query:query,
				userID:userID
			},
			// dataType: 'json',
			success: function(data){
				if (data) {
					$('.s-wrapper').html(data);
				}else {
					$('.s-wrapper').html("<b class='n-res'>No result!!</b>");
				}
				console.log(data);
			},
			error: function(err){
				console.log(err);
			}
		});		
	}else {
		$('.s-wrapper').slideUp(100);
	}
});

$(document).on('keyup','#search-sort > input', function(){
	var query = $(this).val();
	if (query != "") {
		$.ajax({
			url: URL_ROOT + "/pages/getJobTitle/" + query,
			type: 'POST',
			// dataType: 'json',
			success: function(data){
				if (data) {
					$('#job-listing').html(data);
				}else {
					$('#job-listing').html("<b class='n-res'>No result!!</b>");
				}
			},
			error: function(err){
				console.log(err);
			}
		});		
	}else {
		$.ajax({
			url: URL_ROOT + "/pages/getJobs",
			type: 'POST',
			// dataType: 'json',
			success: function(data){
				$('#job-listing').html(data);
			},
			error: function(err){
				console.log(err);
			}
		});	
	}
});

$(document).on('submit', '#search-form', function(e){
	e.preventDefault();
	var data = $(this).serialize();

	$.ajax({
		url: "pages/searchq",
		type: 'POST',
		data: data,
		success: function(data){
			window.location.href="pages/search";
			$('#job-listing').html(data);
		},
		error: function(err){
			console.log('Som');
		}
	});
});

/* JOb Application Script */

$(document).on('click', '.apply-btn-action', function(e){
	var jobId = $(this).attr('data-jobId');
	var uId = $(this).attr('data-uId');

	$.ajax({
		url: URL_ROOT + '/pages/applyJob',
		type: 'POST',
		dataType: 'json',
		data: {
			jobId:jobId,
			uId:uId
		},
		success: function(data){
			if (data['status'] == 1) {
				// Delete Blog
					$('.confirmationModal').show(10);
					$('.confirmationMessage h2').text("Application is submitted!!");
					$("body").css({
					  "overflow":"hidden",
					  "position":"relative"
					});
					$(".actionButtonModal button:first-child").css("display","none");
					$(".actionButtonModal button:last-child").attr("id","closeApplicationModal");
				$(document).on('click','#closeApplicationModal',function(){
				  window.location.href = URL_ROOT + '/dashboard'
				});
				// alert("Applied");
			}else if (data['status'] == 2) {
				console.log("S");
			}else {
				alert("N")
			}
		},
		error:function(err){
			console.log(err);
		}
	});
});
/* PROFILE TABS SCRIPT*/
$(document).on('click', '.prof-data > ul li', function(){
	$(".prof-data > ul li").removeClass("active-prof-tab");
	$(this).addClass('active-prof-tab');
	var tab = $(this).attr("data-tab");

	if (tab == "about") {
		$(".prof-fed").hide(100);
		$(".security").hide(100);
		$(".bio-info").show(100);
	}
	if(tab == "feedback"){
		$(".bio-info").hide(100);
		$(".security").hide(100);		
		$(".prof-fed").show(100);
	}
	if(tab == "security"){
		$(".prof-fed").hide(100);
		$(".bio-info").hide(100);		
		$(".security").show(100);
	}
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

/* UPDATE PROFILE PIC*/

function profileUpdateF(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('.awesome > .profID').attr('style', 'background-image: url(' + e.target.result + ')');
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#profIMG").change(function() {
	$('.profile-prev').show(100);
  // $('#prof-pic').show(100);
  profileUpdateF(this);
});

$(document).on('click', '.user-btns > button', function(){
	var action = $(this).attr('data-action');
    var fd = new FormData();
    var photo_data = $('#profIMG').prop('files')[0];
    fd.append('profilPic',photo_data);
	
	if (action == "cancel") {
		$('.profile-prev').hide(100);
	}
	if (action == "save") {
		$.ajax({
	      url: URL_ROOT + '/users/profileUpdate',
	      type: 'POST',
	      dataType: 'json',
	      processData: false, // important
	      contentType: false, // important
	      // data: $.param(sf_site),
	      data: fd,
	      success: function(data){
	      	if (data['status'] == 1) {
				$('.profile-prev').hide(100);
				window.location.href= URL_ROOT + '/dashboard/profile';
			  }
			  console.log(data);
	      },
	      error: function(err){
	      	console.log(err);
	      }
	 	});
	}
});

/* UPDATE COVER PHOTO */

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('.prof-wall').attr('style', 'background-image: url(' + e.target.result + '), linear-gradient(rgba(0,0,0,-0.5),rgba(0,0,0,0.5));background-size: cover;');
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#wallIMG").change(function() {
	$('.wall-update-btn').css('visibility','visible');
  // $('#prof-pic').show(100);
  readURL(this);
});


$(document).on('click', '.wall-update-btn > button', function(){
	var action = $(this).attr('data-action');
    var fd = new FormData();
    var photo_data = $('#wallIMG').prop('files')[0];
    fd.append('wallPic',photo_data);
	
	if (action == "cancel") {
		window.location.href= URL_ROOT + '/dashboard/profile';
	}
	if (action == "save") {
		$.ajax({
	      url: URL_ROOT + '/users/wallUpdate',
	      type: 'POST',
	      dataType: 'json',
	      processData: false, // important
	      contentType: false, // important
	      // data: $.param(sf_site),
	      data: fd,
	      success: function(data){
	      	if (data['status'] == 1) {
				window.location.href= URL_ROOT + '/dashboard/profile';
	      	}
	      },
	      error: function(err){
	      	console.log(err);
	      }
	 	});
	}
});

$(document).on('submit',"#subcribe-email", function(e){
	e.preventDefault();
	var email = $("#subs-email").val();
	$.ajax({
	  url: URL_ROOT + '/users/subscribe',
	  type: 'POST',
	  dataType: 'json',
	  data: {
		  email:email
	  },
	  success: function(data){
		  if (data['status'] == 1) {
			$('.confirmationModal').show(10);
			$("body").css("overflow","hidden");
			$(".confirmationMessage h2").text("Thank you for subscribing!");

		  }
		//   console.log(data);
	  },
	  error: function(err){
		  console.log(err);
	  }
	 });
});
$(document).on('click','.actionButtonModal #close',function(){
  window.location.href = URL_ROOT + '/pages/index'
});