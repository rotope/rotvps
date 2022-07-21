<?php
/**
 * The template part for displaying post
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>
<?php 
  $it_company_lite_archive_year  = get_the_time('Y'); 
  $it_company_lite_archive_month = get_the_time('m'); 
  $it_company_lite_archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box wow zoomInDown delay-1000" data-wow-duration="2s">
    <?php
      if ( ! is_single() ) {
      // If not a single post, highlight the audio file.
      if ( ! empty( $audio ) ) {
        foreach ( $audio as $audio_html ) {
          echo '<div class="entry-audio">';
            echo $audio_html;
          echo '</div><!-- .entry-audio -->';
        }
      };
      };
    ?>
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'it_company_lite_toggle_postdate',true) != '' || get_theme_mod( 'it_company_lite_toggle_author',true) != '' || get_theme_mod( 'it_company_lite_toggle_comments',true) != '' || get_theme_mod( 'it_company_lite_toggle_time',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('it_company_lite_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $it_company_lite_archive_year, $it_company_lite_archive_month, $it_company_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('it_company_lite_toggle_author',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('it_company_lite_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('it_company_lite_toggle_comments',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('it_company_lite_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'it-company-lite'), __('0 Comments', 'it-company-lite'), __('% Comments', 'it-company-lite') ); ?> </span>
          <?php } ?>

          <?php if(get_theme_mod('it_company_lite_toggle_time',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('it_company_lite_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
          <?php } ?>
          <hr>
        </div>   
      <?php } ?>   
      <div class="entry-content">
        <p>
          <?php $it_company_lite_theme_lay = get_theme_mod( 'it_company_lite_excerpt_settings','Excerpt');
          if($it_company_lite_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($it_company_lite_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $excerpt = get_the_excerpt(); echo esc_html( it_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('it_company_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('it_company_lite_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
      </div>
      <?php if( get_theme_mod('it_company_lite_button_text','READ MORE') != ''){ ?>
        <div class="content-bttn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html(get_theme_mod('it_company_lite_button_text',__('READ MORE','it-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('it_company_lite_button_text',__('READ MORE','it-company-lite')));?></span></a>
        </div>
      <?php } ?>
    </div>
  </div>
</article>