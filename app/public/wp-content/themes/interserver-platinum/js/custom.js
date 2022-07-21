jQuery(window).load(function() {
 	// Animate loader off screen
	jQuery(".ip-loader").fadeOut("slow");
});

jQuery(window).scroll(function() {
  "use strict";
   var scroll = jQuery(window).scrollTop(); 
    if (scroll >= 110) {
        jQuery(".site-header").addClass("fixed");
	 }
	 else {
        jQuery(".site-header").removeClass("fixed");
    }

	if (scroll >= 800) {
        jQuery('.scrollup').addClass('show');
	 } else {
        jQuery('.scrollup').removeClass('show');
    }
	
});
jQuery('.scrollup').on('click', function() {
			jQuery("html, body").animate({ scrollTop: 0 }, 1000);
			return false;
});
jQuery('.cta-button').on('click', function() {
			jQuery("html, body").animate({ scrollTop: 0 }, 1000);
			return false;
});

( function( $ ) {
	 if (header_style == "centered"){
		 jQuery(".site-header").addClass("header-centered");
	 }else {
         jQuery(".site-header").removeClass("header-centered");
    }

    // Counter
jQuery('#ip-counter .sow-headline').each(function () {
    jQuery(this).prop('Counter',0).animate({
        Counter: jQuery(this).text()
    }, {
        duration: 6000,
        easing: 'swing',
        step: function (now) {
            jQuery(this).text(Math.ceil(now));
        }
    });
});
} )( jQuery );