<?php
/**
 * The template for displaying search forms in IT Company Lite
 *
 * @package IT Company Lite
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'it-company-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','it-company-lite' ); ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button','it-company-lite' ); ?>">
</form>