<?php
/**
 *	Customizer Controls for Sidebar
**/

function itsmpl_sidebr_customize_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		"itsmpl_layouts_panel", array(
			"title"			=>	esc_html__("Layouts", 'it-simpl'),
			"description"	=>	esc_html__("Layout Settings for the Theme", 'it-simpl'),
			"priority"		=>	20
		)
	);
	
	$wp_customize->add_section(
		"itsmpl_blog", array(
			"title"			=>	esc_html__("Blog Page", 'it-simpl'),
			"description"	=>	esc_html__("Control the Layout Settings for the Blog Page", 'it-simpl'),
			"priority"		=>	10,
			"panel"			=>	"itsmpl_layouts_panel"
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_blog_sidebar_enable", array(
			"default"			=>	"",
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_blog_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Blog Page.", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_blog",
			"priority"	=>	5
		)
	);
	
	
	
	$wp_customize->add_setting(
     "itsmpl_blog_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itsmpl_sanitize_radio",
     )
   );
   
   $wp_customize->add_control(
	   new itsmpl_Image_Radio_Control(
		   $wp_customize, "itsmpl_blog_sidebar_layout", array(
			   "label"		=>	esc_html__("Blog Layout", 'it-simpl'),
			   "type"		=>	"itsmpl-image-radio",
			   "section"	=> "itsmpl_blog",
			   "settings"	=> "itsmpl_blog_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)   
			   )
		   )
	   )
   );
   
    $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itsmpl_blog_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itsmpl_blog_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }
    
    $wp_customize->add_setting(
	    'itsmpl-blog-excerpt-length', array(
		    'default'			=>	15,
		    'sanitize_callback'	=>	'absint'
	    )
    );
    
    $wp_customize->add_control(
	    'itsmpl-blog-excerpt-length', array(
		    'label'		=>	__('Excerpt Length', 'it-simpl'),
		    'description'	=>	__('This works for blog, archives, and Search page', 'it-simpl'),
		    'type'		=>	'number',
		    'section'	=>	'itsmpl_blog',
		    'priority'	=>	13
	    )
    );
	
	$wp_customize->add_section(
		"itsmpl_single", array(
			"title"			=>	esc_html__("Single Post", 'it-simpl'),
			"description"	=>	esc_html__("Control the Layout Settings for the Single Post Page", 'it-simpl'),
			"priority"		=>	20,
			"panel"			=>	"itsmpl_layouts_panel"
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_single_featured_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_single_featured_enable", array(
			"label"		=>	esc_html__("Enable Featured Image", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_single",
			"priority"	=>	3
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_single_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_single_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Posts", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_single",
			"priority"	=>	5
		)
	);
	
	$wp_customize->add_setting(
     "itsmpl_single_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itsmpl_sanitize_radio",
     )
   );
   
   $wp_customize->add_control(
	   new itsmpl_Image_Radio_Control(
		   $wp_customize, "itsmpl_single_sidebar_layout", array(
			   "label"		=>	esc_html__("Single Post Layout", 'it-simpl'),
			   "type"		=>	"itsmpl-image-radio",
			   "section"	=> "itsmpl_single",
			   "Settings"	=> "itsmpl_single_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)   
			   )
		   )
	   )
   );
   
   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itsmpl_single_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itsmpl_single_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }
    
    $wp_customize->add_setting(
		"itsmpl_single_citation_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_single_citation_enable", array(
			"label"		=>	esc_html__("Enable Image Citations in Posts", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_single",
			"priority"	=>	15
		)
	);
   
   $wp_customize->add_setting(
		"itsmpl_single_navigation_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_single_navigation_enable", array(
			"label"		=>	esc_html__("Enable Post Navigation", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_single",
			"priority"	=>	15
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_single_related_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_single_related_enable", array(
			"label"		=>	esc_html__("Enable Related Posts Section", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_single",
			"priority"	=>	20
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_single_author_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_single_author_enable", array(
			"label"		=>	esc_html__("Enable Author Box", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_single",
			"priority"	=>	25
		)
	);
	
	$wp_customize->add_section(
		"itsmpl_search", array(
			"title"			=>	esc_html__("Search Page", 'it-simpl'),
			"description"	=>	esc_html__("Layout Settings for the Search Page", 'it-simpl'),
			"priority"		=>	30,
			"panel"			=>	"itsmpl_layouts_panel"
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_search_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_search_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Search Page", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_search",
			"priority"	=>	5
		)
	);
	
	$wp_customize->add_setting(
     "itsmpl_search_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itsmpl_sanitize_radio",
     )
   );
   
   $wp_customize->add_control(
	   new itsmpl_Image_Radio_Control(
		   $wp_customize, "itsmpl_search_sidebar_layout", array(
			   "label"		=>	esc_html__("Arc Page Layout", 'it-simpl'),
			   "type"		=>	"itsmpl-image-radio",
			   "section"	=> "itsmpl_search",
			   "Settings"	=> "itsmpl_search_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)   
			   )
		   )
	   )
   );
   
   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itsmpl_search_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itsmpl_search_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }
   
   $wp_customize->add_section(
		"itsmpl_archive", array(
			"title"			=>	esc_html__("archives", 'it-simpl'),
			"description"	=>	esc_html__("Layout Settings for the Archives", 'it-simpl'),
			"priority"		=>	40,
			"panel"			=>	"itsmpl_layouts_panel"
		)
	);
	
	$wp_customize->add_setting(
		"itsmpl_archive_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itsmpl_sanitize_checkbox"
		)
	);
	
	$wp_customize->add_control(
		"itsmpl_archive_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Archives", 'it-simpl'),
			"type"		=>	"checkbox",
			"section"	=>	"itsmpl_archive",
			"priority"	=>	5
		)
	);
	
	$wp_customize->add_setting(
     "itsmpl_archive_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itsmpl_sanitize_radio",
     )
   );
   
   $wp_customize->add_control(
	   new itsmpl_Image_Radio_Control(
		   $wp_customize, "itsmpl_archive_sidebar_layout", array(
			   "label"		=>	esc_html__("Archives Layout", 'it-simpl'),
			   "type"		=>	"itsmpl-image-radio",
			   "section"	=> "itsmpl_archive",
			   "Settings"	=> "itsmpl_archive_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-simpl'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)   
			   )
		   )
	   )
   );
   
   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itsmpl_search_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itsmpl_search_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }
}
add_action("customize_register", "itsmpl_sidebr_customize_register");