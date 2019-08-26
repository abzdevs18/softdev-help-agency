/**
* The registration and login of users communicate in here
*/

// $(document).ready(function(){
	var u_type = 0;
	var remove = $('.comp-form').detach();
	var status;
// });

$(document).on('click','.type-account span',function(){
	$('.type-account span').removeAttr('class');
	$(this).addClass('active-type-acc');
});
$(document).on('click','.next_fs', function(){
	event.preventDefault();

	var current_f, next_f, prev_f;
	current_f = $(this).parent();
	next_f = $(this).parent().next();

	//Inputs from form One(Personal information)
	var action = $(this).attr('data-form');
	var user_type = $('.active-type-acc').attr('data-userType');
	var fname = $('.f-form input[name="fname"]').val();
	var lname = $('.f-form input[name="lname"]').val();
	var email = $('.f-form input[name="email"]').val();
	var phone = $('.f-form input[name="phone"]').val();
	var location = $('.f-form input[name="location"]').val();
	/* End of form 1 inputs*/

	//Inputs from form Two(Account Credentials)
	var userName = $('.f-form input[name="userName"]').val();
	var passWord = $('.f-form input[name="password"]').val();
	var cpassWord = $('.f-form input[name="cpassword"]').val();


	if (action == 1) {
		$.ajax({
			url:'../users/validationFormPersonal',
			type:'POST',
			dataType: 'json',
			data: {
				userType : user_type,
				fName : fname,
				lName : lname,
				uEmail : email,
				uPhone : phone,
				uLocation : location
			},
			beforeSend: function(){
				console.log("checking");
			},
			success: function(data){
				if (data['status'] == 1) {
					feedbackDefault('f-form');
					next_f.show();
					current_f.hide();
				}else {
					if (data['fName_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("nameVal", data['fName_err']);
					} else{
						feedbackHide("nameVal");
					}

					if (data['lName_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("lastVal", data['lName_err']);
					} else{
						feedbackHide("lastVal");
					}

					if (data['uEmail_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("emailVal", data['uEmail_err']);
					} else{
						feedbackHide("emailVal");
					}

					if (data['uPhone_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("phoneVal", data['uPhone_err']);
					} else{
						feedbackHide("phoneVal");
					}

					if (data['uLocation_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("locVal", data['uLocation_err']);
					} else{
						feedbackHide("locVal");
					}
				}
			},
			error:function(err){
				console.log(err);
			}
		});		
	} // end of form Personal Information
	if (action == 3) {
		$.ajax({
			url:'../users/credentialsValidation',
			type:'POST',
			dataType: 'json',
			data: {
				username : userName,
				password : passWord,
				cpassword : cpassWord
			},
			beforeSend: function(){
				console.log("checking");
			},
			success: function(data){
				if (data['status'] == 1) {
					$.ajax({
						url:'../users/signup',
						type: 'POST',
						data: {
							userType : user_type,
							fName : fname,
							lName : lname,
							uEmail : email,
							uPhone : phone,
							uLocation : location,
							username : userName,
							password : passWord,
							cpassword : cpassWord
						},
						success: function(data){
							console.log(data);
							$('#reg-username').text(userName);
						},
						error: function(err){
							console.log(err);
						}
					});
					feedbackDefault('f-form');
					next_f.show();
					current_f.hide();
				}else {
					if (data['userName_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("userNameVal", data['userName_err']);
					} else{
						feedbackHide("userNameVal");
					}
					if (data['password_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("passVal", data['password_err']);
					} else{
						feedbackHide("passVal");
					}
					if (data['cpassword_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("cPassVal", data['cpassword_err']);
					} else{
						feedbackHide("cPassVal");
					}
				}
			},
			error:function(err){

			}
		});
		console.log("Form Two");
	} //end of form 

});

$(document).on('click', '.successful-reg', function(){
	$.ajax({
		url:'../users',
		success: function(){
			 window.location.href = "../users";
			console.log("Redirected");
		},
		error :function(){
			console.log("Opps");
		}
	});
});

$(document).on('click', '.type-account span', function(){
	u_type = $(this).attr('data-userType');
	if (u_type == 1) {
		$('.signup-form').append(remove);
	} else if (u_type == 0) {
		$('.signup-form').detach(remove);
	}
	console.log(u_type);
});


/**
* script for form progress
*/
// $('.next_fs').click(function(){
// 	var current_f, next_f, prev_f;
// 	current_f = $(this).parent();
// 	next_f = $(this).parent().next();

// 	if (status == 1) {

// 		next_f.show();
// 		current_f.hide();

// 	}

// });
$('.prev_fs').click(function(){
	var current_f, next_f, prev_f;

	current_f = $(this).parent();
	prev_f = $(this).parent().prev();
	prev_f.show();
	current_f.hide();
});

$(document).on('click', '.dignin', function(){
	var uNameEmail = $('.f-form input[name="uemail"]').val();
	var uPassword = $('.f-form input[name="password"]').val();

	$.ajax({
		url: '../users/signin',
		type: 'POST',
		dataType: 'json',
		data: {
			uNameEmail : uNameEmail,
			uPassword : uPassword
		},
		success:function(data){
			if (data["data"].status == 1 && data["row"].fId != "") {
				feedbackDefault('f-form');
				window.location.href = "../dashboard";
				console.log(data["row"].fId);
			}else {
				if (data['data'].uNameEmail_err) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("uNameVal", data['data'].uNameEmail_err);
				} else{
					feedbackHide("uNameVal");
				}
				if (data['data'].uPassword_err) {
					 // Get the parent/container of the input field for firstname and 
					feedbackShow("uPassVal", data['data'].uPassword_err);
				} else{
					feedbackHide("uPassVal");
				}
			}
			// console.log(data);
		},
		error: function(err){
			console.log(err);
		}
	});
});

/*This two function below will show and hide the feedback during the validation process*/
function feedbackDefault(container){
	$('.' + container + ' > input').removeClass('invalid-box-shadow');
	$('.' + container + ' .invalid-feedback').hide();
}
function feedbackShow(container, data){
	$('.' + container + ' .ins-wrapper > input').addClass('invalid-box-shadow');
	$('.' + container + ' .invalid-feedback').show().text(data);
}

function feedbackHide(container){
	$('.' + container + ' > input').removeClass();
	$('.' + container + ' .invalid-feedback').hide();
}