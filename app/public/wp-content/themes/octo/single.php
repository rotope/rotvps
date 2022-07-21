<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package octo
 * @since   1.0.0
 */

use octo\frontend\Components;
use octo\frontend\Template_Parts;

get_header();
?>
<?php do_action( 'octo_before_content' ); ?>
<div id="content" class="site-content">
	<div class="site-container">
		<div class="site-container-inner">                    
			<main id="primary" class="site-main">                
				<div class="site-main-inner">
					<?php do_action( 'octo_before_content_inner' ); ?>
					<?php Components::breadcrumb_trail(); ?>
					<?php
					while ( have_posts() ) :

						the_post();

						Template_Parts::load_content( 'single' );

						Components::post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					<?php do_action( 'octo_after_content_inner' ); ?>
				</div>
			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div><!-- .site-container-inner -->
	</div><!-- .site-container -->
</div><!-- #content -->
<?php do_action( 'octo_after_content' ); ?>
<?php
get_footer();
