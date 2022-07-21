<?php
/**
 * Interserver Platinum Theme Customizer
 *
 * @package Interserver Platinum
 */

if(!function_exists('interserver_platinum_customize_register')){
 function interserver_platinum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel = 'header_options';
    $wp_customize->get_section( 'header_image' )->priority = '13';
  	$wp_customize->get_section( 'colors' )->panel = 'interserver_platinum_color_panel';
	$wp_customize->get_section('colors')->title = __( 'General','interserver-platinum' );
	$wp_customize->get_section( 'colors' )->priority = '35';
	$wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );
	
	// Load customize controls.
	get_template_part('inc/customizer/controls');

	// Load sanitize option.
	get_template_part('inc/customizer/sanitize');

	// Load customize defaults.
	get_template_part('inc/customizer/defaults');

	// Load customize option.
	get_template_part('inc/customizer/options');
}
}
add_action( 'customize_register', 'interserver_platinum_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if(!function_exists('interserver_platinum_customize_preview_js')){
function interserver_platinum_customize_preview_js() {
	wp_enqueue_script( 'interserver_platinum_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
}
add_action( 'customize_preview_init', 'interserver_platinum_customize_preview_js' );
