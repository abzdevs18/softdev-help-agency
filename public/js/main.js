export const URL_ROOT = "/sumalian";


$(function(){
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100000,
      values: [ 75, 600 ],
      stop:main, //event when user stop drag the ball
      slide: function( event, ui ) {
        $( "#amount" ).val( "P" + ui.values[ 0 ] + " - P" + ui.values[ 1 ] );
      }
    });
    function main(){
        var min = $( "#slider-range" ).slider( "values", 0 );
        var max = $( "#slider-range" ).slider( "values", 1 );
        // gen_range(min,max);
    }
    $( "#amount" ).val( "P" + $( "#slider-range" ).slider( "values", 0 ) +
      " - P" + $( "#slider-range" ).slider( "values", 1 ) );
});

$(document).on('click','.setup-btn', function(){

  var form = $(this).attr('data-form');
  var link = $(this).attr('data-link');
  /* Admin configuration Script*/
  var current, next, prev;

  current = $(this).parent();
  next = $(this).parent().next();





  if ( form == 1) {
    /* progress */
    $('.progress li').eq($('div.awesome').index(next)).addClass('active');
    current.hide();
    next.show(); 
    animate(current, next);
    console.log("s");
 
  }

  if ( form == 2) {
     var dbCon = $('#c-n').serializeArray();

     $.ajax({
       url: URL_ROOT + '/init/adminSetup',
       type: 'POST',
       dataType: 'json',
       data: $.param(dbCon),
       success: function(data){
         if (data['status'] == 1) { 
           $('.loading').show(100);
           $('.loadingTxt').text('Connecting to database');
           $.ajax({
             url: URL_ROOT + '/init/configGen',
             type: 'POST',
             dataType: 'json',
             data: $.param(dbCon),
             beforeSend: function(){
               setTimeout(function(){
                 $('.loadingTxt').text('Uploading Tables');
               }, 5000);
             },
             success: function(data){
               if (data['status'] == 1) {
                 $.ajax({
                   url: URL_ROOT + '/init/err',
                   type: 'POST',
                   dataType: 'json',
                   success: function(data){
                      $('.loading').hide(100);
                         /* progress */
                     $('.progress li').eq($('div.awesome').index(next)).addClass('active');
                     current.hide();
                     next.show(); 
                     animate(current, next);
                     console.log(data + ' heheheh');
                   },
                   error: function(e){
                     console.log(e);
                   }
                 });
               }
             }
           });
         }else{
              if (data['DB_HOST_err']) {
                /* Get the parent/container of the input field for firstname and */
                feedbackShow("dbVal", data['DB_HOST_err']);
              } else{
                feedbackHide("dbVal");
              }

              if (data['DB_NAME_err']) {
                /* Get the parent/container of the input field for firstname and */
                feedbackShow("hostVal", data['DB_NAME_err']);
              } else{
                feedbackHide("hostVal");
              }

              if (data['DB_USER_err']) {
                /* Get the parent/container of the input field for firstname and */
                feedbackShow("userVal", data['DB_USER_err']);
              } else{
                feedbackHide("userVal");
              }
          }
       },
       error:function(e){
         console.log(e);
       }
     });
                  // $('.progress li').eq($('div.awesome').index(next)).addClass('active');

                  // current.hide();
                  // next.show();
                  // animate(current, next);   
  }

  if ( form == 3) {
    var sf_site = $('#sf_site_info').serializeArray();
    var fd = new FormData();
    var photo_data = $('#imgInp').prop('files')[0];
    var siteName = $("input[name=siteName").val();
    var adminEmail = $("input[name=adminEmail").val();
    var adminUserName = $("input[name=adminUserName").val();
    var adminUserPass = $("input[name=adminUserPass").val();
    var adminUserCPass = $("input[name=adminUserCPass").val();
    fd.append('siteLogo',photo_data);
    fd.append('siteName',siteName);
    fd.append('adminEmail',adminEmail);
    fd.append('adminUserName',adminUserName);
    fd.append('adminUserPass',adminUserPass);
    fd.append('adminUserCPass',adminUserCPass);

    $.ajax({
      url: URL_ROOT + '/init/sfSetup',
      type: 'POST',
      dataType: 'json',
      processData: false, // important
      contentType: false, // important
      // data: $.param(sf_site),
      data: fd,
      success: function(data){
        if (data['status'] == 1) {
          $('body').css('overflow','hidden');
          $('.finish').show(100);

        }else {
          if (data['siteName_err']) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("siteVal", data['siteName_err']);
          } else{
            feedbackHide("siteVal");
          }

          if (data['adminEmail_err']) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminEmailVal", data['adminEmail_err']);
          } else{
            feedbackHide("adminEmailVal");
          }

          if (data['adminUserName_err']) {
            /*Get the parent/container of the input field for firstname and */
            feedbackShow("adminUserVal", data['adminUserName_err']);
          } else{
            feedbackHide("adminUserVal");
          }

          if (data['adminUserPass_err']) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminPassVal", data['adminUserPass_err']);
          } else{
            feedbackHide("adminPassVal");
          }

          if (data['adminUserCPass_err']) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminCPassVal", data['adminUserCPass_err']);
          } else{
            feedbackHide("adminCPassVal");
          }
        }
      },
      error: function(e){
        console.log(e);
      }
    });
  }

  /* if setup this is the link*/
  if (link == 'login') {
    window.location.href = URL_ROOT + "/admin/login";
  }
});
/* Admin initialization*/


$(document).on('click', '.login-admin', function(){
  login();
});

$('#loginCredentials').keypress(function(e){
  if (e.keyCode == 13) {
    login();
  }
});
function login(){
  var adminData = $('#loginCredentials').serializeArray();

  $.ajax({
    url: URL_ROOT + '/init/adminLogin',
    type: 'POST',
    dataType: 'json',
    data: $.param(adminData),
    success:function(data){
      if (data["data"].status == 1 && data["row"].fId != "") {
        feedbackDefault('f-form');
        window.location.href =  URL_ROOT + "/admin";
        console.log(data["row"].fId);
      }else if(data["data"].status == 2){
        $('#flash-msgs').show().effect( "shake", {times:4}, 1000 );
      }else {
          if (data['data'].adminUserName_err) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminUVal", data['data'].adminUserName_err);
          } else{
            feedbackHide("adminUVal");
          }

          if (data['data'].adminUserPass_err) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminPVal", data['data'].adminUserPass_err);
          } else{
            feedbackHide("adminPVal");
          }
      }
      // console.log(data);
    },
    error: function(err){
      console.log(err);
    }
  });
}

function animate(current, next){
  var left, opacity, scale;
  current.animate({opacity:0},{
    step: function(now,mx){
      scale = 1 - (1 - now)*0.2;
      left = (now * 50) + "%";
      opacity = 1 - now;
      current.css({'transform':'scale('+scale+')'});
      next.css({'left':left,'opacity':opacity});
    },
    duration: 800,
    complete:function(){
      current.hide();
    }
  }); 
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  $('#blah').show(100);
  readURL(this);
});

/*This two function below will show and hide the feedback during the validation process*/
function feedbackDefault(container){
  $('.' + container + ' .form-group > input').removeClass('invalid-box-shadow');
  $('.' + container + ' .invalid-feedback').hide();
}

function feedbackShow(container, data){
  $('.' + container + ' .form-group > input').addClass('invalid-box-shadow');
  $('.' + container + ' .invalid-feedback').show().text(data);
}

function feedbackHide(container){
  $('.' + container + ' .form-group > input').removeClass();
  $('.' + container + ' .invalid-feedback').hide();
}

// Admin Script in adding Vlog
/* Sending Message from Messenger*/
$(document).on('click', '.post_blog', function(){
  
  var fd = new FormData();
	var b_title = $('#blog_title').val();
  var b_photo = $('#blog_photo').prop('files')[0];
  var b_content = $('.blog_content').text();

  // Adding data to formData
  fd.append('blog_title',b_title);
  fd.append('blog_photo',b_photo);
  fd.append('blog_content',b_content);
	// var rv = $(this).attr("data-rv");

	$.ajax({
		url: URL_ROOT + '/admin/post_blog',
		type: 'POST',
    processData: false, // important
    contentType: false, // important
    data: fd,
		dataType: 'json',
		success:function(data){
      if(data['status']){
        window.location.href = URL_ROOT + '/admin/blog'
      }
      console.log(data);
		},
		error:function(err){
			console.log(err);
		}
  })
	// console.log("SR:"+sr+" RV:"+rv+" MSG:"+msg);
});
// Admin Script in adding Vlog
/* Sending Message from Messenger*/
$(document).on('click', '.update_blog', function(){
  
  var progress = $('.blog_update_progress_percent');

  var fd = new FormData();
	var b_title = $('#blog_title').val();
  var b_photo = $('#update_blog_photo').prop('files')[0];
  var b_content = $('.blog_content').text();
  var blog_id = $(this).attr('data-bId');

  // Adding data to formData
  fd.append('blog_title',b_title);
  fd.append('update_blog_photo',b_photo);
  fd.append('blog_content',b_content);
  fd.append('blog_id',blog_id);
	// var rv = $(this).attr("data-rv");

	$.ajax({
    
  xhr: function() {
    var xhr = new window.XMLHttpRequest();

    xhr.upload.addEventListener("progress", function(evt) {
      if (evt.lengthComputable) {
        var percentComplete = evt.loaded / evt.total;
        percentComplete = parseInt(percentComplete * 100);

        console.log(percentComplete);

        var percentCom = percentComplete + "%";
        progress.width(percentCom);
        $('#statusText').text(percentCom);
        if (percentComplete === 60) {
          $('#blog_update_progress').css("color","#fff");
        }

      }
    }, false);

    return xhr;
  },
		url: URL_ROOT + '/admin/updateBlogRecord',
		type: 'POST',
    processData: false, // important
    contentType: false, // important
    data: fd,
    dataType: 'json',
    beforeSend:function(){
      $(".updatingSign").show();
    },
		success:function(data){
      if(data['status']){
        window.location.href = URL_ROOT + '/admin/blog'
      }
		},
		error:function(err){
			console.log(err);
		}
  });
	// console.log(fd['update_blog_photo']);s
});
// Delete Blog
$(document).on('click','.deleteBlog',function(){
    var id = $(this).attr("data-bId");
    $('.confirmationModal').show(10);
    $('.confirmationMessage h2').text("Remove this Blog?");
    $("body").css({
      "overflow":"hidden",
      "position":"relative"
    });
    $(".actionButtonModal button:first-child").attr("data-blogId",id);
    $(".actionButtonModal button:first-child").attr("id","blogDeletion");
    $(".actionButtonModal button:last-child").attr("id","cancelDeletion");
});
$(document).on('click','#cancelDeletion',function(){
  window.location.href = URL_ROOT + '/admin/blog'
});

$(document).on('click','#blogDeletion',function(){
    var blogId = $(this).attr("data-blogId");
    $.ajax({
      url: URL_ROOT + '/admin/deleteBLog',
      type: 'POST',
      data: {
        id:blogId
      },
      dataType: 'json',
      success:function(data){
        if(data['status']){
          window.location.href = URL_ROOT + '/admin/blog'
        }
      }
    });
});

// Delete email
$(document).on('click','.emailSub',function(){
  var id = $(this).attr("data-eId");
  $('.confirmationModal').show(10);
  $('.confirmationMessage h2').text("Remove this Email?");
  $("body").css({
    "overflow":"hidden",
    "position":"relative"
  });
  $(".actionButtonModal button:first-child").attr("data-eId",id);
  $(".actionButtonModal button:first-child").attr("id","EmailDeletion");
  $(".actionButtonModal button:last-child").attr("id","cancelEmailDeletion");
});
$(document).on('click','#cancelEmailDeletion',function(){
  window.location.href = URL_ROOT + '/admin/subscribers';
});

$(document).on('click','#EmailDeletion',function(){
    var emailId = $(this).attr("data-eId");
    $.ajax({
      url: URL_ROOT + '/admin/deleteSubscriber',
      type: 'POST',
      data: {
        id:emailId
      },
      dataType: 'json',
      success:function(data){
        if(data['status']){
          window.location.href = URL_ROOT + '/admin/subscribers';
        }
      }
    });
});

$(document).on('click',".blogPreviewId", function(){
  var id = $(this).attr("data-i");
  window.location.href = URL_ROOT + '/pages/bloginfo/' + id;
});

$(document).on('click','.updateBlogData', function(){
  var id = $(this).attr("data-bId");
  window.location.href = URL_ROOT + '/admin/update_blog/' + id;
});

