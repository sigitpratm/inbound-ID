<?php
$arguments  = [
	// card-default
	'title'     => 'Default Jippi Product',
	'subtitle'     => null,
	'position'     => 'left',
	'weight'     => 'medium',

];

/** @var $args */
$args = wp_parse_args( $args, $arguments  );
if (!function_exists('jpp_comp_heading_position')) {
	function jpp_comp_heading_position($position): string {
		switch ($position) {
			default:
			case 'left':
				$result = 'text-left';
				break;
			case 'center':
				$result = 'text-center';
				break;
			case 'right':
				$result = 'text-right';
				break;
		}
		return $result;
	}
}
?>
<div class="block relative max-w-3xl mx-auto mb-12 <?= jpp_comp_heading_position($args['position'])?>">
	<h2 class="block text-4xl <?= jpp_comp_heading_position($args['position'])?> <?= $args['weight'] === 'bold' ? 'font-bold' : 'font-medium'?> "><?= $args['title']?></h2>
	<?php if (!empty($args['subtitle'])):?>
	<h3 class=" mt-5 block text-lg text-gray-600 "><?= esc_html($args['subtitle'])?></h3>
	<?php endif;?>
</div>
