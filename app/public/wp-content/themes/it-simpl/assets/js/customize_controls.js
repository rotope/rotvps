/**
 *	jQuery for Customizer Controls
 */

(function() {

	var sidebarControls = ['blog', 'single', 'search', 'archive'];

    jQuery.each( sidebarControls, function( index, value ) {
        wp.customize('itsmpl_' + value + '_sidebar_enable', function( setting ) {
	        var setupControl = function( control ) {

	            var setActiveState = function() {
	                control.active.set( setting.get() );
	            };
	            setActiveState();
	            setting.bind( setActiveState );
            };
            wp.customize.control( 'itsmpl_' + value + '_sidebar_layout', setupControl );
            //wp.customize.control( 'diviner_blog_sidebar_align', setupControl );
        });
    });

	// Slider Control
	wp.customize.bind('ready', function() {
        rangeSlider();
    });

    var rangeSlider = function() {
        var slider = jQuery('.range-slider'),
            range = jQuery('.range-slider__range'),
            value = jQuery('.range-slider__value');

        slider.each(function() {

            value.each(function() {
                var value = jQuery(this).prev().attr('value');
				var suffix = (jQuery(this).prev().attr('suffix')) ? jQuery(this).prev().attr('suffix') : '';
                jQuery(this).html(value + suffix);
            });

            range.on('input', function() {
				var suffix = (jQuery(this).attr('suffix')) ? jQuery(this).attr('suffix') : '';
                jQuery(this).next(value).html(this.value + suffix );
            });
        });
    };
})( jQuery );

wp.customize.sectionConstructor['wptrt-button'] = wp.customize.Section.extend( {

	// No events for this type of section.
	attachEvents: () => {},

	// Always make the section active.
	isContextuallyActive: () => {
		return true;
	}
} );
