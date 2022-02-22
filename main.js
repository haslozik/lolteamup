/* rwd navbar */
$(document).on("click", ".fa-bars", function() {
	$(".menuPhoneContainer").css("top", "0px");
	$("html").css("overflow", "hidden");
});

$(document).on("click", ".fa-times", function() {
	$(".menuPhoneContainer").css("top", "-100vh");
	$("html").css("overflow", "visible").css("overflowX", "hidden");
});

