<?php
/**
 *	Customizer Controls for General Settings for the theme
 */

function itsmpl_general_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		"itsmpl_general_options", array(
			"title"			=>	esc_html__("General", "it-simpl"),
			"description"	=>	esc_html__("General Settings for the Theme", "it-simpl"),
			"priority"		=>	5
		)
	);

	$wp_customize->add_setting(
        'itsmpl_sidebar_width', array(
            'default'    		=>  25,
            'sanitize_callback'	=>  'absint',
			'transport'			=>	'postMessage'
        )
    );

    $wp_customize->add_control(
        new itsmpl_Range_Value_Control(
            $wp_customize, 'itsmpl_sidebar_width', array(
	            'label'         =>	esc_html__( 'Sidebar Width', 'it-simpl' ),
            	'type'          => 'itsmpl-range-value',
            	'section'       => 'itsmpl_general_options',
            	'settings'      => 'itsmpl_sidebar_width',
                'priority'		=>  5,
            	'input_attrs'   => array(
            		'min'            => 25,
            		'max'            => 40,
            		'step'           => 1,
            		'suffix'         => '%', //optional suffix
				),
            )
        )
    );

    $wp_customize->add_setting(
	    'itsmpl_site_layout', array(
		    'default'			=>	'box',
		    'sanitize_callback'	=>	'itsmpl_sanitize_select'
	    )
    );

    $wp_customize->add_control(
	    'itsmpl_site_layout', array(
		    'label'		=>	__('Site Layout', 'it-simpl'),
		    'type'		=>	'select',
		    'section'	=>	'itsmpl_general_options',
		    'priority'	=>	10,
		    'choices'	=>	array(
			    'box'	=>	__('Box Layout', 'it-simpl'),
			    'full'	=>	__('Full Width Layout', 'it-simpl')
		    )
	    )
    );
}
add_action("customize_register", "itsmpl_general_customize_register");
