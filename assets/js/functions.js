( function( $ ) {
	'use strict';

	/**
	 * Back To Top
	 *
	 * @author ZoTheme
	 * @since 1.0.0
	 */

	/** current scroll */
	var scroll_top = $(window).scrollTop();

	/** current window height */
	var window_height = $(window).height();
	$('body').on('click', '#back-to-top', function () {
		$("html, body").animate({
			scrollTop: 0
		}, 1000);
	});
	/* Show or hide buttom  */
	function zura_back_to_top() {
		/* back to top */
		if (scroll_top < window_height) {
			$('#back-to-top').addClass('off').removeClass('on');
		} else {
			$('#back-to-top').removeClass('off').addClass('on');
		}
	}

	$(window).scroll(function () {
		scroll_top = $(window).scrollTop();
		/* check back to top */
		zura_back_to_top();
	});
	/**------End Back To Top------**/

	/**
	 * Sticky
	 */
	if($('.header-sticky').length) {
		var $menu = $('.header-sticky'),
			$menuOff = $menu.offset(),
			$menuH = $menu.outerHeight();
		$menu.wrap('<div class="header-sticky-wrap"></div>');
		$('.header-sticky-wrap').height($menuH);
		//rosy navigation
		$('.menu', $menu).find('.sub-menu').each(function () {
			var $arrow = '<i class="menu-arrow fa fa-angle-right"></i>';
			$(this).before($arrow);
		});
		$('.menu-arrow').click(function () {
			var $parent = $(this).parent();
			$(this).toggleClass('fa-angle-right fa-angle-down');
			$parent.toggleClass('open');
			return false;
		});
		/**
		 * Scroll To Top
		 */
		$(window).scroll(function (e) {
			if (( $(this).scrollTop() > ($menuOff.top) ) && ( parseInt($(window).width()) > 768 )) {
				$menu.addClass('header-fixed');
			} else {
				$menu.removeClass('header-fixed');
			}
		});
	}

	$('[data-toggle="tooltip"]').tooltip();
	/**
	 * search form
	 */
	$('.btn-search','#search-form').click(function(e){
		$('.form-search', '#search-form').toggleClass('active');
	})
	$('.form-search', '#search-form').click(function(e){e.stopPropagation();})
	

} )( jQuery );
