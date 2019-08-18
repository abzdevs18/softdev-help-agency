/**
* The registration and login of users communicate in here
*/
$(document).on('click','.type-account span',function(){
	$('.type-account span').removeAttr('class');
	$(this).addClass('active-type-acc');
});

$(document).on('click', '.next-submit a', function(event){
	event.preventDefault();
	var action = $(this).attr('data-action');
	var user_type = $('.active-type-acc').attr('data-userType');
	var fname = $('.f-form input[name="fname"]').val();
	var lname = $('.f-form input[name="lname"]').val();
	var email = $('.f-form input[name="email"]').val();
	var phone = $('.f-form input[name="phone"]').val();
	var location = $('.f-form input[name="location"]').val();
	console.log(user_type);

});