(function ($) {
 	var imagesCount = 4;
	var count = 1;
	function fadeOut(id) {
				$(id).addClass('fade-out');
				$(id).removeClass('fade-in');
		}
	function fadeIn(id) {
			$(id).removeClass('out');
			$(id).addClass('fade-in');
			$(id).removeClass('fade-out');
	}
	function transition(imagesCount) {
	
	if (count == (imagesCount)){
		fadeOut("#header".concat(count));
		count = 1;
		fadeIn("#header".concat(count));
	} else {
		fadeOut("#header".concat(count));
		fadeIn("#header".concat(++count));
	}
}
	window.setInterval(transition, 3000, imagesCount);

function show(id) {
	$(id).removeClass('hidden');
	$(id).siblings().addClass('hidden');	
}

$(".menu-item").click(function() {
	$(this).addClass('active');
	$(this).siblings().removeClass('active');
	show($(this).find('a').attr('href'));
	
	
});

})( jQuery );
