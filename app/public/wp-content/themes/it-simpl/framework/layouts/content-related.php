<?php
/**
 * List Layout for Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IT Simpl
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('itsmpl-classic col-md-4'); ?>>
		<div class="itsmpl-card-wrapper">
			<div class="itsmpl-thumb">
				<?php if ( has_post_thumbnail() ): ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('itsmpl_800x500'); ?></a>
					<?php else : ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ph_fp.png'); ?>" alt="<?php the_title_attribute(); ?>">
				<?php endif; ?>
			</div>
			
			<div class="itsmpl-classic-content">
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					 ?>
				</header><!-- .entry-header -->
				
			</div>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->