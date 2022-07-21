<?php
function itsmpl_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('itsmpl_social_section', array(
			'title' 	=> esc_html__( 'Top Bar', 'it-simpl' ),
			'priority' 	=> 70,
			'panel'		=> 'itsmpl_header'
	));

	$wp_customize->add_setting(
		'itsmpl_top_bar_enable', array(
			'default'	=>	1,
			'sanitize_callback'	=>	'itsmpl_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'itsmpl_top_bar_enable', array(
			'label'	=>	__('Enable Top Bar', 'it-simpl'),
			'type'	=>	'checkbox',
			'section'	=>	'itsmpl_social_section',
			'priority'	=>	1
		)
	);

	$wp_customize->add_setting(
		'itsmpl_phone_enable', array(
			'default'			=>	'',
			'sanitize_callback'	=>	'itsmpl_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'itsmpl_phone_enable', array(
			'label'		=>	__('Enable Phone Number', 'it-simpl'),
			'type'		=>	'checkbox',
			'section'	=>	'itsmpl_social_section',
			'priority'	=>	2,
		)
	);

	$wp_customize->add_setting(
		'itsmpl_phone', array(
			'default'			=>	'',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'itsmpl_phone', array(
			'label'		=>	__('Phone Number', 'it-simpl' ),
			'section'	=>	'itsmpl_social_section',
			'priority'	=>	2
		)
	);

	$wp_customize->add_setting(
		'itsmpl_top_nav_label', array(
			'default'			=>	'Quick Links',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'itsmpl_top_nav_label', array(
			'label'		=>	__('Button Label for Top Navigation', 'it-simpl' ),
			'section'	=>	'itsmpl_social_section',
			'priority'	=>	3
		)
	);

	$wp_customize->add_setting(
		'itsmpl_social_enable', array(
			'default'	=>	1,
			'sanitize_callback'	=>	'itsmpl_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'itsmpl_social_enable', array(
			'label'	=>	__('Enable Social Icons', 'it-simpl'),
			'type'	=>	'checkbox',
			'section'	=>	'itsmpl_social_section',
			'priority'	=>	5
		)
	);

	$social_networks = array( //Redefinied in Sanitization Function.
					'none' 			=> esc_html__('-','it-simpl'),
					'facebook-f' 	=> esc_html__('Facebook', 'it-simpl'),
					'twitter' 		=> esc_html__('Twitter', 'it-simpl'),
					'instagram' 	=> esc_html__('Instagram', 'it-simpl'),
					'linkedin'		=> esc_html__('LinkedIn', 'it-simpl'),
					'rss' 			=> esc_html__('RSS Feeds', 'it-simpl'),
					'pinterest-p' 	=> esc_html__('Pinterest', 'it-simpl'),
					'vimeo' 		=> esc_html__('Vimeo', 'it-simpl'),
					'youtube' 		=> esc_html__('Youtube', 'it-simpl'),
					'flickr' 		=> esc_html__('Flickr', 'it-simpl'),
				);


    $social_count = count($social_networks);

	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

		$wp_customize->add_setting(
			'itsmpl_social_'.$x, array(
				'sanitize_callback' => 'itsmpl_sanitize_social',
				'default' 			=> 'none',
				'sanitize_callback'	=>	'itsmpl_sanitize_social'
			));

		$wp_customize->add_control( 'itsmpl_social_' . $x, array(
					'settings' 	=> 'itsmpl_social_'.$x,
					'label' 	=> esc_html__('Icon ','it-simpl') . $x,
					'section' 	=> 'itsmpl_social_section',
					'type' 		=> 'select',
					'choices' 	=> $social_networks,
		) );

		$wp_customize->add_setting(
			'itsmpl_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'itsmpl_social_url' . $x, array(
			'label' 		=> esc_html__('Icon ','it-simpl') . $x . esc_html__(' Url','it-simpl'),
					'settings' 		=> 'itsmpl_social_url' . $x,
					'section' 		=> 'itsmpl_social_section',
					'type' 			=> 'url',
					'choices' 		=> $social_networks,
		));

	endfor;

}
add_action( 'customize_register', 'itsmpl_customize_register_social' );


function itsmpl_sanitize_social( $input ) {
	$social_networks = array(
				'none' ,
				'facebook-f',
				'twitter',
				'instagram',
				'linkedin',
				'rss',
				'pinterest-p',
				'vimeo',
				'youtube',
				'flickr'
			);
	if ( in_array($input, $social_networks) )
		return $input;
	else
		return '';
}
