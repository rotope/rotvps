<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package IT Simpl
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function itsmpl_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'itsmpl_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function itsmpl_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'itsmpl_pingback_header' );


/**
 *	Pagination
 */
function itsmpl_get_pagination() {

	$args	=	apply_filters( 'itsmpl_pagination', array(
		'mid_size' => 2,
		'prev_text' => __( '<i class="fas fa-angle-left"></i>', 'it-simpl' ),
		'next_text' => __( '<i class="fas fa-angle-right"></i>', 'it-simpl' ),
	) );

	the_posts_pagination($args);

}
add_action('itsmpl_pagination', 'itsmpl_get_pagination');


/**
 *	Function to generate meta data for the posts
 */
 if ( !function_exists('itsmpl_get_metadata') ) {

	function itsmpl_get_metadata() {
		if ( 'post' === get_post_type() ) :
			?>
				<div class="entry-meta">
					<?php
					itsmpl_posted_by();
					itsmpl_posted_on();
					itsmpl_get_post_categories();
					itsmpl_get_comments();
					?>
				</div>
		<?php endif;
	}
}
add_action('itsmpl_metadata', 'itsmpl_get_metadata');



/**
 *	Function for post content on Blog Page
 */
 if ( !function_exists('itsmpl_get_blog_excerpt' ) ) {

	 function itsmpl_get_blog_excerpt( $length = 30 ) {

		 global $post;
		 $output	=	'';

		 if ( isset($post->ID) && has_excerpt($post->ID) ) {
			 $output = $post->post_excerpt;
		 }

		 elseif ( isset( $post->post_content ) ) {
			 if ( strpos($post->post_content, '<!--more-->') ) {
				 $output	=	get_the_content('');
			 }
			 else {
				 $output	=	wp_trim_words( strip_shortcodes( $post->post_content ), $length );
			 }
		 }

		 $output	=	apply_filters('itsmpl_excerpt', $output);

		 echo $output;
	 }
}
 add_action('itsmpl_blog_excerpt', 'itsmpl_get_blog_excerpt', 10, 1);


if ( !function_exists('itsmpl_get_layout') ) {
	function itsmpl_get_layout() {

		$layout	=	'framework/layouts/content';

		get_template_part( $layout, 'blog' );

	}
}
add_action( 'itsmpl_layout', 'itsmpl_get_layout', 10 );


 /**
  *	Function for 'Read More' link
  */
  function itsmpl_read_more_link() {
	  ?>
	  <div class="read-more title-font"><a href="<?php the_permalink() ?>"><?php apply_filters( 'itsmpl_read_more', _e('Read More', 'it-simpl') ); ?></a></div>
	  <?php
  }


/**
 *	Function to Enable Sidebar
 */
if ( !function_exists('itsmpl_get_sidebar') ) {
	function itsmpl_get_sidebar( $template ) {

	   global $post;

	   switch( $template ) {

		    case "blog";
		    if ( is_home() &&
		    	get_theme_mod('itsmpl_blog_sidebar_enable', 1) !== "" ) {
			    get_sidebar(NULL, ['page' => 'blog']);
			}
			break;
		    case "single":
		   		if( is_single() &&
		   		get_theme_mod('itsmpl_single_sidebar_enable', 1) !== "" ) {
					get_sidebar('single', ['page' => 'single']);
				}
			break;
			case "search":
		   		if( is_search() &&
		   		get_theme_mod('itsmpl_search_sidebar_enable', 1) !== "" ) {
					get_sidebar(NULL, ['page' => 'search']);
				}
			break;
			case "archive":
		   		if( is_archive() &&
		   		get_theme_mod('itsmpl_archive_sidebar_enable', 1) !== "" ) {
					get_sidebar(NULL, ['page' => 'archive']);
				}
			break;
			case "page":
				if	( is_page() &&
				!is_front_page() &&
				'' !== get_post_meta($post->ID, 'enable-sidebar', true) ) {
					get_sidebar('page', ['page'	=>	'page']);
				}
			break;
		    default:
		    	get_sidebar();
		}
	}
}
add_action('itsmpl_sidebar', 'itsmpl_get_sidebar', 10, 1);



 /**
  *	Function for Sidebar alignment
  */
if ( !function_exists('itsmpl_sidebar_align') ) {
	function itsmpl_sidebar_align( $template = 'blog' ) {

		$align = 'page'	== $template ? get_post_meta( get_the_ID(), 'align-sidebar', true ) : get_theme_mod('itsmpl_' . $template . '_sidebar_layout', 'right');

		$align_arr	=	['order-1', 'order-2'];

		if ( in_array( $template, ['single', 'blog', 'page', 'search', 'archive'] ) ) {
			return 'right' == $align ? $align_arr : array_reverse($align_arr);
		}
		else {
			return $align_arr;
		}
	}
}


 /**
  *	Function to get Social icons
  */
 function itsmpl_get_social_icons() {
 	get_template_part('social');
 }
 add_action('itsmpl_social_icons', 'itsmpl_get_social_icons');


/**
 *	The About Author Section
 */
if ( !function_exists('itsmpl_about_author') ) {

	function itsmpl_about_author( $post ) { ?>
		<div id="author_box" class="row no-gutters">
			<div class="author_avatar col-md-2">
				<?php echo get_avatar( intval($post->post_author), apply_filters( 'itsmpl_avatar_size', 96 ) ); ?>
			</div>
			<div class="author_info col-md-10">
				<h4 class="author_name title-font">
					<?php echo get_the_author_meta( 'display_name', intval($post->post_author) ); ?>
				</h4>
				<div class="author_bio">
					<?php echo get_the_author_meta( 'description', intval($post->post_author) ); ?>
				</div>
			</div>
		</div>
	<?php
	}

}

 /**
  *	Function to add featured Areas before Content
  */
if ( !function_exists('itsmpl_get_sidebar_before_content') ) {
	function itsmpl_get_sidebar_before_content() {

		if ( is_front_page() && is_active_sidebar('before-content') ) :
			?>
			<div id="itsmpl-before-content" class="container">
				<?php
					dynamic_sidebar('before-content');
				?>
			</div>
			<?php
		endif;
	}
}
add_action('itsmpl_before_content', 'itsmpl_get_sidebar_before_content', 50);



/**
*	Function to add Featured Areas After Content
*/
   if ( !function_exists('itsmpl_get_after_content') ) {
function itsmpl_get_after_content() {

	    if ( is_front_page() && is_active_sidebar('after-content') ) :
			?>
			<div id="itsmpl-after-content" class="container">
				<?php
					dynamic_sidebar('after-content');
				?>
			</div>
			<?php
		endif;
   }
}
add_action('itsmpl_after_content', 'itsmpl_get_after_content');


/**
 *	Function for footer section
 */
 if ( !function_exists('itsmpl_get_footer') ) {
	 function itsmpl_get_footer() {

		$path 	=	'/framework/footer/footer';
		get_template_part( $path, get_theme_mod( 'itsmpl_footer_cols', 4 ) );
	 }
 }
 add_action('itsmpl_footer', 'itsmpl_get_footer');

 /**
  *	Hex to RGB converter
  */
 function itsmpl_hex2rgb() {

    if ( $colour[0] == '#' ) {
            $colour = substr( $colour, 1 );
    }
    if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
    } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
    } else {
            return false;
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    return array( 'red' => $r, 'green' => $g, 'blue' => $b );

 }

 /**
  *	Custom Colors
  */
 function itsmpl_colors() {

	 $primary 	= get_theme_mod('itsmpl-primary-color', '#16326f');
	 $secondary	= get_theme_mod('itsmpl-sec-color', '#fdc645');
	 $header_bg	= get_theme_mod('itsmpl-header-overlay-color', 'rgba(18, 46, 115, 0.7)');

	 $output = "";

	 $output .= ":root {
		 --primary: " . esc_html($primary) . ";
		 --secondary: " . esc_html($secondary) . ";
	 }";

	 $output .= "#masthead:before {
		 background-color: " . esc_html($header_bg) . ";
	 }";

	 wp_add_inline_style('itsmpl-main-style', $output);

 }
 add_action('wp_enqueue_scripts', 'itsmpl_colors');


/**
 *	Related Posts of a Single Post
 */

function itsmpl_get_related_posts() {

	global $post;

	$related_args = apply_filters( 'itsmpl_related_posts_args', [
		"posts_per_page"		=>	3,
		"ignore_sticky_posts"	=>	true,
		"post__not_in"			=>	[get_the_ID()],
		"category_name"			=>	get_the_category($post)[0]->slug,
		"orderby"				=> "rand"
	] );

	$related_query	=	new WP_Query( $related_args );

	if ( $related_query->have_posts() ) : ?>
		<div id="itsmpl_related_posts_wrapper">
			<h3 id="itsmpl_related_posts_title"><?php _e('Related Posts', 'it-simpl'); ?></h3>
			<div class="itsmpl-related-posts row">
				<?php
					while ( $related_query->have_posts() ) : $related_query->the_post();

						get_template_part( 'framework/layouts/content', 'related' );

					endwhile;
				?>
			</div>
		</div>
	<?php
	endif;
	wp_reset_postdata();
}
add_action('itsmpl_related_posts', 'itsmpl_get_related_posts');


/**
 *	ITSMPL Featured Category
 */
if ( !function_exists('itsmpl_showcase') ) {

	function itsmpl_showcase() {

		if 	( is_front_page() && get_theme_mod( 'itsmpl-showcase-enable' )
		   || !is_front_page() && is_home() && get_theme_mod( 'itsmpl-showcase-enable' ) ) {

			   ?>
			   		<div id="itsmpl-showcase" class="container">

						<h2 id="showcase-title">
							<?php echo esc_html( get_theme_mod('itsmpl-showcase-title', 'Features') ) ?>
						</h2>
						
						<div class="row">
							<?php
								for ( $i = 0; $i <= 2; $i++ ) {
									$showcase[ $i ] = get_theme_mod('itsmpl-showcase-' . ($i + 1), 0);
								}

								$args = array(
									'post_type'				=>	'page',
									'post__in'				=>	$showcase,
									'ignore_sticky_posts'	=>	true
								);

								$showcase_query = new WP_Query( $args );

								// The Loop
								if ( $showcase_query->have_posts() ) :
									$i = 0;
								while ( $showcase_query->have_posts() ) : $showcase_query->the_post();

									global $post;

								  get_template_part( 'framework/layouts/content','showcase', $showcase[ $i ]  );

								  $i++;

								endwhile;
								endif;

								// Reset Post Data
								wp_reset_postdata();
							?>
						</div>
					</div>
			   <?php
		}
	}
}
add_action('itsmpl_before_content', 'itsmpl_showcase', 20);
