//@koala-prepend "../../components/jquery/dist/jquery.js"
//@koala-prepend "../../components/bootstrap/dist/js/bootstrap.min.js"
//@koala-prepend "../../components/jasny-bootstrap/dist/js/jasny-bootstrap.js"

$('.navmenu').on('click', '.mainmenu-toggle', function () {
	if ($('.canvas').hasClass('canvas-closed')) {
		setTimeout(function () {
			$('.canvas').removeClass('canvas-closed');
		}, 210);	
		$(this).find('.fa').addClass('fa-arrow-left');
		$(this).find('.fa').removeClass('fa-arrow-right');
	} else {
		setTimeout(function () {
			$('.canvas').addClass('canvas-closed');
		}, 210);	
		$(this).find('.fa').addClass('fa-arrow-right');
		$(this).find('.fa').removeClass('fa-arrow-left');
	}
});