<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'it_company_lite_before_slider' ); ?>

  <?php if( get_theme_mod( 'it_company_lite_slider_hide_show', false) != '' || get_theme_mod( 'it_company_lite_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'it_company_lite_slider_speed',4000)) ?>">
        <?php $it_company_lite_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'it_company_lite_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $it_company_lite_slider_pages[] = $mod;
            }
          }
          if( !empty($it_company_lite_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $it_company_lite_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class="wow lightSpeedIn delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow lightSpeedIn delay-1000" data-wow-duration="2s"><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('it_company_lite_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('it_company_lite_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn wow lightSpeedIn delay-1000" data-wow-duration="2s">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('it_company_lite_slider_button_text',__('READ MORE','it-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('it_company_lite_slider_button_text',__('READ MORE','it-company-lite')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','it-company-lite' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','it-company-lite' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'it_company_lite_after_slider' ); ?>

  <section id="about" class="wow bounceInDown delay-1000" data-wow-duration="2s">
    <div class="container">
      <?php $it_company_lite_about_pages = array();
        $mod = absint( get_theme_mod( 'it_company_lite_about_page' ));
        if ( 'page-none-selected' != $mod ) {
          $it_company_lite_about_pages[] = $mod;
        }
        if( !empty($it_company_lite_about_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $it_company_lite_about_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <?php if(get_theme_mod('it_company_lite_section_main_title') != ''){ ?>
                    <hr>
                    <h2><?php echo esc_html(get_theme_mod('it_company_lite_section_main_title',''));?></h2>
                  <?php }?>
                  <?php if(get_theme_mod('it_company_lite_section_text') != ''){ ?>
                    <p><?php echo esc_html(get_theme_mod('it_company_lite_section_text',''));?></p>
                    <hr>
                  <?php }?>
                  <h3><?php the_title(); ?></h3>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('it_company_lite_about_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('it_company_lite_about_button_text','CONTINUE READING') != ''){ ?>
                    <div class="about-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('it_company_lite_about_button_text',__('CONTINUE READING','it-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('it_company_lite_about_button_text',__('CONTINUE READING','it-company-lite')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6">
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
            <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif; wp_reset_postdata() ?>
      <div class="clearfix"></div> 
    </div>
  </section>

  <?php do_action( 'it_company_lite_after_about' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>