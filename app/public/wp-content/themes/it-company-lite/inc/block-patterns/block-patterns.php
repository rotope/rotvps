<?php
/**
 * IT Company Lite: Block Patterns
 *
 * @package IT Company Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'it-company-lite',
		array( 'label' => __( 'IT Company Lite', 'it-company-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'it-company-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'it-company-lite' ),
			'categories' => array( 'it-company-lite' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":8677,\"dimRatio\":60,\"customOverlayColor\":\"#927ae9\",\"align\":\"full\",\"className\":\"main-banner-section\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-60 has-background-dim main-banner-section\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png);background-color:#927ae9\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:50%\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":50}}} -->\n<h1 class=\"has-text-align-center\" style=\"font-size:50px\">LOREM IPSUM IS SIMPLY</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-center text-center\" style=\"font-size:14px\">&nbsp;Lorem Ipsum has been the industrys standard. &nbsp;Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">GET STARTED</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'it-company-lite/about-section',
		array(
			'title'      => __( 'About Section', 'it-company-lite' ),
			'categories' => array( 'it-company-lite' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"wide\",\"className\":\"about-box m-0\"} -->\n<div class=\"wp-block-cover alignwide has-white-background-color has-background-dim about-box m-0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-columns alignwide m-0\"><!-- wp:column {\"width\":\"44%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:44%\"><!-- wp:heading {\"textAlign\":\"right\",\"className\":\"mb-1\",\"style\":{\"color\":{\"text\":\"#344151\"},\"typography\":{\"fontSize\":30}}} -->\n<h2 class=\"has-text-align-right mb-1 has-text-color\" style=\"color:#344151;font-size:30px\">ABOUT US</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"right\",\"className\":\"about-content text-right\",\"style\":{\"color\":{\"text\":\"#979ba2\"},\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-right about-content text-right has-text-color\" style=\"color:#979ba2;font-size:14px\">&nbsp;Lorem Ipsum has been the industrys standard. Lorem Ipsum&nbsp;</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"textAlign\":\"right\",\"level\":3,\"className\":\"mt-4 mb-2\",\"style\":{\"color\":{\"text\":\"#344151\"},\"typography\":{\"fontSize\":18}}} -->\n<h3 class=\"has-text-align-right mt-4 mb-2 has-text-color\" style=\"color:#344151;font-size:18px\">LOREM IPSUM IS SIMPLY</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"right\",\"className\":\"text-right mt-0 mb-0\",\"style\":{\"color\":{\"text\":\"#979ba2\"},\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-right text-right mt-0 mb-0 has-text-color\" style=\"color:#979ba2;font-size:14px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.&nbsp; Lorem Ipsum has been the industrys standard.&nbsp; Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"right\",\"className\":\"mt-0\"} -->\n<div class=\"wp-block-buttons alignright mt-0\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">CONTINUE READING</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":8678,\"width\":236,\"height\":236,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about1.png\" alt=\"\" class=\"wp-image-8678\" width=\"236\" height=\"236\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":8679,\"width\":236,\"height\":236,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about2.png\" alt=\"\" class=\"wp-image-8679\" width=\"236\" height=\"236\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);
}