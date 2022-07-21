<?php
/**
 * Default theme options.
 *
 * @package Interserver Platinum
 */
 
// Preloader
function interserver_platinum_preloader(){ ?>
  <div class="ip-loader"></div>
<?php }
add_action('interserver_platinum_before_site', 'interserver_platinum_preloader');

// Change the excerpt length
function interserver_platinum_excerpt_length( $length ) {
  $excerpt = get_theme_mod('excerpt_length', '55');
  return $excerpt;

}
add_filter( 'excerpt_length', 'interserver_platinum_excerpt_length', 999 );


// Header image overlay
function interserver_platinum_header_overlay() {
	global $ip_default;
	$overlay = get_theme_mod( 'hide_overlay',$ip_default['hide_overlay']);
	if ( !$overlay ) {
		echo '<div class="overlay"></div>';
	}
}
 
// Get images alt
function interserver_platinum_get_image_alt( $image ) {
    global $wpdb;
    if( empty( $image ) ) {
        return false;
    }
 
    $img_id = attachment_url_to_postid($image);
 
    $alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
    return $alt;
}

// Header Image
function interserver_platinum_header_image() {
	global $ip_default;
	$front_header = get_theme_mod('front_header_type', $ip_default['front_header_type']);
	$site_header = get_theme_mod('site_header_type', $ip_default['site_header_type']);
	if($front_header == 'image' && is_front_page() || $site_header == $ip_default['site_header_type'] && !is_front_page() ){ ?>
	<div class="header-image">
			<?php interserver_platinum_header_overlay(); ?>
			<img class="header-inner" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
	</div>
	<?php 
	}
}
// Header video
function interserver_platinum_header_video() {
	global $ip_default;
	$front_header = get_theme_mod('front_header_type', $ip_default['front_header_type']);
	$site_header = get_theme_mod('site_header_type', $ip_default['site_header_type']);
	if ( !function_exists('the_custom_header_markup') ) {
		return;
	}
	if ( $front_header == 'core-video' && is_front_page() || $site_header == 'core-video' && !is_front_page() ) {
		the_custom_header_markup();
	}
}
// Blog layout
function interserver_platinum_blog_layout() {
	global $ip_default;
	$layout = get_theme_mod('blog_layout', $ip_default['blog_layout']);
	return $layout;
}