<?php
/**
 * Default theme options.
 *
 * @package Interserver Platinum
 */


if ( ! function_exists( 'interserver_platinum_get_default_theme_options' ) ) :
	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array default theme options.
	 */
	function interserver_platinum_get_default_theme_options() {
		$ip_defaults = array();
		
		/*======== Header Options ========*/
		// Header Top Bar
		$ip_defaults['hide_header_topbar'] = null;
		$ip_defaults['null'] = null;
		$ip_defaults['contact_no'] = '1234-567-89';
		$ip_defaults['contact_email'] = 'example@example.com';
		
		// Header Type
		$ip_defaults['front_header_type'] = 'default';
		$ip_defaults['site_header_type'] = 'image';
		
		// Header Image
		$ip_defaults['header_bg_style'] = 'cover';
		$ip_defaults['header_height'] = '300';
		$ip_defaults['hide_overlay'] = null;
	
		//Menu Styles
		$ip_defaults['sticky_header'] = 'sticky';
		$ip_defaults['header_alignment'] = 'inline';
		
 		/*======== Blog Options ========*/
		//Layout
		$ip_defaults['blog_layout'] = 'classic';
		//Content/Excerpts
		$ip_defaults['fullwidth_single'] = null;	
		$ip_defaults['full_content_home'] = null;
		$ip_defaults['full_content_archives'] = null;
		$ip_defaults['excerpt_length'] = '55';

		//Meta
		$ip_defaults['hide_meta_index'] = null;
		$ip_defaults['hide_meta_single'] = null;
		
		// Featured Images
		$ip_defaults['index_feat_image'] = null;
		$ip_defaults['post_feat_image'] = null;
	
		/*======== Fonts ========*/
		// Logo Fonts
		$ip_defaults['logo_font_name'] = 'Oswald:400,500,600,700';
		$ip_defaults['logo_font_family'] = '\'Oswald\', sans-serif';

		// Body Fonts
		$ip_defaults['body_font_name'] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
		$ip_defaults['body_font_family'] = '\'Lato\', sans-serif';
		
		// Heading Fonts
		$ip_defaults['headings_font_name'] = 'Raleway:400,500,600';
		$ip_defaults['headings_font_family'] = '\'Raleway\', sans-serif';
		
		// Font Sizes
		$ip_defaults['site_title_size'] = '34';
		$ip_defaults['site_desc_size'] = '15';
		$ip_defaults['menu_size'] = '14';
		$ip_defaults['h1_size'] = '34';
		$ip_defaults['h2_size'] = '30';
		$ip_defaults['h3_size'] = '26';
		$ip_defaults['h4_size'] = '22';
		$ip_defaults['h5_size'] = '20';
		$ip_defaults['h6_size'] = '18';
		$ip_defaults['body_size'] = '15';
		
		/*======== Colors ========*/
		// Primary Color
		$ip_defaults['primary_color'] = '#0057be';
		// Secondary Color
		$ip_defaults['secondary_color'] = '#dd3333';
		// Body Text Color
		$ip_defaults['body_text_color'] = '#454545';
		// Header Top Background Color
		$ip_defaults['header_top_bg'] = '#1c1c1c';
		// Header Background Color
		$ip_defaults['header_bg_color'] = '#000000';
		// Site Title Color
		$ip_defaults['site_title_color'] = '#ffffff';
		// Site Description Color
		$ip_defaults['site_desc_color'] = '#ffffff';
		// Menu Items Color
		$ip_defaults['menu_color'] = '#ffffff';
		// Menu Items Hover Color
		$ip_defaults['menu_hover_color'] = '#fec42b';
		// SubMenu Items Color
		$ip_defaults['submenu_color'] = '#ffffff';
		// Mobile Menu Button Color
		$ip_defaults['mobile_menu_color'] = '#ffffff';
		// Mobile Menu Items Background Color
		$ip_defaults['mobile_menu_bg'] = '#1c1c1c';
		// Mobile SubMenu Items Background Color
		$ip_defaults['mobile_submenu_bg'] =  '#333333';
		// Slider Text color
		$ip_defaults['slider_text_color'] = '#ffffff';	
		
		// Widgetized Footer Background Color
		$ip_defaults['footer_widgets_background'] = '#151515';

		// Footer Background Color
		$ip_defaults['footer_background'] = '#242424';
		// Footer Widgets Title Color
		$ip_defaults['fw_title_color'] = '#ffffff';
		// Footer Text Color
		$ip_defaults['footer_text_color'] = '#ffffff';
		// Footer Text Hover Color
		$ip_defaults['footer_text_hover'] = '#ff0000';
		// Sidebar Background Color
		$ip_defaults['sidebar_background'] = '#ffffff';
		// Sidebar Widget Title Color
		$ip_defaults['sw_title_color'] = '#0057be';
		// Sidebar Text Color
		$ip_defaults['sidebar_text_color'] = '#767676';
			
		/*======== Footer ========*/		
		// No. of Footer Widgets to display
		$ip_defaults['footer_widgets'] = 4;
		// Footer Copyright
		$ip_defaults['footer_copyright'] = esc_html__( 'Copyright &copy; All rights reserved.', 'interserver-platinum');
		
		// Pass through filter.
		$ip_defaults = apply_filters('interserver_platinum_filter_default_theme_options', $ip_defaults );
		return $ip_defaults;
	}
endif;

$ip_default = interserver_platinum_get_default_theme_options();

