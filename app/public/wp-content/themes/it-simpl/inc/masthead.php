<?php

/**
 *	Search Form
 */
if ( !function_exists('itsmpl_get_search') ) {
	function itsmpl_get_search( $class ) {

		get_template_part('framework/header/search', '', $class);

	}
}
 add_action('itsmpl_search', 'itsmpl_get_search', 10, 1);


/**
 *	Function to add Mobile Navigation
 */
if ( !function_exists('itsmpl_navigation') ) {

	function itsmpl_navigation() {

		require get_template_directory() . '/framework/header/navigation.php';

	}
}
add_action('itsmpl_get_navigation', 'itsmpl_navigation');


/**
 *	Scroll Down Section in Header
 */
function itsmpl_header_scroll_down() {

	if ( empty( get_theme_mod('itsmpl_scroll_down_enable', 1) ) ) {
		return;
	}
	?>
	<div class="itsmpl-scroll-down">
        <a href="#" class="itsmpl-scroll-btn"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
    </div>
<?php
}


 /**
  *	Function for adding Site Branding via action
  */
function itsmpl_branding() {

	require get_template_directory() . '/framework/header/branding.php';

 }
 add_action('itsmpl_get_branding', 'itsmpl_branding');

 /**
  *	Get Social Icons
  */
if ( !function_exists('itsmpl_get_social') ) {

	function itsmpl_get_social() {

		if ( !empty( get_theme_mod( 'itsmpl_social_enable', 1 ) ) ) :
			get_template_part('framework/header/social');
		endif;

	}
}
//add_action('itsmpl_top_bar_area', 'itsmpl_get_social', 5);

/**
 *	Telephone to Top Bar
 */
 if ( !function_exists( 'itsmpl_phone' ) ) {
	function itsmpl_phone() {

		 if ( !empty( get_theme_mod( 'itsmpl_phone_enable' ) ) ) {
			?>
			<div id="itsmpl-phone" class="col-auto">
			<?php
				echo 'Call : ' . esc_html( get_theme_mod( 'itsmpl_phone' ) );
			 ?>
			 </div>
			 <?php
		}

	}
}
add_action( 'itsmpl_top_bar_area', 'itsmpl_phone', 5 );

/**
 *	Get Quick Links Menu
 */
if ( !function_exists('itsmpl_quicklinks_menu') ) {
	function itsmpl_quicklinks_menu() {

		if ( !empty( get_theme_mod( 'itsmpl_top_menu_enable', 1 ) ) ) :
			get_template_part( 'framework/header/quick-links' );
		endif;

	}
}
add_action('itsmpl_top_bar_area', 'itsmpl_quicklinks_menu', 10);


/**
 *	Control the Masthead of the theme
 */
if ( !function_exists('itsmpl_get_masthead') ) {

	function itsmpl_get_mastheada() {

		switch ( get_theme_mod('itsmpl_header_style', 'style_1') ) {

		case 'style_1' : ?>

	    <header id="masthead" class="site-header style-1">

		    <?php if ( !empty(get_theme_mod( 'itsmpl_top_bar_enable', 1) ) ) : ?>
		    <div id="itsmpl-top-bar">
			    <div class="container">
				    <div class="row align-items-center">
				    	<?php do_action('itsmpl_top_bar_area'); ?>
				    </div>
			    </div>
		    </div>
		    <?php endif; ?>

		    <div id="itsmpl-title-bar" class="container">
			    <div class="row">

			        <div class="site-branding col-auto col-lg-3 mr-auto">
						<?php do_action('itsmpl_get_branding'); ?>
		        	</div>

					<div class="nav-wrapper col-auto col-lg-9">
						 <div class="d-flex align-items-center">

							<div id="site-navigation" class="main-navigation col-lg-8" role="navigation">
								<?php get_template_part('framework/header/navigation'); ?>
							</div>

							<?php itsmpl_get_social(); ?>

							<button href="#menu" class="menu-link mobile-nav-btn ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="64.08" height="52" viewBox="0 0 64.08 52"><title>nav</title><rect x="0.04" width="64" height="6" style="fill:#fff"/><rect x="0.04" y="46" width="64" height="6" style="fill:#fff"/><polygon points="64 29.25 0 28.75 0.08 22.75 64.08 23.25 64 29.25" style="fill:#fff"/></svg></button>

							<button type="button" id="go-to-field" tabindex="-1"></button>
					    	<button class="search-btn-main ml-auto col-auto"><i class="fa fa-search"></i></button>
					    	<?php do_action('itsmpl_search', 'main'); ?>

						</div>
					</div>

				</div>
			</div>

			<?php
				if ( is_front_page() ) {
				?>
				<div id="itsmpl-hero">
					<div class="container">
						<h1 class="itsmpl-hero-text"><?php echo esc_html( get_theme_mod( 'itsmpl_hero_text', '' ) ); ?></h1>
						<p class="itsmpl-hero-desc"><?php echo esc_html( get_theme_mod( 'itsmpl_hero_desc', '' ) ); ?></p>
					</div>
				</div>
				<?php
				}
			?>

			<?php itsmpl_header_scroll_down() ?>


		</header><!-- #masthead -->
		<?php
		break;

		case 'style_2' : ?>

	    <header id="masthead" class="site-header style-2">

		    <?php if ( !empty( get_theme_mod( 'itsmpl_top_bar_enable', 1) ) ) : ?>
		    <div id="itsmpl-top-bar">
			    <div class="container">
				    <div class="d-flex align-items-center">
				    	<?php do_action('itsmpl_top_bar_area'); ?>
				    </div>
			    </div>
		    </div>
		    <?php endif; ?>

		    <div class="container">
			    <div id="logo-ad-area" class="row no-gutters">

				    <div class="site-branding col-md-4">
						<?php do_action('itsmpl_get_branding'); ?>
			    	</div>

			    	<div class="header-widget-area ml-auto col-md-8">
					    <?php
						    if ( is_active_sidebar( 'sidebar-header' ) ) { ?>

								<aside id="header-widget-wrapper" class="widget-area">
									<?php dynamic_sidebar( 'sidebar-header' ); ?>
								</aside><!-- #secondary -->

						<?php } ?>
			    	</div>
		    	</div>
	    	</div>

			<div class="nav-wrapper">
				 <div class="container">
					 <div class="d-flex align-items-center">
						 <div id="site-navigation" class="main-navigation col-auto" role="navigation">
						 	<?php get_template_part('framework/header/navigation'); ?>
						 </div>

						<button href="#menu" class="menu-link mobile-nav-btn ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="64.08" height="52" viewBox="0 0 64.08 52"><title>nav</title><rect x="0.04" width="64" height="6" style="fill:#fff"/><rect x="0.04" y="46" width="64" height="6" style="fill:#fff"/><polygon points="64 29.25 0 28.75 0.08 22.75 64.08 23.25 64 29.25" style="fill:#fff"/></svg></button>

						<button type="button" id="go-to-field" tabindex="-1"></button>
				    	<button class="search-btn-main col-auto"><i class="fa fa-search"></i></button>
				    	 <?php do_action('itsmpl_search', 'main'); ?>

					</div>
				</div>
			</div>

		</header><!-- #masthead -->
		<?php
		break;

		default: ?>
		<header id="masthead" class="site-header style-def">

	        <div id="header-image">
		        <div class="site-branding">
					<?php do_action('itsmpl_get_branding'); ?>
		    	</div>
	        </div>

			<div class="nav-wrapper">
				 <div class="container">
					 <div class="row justify-content-end align-items-center no-gutters">
						 <?php get_template_part('framework/header/navigation'); ?>

						<button id="mobile-nav-btn" class="menu-link mobile-nav-btn ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="64.08" height="52" viewBox="0 0 64.08 52"><title>nav</title><rect x="0.04" width="64" height="6" style="fill:#fff"/><rect x="0.04" y="46" width="64" height="6" style="fill:#fff"/><polygon points="64 29.25 0 28.75 0.08 22.75 64.08 23.25 64 29.25" style="fill:#fff"/></svg></button>

						<button type="button" id="go-to-field" tabindex="-1"></button>
				    	<button class="search-btn-main"><i class="fa fa-search"></i></button>
				    	 <?php do_action('itsmpl_search', 'main'); ?>

					</div>
				</div>
			</div>

		</header><!-- #masthead -->
	<?php
		}
	}
}

function itsmpl_get_masthead() {
	?>
	<header id="masthead" class="site-header">

	    <?php if ( !empty(get_theme_mod( 'itsmpl_top_bar_enable', 1) ) ) : ?>
	    <div id="itsmpl-top-bar">
		    <div class="container">
			    <div class="row align-items-center">
			    	<?php do_action('itsmpl_top_bar_area'); ?>
			    </div>
		    </div>
	    </div>
	    <?php endif; ?>

	    <div id="itsmpl-title-bar" class="container">
		    <div class="row">

		        <div class="site-branding col-auto col-lg-3 mr-auto">
					<?php do_action('itsmpl_get_branding'); ?>
	        	</div>

				<div class="nav-wrapper col-auto col-lg-9">
					 <div class="d-flex align-items-center">

						<div id="site-navigation" class="main-navigation col-lg-8" role="navigation">
							<?php get_template_part('framework/header/navigation'); ?>
						</div>

						<?php itsmpl_get_social(); ?>

						<button href="#menu" class="menu-link mobile-nav-btn ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="64.08" height="52" viewBox="0 0 64.08 52"><title>nav</title><rect x="0.04" width="64" height="6" style="fill:#fff"/><rect x="0.04" y="46" width="64" height="6" style="fill:#fff"/><polygon points="64 29.25 0 28.75 0.08 22.75 64.08 23.25 64 29.25" style="fill:#fff"/></svg></button>

						<button type="button" id="go-to-field" tabindex="-1"></button>
				    	<button class="search-btn-main ml-auto col-auto"><i class="fa fa-search"></i></button>
				    	<?php do_action('itsmpl_search', 'main'); ?>

					</div>
				</div>

			</div>
		</div>

			<div id="itsmpl-hero">
				<div class="container">
					<?php
					if ( is_front_page() ) {
					?>
						<h1 class="itsmpl-hero-text"><?php echo esc_html( get_theme_mod( 'itsmpl_hero_text', '' ) ); ?></h1>
						<p class="itsmpl-hero-desc"><?php echo esc_html( get_theme_mod( 'itsmpl_hero_desc', '' ) ); ?></p>
					<?php
					}

					if ( is_single() ) {
						?>
						<div class="entry-header container">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div><!-- .entry-header -->
						<?php
					}


					?>
				</div>
			</div>
			<?php

		?>

		<?php itsmpl_header_scroll_down() ?>


	</header><!-- #masthead -->
	<?php
}
add_action('itsmpl_masthead', 'itsmpl_get_masthead', 10);
