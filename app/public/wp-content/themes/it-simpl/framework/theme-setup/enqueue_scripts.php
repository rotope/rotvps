<?php
/**
 * Enqueue scripts and styles.
 */
function itsmpl_scripts() {
	wp_enqueue_style( 'itsmpl-style', get_stylesheet_uri(), array(), ITSMPL_VERSION );
	wp_style_add_data( 'itsmpl-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery-ui-tabs');

	wp_enqueue_style( 'itsmpl-fonts', 'https://fonts.googleapis.com/css?family=Spline+Sans:400,700&display=swap', array(), ITSMPL_VERSION );

	wp_enqueue_style( 'itsmpl-main-style', esc_url(get_template_directory_uri() . '/assets/theme-styles/css/default.css'), array(), ITSMPL_VERSION );

	wp_enqueue_style( 'bootstrap', esc_url(get_template_directory_uri() . '/assets/bootstrap/bootstrap.css'), array(), ITSMPL_VERSION );

	wp_enqueue_style( 'owl', esc_url(get_template_directory_uri() . '/assets/owl/owl.carousel.css'), array(), ITSMPL_VERSION );

	wp_enqueue_style( 'mag-popup', esc_url(get_template_directory_uri() . '/assets/magnific-popup/magnific-popup.css'), array(), ITSMPL_VERSION );

	wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri() . '/assets/fonts/font-awesome.css'), array(), ITSMPL_VERSION );

	wp_enqueue_script( 'big-slide', esc_url(get_template_directory_uri() . '/assets/js/bigSlide.js'), array('jquery'), ITSMPL_VERSION );

	wp_enqueue_script( 'itsmpl-custom-js', esc_url(get_template_directory_uri() . '/assets/js/custom.js'), array('jquery'), ITSMPL_VERSION );

	wp_enqueue_script( 'owl-js', esc_url(get_template_directory_uri() . '/assets/js/owl.carousel.js'), array('jquery'), ITSMPL_VERSION );

	wp_enqueue_script( 'mag-lightbox-js', esc_url(get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js'), array('jquery'), ITSMPL_VERSION );

	wp_enqueue_script( 'itsmpl-navigation', esc_url(get_template_directory_uri() . '/assets/js/navigation.js'), array(), ITSMPL_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itsmpl_scripts' );


/**
 *	Localize Customizer Data to make Theme Settings available in custom.js
 */
 function itsmpl_localize_settings() {

	 $data = array(
		 'stickyNav'	=>	get_theme_mod('itsmpl_sticky_menu_enable', '')
	 );

	 wp_localize_script( 'itsmpl-custom-js', 'itsmpl', $data );

 }
 add_action('wp_enqueue_scripts', 'itsmpl_localize_settings');
