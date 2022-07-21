<?php
/**
 * Related posts based on categories and tags.
 * 
 */

$it_company_lite_related_posts_taxonomy = get_theme_mod( 'it_company_lite_related_posts_taxonomy', 'category' );

$it_company_lite_post_args = array(
    'posts_per_page'    => absint( get_theme_mod( 'it_company_lite_related_posts_count', '3' ) ),
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$it_company_lite_tax_terms = wp_get_post_terms( get_the_ID(), 'category' );
$it_company_lite_terms_ids = array();
foreach( $it_company_lite_tax_terms as $tax_term ) {
	$it_company_lite_terms_ids[] = $tax_term->term_id;
}

$it_company_lite_post_args['category__in'] = $it_company_lite_terms_ids; 

if(get_theme_mod('it_company_lite_related_post',true)==1){

$it_company_lite_related_posts = new WP_Query( $it_company_lite_post_args );

if ( $it_company_lite_related_posts->have_posts() ) : ?>
    <div class="related-post">
        <h3><?php echo esc_html(get_theme_mod('it_company_lite_related_post_title','Related Post'));?></h3>
        <div class="row">
            <?php while ( $it_company_lite_related_posts->have_posts() ) : $it_company_lite_related_posts->the_post(); ?>
                <?php get_template_part('template-parts/grid-layout'); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();

}