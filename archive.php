<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

get_header(); ?>

<?php
if (is_post_type_archive("podcast")):
	get_template_part('template-parts/views/archive/content','podcast');
elseif (is_post_type_archive("brief")):
	get_template_part('template-parts/views/archive/content','brief');
elseif (is_post_type_archive("tags")):
	get_template_part('template-parts/views/archive/content','tags');
else:
	get_template_part('template-parts/views/archive/content');
endif;
?>
<?php
get_footer();
