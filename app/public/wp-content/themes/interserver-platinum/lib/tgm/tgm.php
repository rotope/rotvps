<?php
/**
 * Recommended plugins.
 *
 * @package Interserver Platinum
 */
 

// TGM Plugin activation.
get_template_part('lib/tgm/class-tgm-plugin','activation');

add_action( 'tgmpa_register', 'interserver_platinum_activate_recommended_plugins' );
add_action( 'tgmpa_register', 'interserver_platinum_activate_recommended_plugins' );
function interserver_platinum_activate_recommended_plugins(){
	$plugins = array(
		array(
			'name'               => 'Smart Slider 3',
            'slug'               => 'smart-slider-3',
            'required'           => false,
		),
		array(
			'name'               => 'Ultimate Addons for Gutenberg',
            'slug'               => 'ultimate-addons-for-gutenberg',
            'required'           => false,
		),
		array(
			'name'     =>  'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}