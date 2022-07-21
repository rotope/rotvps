<?php
/**
 * IT Simpl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IT Simpl
 */

if ( ! defined( 'ITSMPL_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ITSMPL_VERSION', '1.0.3' );
}

if ( ! function_exists( 'itsmpl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function itsmpl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on IT Simpl, use a find and replace
		 * to change 'it-simpl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'it-simpl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Sliding Menu', 'it-simpl' ),
				'menu-2' => esc_html__( 'Desktop Menu', 'it-simpl'),
				'menu-3' => esc_html__( 'Top Menu', 'it-simpl')
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'itsmpl_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Custom Image sizes for the theme
		add_image_size('itsmpl_square_thumb', 500, 500, true);
		add_image_size('itsmpl_blog_thumb', 700, 490, true);
		add_image_size('itsmpl_800x500', 800, 500, true);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			apply_filters(
				'itsmpl_custom_logo_args', array(
					'height'      => 60,
					'width'       => 240,
					'flex-width'  => true,
					'flex-height' => true,
				)
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'itsmpl_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function itsmpl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'itsmpl_content_width', 640 );
}
add_action( 'after_setup_theme', 'itsmpl_content_width', 0 );

/**
 * Register widget area.
 */
require get_template_directory() . '/framework/theme-setup/register_sidebars.php';


/**
 *	Enqueue Front-end Theme Scripts and Styles
 */
require get_template_directory() . '/framework/theme-setup/enqueue_scripts.php';

/**
 *	Enqueue Back-end Theme Scripts and Styles
 */
 require get_template_directory() . '/framework/theme-setup/admin_scripts.php';

/**
 *	Functions for the masthead.
 */
 require get_template_directory() . '/inc/masthead.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 *	Add Block Styles
 */
 require get_template_directory() . '/inc/blocks.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 *	Custom CSS
 */
require get_template_directory() . '/inc/css-mods.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/framework/customizer/customizer.php';

/**
 *	Add Menu Walker
 */
require get_template_directory() . '/inc/walker.php';

/**
 *	The Meta Box for the Page
 */

require get_template_directory() . '/framework/metabox/display-options.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 *	Custom Widgets
 */
require get_template_directory() . '/framework/widgets/recent-posts.php';
