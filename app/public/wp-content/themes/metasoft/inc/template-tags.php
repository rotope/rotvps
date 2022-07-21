<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MetaSoft
 */

if ( ! function_exists( 'metasoft_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function metasoft_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'metasoft' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'metasoft' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'metasoft_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function metasoft_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'metasoft' ) );
		if ( $categories_list && metasoft_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'metasoft' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'metasoft' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'metasoft' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'metasoft' ), array( 'span' => array( 'class' => array() ) ) ), esc_html(get_the_title()) ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'metasoft' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function metasoft_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'metasoft_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'metasoft_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so metasoft_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so metasoft_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in metasoft_categorized_blog.
 */
function metasoft_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'metasoft_categories' );
}
add_action( 'edit_category', 'metasoft_category_transient_flusher' );
add_action( 'save_post',     'metasoft_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('metasoft_sticky_menu')):
    function metasoft_sticky_menu()
    {
        $is_sticky = get_theme_mod('hide_show_sticky','1');

        if ($is_sticky == '1'):
            return 'is-sticky-on';
        else:
            return 'not-sticky';
        endif;
    }
endif;


/**
 * Register Google fonts for metasoft.
 */
function metasoft_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function metasoft_scripts_styles() {
    wp_enqueue_style( 'metasoft-fonts', metasoft_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'metasoft_scripts_styles' );


/**
 * Register Breadcrumb for Multiple Variation
 */
function metasoft_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');			
}

/**
 * Blog Buttons 
 */
function metasoft_read_more($more)
	{  global $post;
		
	return '<div class="post-content-bottom"><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link\">" .__('Read More','metasoft')."</a></div>";
		
	}
add_filter( 'the_content_more_link', 'metasoft_read_more' );


/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'metasoft_post_layout' )) :
function metasoft_post_layout(){
	if(is_active_sidebar('metasoft-sidebar-primary'))
		{ echo 'col-lg-8 col-12'; } 
	else 
		{ echo 'col-lg-12 col-12'; }  
} endif;


/**
 * Dynamic Styles
 */
 
if( ! function_exists( 'metasoft_dynamic_style' ) ):
    function metasoft_dynamic_style() {

		$output_css = '';
		
		 /**
		 *  Breadcrumb Style
		 */
		
		$breadcrumb_min_height			= get_theme_mod('breadcrumb_min_height','236');	
		
		if($breadcrumb_min_height !== '') { 
				$output_css .=".header-transparent .breadcrumb-area {
					min-height: " .esc_attr($breadcrumb_min_height). "px;
				}\n";
			}
		
        wp_add_inline_style( 'metasoft-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'metasoft_dynamic_style' );