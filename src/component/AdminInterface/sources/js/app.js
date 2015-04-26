//@koala-prepend "../../components/jquery/dist/jquery.js"
//@koala-prepend "../../components/bootstrap/dist/js/bootstrap.min.js"
//@koala-prepend "../../components/jasny-bootstrap/dist/js/jasny-bootstrap.js"


$('.navmenu').on('click', '.mainmenu-toggle', function (e) {
	e.preventDefault();
	if ($('.submenu').hasClass('canvas-hide-mainmenu')) {
		$('.submenu').removeClass('canvas-hide-mainmenu');
		$(this).find('.fa').addClass('fa-arrow-left');
		$(this).find('.fa').removeClass('fa-arrow-right');
	} else {
		$('.submenu').addClass('canvas-hide-mainmenu');
		$(this).find('.fa').addClass('fa-arrow-right');
		$(this).find('.fa').removeClass('fa-arrow-left');
	}
});

$('.submenu-toggle').on('click', function (e) {
	e.preventDefault();
	if ($('.canvas-inner').hasClass('canvas-hide-submenu')) {
		$('.canvas-inner').removeClass('canvas-hide-submenu');
	} else {
		$('.canvas-inner').addClass('canvas-hide-submenu');
	}
});