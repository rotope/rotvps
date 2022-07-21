<?php
/**
 * Controls for the Header Section
 */

function itsmpl_header_customize_register( $wp_customize ) {

	$wp_customize->get_section("title_tagline")->panel	=	"itsmpl_header";
	$wp_customize->get_section("header_image")->panel	=	"itsmpl_header";
	//$wp_customize->get_section("widgets-sidebar-header")->panel = "itsmpl_header";

	$wp_customize->add_panel(
		"itsmpl_header", array(
			"title"	=>	esc_html__("Header", 'it-simpl'),
			"priority"	=>	10
		)
	);

	$wp_customize->add_section(
		"itsmpl_header_options", array(
			"title"		=>	esc_html__("Header Options", 'it-simpl'),
			"panel"		=>	"itsmpl_header",
			"priority"	=>	80
		)
	);

	$wp_customize->add_setting(
		'itsmpl_sticky_menu_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=> 'itsmpl_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'itsmpl_sticky_menu_enable', array(
			'label'		=>	__('Enable Sticky Navigation', 'it-simpl'),
			'type'		=>	'checkbox',
			'section'	=>	'itsmpl_header_options',
			'priority'	=>	40
		)
	);

	$wp_customize->add_setting(
		'itsmpl_hero_text', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'itsmpl_hero_text', array(
			'label'		=>	__('Hero Text', 'it-simpl'),
			'section'	=>	'itsmpl_header_options',
			'priority'	=>	45
		)
	);

	$wp_customize->add_setting(
		'itsmpl_hero_desc', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'itsmpl_hero_desc', array(
			'label'		=>	__('Hero Description', 'it-simpl'),
			'section'	=>	'itsmpl_header_options',
			'priority'	=>	45
		)
	);

	$wp_customize->add_setting(
	    'itsmpl_scroll_down_enable', array(
		    'default'	=>	1,
		    'sanitize_callback'	=>	'itsmpl_sanitize_checkbox'
	    )
    );

    $wp_customize->add_control(
	    'itsmpl_scroll_down_enable', array(
		    'label'			=>	__('Enable Scroll Down Section in Header', 'it-simpl'),
		    'type'			=>	'checkbox',
		    'section'		=>	'itsmpl_header_options',
		    'priority'		=>	60
	    )
    );
}

add_action("customize_register", "itsmpl_header_customize_register");
