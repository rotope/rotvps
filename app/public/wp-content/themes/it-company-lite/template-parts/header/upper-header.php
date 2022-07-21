<?php
/**
 * The template part for topbar
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>
<?php if( get_theme_mod( 'it_company_lite_topbar_hide_show', false) != '' || get_theme_mod( 'it_company_lite_resp_topbar_hide_show', false) != '') { ?>
        <div id="topbar">
                <div class="container">
                	<div class="row">
                        	<div class="col-lg-5 col-md-12">
                        		<?php if(get_theme_mod('it_company_lite_location') != ''){ ?>
                        			<i class="<?php echo esc_attr(get_theme_mod('it_company_lite_location_icon','fas fa-map-marker-alt')); ?>"></i><span><?php echo esc_html(get_theme_mod('it_company_lite_location',''));?></span>
                        		<?php }?>
                		</div>
                        	<div class="col-lg-4 col-md-6 email">
                        		<?php if(get_theme_mod('it_company_lite_email_address') != ''){ ?>
                        			<i class="<?php echo esc_attr(get_theme_mod('it_company_lite_email_icon','fas fa-envelope-open')); ?>"></i><span><a href="mailto:<?php echo esc_attr(get_theme_mod('it_company_lite_email_address',''));?>"><?php echo esc_html(get_theme_mod('it_company_lite_email_address',''));?></a></span>
                        		<?php }?>
                        	</div>
                        	<div class="col-lg-3 col-md-6 inq-btn">
                        		<?php if(get_theme_mod('it_company_lite_inquiry_btn_link') != '' | get_theme_mod('it_company_lite_inquiry_btn_text') != ''){ ?>
                        			<a href="<?php echo esc_url(get_theme_mod('it_company_lite_inquiry_btn_link','#'));?>" ><?php echo esc_html(get_theme_mod('it_company_lite_inquiry_btn_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'INQUIRY','it-company-lite' );?></span></a>
                        		<?php }?>
                        	</div>
                        </div>
                </div>
        </div>
<?php } ?>