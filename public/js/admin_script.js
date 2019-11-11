
var URL_ROOT = "/sumalian";

$(document).on('click','.clip-path',function(){
	$('#side-navigation').toggleClass('sideNav-full');
	$('#menus-nav li a').toggleClass('hide-sh');
	$('#logo-icon').toggleClass('logo-show');
	$('.adm-prof').toggleClass('logo-show');
	if ($('#side-navigation').hasClass('sideNav-full')) {
		$('.caret-right').hide(100);
		$('.caret-left').show(300);
	}else{
		$('.caret-left').hide(100);
		$('.caret-right').show(300);
	}
});
$(document).ready(function(){
	$('#side-navigation').scroll(function(){
		$('html, body').animate({
        scrollTop: $("#myDiv").offset().top
    }, 2000);
	});
});
$(document).on('click','.ctl-msg',function(){
	$('.ctl-msg label').hide();
	$(this).focusout(function(e){
		console.log($(this).text().length);
	});
});

$(document).on('click', '#menus-nav > li', function(){
	var link = $(this).attr('data-link');
	window.location.href= link;

	// $('#menus-nav li').removeClass('menu-active');
	// $(this).addClass('menu-active');
});
/* All job*/
$(document).on('click', '#filter-all', function(){
	$("#job-filters li").removeAttr("class");
	$(this).addClass("active-filter");
	$('#search-sort').show(20);
	$.ajax({
		url: '../admin/getAllJob',
		success: function(data){
			$('#filter-job-container').html(data);
			console.log(data)
		}
	})
});
/* Feature filter*/
$(document).on('click', '#filter-featured', function(){
	$("#job-filters li").removeAttr("class");
	$(this).addClass("active-filter");
	$('#search-sort').hide(20);
	$.ajax({
		url: '../admin/hiddenRow',
		success: function(data){
			$('#filter-job-container').html(data);
			console.log(data)
		}
	});
});
/* Open Job filter*/
$(document).on('click', '#filter-open', function(){
	$("#job-filters li").removeAttr("class");
	$(this).addClass("active-filter");
	$.ajax({
		url: '../admin/getOpenJob',
		success: function(data){
			$('#filter-job-container').html(data);
			console.log(data)
		}
	})
});
/* Search query */
$(document).on('keyup','#search-sort > input', function(){
	var query = $(this).val();
	if (query != "") {
		$.ajax({
			url: "../admin/getJobTitle/" + query,
			type: 'POST',
			// dataType: 'json',
			success: function(data){
				if (data) {
					$('#filter-job-container').html(data);
				}else {
					$('#filter-job-container').html("<tr class='n-res'><td colspan='9' style='text-align:center;'>No result!!</td></tr>");
				}
			},
			error: function(err){
				console.log(err);
			}
		});		
	}else {
		$.ajax({
			url: "../admin/getAllJob",
			type: 'POST',
			// dataType: 'json',
			success: function(data){
				$('#filter-job-container').html(data);
			},
			error: function(err){
				console.log(err);
			}
		});	
	}
});
/* Open Job filter*/
$(document).on('change', '#sort-filter', function(){
	var filter = $(this).val();
	$.ajax({
		url: '../admin/getJobDropDown/' + filter,
		success: function(data){
			$('#filter-job-container').html(data);
			console.log(data)
		}
	});
});

/* Check job */
$(document).on('click', '#dj', function(){
	var id = $(this).attr('data-j');
	var open = window.open(URL_ROOT + '/pages/jobDetails/'+id, '_blank');

	if (open) {
	    //Browser has allowed it to be opened
	    win.focus();
	} else {
	    //Browser has blocked it
	    alert('Please allow popups for this website');
	}
});
// Delete Blog
$(document).on('click','.hideJob',function(){
    var id = $(this).attr("data-jId");
    $('.confirmationModal').show(10);
    $('.confirmationMessage h2').text("Do you want to hide this job?");
    $("body").css({
      "overflow":"hidden",
      "position":"relative"
    });
    $(".actionButtonModal button:first-child").attr("data-jobId",id);
    $(".actionButtonModal button:first-child").attr("id","jobHiddingId");
    $(".actionButtonModal button:last-child").attr("id","cancelJobHide");
});
$(document).on('click','#cancelJobHide',function(){
  window.location.href = URL_ROOT + '/admin/posted'
});

$(document).on('click','#jobHiddingId',function(){
    var jobId = $(this).attr("data-jobId");
    $.ajax({
      url: URL_ROOT + '/admin/jobHideId',
	  type: 'POST',
      data: {
        jobId:jobId
	  },
	  dataType: 'json',
      success:function(data){
        if(data['status']){
          window.location.href = URL_ROOT + '/admin/posted'
		}
		console.log(data);
	  },
	  error: function(err){
		  console.log(err);
	  }
	});
});
// Make Job Visible if its hidden
$(document).on('click','.jobVisible',function(){
    var id = $(this).attr("data-jId");
    $('.confirmationModal').show(10);
    $('.confirmationMessage h2').text("Make this job visible?");
    $("body").css({
      "overflow":"hidden",
      "position":"relative"
    });
    $(".actionButtonModal button:first-child").attr("data-jobId",id);
    $(".actionButtonModal button:first-child").attr("id","jobVisibleId");
    $(".actionButtonModal button:last-child").attr("id","cancelJobVisible");
});
$(document).on('click','#cancelJobVisible',function(){
  window.location.href = URL_ROOT + '/admin/posted'
});

$(document).on('click','#jobVisibleId',function(){
    var jobId = $(this).attr("data-jobId");
    $.ajax({
      url: URL_ROOT + '/admin/jobShowId',
	  type: 'POST',
      data: {
        jobId:jobId
	  },
	  dataType: 'json',
      success:function(data){
        if(data['status']){
          window.location.href = URL_ROOT + '/admin/posted'
		}
		console.log(data);
	  },
	  error: function(err){
		  console.log(err);
	  }
	});
});
// End Make Job Visible if its hidden

// Delete Job
$(document).on('click','.trashJob',function(){
    var id = $(this).attr("data-jId");
    $('.confirmationModal').show(10);
    $('.confirmationMessage h2').text("Remove this Job?");
    $("body").css({
      "overflow":"hidden",
      "position":"relative"
    });
    $(".actionButtonModal button:first-child").attr("data-jobId",id);
    $(".actionButtonModal button:first-child").attr("id","jobDeletion");
    $(".actionButtonModal button:last-child").attr("id","cancelJobDeletion");
});
$(document).on('click','#cancelJobDeletion',function(){
  window.location.href = URL_ROOT + '/admin/posted'
});

$(document).on('click','#jobDeletion',function(){
    var jobId = $(this).attr("data-jobId");
    $.ajax({
      url: URL_ROOT + '/admin/deleteJob',
      type: 'POST',
      data: {
        id:jobId
      },
      dataType: 'json',
      success:function(data){
        if(data['status']){
          window.location.href = URL_ROOT + '/admin/posted'
		}
		console.log(data);
	  },
	  error:function(err){
		  
		console.log(err);
	  }
    });
});
