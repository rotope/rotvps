<?php
/**
 *	Scripts and Styles for Admin area and Customizer
 */

function itsmpl_customize_control_scripts() {

	wp_enqueue_script("itsmpl-customize-control-js", esc_url( get_template_directory_uri() . "/assets/js/customize_controls.js" ), array(), ITSMPL_VERSION, true );

    wp_enqueue_script("itsmpl-color-alpha-js", esc_url( get_template_directory_uri() . "/assets/js/color-alpha.js" ), array(), ITSMPL_VERSION, true );

}
add_action("customize_controls_enqueue_scripts", "itsmpl_customize_control_scripts");


function itsmpl_custom_admin_styles() {

	global $pagenow;

	$allowed = array('post.php', 'post-new.php', 'customize.php');

	if (!in_array($pagenow, $allowed)) {
		return;
	}

    wp_enqueue_style( 'itsmpl-admin-css', esc_url( get_template_directory_uri() . '/assets/theme-styles/css/admin.css' ), array(), ITSMPL_VERSION );

}
add_action( 'admin_enqueue_scripts', 'itsmpl_custom_admin_styles' );
