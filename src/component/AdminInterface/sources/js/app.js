//@koala-prepend "../../components/jquery/dist/jquery.js"
//@koala-prepend "../../components/bootstrap/dist/js/bootstrap.min.js"
//@koala-prepend "../../components/jasny-bootstrap/dist/js/jasny-bootstrap.js"

function removeClasses(element) {
	element.removeClass('canvas-sm-margin');
	element.removeClass('canvas-md-margin');
	element.removeClass('canvas-lg-margin');
}

function addRightClass(element) {
	removeClasses(element);
	
	if ( $('.mainmenu').hasClass('mainmenu-open') && $('.submenu').hasClass('submenu-open') ) {
		element.addClass('canvas-lg-margin');
	} else if ( $('.mainmenu').hasClass('mainmenu-open') ) {
		element.addClass('canvas-md-margin');
	} else if ( $('.submenu').hasClass('submenu-open') ) {
	} else {
		element.addClass('canvas-sm-margin');
	}
}

$('.navmenu').on('click', '.mainmenu-toggle', function (e) {
	e.preventDefault();

	if ($('.mainmenu').hasClass('mainmenu-open')) {
		$('.mainmenu').removeClass('mainmenu-open');
		$(this).find('.fa').addClass('fa-arrow-right');
		$(this).find('.fa').removeClass('fa-arrow-left');
	} else {
		$('.mainmenu').addClass('mainmenu-open');
		$(this).find('.fa').addClass('fa-arrow-left');
		$(this).find('.fa').removeClass('fa-arrow-right');
	}

	var element = $('.canvas-inner');
	addRightClass(element);

	if ($('.submenu').hasClass('canvas-hide-mainmenu')) {
		$('.submenu').removeClass('canvas-hide-mainmenu');
	} else {
		$('.submenu').addClass('canvas-hide-mainmenu');
	}

/**
	if ($('.canvas-inner').hasClass('canvas-inner-half-margin')) {
  		if ($('.canvas-inner').hasClass('canvas-inner-full-margin')) {
	  		$('.canvas-inner').removeClass('canvas-inner-full-margin');
		} else {
			$('.canvas-inner').addClass('canvas-inner-full-margin');
		}
	} else {
			
	} */
});

$('.submenu-toggle').on('click', function (e) {
	e.preventDefault();

	if ($('.submenu').hasClass('submenu-open')) {
		$('.submenu').removeClass('submenu-open');
	} else {
		$('.submenu').addClass('submenu-open');
	}

	var element = $('.canvas-inner');
	addRightClass(element);

	/*if ($('.canvas-inner').hasClass('canvas-hide-submenu')) {
		$('.canvas-inner').removeClass('canvas-hide-submenu');
	} else {
		$('.canvas-inner').addClass('canvas-hide-submenu');
	}*/
});