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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--	<link rel="preconnect" href="https://fonts.googleapis.com">-->
<!--	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
<!--	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">-->
	<?php wp_head(); ?>

	<style>
		@font-face {
			font-family: jp-wf;
			src: url(<?= jpp_assets('fonts/geo-wf-3.woff2')?>) format("woff2");
			font-weight: 300;
			font-style: normal;
			font-display: swap;
		}
		@font-face {
			font-family: jp-wf;
			src: url(<?= jpp_assets('fonts/geo-wf-3i.woff2')?>) format("woff2");
			font-weight: 300;
			font-style: italic;
			font-display: swap;
		}
		@font-face {
			font-family: jp-wf;
			src: url(<?= jpp_assets('fonts/geo-wf-4.woff2')?>) format("woff2");
			font-weight: 400;
			font-style: normal;
			font-display: swap;
		}
		@font-face {
			font-family: jp-wf;
			src: url(<?= jpp_assets('fonts/geo-wf-5.woff2')?>) format("woff2");
			font-weight: 500;
			font-style: normal;
			font-display: swap;
		}
		@font-face {
			font-family: jp-wf;
			src: url(<?= jpp_assets('fonts/geo-wf-6.woff2')?>) format("woff2");
			font-weight: 600;
			font-style: normal;
			font-display: swap;
		}
		@font-face {
			font-family: jp-wf;
			src: url(<?= jpp_assets('fonts/geo-wf-7.woff2')?>) format("woff2");
			font-weight: 700;
			font-style: normal;
			font-display: swap;
		}
	</style>
	<link rel="stylesheet" href="<?=mix("/css/style.css")?>" type="text/css"/>
</head>
<body <?php body_class('font-display'); ?> x-data="{atTop: true, isArchive: false}" x-on:scroll.window="atTop = (window.pageYOffset > 60) ? false : true; "
>
<?php wp_body_open(); ?>
<?php do_action( 'jpp_header', 'envato' ); ?>
<main id="page" class="site w-full border border-red-500 min-h-screen" <?php echo ! is_customize_preview() ?: 'style="padding: 0 40px;"'; ?>>
	<div id="content" class="site-content">
