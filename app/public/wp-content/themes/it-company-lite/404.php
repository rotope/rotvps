<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package IT Company Lite
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('it_company_lite_404_page_title',__('404 Not Found','it-company-lite')));?></h1>	
			<p class="text-404"><?php echo esc_html(get_theme_mod('it_company_lite_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','it-company-lite')));?></p>
			<?php if( get_theme_mod('it_company_lite_404_page_button_text','Return to the home page') != ''){ ?>
				<div class="error-btn">
		    		<a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('it_company_lite_404_page_button_text',__('Return to the home page','it-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('it_company_lite_404_page_button_text',__('Return to the home page','it-company-lite')));?></span></a>
				</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>