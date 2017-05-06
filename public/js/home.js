$(document).ready(function() {
	var btn_circle = $('.btn-circle');

	btn_circle.mouseenter(function() {
		$(this).fadeTo(500, 0.2, function() {
			$(this).css('background-image', 'url(../../images/frog.jpg)').fadeTo(500, 1);
		});
	}).mouseleave(function() {
		$(this).fadeTo(500, 0.2, function() {
			$(this).css('background-image', 'url(../../images/doves.jpg)').fadeTo(500, 1);
		});		
	});
});