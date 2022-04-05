<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

?>
<html <?php language_attributes(); ?> xmlns:x-on="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?= jpp_assets( 'img/png/favicon.png' ) ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>

	<style>
		* {
			font-family: 'Montserrat', sans-serif;
		}

	</style>
	<link rel="stylesheet" href="<?= mix( "/css/style.css" ) ?>" type="text/css"/>
</head>
<body <?php body_class( 'font-display' ); ?> x-data="{atTop: true, isArchive: false}"
                                             x-on:scroll.window="atTop = (window.pageYOffset > 60) ? false : true; ">
<?php wp_body_open(); ?>

<?php
if ( is_home() ) {
	do_action( 'jpp_header', 'default' );
} else {
	do_action( 'jpp_header', 'not-home' );
}
?>

<main id="page"
      class="bg-scheme-light-gray site w-full min-h-screen" <?php echo ! is_customize_preview() ?: 'style="padding: 0 40px;"'; ?>>
	<div id="content" class="site-content">
