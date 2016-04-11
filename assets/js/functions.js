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

} )( jQuery );
