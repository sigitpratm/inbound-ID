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
	<script src="https://cdn.tailwindcss.com"></script>

	<script>
		let SITE_URL = "<?= get_site_url() ?>"
	</script>
	<style>
		* {
			font-family: 'Montserrat', sans-serif;
		}

	</style>
	<link rel="stylesheet" href="<?= mix( "/css/style.css" ) ?>" type="text/css"/>

	<?php if (is_home()):?>


	<?php elseif (is_archive()): ?>

		<meta name="twitter:card" content="summary_large_image"/>
		<meta name="twitter:site" content="<?= get_site_url()?>"/>
		<meta name="twitter:title" content="<?= get_post_type();?>"/>
		<meta name="twitter:description" content="Lorem ipsum dolor sit amet"/>
		<meta name="twitter:creator" content="creator"/>
		<meta name="twitter:image" content="<?= get_site_icon_url();?>"/>
		<meta name="twitter:image:width" content="400"/>
		<meta name="twitter:image:height" content="400"/>
		<meta name="twitter:image:type" content="image/jpg"/>

		<link rel="canonical" href="<?= get_site_url(); ?>"/>
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?= get_post_type(); ?>" />
		<meta property="og:description" content="<?= get_the_archive_description();?>" />
		<meta property="og:url" content="<?= get_site_url();?>" />
		<meta property="og:image" content="<?= get_site_icon_url()?>" />
		<meta property="og:image:width" content="400" />
		<meta property="og:image:height" content="400" />
		<meta property="og:image:type" content="image/jpeg"/>
	<?php elseif (is_single()): ?>


	<?php else: ?>

	<?php endif; ?>


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
