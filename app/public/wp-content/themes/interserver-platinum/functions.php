<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Interserver Platinum
 *
 */

if ( ! function_exists( 'interserver_platinum_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function interserver_platinum_setup() {
	global $ip_default;
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Interserver Platinum, use a find and replace
	 * to change 'interserver-platinum' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'interserver-platinum', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('interserver-platinum-large-thumbnail', 850);
	add_image_size('interserver-platinum-medium-thumbnail', 550, 400, true);
	add_image_size('interserver-platinum-small-thumbnail', 250);
	add_image_size('interserver-platinum-service-thumbnail', 350);
	add_image_size('interserver-platinum-mas-thumbnail', 500);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'interserver-platinum' ),
		'footer'   => esc_html__( 'Footer Menu', 'interserver-platinum' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	Enable support for custom logo
	*/

	add_theme_support( 'custom-logo', array(
	   'height'      => 100,
	   'width'       => 350,
	   'flex-width' => true,
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'interserver_platinum_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Adds support for editor color palette.
	add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Primary color', 'interserver-platinum' ),
		'slug'  => 'primary_color',
		'color'	=> $ip_default['primary_color'],
	),
	array(
		'name'  => __( 'Secondary color', 'interserver-platinum' ),
		'slug'  => 'secondary_color',
		'color' => $ip_default['secondary_color'],
	),
	array(
		'name'  => __( 'Body Text Color', 'interserver-platinum' ),
		'slug'  => 'body_text_color',
		'color' => $ip_default['body_text_color'],
    ),
    array(
		'name'  => __( 'Background Color', 'interserver-platinum' ),
		'slug'  => 'bg_color',
		'color' => '#fff',
    )
	));

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'align-wide' );

	add_theme_support( "wp-block-styles" );

	// Add Editor Style
	add_editor_style( '/css/editor-style.css' );
}
endif; // interserver_platinum_setup
add_action( 'after_setup_theme', 'interserver_platinum_setup' );

function interserver_platinum_init(){
	register_block_style(
	        'core/quote',
	        array(
	            'name'         => 'blue-quote',
	            'label'        => __( 'Blue Quote', 'interserver-platinum' ),
	            'is_default'   => true,
	            'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
	        )
	);

	register_block_pattern(
	    'ip-awesome-pattern',
	    array(
	        'title'       => __( 'Two buttons', 'interserver-platinum' ),
	        'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'interserver-platinum' ),
	        'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'interserver-platinum' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'interserver-platinum' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
	    )
	);
}
add_action('init', 'interserver_platinum_init');

/**
 * Register widget area.
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function interserver_platinum_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'interserver-platinum' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widgets', '4');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'interserver-platinum' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'interserver_platinum_widgets_init' );



// Enqueue Bootstrap
 function interserver_platinum_enqueue_bootstrap() {
	wp_enqueue_style( 'interserver-platinum-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'interserver_platinum_enqueue_bootstrap', 9 );

function interserver_platinum_scripts(){
	global $ip_default;
	echo "<script>var header_style;</script>";
	$header_alignment = get_theme_mod('header_alignment',$ip_default['header_alignment']);
	if ($header_alignment != $ip_default['header_alignment']){
	echo "<script>header_style = 'centered';</script>";
	}
	wp_enqueue_style( 'interserver-platinum-fonts', esc_url( interserver_platinum_google_fonts() ), array(), null );
	wp_enqueue_style( 'interserver-platinum-fontawesome-css', get_template_directory_uri() . '/fonts/css/all.min.css' );
	wp_enqueue_style( 'interserver-platinum-style', get_stylesheet_uri());
	wp_enqueue_style( 'interserver-platinum-ie9', get_template_directory_uri() . '/css/ie9.css', array( 'interserver-platinum-style' ) );
	wp_style_add_data( 'interserver-platinum-ie9', 'conditional', 'lte IE 9' );
	
	wp_enqueue_script( 'interserver-platinum-fontawesome-js', get_template_directory_uri() . '/fonts/js/all.min.js' );
	wp_enqueue_script( 'interserver-platinum-navigation', get_template_directory_uri() . '/js/responsive-nav.js', array(), '20151215', true );
	wp_enqueue_script( 'interserver-platinum-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),'20170504', true );
	wp_enqueue_script( 'interserver-platinum-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( get_theme_mod('blog_layout') == 'masonry-layout' && (is_home() || is_archive()) ) {
		wp_enqueue_script( 'interserver-platinum-masonry', get_template_directory_uri() . '/js/masonry.js', array('masonry'),'', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts','interserver_platinum_scripts');


// Load init.
require trailingslashit( get_template_directory() ) . 'inc/init.php';


// Fonts
if ( !function_exists('interserver_platinum_google_fonts') ) :
function interserver_platinum_google_fonts() {
	global $ip_default;
	$logo_font 		= get_theme_mod('logo_font_name', $ip_default['logo_font_name']);
	$body_font 		= get_theme_mod('body_font_name', $ip_default['body_font_name']);
	$headings_font 	= get_theme_mod('headings_font_name', $ip_default['headings_font_name']);

	$fonts     		= array();
	$fonts[] 		= esc_attr( str_replace( '+', ' ', $logo_font ) );
	$fonts[] 		= esc_attr( str_replace( '+', ' ', $body_font ) );
	$fonts[] 		= esc_attr( str_replace( '+', ' ', $headings_font ) );

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) )
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;	
}
endif;