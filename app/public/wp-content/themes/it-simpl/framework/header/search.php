<?php
/**
 *  PHP file for Search Form
 *
 *  Used in mathead.php and footer.php
 */
?>

<div class="itsmpl-search-<?php echo esc_attr($args) ?>">
    <?php get_search_form(); ?>
    <button type="button" id="go-to-btn" tabindex="-1"></button>
</div>
