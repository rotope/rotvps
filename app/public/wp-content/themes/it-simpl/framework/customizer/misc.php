<?php
/**
 *	Review, Support and Upsell Section
 */
 
function itsmpl_misc_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		'itsmpl-misc', array(
			'title'		=>	__('THEME LINKS', 'it-simpl'),
			'priority'	=>	40
		)
	);
	
	$wp_customize->add_setting(
		'itsmpl-support', array(
		'default'		=>	'',
		'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itsmpl_Custom_Link_Control(
			$wp_customize, 'itsmpl-support', array(
				'label'		=>	__('Mail Us', 'it-simpl'),
				'description'	=> __('If you have any questions, queries, feedback or suggestions for the theme, we would love to hear from you.', 'it-simpl'),
				'type'		=>	'itsmpl-link',
				'section'	=>	'itsmpl-misc',
				'settings'	=>'itsmpl-support',
				'priority'	=>	5,
				'input_attrs'	=>	array(
						'url'		=>	'mailto:support@indithemes.com'
				)
			)
		)
	);
	
	$wp_customize->add_setting(
		'itsmpl-review', array(
		'default'		=>	'',
		'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itsmpl_Custom_Link_Control(
			$wp_customize, 'itsmpl-review', array(
				'label'		=>	__('<span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span>', 'it-simpl'),
				'description'	=> __('If you liked the theme, do leave us a glittering review. We would really appreciate it. Thanks!', 'it-simpl'),
				'type'		=>	'itsmpl-link',
				'section'	=>	'itsmpl-misc',
				'settings'	=>'itsmpl-review',
				'priority'	=>	5,
				'input_attrs'	=>	array(
						'url'		=>	'https://www.wordpress.org'
				)
			)
		)
	);
	
	$wp_customize->add_setting(
		'itsmpl-more', array(
		'default'		=>	'',
		'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itsmpl_Custom_Link_Control(
			$wp_customize, 'itsmpl-more', array(
				'label'		=>	__('More Themes', 'it-simpl'),
				'description'	=> __('Do visit our store at <strong>IndiThemes.com</strong> and check out our other stuff!', 'it-simpl'),
				'type'		=>	'itsmpl-link',
				'section'	=>	'itsmpl-misc',
				'settings'	=>'itsmpl-more',
				'priority'	=>	5,
				'input_attrs'	=>	array(
						'url'		=>	'https://indithemes.com'
				)
			)
		)
	);
}
add_action('customize_register', 'itsmpl_misc_customize_register');