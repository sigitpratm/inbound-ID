<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package awps
 */
if (get_post_type() === "podcast"):
	get_header("podcast");
else:
	get_header();
endif;

get_template_part('template-parts/views/single/single', get_post_type());

get_footer();
