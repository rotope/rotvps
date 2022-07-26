<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Interserver Platinum
 */

get_header(); ?>
<div class="section">
	<div class="container">
	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'interserver-platinum' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'interserver-platinum' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #container -->
</div><!-- #section -->
<?php get_footer(); ?>
