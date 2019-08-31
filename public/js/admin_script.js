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
	$('#menus-nav li').removeClass('menu-active');
	$(this).addClass('menu-active');
	console.log(link);
});
