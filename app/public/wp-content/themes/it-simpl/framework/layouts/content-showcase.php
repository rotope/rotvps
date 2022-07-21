
<div class="showcase-item col-md-4">
    <a href="<?php echo get_the_permalink( $args ) ?>">
        <figure>
            <?php echo wp_get_attachment_image( attachment_url_to_postid( get_the_post_thumbnail_url( $args ) ), array(500,500) ); ?>
        </figure>
        <?php the_title( '<h3 class="showcase-title">', '</h3>' ) ?>
    </a>
</div>
