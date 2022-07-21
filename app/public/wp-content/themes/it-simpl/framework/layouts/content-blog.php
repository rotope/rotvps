<?php
/**
 * List Layout for Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IT Simpl
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('itsmpl-classic col-12'); ?>>
		<div class="itsmpl-card-wrapper">

			<div class="itsmpl-classic-content">
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					 ?>
				</header><!-- .entry-header -->

				<div class="entry-meta">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date('j M y'); ?></a>
					<?php
					itsmpl_posted_by();
					?>
				</div><!-- .entry-meta -->

				<div class="itsmpl-thumb">
					<?php if ( has_post_thumbnail() ): ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('itsmpl_800x500'); ?></a>
					<?php endif; ?>
				</div>

				<div class="itsmpl_excerpt">
					<?php do_action('itsmpl_blog_excerpt', 36); ?>
				</div>

				<div class="itsmpl_read_more">
					<a href="<?php the_permalink(); ?>"><?php _e('Read More', 'it-simpl'); ?></a>
				</div>
			</div>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->
