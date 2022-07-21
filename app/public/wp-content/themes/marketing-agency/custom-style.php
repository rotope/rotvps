<?php

	/*-----------------------First highlight color-------------------*/

	$marketing_agency_first_color = get_theme_mod('marketing_agency_first_color');

	$marketing_agency_custom_css= "";

	if($marketing_agency_first_color != false){
		$marketing_agency_custom_css .='a, #footer .textwidget a,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .toggle-nav i, .wp-block-button .wp-block-button__link:hover, #footer .textwidget a, #sidebar .textwidget a, .woocommerce-product-details__short-description p a, .textwidget p a, .entry-content a, #sidebar p a, #comments p a, .comment-meta.commentmetadata a, #content-vw a{';
			$marketing_agency_custom_css .='color: '.esc_html($marketing_agency_first_color).';';
		$marketing_agency_custom_css .='}';
	}

	if($marketing_agency_first_color != false){
		$marketing_agency_custom_css .='.main-navigation a:hover{';
			$marketing_agency_custom_css .='color: '.esc_html($marketing_agency_first_color).'!important;';
		$marketing_agency_custom_css .='}';
	}

	/*------------------------Second highlight color-------------------*/

	$marketing_agency_second_color = get_theme_mod('marketing_agency_second_color');

	if($marketing_agency_second_color != false){
		$marketing_agency_custom_css .='.woocommerce span.onsale, #preloader{';
			$marketing_agency_custom_css .='background-color: '.esc_html($marketing_agency_second_color).';';
		$marketing_agency_custom_css .='}';
	}

	if($marketing_agency_second_color != false){
		$marketing_agency_custom_css .='.post-main-box:hover h2 a, .post-main-box:hover .post-info a, .post-info:hover a, .top-bar:hover p a, .logo .site-title a:hover, #footer li a:hover{';
			$marketing_agency_custom_css .='color: '.esc_html($marketing_agency_second_color).';';
		$marketing_agency_custom_css .='}';
	}

	if($marketing_agency_first_color != false || $marketing_agency_second_color != false){
		$marketing_agency_custom_css .='input[type="submit"], a.getstarted-btn, #header, .more-btn a, .inner-box:hover, #footer-2, .scrollup i, #comments input[type="submit"], #comments a.comment-reply-link, #sidebar h3, .pagination span, .pagination a, .widget_product_search button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .wp-block-button__link, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{
			background: linear-gradient(to right, '.esc_html($marketing_agency_first_color).', '.esc_html($marketing_agency_second_color).');
		}';
	}

	if($marketing_agency_first_color != false || $marketing_agency_second_color != false){
		$marketing_agency_custom_css .='.page-template-custom-home-page .main-navigation .current_page_item > a,.page-template-custom-home-page .main-navigation .current-menu-item > a, .page-template-custom-home-page .main-navigation .current_page_ancestor > a,.page-template-custom-home-page .main-navigation a:hover, .custom-social-icons i:hover,.top-bar i.far.fa-envelope,.top-bar i.fas.fa-phone, .main-navigation ul.sub-menu a:hover{
			background: linear-gradient('.esc_html($marketing_agency_first_color).', '.esc_html($marketing_agency_second_color).');
			-webkit-text-fill-color: transparent;
			-webkit-background-clip: text;
		}';
	}

	if($marketing_agency_second_color != false){
		$marketing_agency_custom_css .='.more-btn a:hover{';
			$marketing_agency_custom_css .='box-shadow: 0 0.4rem 1rem '.esc_html($marketing_agency_second_color).';';
		$marketing_agency_custom_css .='}';
	}

	/*------------------------Third highlight color-------------------*/

	$marketing_agency_third_color = get_theme_mod('marketing_agency_third_color');

	if($marketing_agency_third_color != false){
		$marketing_agency_custom_css .='#slider .carousel-control-prev-icon{
			border-color: transparent '.esc_html($marketing_agency_third_color).' transparent transparent;
		}';
	}

	if($marketing_agency_third_color != false){
		$marketing_agency_custom_css .='#slider .carousel-control-next-icon{
			border-color: transparent transparent transparent '.esc_html($marketing_agency_third_color).';
		}';
	}

	/*--------------------------- Slider -------------------*/

	$marketing_agency_slider = get_theme_mod('marketing_agency_slider_arrows');
	if($marketing_agency_slider == false){
		$marketing_agency_custom_css .='.page-template-custom-home-page .main-navigation a, .page-template-custom-home-page p.site-title a, .page-template-custom-home-page .logo h1 a, .page-template-custom-home-page p.site-description{';
			$marketing_agency_custom_css .='color: #333333;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='#services-sec{';
			$marketing_agency_custom_css .='margin-top: 2em;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.page-template-custom-home-page .header-box{';
			$marketing_agency_custom_css .='border-bottom: solid 1px #333333;';
		$marketing_agency_custom_css .='}';

		$marketing_agency_custom_css .='@media screen and (max-width:720px) {';
		$marketing_agency_custom_css .='.page-template-custom-home-page p.site-title a, .page-template-custom-home-page .logo h1 a, .page-template-custom-home-page p.site-description{';
			$marketing_agency_custom_css .='color: #ffffff;';
		$marketing_agency_custom_css .='} }';

		$marketing_agency_custom_css .='@media screen and (max-width:720px) {';
		$marketing_agency_custom_css .='.page-template-custom-home-page .header-box{';
			$marketing_agency_custom_css .='border-bottom: solid 1px #ffffff;';
		$marketing_agency_custom_css .='} }';

		$marketing_agency_custom_css .='@media screen and (max-width:720px) {';
		$marketing_agency_custom_css .='#services-sec{';
			$marketing_agency_custom_css .='margin-top: 5em;';
		$marketing_agency_custom_css .='} }';
	}

	/*---------------------------Width Layout -------------------*/

	$marketing_agency_theme_lay = get_theme_mod( 'marketing_agency_width_option','Full Width');
    if($marketing_agency_theme_lay == 'Boxed'){
		$marketing_agency_custom_css .='body{';
			$marketing_agency_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='#slider .carousel-control-prev-icon{';
			$marketing_agency_custom_css .='border-width: 25px 163px 25px 0; top: 42px;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='#slider .carousel-control-next-icon{';
			$marketing_agency_custom_css .='border-width: 25px 0 25px 170px; top: 42px;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.scrollup i{';
			$marketing_agency_custom_css .='right: 100px;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.scrollup.left i{';
			$marketing_agency_custom_css .='left: 100px;';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_theme_lay == 'Wide Width'){
		$marketing_agency_custom_css .='body{';
			$marketing_agency_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.scrollup i{';
			$marketing_agency_custom_css .='right: 30px;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.scrollup.left i{';
			$marketing_agency_custom_css .='left: 30px;';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_theme_lay == 'Full Width'){
		$marketing_agency_custom_css .='body{';
			$marketing_agency_custom_css .='max-width: 100%;';
		$marketing_agency_custom_css .='}';
	}

	/*----------------- Slider Content Layout -------------------*/

	$marketing_agency_slider_image = get_theme_mod('marketing_agency_slider_image');
	if($marketing_agency_slider_image != false){
		$marketing_agency_custom_css .='#slider{';
			$marketing_agency_custom_css .='background: url('.esc_url($marketing_agency_slider_image).');';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_theme_lay = get_theme_mod( 'marketing_agency_slider_content_option','Left');
    if($marketing_agency_theme_lay == 'Left'){
		$marketing_agency_custom_css .='#slider .carousel-caption{';
			$marketing_agency_custom_css .='text-align:left; right: 22%; left: 2%;';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_theme_lay == 'Center'){
		$marketing_agency_custom_css .='#slider .carousel-caption{';
			$marketing_agency_custom_css .='text-align:center; right: 10%; left: 10%;';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_theme_lay == 'Right'){
		$marketing_agency_custom_css .='#slider .carousel-caption{';
			$marketing_agency_custom_css .='text-align:right; right: 10%; left: 15%;';
		$marketing_agency_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$marketing_agency_slider_content_padding_top_bottom = get_theme_mod('marketing_agency_slider_content_padding_top_bottom');
	$marketing_agency_slider_content_padding_left_right = get_theme_mod('marketing_agency_slider_content_padding_left_right');
	if($marketing_agency_slider_content_padding_top_bottom != false || $marketing_agency_slider_content_padding_left_right != false){
		$marketing_agency_custom_css .='#slider .carousel-caption{';
			$marketing_agency_custom_css .='top: '.esc_attr($marketing_agency_slider_content_padding_top_bottom).'; bottom: '.esc_attr($marketing_agency_slider_content_padding_top_bottom).';left: '.esc_attr($marketing_agency_slider_content_padding_left_right).';right: '.esc_attr($marketing_agency_slider_content_padding_left_right).';';
		$marketing_agency_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$marketing_agency_theme_lay = get_theme_mod( 'marketing_agency_blog_layout_option','Default');
    if($marketing_agency_theme_lay == 'Default'){
		$marketing_agency_custom_css .='.post-main-box{';
			$marketing_agency_custom_css .='';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_theme_lay == 'Center'){
		$marketing_agency_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$marketing_agency_custom_css .='text-align:center;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.post-info{';
			$marketing_agency_custom_css .='margin-top:10px;';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_theme_lay == 'Left'){
		$marketing_agency_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$marketing_agency_custom_css .='text-align:Left;';
		$marketing_agency_custom_css .='}';
		$marketing_agency_custom_css .='.post-main-box h2{';
			$marketing_agency_custom_css .='margin-top:10px;';
		$marketing_agency_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$marketing_agency_resp_slider = get_theme_mod( 'marketing_agency_resp_slider_hide_show',false);
	if($marketing_agency_resp_slider == true && get_theme_mod( 'marketing_agency_slider_arrows', false) == false){
    	$marketing_agency_custom_css .='#slider{';
			$marketing_agency_custom_css .='display:none;';
		$marketing_agency_custom_css .='} ';
	}
    if($marketing_agency_resp_slider == true){
    	$marketing_agency_custom_css .='@media screen and (max-width:575px) {';
		$marketing_agency_custom_css .='#slider{';
			$marketing_agency_custom_css .='display:block;';
		$marketing_agency_custom_css .='} }';
	}else if($marketing_agency_resp_slider == false){
		$marketing_agency_custom_css .='@media screen and (max-width:575px) {';
		$marketing_agency_custom_css .='#slider{';
			$marketing_agency_custom_css .='display:none;';
		$marketing_agency_custom_css .='} }';
	}

	$marketing_agency_resp_sidebar = get_theme_mod( 'marketing_agency_sidebar_hide_show',true);
    if($marketing_agency_resp_sidebar == true){
    	$marketing_agency_custom_css .='@media screen and (max-width:575px) {';
		$marketing_agency_custom_css .='#sidebar{';
			$marketing_agency_custom_css .='display:block;';
		$marketing_agency_custom_css .='} }';
	}else if($marketing_agency_resp_sidebar == false){
		$marketing_agency_custom_css .='@media screen and (max-width:575px) {';
		$marketing_agency_custom_css .='#sidebar{';
			$marketing_agency_custom_css .='display:none;';
		$marketing_agency_custom_css .='} }';
	}

	$marketing_agency_resp_scroll_top = get_theme_mod( 'marketing_agency_resp_scroll_top_hide_show',true);
	if($marketing_agency_resp_scroll_top == true && get_theme_mod( 'marketing_agency_footer_scroll',true) != true){
    	$marketing_agency_custom_css .='.scrollup i{';
			$marketing_agency_custom_css .='visibility:hidden !important;';
		$marketing_agency_custom_css .='} ';
	}
    if($marketing_agency_resp_scroll_top == true){
    	$marketing_agency_custom_css .='@media screen and (max-width:575px) {';
		$marketing_agency_custom_css .='.scrollup i{';
			$marketing_agency_custom_css .='visibility:visible !important;';
		$marketing_agency_custom_css .='} }';
	}else if($marketing_agency_resp_scroll_top == false){
		$marketing_agency_custom_css .='@media screen and (max-width:575px){';
		$marketing_agency_custom_css .='.scrollup i{';
			$marketing_agency_custom_css .='visibility:hidden !important;';
		$marketing_agency_custom_css .='} }';
	}

	/*---------------- Menus Settings ------------------*/

	$marketing_agency_navigation_menu_font_size = get_theme_mod('marketing_agency_navigation_menu_font_size');
	if($marketing_agency_navigation_menu_font_size != false){
		$marketing_agency_custom_css .='.main-navigation a{';
			$marketing_agency_custom_css .='font-size: '.esc_attr($marketing_agency_navigation_menu_font_size).';';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_nav_menus_font_weight = get_theme_mod( 'marketing_agency_navigation_menu_font_weight','Default');
    if($marketing_agency_nav_menus_font_weight == 'Default'){
		$marketing_agency_custom_css .='.main-navigation a{';
			$marketing_agency_custom_css .='';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_nav_menus_font_weight == 'Normal'){
		$marketing_agency_custom_css .='.main-navigation a{';
			$marketing_agency_custom_css .='font-weight: normal;';
		$marketing_agency_custom_css .='}';
	}

	/*---------------- Post Settings ------------------*/

	$marketing_agency_featured_image_border_radius = get_theme_mod('marketing_agency_featured_image_border_radius', 0);
	if($marketing_agency_featured_image_border_radius != false){
		$marketing_agency_custom_css .='.box-image img, .feature-box img{';
			$marketing_agency_custom_css .='border-radius: '.esc_attr($marketing_agency_featured_image_border_radius).'px;';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_featured_image_box_shadow = get_theme_mod('marketing_agency_featured_image_box_shadow',0);
	if($marketing_agency_featured_image_box_shadow != false){
		$marketing_agency_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$marketing_agency_custom_css .='box-shadow: '.esc_attr($marketing_agency_featured_image_box_shadow).'px '.esc_attr($marketing_agency_featured_image_box_shadow).'px '.esc_attr($marketing_agency_featured_image_box_shadow).'px #cccccc;';
		$marketing_agency_custom_css .='}';
	}

	/*---------------- Single Post Settings ------------------*/

	$marketing_agency_single_blog_comment_title = get_theme_mod('marketing_agency_single_blog_comment_title', 'Leave a Reply');
	if($marketing_agency_single_blog_comment_title == ''){
		$marketing_agency_custom_css .='#comments h2#reply-title {';
			$marketing_agency_custom_css .='display: none;';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_single_blog_comment_button_text = get_theme_mod('marketing_agency_single_blog_comment_button_text', 'Post Comment');
	if($marketing_agency_single_blog_comment_button_text == ''){
		$marketing_agency_custom_css .='#comments p.form-submit {';
			$marketing_agency_custom_css .='display: none;';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_comment_width = get_theme_mod('marketing_agency_single_blog_comment_width');
	if($marketing_agency_comment_width != false){
		$marketing_agency_custom_css .='#comments textarea{';
			$marketing_agency_custom_css .='width: '.esc_attr($marketing_agency_comment_width).';';
		$marketing_agency_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$marketing_agency_button_border_radius = get_theme_mod('marketing_agency_button_border_radius');
	if($marketing_agency_button_border_radius != false){
		$marketing_agency_custom_css .='.post-main-box .more-btn a{';
			$marketing_agency_custom_css .='border-radius: '.esc_attr($marketing_agency_button_border_radius).'px;';
		$marketing_agency_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$marketing_agency_footer_background_color = get_theme_mod('marketing_agency_footer_background_color');
	if($marketing_agency_footer_background_color != false){
		$marketing_agency_custom_css .='#footer{';
			$marketing_agency_custom_css .='background-color: '.esc_attr($marketing_agency_footer_background_color).';';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_copyright_font_size = get_theme_mod('marketing_agency_copyright_font_size');
	if($marketing_agency_copyright_font_size != false){
		$marketing_agency_custom_css .='.copyright p{';
			$marketing_agency_custom_css .='font-size: '.esc_attr($marketing_agency_copyright_font_size).';';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_copyright_alignment = get_theme_mod('marketing_agency_copyright_alignment');
	if($marketing_agency_copyright_alignment != false){
		$marketing_agency_custom_css .='.copyright p{';
			$marketing_agency_custom_css .='text-align: '.esc_attr($marketing_agency_copyright_alignment).';';
		$marketing_agency_custom_css .='}';
	}

	/*-------------- Wocommerce Settings ----------------*/

	$marketing_agency_products_btn_padding_top_bottom = get_theme_mod('marketing_agency_products_btn_padding_top_bottom');
	if($marketing_agency_products_btn_padding_top_bottom != false){
		$marketing_agency_custom_css .='.woocommerce a.button{';
			$marketing_agency_custom_css .='padding-top: '.esc_attr($marketing_agency_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($marketing_agency_products_btn_padding_top_bottom).' !important;';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_products_btn_padding_left_right = get_theme_mod('marketing_agency_products_btn_padding_left_right');
	if($marketing_agency_products_btn_padding_left_right != false){
		$marketing_agency_custom_css .='.woocommerce a.button{';
			$marketing_agency_custom_css .='padding-left: '.esc_attr($marketing_agency_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($marketing_agency_products_btn_padding_left_right).' !important;';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_woocommerce_sale_position = get_theme_mod( 'marketing_agency_woocommerce_sale_position','right');
    if($marketing_agency_woocommerce_sale_position == 'left'){
		$marketing_agency_custom_css .='.woocommerce ul.products li.product .onsale{';
			$marketing_agency_custom_css .='left: 10px; right: auto !important;';
		$marketing_agency_custom_css .='}';
	}else if($marketing_agency_woocommerce_sale_position == 'right'){
		$marketing_agency_custom_css .='.woocommerce ul.products li.product .onsale{';
			$marketing_agency_custom_css .='left: auto; right: 0;';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_woocommerce_sale_font_size = get_theme_mod('marketing_agency_woocommerce_sale_font_size');
	if($marketing_agency_woocommerce_sale_font_size != false){
		$marketing_agency_custom_css .='.woocommerce span.onsale{';
			$marketing_agency_custom_css .='font-size: '.esc_attr($marketing_agency_woocommerce_sale_font_size).';';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_woocommerce_sale_padding_top_bottom = get_theme_mod('marketing_agency_woocommerce_sale_padding_top_bottom');
	if($marketing_agency_woocommerce_sale_padding_top_bottom != false){
		$marketing_agency_custom_css .='.woocommerce span.onsale{';
			$marketing_agency_custom_css .='padding-top: '.esc_attr($marketing_agency_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($marketing_agency_woocommerce_sale_padding_top_bottom).';';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_woocommerce_sale_padding_left_right = get_theme_mod('marketing_agency_woocommerce_sale_padding_left_right');
	if($marketing_agency_woocommerce_sale_padding_left_right != false){
		$marketing_agency_custom_css .='.woocommerce span.onsale{';
			$marketing_agency_custom_css .='padding-left: '.esc_attr($marketing_agency_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($marketing_agency_woocommerce_sale_padding_left_right).';';
		$marketing_agency_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$marketing_agency_site_title_font_size = get_theme_mod('marketing_agency_site_title_font_size');
	if($marketing_agency_site_title_font_size != false){
		$marketing_agency_custom_css .='.logo p.site-title, .logo h1{';
			$marketing_agency_custom_css .='font-size: '.esc_attr($marketing_agency_site_title_font_size).';';
		$marketing_agency_custom_css .='}';
	}

	// Site tagline Font Size
	$marketing_agency_site_tagline_font_size = get_theme_mod('marketing_agency_site_tagline_font_size');
	if($marketing_agency_site_tagline_font_size != false){
		$marketing_agency_custom_css .='.logo p.site-description{';
			$marketing_agency_custom_css .='font-size: '.esc_attr($marketing_agency_site_tagline_font_size).';';
		$marketing_agency_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$marketing_agency_preloader_bg_color = get_theme_mod('marketing_agency_preloader_bg_color');
	if($marketing_agency_preloader_bg_color != false){
		$marketing_agency_custom_css .='#preloader{';
			$marketing_agency_custom_css .='background-color: '.esc_attr($marketing_agency_preloader_bg_color).';';
		$marketing_agency_custom_css .='}';
	}

	$marketing_agency_preloader_border_color = get_theme_mod('marketing_agency_preloader_border_color');
	if($marketing_agency_preloader_border_color != false){
		$marketing_agency_custom_css .='.loader-line{';
			$marketing_agency_custom_css .='border-color: '.esc_attr($marketing_agency_preloader_border_color).'!important;';
		$marketing_agency_custom_css .='}';
	}