<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IT Simpl
 */

get_header(NULL, ['layout'	=>	'container', 'header' => 'archive']);
?>

	<main id="primary" class="site-main <?php echo esc_attr(itsmpl_sidebar_align('archive')[0]); ?>">

		<?php if ( have_posts() ) :  ?>
		
			<header class="page-header col-12">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				do_action('itsmpl_layout' );

			endwhile;

			the_posts_pagination( apply_filters( 'itsmpl_posts_pagination_args', array(
				'class'	=>	'itsmpl-pagination',
				'prev_text'	=> '<i class="fa fa-angle-left"></i>',
				'next_text'	=> '<i class="fa fa-angle-right"></i>'
			) ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
do_action('itsmpl_sidebar', 'archive');
get_footer();
