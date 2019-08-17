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