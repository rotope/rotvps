<?php
/**
 * The template part for lower header
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>

<div class="lower-header">
	<div class="row">
    	<div class="col-lg-5 col-md-4">
    		<?php dynamic_sidebar('social-widget'); ?>
		</div>
    	<div class="col-lg-2 col-md-3">
    		<?php if(get_theme_mod('it_company_lite_phone') != ''){ ?>
				<span><a href="tel:<?php echo esc_attr( get_theme_mod('it_company_lite_phone','') ); ?>"><?php echo esc_html(get_theme_mod('it_company_lite_phone',''));?></a></span>
			<?php }?>
    	</div>
    	<div class="col-lg-5 col-md-5">
    		<?php get_search_form(); ?>
    	</div>
    </div>
</div>