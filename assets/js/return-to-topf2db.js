$(document).ready(function () {
	$('#show-hidden-menu').click(function () {
		$('.page-search').slideToggle("fast");
	});
});
$(document).ready(function () {
	$("#showfilter").click(function () {
		$("#filter-result").show();
	});
	$("#filterdone").click(function () {
		$("#filter-result").hide();
	});
	$("#filtercross").click(function () {
		$("#filter-result").hide();
	});
});
$(document).ready(function () {
	$("#app-emp-phone-txt").click(function () {
		$("#app-emp-phone").toggle();
	});
});
$(document).ready(function (event) {
// 	$("#sidebar").mCustomScrollbar({
// 		theme: "minimal",
// 		scrollInertia: 2
// 	});
	$('.dismiss, .overlay2').on('click', function (event) {
		$('#sidebar').removeClass('active');
		$('.overlay2').fadeOut();
		$('body').css({
			"overflow": "scroll",
			"padding-right": "0px"
		});
	});
	$('#sidebarCollapse').on('click', function (event) {
		$('#sidebar').addClass('active');
		$('.overlay2').fadeIn();
		$('.collapse.in').toggleClass('in');
		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
	});
	$('#sidebarCollapse1').on('click', function (event) {
		$('#sidebar').addClass('active');
		$('.overlay2').fadeIn();
		$('.collapse.in').toggleClass('in');
		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
		$('body').css({
			"overflow": "hidden",
			"padding-right": "0px"
		});
	});
});