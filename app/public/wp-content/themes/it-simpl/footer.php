<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IT Simpl
 */

?>
</div><!-- #content-wrapper -->

<?php do_action('itsmpl_after_content'); ?>

<?php do_action('itsmpl_footer'); ?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				<?php printf(esc_html__('Theme Designed by %s', 'it-simpl'), '<a href="https://indithemes.com">IndiThemes</a>'); ?>
				<span class="sep"> | </span>
					<?php echo ( get_theme_mod('itsmpl_footer_text') == '' ) ? ('Copyright &copy; '.date_i18n( esc_html__( 'Y', 'it-simpl' ) ).' ' . esc_html( get_bloginfo('name') ) . esc_html__('. All Rights Reserved.','it-simpl')) : esc_html(get_theme_mod('itsmpl_footer_text')); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="menu" class="panel" role="navigation">
	<div class="menu-overlay"></div>
	<div id="panel-top-bar">
		<button class="go-to-bottom"></button>
		<button id="close-menu" class="menu-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
	</div>

	<?php wp_nav_menu( apply_filters( 'mobile_nav_args', array( 'menu_id'	=> 'menu-main',
							  'container'		=> 'ul',
	                          'theme_location' => 'menu-1',
	                          'walker'         => has_nav_menu('menu-1') ? new itsmpl_Mobile_Menu : '',
	                     ) ) ); ?>

	<div class="nav-social-bar col-auto">

		<?php itsmpl_get_social(); ?>

		<button type="button" id="go-to-field" tabindex="-1"></button>
		<button class="search-btn-nav ml-auto col-auto"><i class="fa fa-search"></i></button>
		<?php do_action('itsmpl_search', 'main'); ?>

		<button class="go-to-top"></button>
	</div>

</nav>

<div id="sticky-navigation">
	<div class="nav-wrapper">
		 <div class="container">

			 <div class="row justify-content-end align-items-center justify-content-between no-gutters">

				 <div class="site-branding col-auto col-lg-3">
					 <?php do_action('itsmpl_get_branding'); ?>
				 </div>

				<div class="main-navigation col-lg-8" role="navigation">
					<?php get_template_part('framework/header/navigation'); ?>
				</div>

				<button href="#menu" class="menu-link mobile-nav-btn"><svg xmlns="http://www.w3.org/2000/svg" width="64.08" height="52" viewBox="0 0 64.08 52"><title>nav</title><rect x="0.04" width="64" height="6" style="fill:#fff"/><rect x="0.04" y="46" width="64" height="6" style="fill:#fff"/><polygon points="64 29.25 0 28.75 0.08 22.75 64.08 23.25 64 29.25" style="fill:#fff"/></svg></button>

				<button type="button" id="go-to-field" tabindex="-1"></button>

				<button class="search-btn-sticky ml-auto col-auto"><i class="fa fa-search"></i></button>
				<?php do_action('itsmpl_search', 'sticky'); ?>

			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
