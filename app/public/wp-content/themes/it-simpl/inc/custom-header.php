<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package IT Simpl
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses itsmpl_header_style()
 */
function itsmpl_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'itsmpl_custom_header_args',
			array(
				'default-image'      => esc_url(get_template_directory_uri() . '/assets/images/header.jpeg'),
				'default-text-color' => 'ffffff',
				'width'              => 1920,
				'height'             => 600,
				'wp-head-callback'   => 'itsmpl_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'itsmpl_custom_header_setup' );

if ( ! function_exists( 'itsmpl_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see itsmpl_custom_header_setup().
	 */
	function itsmpl_header_style() {
		$header_text_color = get_header_textcolor();
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">

			<?php
			$header_image = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url() : get_header_image();
			?>

			#masthead {
				background-image: url(<?php echo esc_url( $header_image ) ?>);
				background-size: cover;
				background-repeat: repeat;
				background-position: center center;
			}
			<?php

		 /*
 		 * If no custom options for text are set, let's bail.
 		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
 		 */


		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				display: none;
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
