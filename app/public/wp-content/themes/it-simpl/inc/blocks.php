<?php
/**
 *  File for Block Editor related functionalities
 */

 if ( function_exists( 'register_block_style' ) ) {
     register_block_style(
         'core/heading',
         array(
             'name'         => 'widget-title',
             'label'        => __( 'Widget Title', 'it-simpl' ),
             'is_default'   => false,
             'style_handle' => 'itsmpl-block-styles',
         )
     );
 }

 function itsmpl_register_block_style() {

 	wp_enqueue_style( 'itsmpl-block-style', esc_url( get_template_directory_uri() . '/assets/theme-styles/css/block-styles.css'), array(), ITSMPL_VERSION );

 }
 add_action('init', 'itsmpl_register_block_style');
