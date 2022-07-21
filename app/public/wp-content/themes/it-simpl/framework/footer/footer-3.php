<?php
/**
 *  Template for 3-Column Footer
 */
 ?>
<div id="footer-sidebar" class="widget-area">
    <div class="container">
         <div class="row">
            <?php
            if ( is_active_sidebar( 'footer-1' ) ) : ?>
            <div class="footer-column col-lg-4 col-md-6">
                    <?php dynamic_sidebar( 'footer-1'); ?>
                </div>
            <?php endif;

            if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="footer-column col-lg-4 col-md-6">
                    <?php dynamic_sidebar( 'footer-2'); ?>
                </div>
            <?php endif;

            if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="footer-column col-lg-4 col-md-6"> <?php
                    dynamic_sidebar( 'footer-3'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
