<?php
/**
 * The template part for header
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div id="top-header">
      <div class="header-menu <?php if( get_theme_mod( 'it_company_lite_sticky_header', false) != '' || get_theme_mod( 'it_company_lite_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
        <div class="row m-0">
          <div class="col-lg-3 col-md-4 col-8 align-self-center">
            <div class="logo">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('it_company_lite_logo_title_hide_show',true) != ''){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('it_company_lite_logo_title_hide_show',true) != ''){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('it_company_lite_tagline_hide_show',true) != ''){ ?>
                  <p class="site-description">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-4 align-self-center">
            <?php get_template_part( 'template-parts/header/navigation' ); ?>
          </div>      
        </div>
      </div>
      <?php get_template_part( 'template-parts/header/lower-header' ); ?>
    </div>
  </div>
</div>