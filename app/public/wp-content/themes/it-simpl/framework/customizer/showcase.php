<?php
/**
 *	Featured Category Featured Area
 */

function itsmpl_showcase_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'itsmpl-showcase', array(
			'title'		=>	__('Showcase', 'it-simpl'),
			'priority'	=>	10,
		)
	);

    $wp_customize->add_setting(
		'itsmpl-showcase-enable', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'itsmpl_sanitize_checkbox'
		)
	);

    $wp_customize->add_control(
        'itsmpl-showcase-enable', array(
            'label'     =>  __('Enable Showcase Area', 'it-simpl'),
            'type'      =>  'checkbox',
            'section'   =>  'itsmpl-showcase'
        )
    );

    $wp_customize->add_setting(
		'itsmpl-showcase-title', array(
			'default'		=>	__('Features', 'it-simpl'),
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
        'itsmpl-showcase-title', array(
            'label'     =>  __('Showcase Title', 'it-simpl'),
            'section'   =>  'itsmpl-showcase'
        )
    );

    for ( $i = 1; $i <= 3; $i++ ) {

        $wp_customize->add_setting(
    		'itsmpl-showcase-' . $i, array(
    			'default'		=>	0,
    			'sanitize_callback'	=>	'absint'
    		)
    	);

        $wp_customize->add_control(
            'itsmpl-showcase-' . $i, array(
                'label'     =>  __('Select Page', 'it-simpl'),
                'description'   =>  esc_html__('For Showcase Item ' . $i, 'it-simpl'),
                'type'          =>  'dropdown-pages',
                'section'       =>  'itsmpl-showcase'
            )
        );
    }

}
add_action('customize_register', 'itsmpl_showcase_customize_register');
