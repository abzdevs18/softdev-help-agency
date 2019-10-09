/**
* The registration and login of users communicate in here
*/
var URL_ROOT = "/sumalian";

// $(document).ready(function(){
	var u_type = 0;

	var remove = $('.comp-form').detach();
	var status;
// });

$(document).on('click','.type-account span',function(){
	$('.type-account span').removeAttr('class');
	$(this).addClass('active-type-acc');

	u_type = $(this).attr('data-userType');

	if (u_type == 1) {
		//insertAfter the element after to the given classs
		$(remove).insertAfter('.active-f');
		// $('.signup-form').append(remove);
		// console.log(remove);
	} else if (u_type == 0) {
		//remove the block elements in the DOM
		$('.comp-form').detach();
	}	
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

	//Inputs from form Two(Company information)
	var comp = $('.f-form input[name="comp"]').val();
	var compEmail = $('.f-form input[name="comp-email"]').val();
	var compPhone = $('.f-form input[name="comp-phone"]').val();
	var compPosition = $('.f-form input[name="position"]').val();

	//Inputs from form Three(Account Credentials)
	var userName = $('.f-form input[name="userName"]').val();
	var passWord = $('.f-form input[name="password"]').val();
	var cpassWord = $('.f-form input[name="cpassword"]').val();


	if (action == 1) {
		$.ajax({
			url: URL_ROOT + '/users/validationFormPersonal',
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
	// Start of Company Information form
	if (action == 2) {
		$.ajax({
			url:'../users/companyValidation',
			type:'POST',
			dataType: 'json',
			data: {
				company : comp,
				compEmail : compEmail,
				compPhone : compPhone,
				compPosition : compPosition
			},
			beforeSend: function(){
				console.log("JOhn");
			},
			success: function(data){
				if (data['status'] == 1) {
					feedbackDefault('f-form');
					next_f.show();
					current_f.hide();
				}else {
					if (data['comany_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("comNameVal", data['comany_err']);
					} else{
						feedbackHide("comNameVal");
					}

					if (data['compEmail_err']) {
						 // Get the parent/container of the input field for firstname and 
						feedbackShow("comEmailVal", data['compEmail_err']);
					} else{
						feedbackHide("comEmailVal");
					}

					if (data['compPhone_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("comNumVal", data['compPhone_err']);
					} else{
						feedbackHide("comNumVal");
					}

					if (data['compPosition_err']) {
						/* Get the parent/container of the input field for firstname and */
						feedbackShow("comPosVal", data['compPosition_err']);
					} else{
						feedbackHide("comPosVal");
					}
				}

				console.log(comp);
			},
			error:function(err){
				console.log(err);
			}
		});		
		console.log('Form 2');
	} // end of form Company Information
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
							cpassword : cpassWord,
							company : comp,
							compEmail : compEmail,
							compPhone : compPhone,
							compPosition : compPosition
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
		url: URL_ROOT + '/users',
		success: function(){
			 window.location.href = URL_ROOT + "/users/signin";
			console.log("Redirected");
		},
		error :function(){
			console.log("Opps");
		}
	});
});

$(document).on('click', '.prev_fs', function(){
	var current_f, next_f, prev_f;

	current_f = $(this).parent();
	prev_f = $(this).parent().prev();
	prev_f.show();
	current_f.hide();

	console.log('d');
});

$(document).on('click', '.dignin', function(){
	login();
});

$('.l-sign').keypress(function(e){
	if (e.keyCode == 13) {
		login();
	}
});

function login(){
	var uNameEmail = $('.f-form input[name="uemail"]').val();
	var uPassword = $('.f-form input[name="password"]').val();

	$.ajax({
		url: URL_ROOT + '/users/signin',
		type: 'POST',
		dataType: 'json',
		data: {
			uNameEmail : uNameEmail,
			uPassword : uPassword
		},
		success:function(data){
			if (data["data"].status == 1 && data["row"].fId != "") {
				feedbackDefault('f-form');
				window.location.href =  URL_ROOT + "/dashboard";
				console.log(data["row"].fId);
			}else if(data["data"].status == 2){
				$('#flash-msgs').show().effect( "shake", {times:4}, 1000 );
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
}

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

// export function a(){
// 	alert('s');
// }