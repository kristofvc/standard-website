//@koala-prepend "../../components/jquery/dist/jquery.js"
//@koala-prepend "../../components/bootstrap/dist/js/bootstrap.min.js"
//@koala-prepend "../../components/jasny-bootstrap/dist/js/jasny-bootstrap.js"

$('.navmenu').on('click', '.mainmenu-toggle', function () {
	if ($('.canvas').hasClass('canvas-closed')) {
		$('.canvas').removeClass('canvas-closed');
		$(this).find('.fa').addClass('fa-arrow-left');
		$(this).find('.fa').removeClass('fa-arrow-right');
	} else {
		$('.canvas').addClass('canvas-closed');
		$(this).find('.fa').addClass('fa-arrow-right');
		$(this).find('.fa').removeClass('fa-arrow-left');
	}
});