<?php
	the_custom_logo();
?>
	<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
	<?php
$itsmpl_description = get_bloginfo( 'description', 'display' );
if ( $itsmpl_description || is_customize_preview() ) :
	?>
	<p class="site-description"><?php echo esc_html($itsmpl_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
<?php endif; ?>