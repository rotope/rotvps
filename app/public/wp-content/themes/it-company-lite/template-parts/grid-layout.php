<?php
/**
 * The template part for displaying grid post
 *
 * @package IT Company Lite
 * @subpackage it-company-lite
 * @since IT Company Lite 1.0
 */
?>
<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box wow zoomInDown delay-1000" data-wow-duration="2s">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'it_company_lite_featured_image_hide_show',true) != '') { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>      
	        <div class="new-text">
	          	<div class="entry-content">
	          		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( it_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('it_company_lite_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('it_company_lite_excerpt_suffix','') ); ?>
			        </p>
	          	</div>
	        </div>
	        <?php if( get_theme_mod('it_company_lite_button_text','READ MORE') != ''){ ?>
		        <div class="content-bttn">
		          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html(get_theme_mod('it_company_lite_button_text',__('READ MORE','it-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('it_company_lite_button_text',__('READ MORE','it-company-lite')));?></span></a>
		        </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>