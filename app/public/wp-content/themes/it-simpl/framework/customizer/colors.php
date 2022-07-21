<?php
/**
 *	CustomColors Control for Theme
 */

function itsmpl_colors_customize_register( $wp_customize ) {

	$wp_customize->add_setting(
		'itsmpl-primary-color', array(
			'default'	=>	'#16326f',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'itsmpl-primary-color', array(
				'label'		=>	esc_html__('Primary Color', 'it-simpl'),
				'section'	=>	'colors',
				'settings'	=>	'itsmpl-primary-color',
				'priority'	=>	30
			)
		)
	);

	$wp_customize->add_setting(
		'itsmpl-sec-color', array(
			'default'	=>	'#fdc645',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'itsmpl-sec-color', array(
				'label'		=>	esc_html__('Secondary Color', 'it-simpl'),
				'section'	=>	'colors',
				'settings'	=>	'itsmpl-sec-color',
				'priority'	=>	40
			)
		)
	);

	$wp_customize->add_setting(
		'itsmpl-header-overlay-color' , array(
			'default'           => 'rgba(18, 46, 115, 0.7)',
			'transport'         => 'refresh',
			'sanitize_callback' => 'itsmpl_sanitize_coloralpha'
		)
	);

	$wp_customize->add_control(
		new itsmpl_ColorAlpha(
			$wp_customize, 'itsmpl-header-overlay-color', array(
				'label'      => __( 'Header Overlay Color', 'it-simpl' ),
				'section'    => 'colors',
				'settings'   => 'itsmpl-header-overlay-color',
				'priority'	 =>	60
			)
		)
	);

}
add_action( 'customize_register', 'itsmpl_colors_customize_register' );
