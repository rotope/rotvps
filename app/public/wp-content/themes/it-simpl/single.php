<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package IT Simpl
 */

get_header();
?>

	<main id="primary" class="site-main container <?php echo itsmpl_sidebar_align('single')[0]; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part('template-parts/content', 'single');

			if ( get_theme_mod('itsmpl_single_navigation_enable') !== "" ) :

				the_post_navigation(
					apply_filters( 'itsmpl_single_post_navigation_args', array(
						'prev_text' => esc_html('%title'),
						'next_text' => esc_html('%title'),
					) ) );
			endif;

			if ( get_theme_mod('itsmpl_single_related_enable', 1) !== "" ) :
				do_action('itsmpl_related_posts');
			endif;

			if (get_theme_mod('itsmpl_single_author_enable', 1) !== "") :
				itsmpl_about_author( $post );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
do_action('itsmpl_sidebar', 'single');
get_footer();
