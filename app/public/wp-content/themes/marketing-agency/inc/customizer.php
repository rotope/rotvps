<?php
/**
 * Marketing Agency Theme Customizer
 *
 * @package Marketing Agency
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function marketing_agency_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'marketing_agency_custom_controls' );

function marketing_agency_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'marketing_agency_customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'marketing_agency_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$marketing_agency_parent_panel = new Marketing_Agency_WP_Customize_Panel( $wp_customize, 'marketing_agency_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'marketing-agency' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'marketing_agency_left_right', array(
    	'title' => esc_html__( 'General Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_panel_id'
	) );

	$wp_customize->add_setting('marketing_agency_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control(new Marketing_Agency_Image_Radio_Control($wp_customize, 'marketing_agency_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','marketing-agency'),
        'description' => esc_html__('Here you can change the width layout of Website.','marketing-agency'),
        'section' => 'marketing_agency_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('marketing_agency_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control('marketing_agency_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','marketing-agency'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','marketing-agency'),
        'section' => 'marketing_agency_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','marketing-agency'),
            'Right Sidebar' => esc_html__('Right Sidebar','marketing-agency'),
            'One Column' => esc_html__('One Column','marketing-agency'),
            'Three Columns' => esc_html__('Three Columns','marketing-agency'),
            'Four Columns' => esc_html__('Four Columns','marketing-agency'),
            'Grid Layout' => esc_html__('Grid Layout','marketing-agency')
        ),
	) );

	$wp_customize->add_setting('marketing_agency_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control('marketing_agency_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','marketing-agency'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','marketing-agency'),
        'section' => 'marketing_agency_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','marketing-agency'),
            'Right Sidebar' => esc_html__('Right Sidebar','marketing-agency'),
            'One Column' => esc_html__('One Column','marketing-agency')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'marketing_agency_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'marketing_agency_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','marketing-agency' ),
		'section' => 'marketing_agency_left_right'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'marketing_agency_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'marketing_agency_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','marketing-agency' ),
		'section' => 'marketing_agency_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'marketing_agency_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','marketing-agency' ),
        'section' => 'marketing_agency_left_right'
    )));

	$wp_customize->add_setting('marketing_agency_preloader_bg_color', array(
		'default'           => '#0985f9',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marketing_agency_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'marketing-agency'),
		'section'  => 'marketing_agency_left_right',
	)));

	$wp_customize->add_setting('marketing_agency_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marketing_agency_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'marketing-agency'),
		'section'  => 'marketing_agency_left_right',
	)));

	//Top Header
	$wp_customize->add_section( 'marketing_agency_top_header' , array(
    	'title' => esc_html__( 'Top Header', 'marketing-agency' ),
		'panel' => 'marketing_agency_panel_id'
	) );

	$wp_customize->add_setting('marketing_agency_email_address_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('marketing_agency_email_address_text',array(
		'label'	=> esc_html__('Email Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Mail', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('marketing_agency_email_address',array(
		'label'	=> esc_html__('Email Address','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'support@email.com', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_phone_number_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('marketing_agency_phone_number_text',array(
		'label'	=> esc_html__('Phone Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Phone', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'marketing_agency_sanitize_phone_number'
	));	
	$wp_customize->add_control('marketing_agency_phone_number',array(
		'label'	=> esc_html__('Phone Number','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '+00 123 456 7890', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_getstarted_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('marketing_agency_getstarted_text',array(
		'label'	=> esc_html__('Button Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'GET STARTED', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_getstarted_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('marketing_agency_getstarted_link',array(
		'label'	=> esc_html__('Button Link','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://example.com/page', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'url'
	));

	$wp_customize->add_setting('marketing_agency_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control('marketing_agency_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','marketing-agency'),
        'section' => 'marketing_agency_top_header',
        'choices' => array(
        	'Default' => __('Default','marketing-agency'),
            'Normal' => __('Normal','marketing-agency')
        ),
	) );
    
	//Slider
	$wp_customize->add_section( 'marketing_agency_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('marketing_agency_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_slider_arrows',
	));

	$wp_customize->add_setting( 'marketing_agency_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ));  
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','marketing-agency' ),
      	'section' => 'marketing_agency_slidersettings'
    )));

	$wp_customize->add_setting('marketing_agency_slider_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'marketing_agency_slider_image',array(
        'label' => __('Slider Background Image','marketing-agency'),
        'description' => esc_html__('Slider image size (1400 x 600)','marketing-agency'),
        'section' => 'marketing_agency_slidersettings'
	)));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'marketing_agency_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'marketing_agency_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'marketing_agency_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'marketing-agency' ),
			'description' => esc_html__('Slider image size (500 x 500)','marketing-agency'),
			'section'  => 'marketing_agency_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('marketing_agency_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control(new Marketing_Agency_Image_Radio_Control($wp_customize, 'marketing_agency_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','marketing-agency'),
        'section' => 'marketing_agency_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider content padding
    $wp_customize->add_setting('marketing_agency_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','marketing-agency'),
		'description'	=> __('Enter a value in %. Example:20%','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','marketing-agency'),
		'description'	=> __('Enter a value in %. Example:20%','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'marketing_agency_slider_excerpt_number', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'marketing_agency_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'marketing_agency_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','marketing-agency' ),
		'section'     => 'marketing_agency_slidersettings',
		'type'        => 'range',
		'settings'    => 'marketing_agency_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'marketing_agency_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'marketing_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'marketing_agency_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','marketing-agency'),
		'section' => 'marketing_agency_slidersettings',
		'type'  => 'number',
	) );
 
	//Services
	$wp_customize->add_section('marketing_agency_services',array(
		'title'	=> __('Services Section','marketing-agency'),
		'panel' => 'marketing_agency_panel_id',
	));

	$wp_customize->add_setting('marketing_agency_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('marketing_agency_section_title',array(
		'label'	=> __('Section Title','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum dolor sit amet, ', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_services',
		'type'=> 'text'
	));	

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('marketing_agency_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'marketing_agency_sanitize_choices',
	));
	$wp_customize->add_control('marketing_agency_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','marketing-agency'),		
		'section' => 'marketing_agency_services',
	));

	//Services excerpt
	$wp_customize->add_setting( 'marketing_agency_services_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'marketing_agency_sanitize_number_range'
	) );
	$wp_customize->add_control( 'marketing_agency_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','marketing-agency' ),
		'section'     => 'marketing_agency_services',
		'type'        => 'range',
		'settings'    => 'marketing_agency_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//No Result Page Setting
	$wp_customize->add_section('marketing_agency_no_results_page',array(
		'title'	=> __('No Results Page Settings','marketing-agency'),
		'panel' => 'marketing_agency_panel_id',
	));	

	$wp_customize->add_setting('marketing_agency_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('marketing_agency_no_results_page_title',array(
		'label'	=> __('Add Title','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('marketing_agency_no_results_page_content',array(
		'label'	=> __('Add Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_no_results_page',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $marketing_agency_parent_panel );

	$BlogPostParentPanel = new Marketing_Agency_WP_Customize_Panel( $wp_customize, 'marketing_agency_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'marketing_agency_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('marketing_agency_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_toggle_postdate', 
	));

	$wp_customize->add_setting( 'marketing_agency_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','marketing-agency' ),
        'section' => 'marketing_agency_post_settings'
    )));

    $wp_customize->add_setting( 'marketing_agency_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_toggle_author',array(
		'label' => esc_html__( 'Author','marketing-agency' ),
		'section' => 'marketing_agency_post_settings'
    )));

    $wp_customize->add_setting( 'marketing_agency_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_toggle_comments',array(
		'label' => esc_html__( 'Comments','marketing-agency' ),
		'section' => 'marketing_agency_post_settings'
    )));

    $wp_customize->add_setting( 'marketing_agency_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_toggle_time',array(
		'label' => esc_html__( 'Time','marketing-agency' ),
		'section' => 'marketing_agency_post_settings'
    )));

    $wp_customize->add_setting( 'marketing_agency_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
	));
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','marketing-agency' ),
		'section' => 'marketing_agency_post_settings'
    )));

    $wp_customize->add_setting( 'marketing_agency_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'marketing_agency_sanitize_number_range'
	) );
	$wp_customize->add_control( 'marketing_agency_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','marketing-agency' ),
		'section'     => 'marketing_agency_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'marketing_agency_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'marketing_agency_sanitize_number_range'
	) );
	$wp_customize->add_control( 'marketing_agency_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','marketing-agency' ),
		'section'     => 'marketing_agency_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'marketing_agency_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'marketing_agency_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'marketing_agency_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','marketing-agency' ),
		'section'     => 'marketing_agency_post_settings',
		'type'        => 'range',
		'settings'    => 'marketing_agency_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('marketing_agency_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','marketing-agency'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','marketing-agency'),
		'section'=> 'marketing_agency_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('marketing_agency_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
    ));
    $wp_customize->add_control(new Marketing_Agency_Image_Radio_Control($wp_customize, 'marketing_agency_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Layouts','marketing-agency'),
        'section' => 'marketing_agency_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('marketing_agency_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control('marketing_agency_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','marketing-agency'),
        'section' => 'marketing_agency_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','marketing-agency'),
            'Excerpt' => esc_html__('Excerpt','marketing-agency'),
            'No Content' => esc_html__('No Content','marketing-agency')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'marketing_agency_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'marketing_agency_button_border_radius', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'marketing_agency_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'marketing_agency_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','marketing-agency' ),
		'section'     => 'marketing_agency_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('marketing_agency_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_button_text', 
	));

    $wp_customize->add_setting('marketing_agency_button_text',array(
		'default'=> esc_html__('READ MORE','marketing-agency'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_button_text',array(
		'label'	=> esc_html__('Add Button Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'marketing_agency_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('marketing_agency_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_related_post_title', 
	));

    $wp_customize->add_setting( 'marketing_agency_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ) );
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_related_post',array(
		'label' => esc_html__( 'Related Post','marketing-agency' ),
		'section' => 'marketing_agency_related_posts_settings'
    )));

    $wp_customize->add_setting('marketing_agency_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('marketing_agency_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'marketing_agency_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'marketing-agency' ),
		'panel' => 'marketing_agency_blog_post_parent_panel',
	));

	$wp_customize->add_setting('marketing_agency_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','marketing-agency'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','marketing-agency'),
		'section'=> 'marketing_agency_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'marketing_agency_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
	));
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_toggle_tags', array(
		'label' => esc_html__( 'Tags','marketing-agency' ),
		'section' => 'marketing_agency_single_blog_settings'
    )));

    $wp_customize->add_setting('marketing_agency_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('marketing_agency_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('marketing_agency_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','marketing-agency'),
		'description'	=> __('Enter a value in %. Example:50%','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_single_blog_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('marketing_agency_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','marketing-agency'),
		'panel' => 'marketing_agency_panel_id',
	));

    $wp_customize->add_setting( 'marketing_agency_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ));  
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','marketing-agency' ),
      	'section' => 'marketing_agency_responsive_media'
    )));

    $wp_customize->add_setting( 'marketing_agency_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ));  
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','marketing-agency' ),
      	'section' => 'marketing_agency_responsive_media'
    )));

    $wp_customize->add_setting( 'marketing_agency_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ));  
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','marketing-agency' ),
      	'section' => 'marketing_agency_responsive_media'
    )));

    $wp_customize->add_setting('marketing_agency_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Marketing_Agency_Fontawesome_Icon_Chooser(
        $wp_customize,'marketing_agency_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','marketing-agency'),
		'transport' => 'refresh',
		'section'	=> 'marketing_agency_responsive_media',
		'setting'	=> 'marketing_agency_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('marketing_agency_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Marketing_Agency_Fontawesome_Icon_Chooser(
        $wp_customize,'marketing_agency_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','marketing-agency'),
		'transport' => 'refresh',
		'section'	=> 'marketing_agency_responsive_media',
		'setting'	=> 'marketing_agency_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('marketing_agency_footer',array(
		'title'	=> esc_html__('Footer Settings','marketing-agency'),
		'panel' => 'marketing_agency_panel_id',
	));	

	$wp_customize->add_setting('marketing_agency_footer_background_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'marketing_agency_footer_background_color', array(
		'label'    => __('Footer Background Color', 'marketing-agency'),
		'section'  => 'marketing_agency_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('marketing_agency_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_footer_text', 
	));
	
	$wp_customize->add_setting('marketing_agency_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('marketing_agency_footer_text',array(
		'label'	=> esc_html__('Copyright Text','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control(new Marketing_Agency_Image_Radio_Control($wp_customize, 'marketing_agency_copyright_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','marketing-agency'),
        'section' => 'marketing_agency_footer',
        'settings' => 'marketing_agency_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'marketing_agency_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'marketing_agency_switch_sanitization'
    ));  
    $wp_customize->add_control( new Marketing_Agency_Toggle_Switch_Custom_Control( $wp_customize, 'marketing_agency_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','marketing-agency' ),
      	'section' => 'marketing_agency_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('marketing_agency_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'marketing_agency_customize_partial_marketing_agency_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('marketing_agency_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control(new Marketing_Agency_Image_Radio_Control($wp_customize, 'marketing_agency_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','marketing-agency'),
        'section' => 'marketing_agency_footer',
        'settings' => 'marketing_agency_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('marketing_agency_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'marketing-agency'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('marketing_agency_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('marketing_agency_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'marketing_agency_sanitize_choices'
	));
	$wp_customize->add_control('marketing_agency_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','marketing-agency'),
        'section' => 'marketing_agency_woocommerce_section',
        'choices' => array(
            'left' => __('Left','marketing-agency'),
            'right' => __('Right','marketing-agency'),
        ),
	) );

	$wp_customize->add_setting('marketing_agency_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('marketing_agency_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('marketing_agency_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','marketing-agency'),
		'description'	=> __('Enter a value in pixels. Example:20px','marketing-agency'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'marketing-agency' ),
        ),
		'section'=> 'marketing_agency_woocommerce_section',
		'type'=> 'text'
	));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Marketing_Agency_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Marketing_Agency_WP_Customize_Section' );
}

add_action( 'customize_register', 'marketing_agency_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Marketing_Agency_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'marketing_agency_panel';
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
  	class Marketing_Agency_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'marketing_agency_section';
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
function marketing_agency_customize_controls_scripts() {
	wp_enqueue_script( 'marketing-agency-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'marketing_agency_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Marketing_Agency_Customize {

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
		$manager->register_section_type( 'Marketing_Agency_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Marketing_Agency_Customize_Section_Pro( $manager,'marketing_agency_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Marketing Agency Pro', 'marketing-agency' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'marketing-agency' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/marketing-agency-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Marketing_Agency_Customize_Section_Pro($manager,'marketing_agency_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'marketing-agency' ),
			'pro_text' => esc_html__( 'DOCS', 'marketing-agency' ),
			'pro_url'  => admin_url('themes.php?page=marketing_agency_guide'),
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

		wp_enqueue_script( 'marketing-agency-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'marketing-agency-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Marketing_Agency_Customize::get_instance();