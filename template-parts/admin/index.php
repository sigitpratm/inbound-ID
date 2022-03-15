<?php
/**
 * Template part for displaying a custom Admin area
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 *
 * @package jippi
 */

?>

<div class="wrap">
	<h1>Jippi Settings Page</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'EmkalabTheme_options_group' ); ?>
		<?php do_settings_sections( 'EmkalabTheme' ); ?>
		<?php submit_button(); ?>
	</form>
</div>
