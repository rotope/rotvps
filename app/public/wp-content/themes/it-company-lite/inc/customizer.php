<?php
/**
 * IT Company Lite Theme Customizer
 *
 * @package IT Company Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function it_company_lite_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'it_company_lite_custom_controls' );

function it_company_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'it_company_lite_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'it_company_lite_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$ITCompanyLiteParentPanel = new IT_Company_Lite_WP_Customize_Panel( $wp_customize, 'it_company_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'it-company-lite' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'it_company_lite_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'it-company-lite' ),
		'panel' => 'it_company_lite_panel_id'
	) );

	$wp_customize->add_setting('it_company_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new IT_Company_Lite_Image_Radio_Control($wp_customize, 'it_company_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','it-company-lite'),
        'description' => __('Here you can change the width layout of Website.','it-company-lite'),
        'section' => 'it_company_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('it_company_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('it_company_lite_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','it-company-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','it-company-lite'),
        'section' => 'it_company_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company-lite'),
            'Right Sidebar' => __('Right Sidebar','it-company-lite'),
            'One Column' => __('One Column','it-company-lite'),
            'Three Columns' => __('Three Columns','it-company-lite'),
            'Four Columns' => __('Four Columns','it-company-lite'),
            'Grid Layout' => __('Grid Layout','it-company-lite')
        ),
	));

	$wp_customize->add_setting('it_company_lite_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('it_company_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','it-company-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','it-company-lite'),
        'section' => 'it_company_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company-lite'),
            'Right Sidebar' => __('Right Sidebar','it-company-lite'),
            'One Column' => __('One Column','it-company-lite')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'it_company_lite_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','it-company-lite' ),
        'section' => 'it_company_lite_left_right'
    )));

	$wp_customize->add_setting('it_company_lite_preloader_bg_color', array(
		'default'           => '#927ae9',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'it_company_lite_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'it-company-lite'),
		'section'  => 'it_company_lite_left_right',
	)));

	$wp_customize->add_setting('it_company_lite_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'it_company_lite_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'it-company-lite'),
		'section'  => 'it_company_lite_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'it_company_lite_topbar', array(
    	'title'      => __( 'Topbar Settings', 'it-company-lite' ),
		'priority'   => null,
		'panel' => 'it_company_lite_panel_id'
	) );

	$wp_customize->add_setting( 'it_company_lite_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','it-company-lite' ),
      'section' => 'it_company_lite_topbar'
    )));

     $wp_customize->add_setting('it_company_lite_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'it_company_lite_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','it-company-lite' ),
        'section' => 'it_company_lite_topbar'
    )));

    $wp_customize->add_setting('it_company_lite_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('it_company_lite_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','it-company-lite'),
        'section' => 'it_company_lite_topbar',
        'choices' => array(
        	'Default' => __('Default','it-company-lite'),
            'Normal' => __('Normal','it-company-lite')
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('it_company_lite_location', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_location', 
	));

    $wp_customize->add_setting('it_company_lite_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'it_company_lite_location_icon',array(
		'label'	=> __('Add Location Icon','it-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'it_company_lite_topbar',
		'setting'	=> 'it_company_lite_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('it_company_lite_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_location',array(
		'label'	=> __('Add Location','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '123 Dummy Stret, USA', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'it_company_lite_email_icon',array(
		'label'	=> __('Add Email Icon','it-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'it_company_lite_topbar',
		'setting'	=> 'it_company_lite_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('it_company_lite_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('it_company_lite_email_address',array(
		'label'	=> __('Add Email Address','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_inquiry_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_inquiry_btn_text',array(
		'label'	=> __('Add Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'INQUIRY', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_inquiry_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_inquiry_btn_link',array(
		'label'	=> __('Add Button Link','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'https://example.com', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'it_company_lite_sanitize_phone_number'
	));	
	$wp_customize->add_control('it_company_lite_phone',array(
		'label'	=> __('Add Phone no.','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'it_company_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'it-company-lite' ),
		'priority'   => null,
		'panel' => 'it_company_lite_panel_id'
	) );

	$wp_customize->add_setting( 'it_company_lite_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','it-company-lite' ),
      'section' => 'it_company_lite_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('it_company_lite_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'it_company_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'it_company_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'it_company_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'it-company-lite' ),
			'description' => __('Slider image size (1500 x 590)','it-company-lite'),
			'section'  => 'it_company_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('it_company_lite_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('it_company_lite_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new IT_Company_Lite_Image_Radio_Control($wp_customize, 'it_company_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','it-company-lite'),
        'section' => 'it_company_lite_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('it_company_lite_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','it-company-lite'),
		'description'	=> __('Enter a value in %. Example:20%','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','it-company-lite'),
		'description'	=> __('Enter a value in %. Example:20%','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'it_company_lite_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','it-company-lite' ),
		'section'     => 'it_company_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'it_company_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('it_company_lite_slider_opacity_color',array(
      'default'              => 0.4,
      'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'it_company_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','it-company-lite' ),
	'section'     => 'it_company_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'it_company_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','it-company-lite'),
      '0.1' =>  esc_attr('0.1','it-company-lite'),
      '0.2' =>  esc_attr('0.2','it-company-lite'),
      '0.3' =>  esc_attr('0.3','it-company-lite'),
      '0.4' =>  esc_attr('0.4','it-company-lite'),
      '0.5' =>  esc_attr('0.5','it-company-lite'),
      '0.6' =>  esc_attr('0.6','it-company-lite'),
      '0.7' =>  esc_attr('0.7','it-company-lite'),
      '0.8' =>  esc_attr('0.8','it-company-lite'),
      '0.9' =>  esc_attr('0.9','it-company-lite')
	),
	));

	//Slider height
	$wp_customize->add_setting('it_company_lite_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_slider_height',array(
		'label'	=> __('Slider Height','it-company-lite'),
		'description'	=> __('Specify the slider height (px).','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'it_company_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'it_company_lite_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','it-company-lite'),
		'section' => 'it_company_lite_slidersettings',
		'type'  => 'number',
	) );

	//About Section
	$wp_customize->add_section( 'it_company_lite_about_section' , array(
    	'title'      => __( 'About us', 'it-company-lite' ),
		'priority'   => null,
		'panel' => 'it_company_lite_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'it_company_lite_section_main_title', array( 
		'selector' => '#about h2', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_section_main_title',
	));

	$wp_customize->add_setting('it_company_lite_section_main_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_section_main_title',array(
		'label'	=> __('Section Title','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_about_section',
		'setting'=> 'it_company_lite_section_main_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('it_company_lite_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_section_text',array(
		'label'	=> __('Section Text Line','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_about_section',
		'setting'=> 'it_company_lite_section_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'it_company_lite_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'it_company_lite_about_page', array(
		'label'    => __( 'About Page', 'it-company-lite' ),
		'section'  => 'it_company_lite_about_section',
		'type'     => 'dropdown-pages'
	) );

	//About excerpt
	$wp_customize->add_setting( 'it_company_lite_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','it-company-lite' ),
		'section'     => 'it_company_lite_about_section',
		'type'        => 'range',
		'settings'    => 'it_company_lite_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('it_company_lite_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_about_button_text',array(
		'label'	=> __('Add About Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'CONTINUE READING', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_about_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $ITCompanyLiteParentPanel );

	$BlogPostParentPanel = new IT_Company_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'it-company-lite' ),
		'panel' => 'it_company_lite_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'it_company_lite_post_settings', array(
		'title' => __( 'Post Settings', 'it-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('it_company_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_toggle_postdate', 
	));

	$wp_customize->add_setting( 'it_company_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','it-company-lite' ),
        'section' => 'it_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'it_company_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_toggle_author',array(
		'label' => esc_html__( 'Author','it-company-lite' ),
		'section' => 'it_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'it_company_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','it-company-lite' ),
		'section' => 'it_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'it_company_lite_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_toggle_time',array(
		'label' => esc_html__( 'Time','it-company-lite' ),
		'section' => 'it_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'it_company_lite_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
	));
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','it-company-lite' ),
		'section' => 'it_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'it_company_lite_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'it_company_lite_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','it-company-lite' ),
		'section'     => 'it_company_lite_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'it_company_lite_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','it-company-lite' ),
		'section'     => 'it_company_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'it_company_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('it_company_lite_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','it-company-lite'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','it-company-lite'),
		'section'=> 'it_company_lite_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('it_company_lite_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new IT_Company_Lite_Image_Radio_Control($wp_customize, 'it_company_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','it-company-lite'),
        'section' => 'it_company_lite_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('it_company_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('it_company_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','it-company-lite'),
        'section' => 'it_company_lite_post_settings',
        'choices' => array(
        	'Content' => __('Content','it-company-lite'),
            'Excerpt' => __('Excerpt','it-company-lite'),
            'No Content' => __('No Content','it-company-lite')
        ),
	) );

	$wp_customize->add_setting('it_company_lite_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','it-company-lite' ),
      'section' => 'it_company_lite_post_settings'
    )));

	$wp_customize->add_setting( 'it_company_lite_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'it_company_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'it_company_lite_blog_pagination_type', array(
        'section' => 'it_company_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'it-company-lite' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'it-company-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'it-company-lite' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'it_company_lite_button_settings', array(
		'title' => __( 'Button Settings', 'it-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('it_company_lite_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('it_company_lite_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_button_text', 
	));

    $wp_customize->add_setting('it_company_lite_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'it-company-lite' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_button_text',array(
		'label'	=> __('Add Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'it_company_lite_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'it-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('it_company_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'it_company_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_related_post',array(
		'label' => esc_html__( 'Related Post','it-company-lite' ),
		'section' => 'it_company_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('it_company_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_related_post_title',array(
		'label'	=> __('Add Related Post Title','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('it_company_lite_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'it_company_lite_sanitize_float'
	));
	$wp_customize->add_control('it_company_lite_related_posts_count',array(
		'label'	=> __('Add Related Post Count','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'it_company_lite_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'it-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'it_company_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
	));
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','it-company-lite' ),
		'section' => 'it_company_lite_single_blog_settings'
    )));

	$wp_customize->add_setting( 'it_company_lite_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
	));
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','it-company-lite' ),
		'section' => 'it_company_lite_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('it_company_lite_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('it_company_lite_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('it_company_lite_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','it-company-lite'),
		'description'	=> __('Enter a value in %. Example:50%','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('it_company_lite_404_page',array(
		'title'	=> __('404 Page Settings','it-company-lite'),
		'panel' => 'it_company_lite_panel_id',
	));	

	$wp_customize->add_setting('it_company_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('it_company_lite_404_page_title',array(
		'label'	=> __('Add Title','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('it_company_lite_404_page_content',array(
		'label'	=> __('Add Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('it_company_lite_no_results_page',array(
		'title'	=> __('No Results Page Settings','it-company-lite'),
		'panel' => 'it_company_lite_panel_id',
	));	

	$wp_customize->add_setting('it_company_lite_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('it_company_lite_no_results_page_title',array(
		'label'	=> __('Add Title','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('it_company_lite_no_results_page_content',array(
		'label'	=> __('Add Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('it_company_lite_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','it-company-lite'),
		'panel' => 'it_company_lite_panel_id',
	));	

	$wp_customize->add_setting('it_company_lite_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_social_icon_padding',array(
		'label'	=> __('Icon Padding','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_social_icon_width',array(
		'label'	=> __('Icon Width','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_social_icon_height',array(
		'label'	=> __('Icon Height','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('it_company_lite_responsive_media',array(
		'title'	=> __('Responsive Media','it-company-lite'),
		'panel' => 'it_company_lite_panel_id',
	));

	$wp_customize->add_setting( 'it_company_lite_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','it-company-lite' ),
      'section' => 'it_company_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'it_company_lite_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','it-company-lite' ),
      'section' => 'it_company_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'it_company_lite_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','it-company-lite' ),
      'section' => 'it_company_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'it_company_lite_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','it-company-lite' ),
      'section' => 'it_company_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'it_company_lite_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','it-company-lite' ),
      'section' => 'it_company_lite_responsive_media'
    )));

     $wp_customize->add_setting('it_company_lite_res_open_menus_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'it_company_lite_res_open_menus_icon',array(
		'label'	=> __('Add Open Menu Icon','it-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'it_company_lite_responsive_media',
		'setting'	=> 'it_company_lite_res_open_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('it_company_lite_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'it_company_lite_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','it-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'it_company_lite_responsive_media',
		'setting'	=> 'it_company_lite_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('it_company_lite_footer',array(
		'title'	=> __('Footer','it-company-lite'),
		'description'=> __('This section will appear in the footer','it-company-lite'),
		'panel' => 'it_company_lite_panel_id',
	));	

	$wp_customize->add_setting('it_company_lite_footer_background_color', array(
		'default'           => '#344151',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'it_company_lite_footer_background_color', array(
		'label'    => __('Footer Background Color', 'it-company-lite'),
		'section'  => 'it_company_lite_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('it_company_lite_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_footer_text', 
	));
	
	$wp_customize->add_setting('it_company_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_footer_text',array(
		'label'	=> __('Copyright Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'setting'=> 'it_company_lite_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('it_company_lite_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new IT_Company_Lite_Image_Radio_Control($wp_customize, 'it_company_lite_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','it-company-lite'),
        'section' => 'it_company_lite_footer',
        'settings' => 'it_company_lite_copyright_alignment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'it_company_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','it-company-lite' ),
      	'section' => 'it_company_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('it_company_lite_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('it_company_lite_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new IT_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'it_company_lite_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','it-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'it_company_lite_footer',
		'setting'	=> 'it_company_lite_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('it_company_lite_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_scroll_to_top_width',array(
		'label'	=> __('Icon Width','it-company-lite'),
		'description'	=> __('Enter a value in pixels Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_scroll_to_top_height',array(
		'label'	=> __('Icon Height','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('it_company_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new IT_Company_Lite_Image_Radio_Control($wp_customize, 'it_company_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','it-company-lite'),
        'section' => 'it_company_lite_footer',
        'settings' => 'it_company_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('it_company_lite_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'it-company-lite'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'it_company_lite_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'it_company_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','it-company-lite' ),
		'section' => 'it_company_lite_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'it_company_lite_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'it_company_lite_customize_partial_it_company_lite_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'it_company_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'it_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new IT_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'it_company_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','it-company-lite' ),
		'section' => 'it_company_lite_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('it_company_lite_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'it_company_lite_sanitize_float'
	));
	$wp_customize->add_control('it_company_lite_products_per_page',array(
		'label'	=> __('Products Per Page','it-company-lite'),
		'description' => __('Display on shop page','it-company-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('it_company_lite_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('it_company_lite_products_per_row',array(
		'label'	=> __('Products Per Row','it-company-lite'),
		'description' => __('Display on shop page','it-company-lite'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('it_company_lite_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'it_company_lite_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','it-company-lite' ),
		'section'     => 'it_company_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'it_company_lite_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('it_company_lite_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_products_button_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('it_company_lite_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'it_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('it_company_lite_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','it-company-lite'),
        'section' => 'it_company_lite_woocommerce_section',
        'choices' => array(
            'left' => __('Left','it-company-lite'),
            'right' => __('Right','it-company-lite'),
        ),
	) );

	$wp_customize->add_setting('it_company_lite_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('it_company_lite_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','it-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'it_company_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'it_company_lite_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','it-company-lite' ),
		'section'     => 'it_company_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'IT_Company_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'IT_Company_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'it_company_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class IT_Company_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'it_company_lite_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class IT_Company_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'it_company_lite_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function it_company_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'it_company_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class IT_Company_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'IT_Company_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new IT_Company_Lite_Customize_Section_Pro($manager,'it_company_lite_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'IT COMPANY PRO', 'it-company-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'it-company-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/it-company-wordpress-theme/'),
		)));

		$manager->add_section(new IT_Company_Lite_Customize_Section_Pro($manager,'it_company_lite_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'it-company-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'it-company-lite' ),
			'pro_url'  => admin_url('themes.php?page=it_company_lite_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'it-company-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'it-company-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
IT_Company_Lite_Customize::get_instance();