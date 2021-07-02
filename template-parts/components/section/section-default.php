<?php
$arguments = [
	// card-default
		'title'       => 'Default Title',
		'description' => 'Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic tumeric truffaut hexagon try-hard chambray.',
		'position'    => 'left',
		'bg_class'  => 'bg-white',
		'media_type'  => 'lottie',
		'media_url'   => 'json/web-design.json'
];

/** @var $args */
$args = wp_parse_args( $args, $arguments );
?>
<section class="text-gray-600 <?= $args['bg_class']?>">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 grid-cols-1 gap-6 py-24 ">
		<?php if ( $args['position'] === 'left' ): ?>
			<div class="my-auto sm:mb-10 md:my-auto relative h-96 items-center text-center lg:flex-grow align-middle">
				<?php if ( $args['media_type'] === 'lottie' ): ?>
					<div class="lottie w-full h-auto" data-animation-path="<?= jpp_assets( $args['media_url'] ) ?>"
						 data-anim-loop="true"></div>
				<?php else: ?>
					<img src="<?= jpp_assets( $args['media_url'] ) ?>"/>
				<?php endif; ?>
			</div>
			<div class="my-auto sm:mb-10 md:my-auto relative md:items-start md:text-left items-center text-center lg:flex-grow align-middle flex flex-col ">
				<h2 class="title-font sm:text-4xl text-4xl mb-4 font-bold text-gray-900"><?= $args['title'] ?></h2>
				<p class="mb-8 text-lg font-medium text-gray-500"><?= $args['description'] ?></p>
			</div>
		<?php else: ?>
			<div class="my-auto sm:mb-10 md:my-auto relative md:items-start md:text-left items-center text-center lg:flex-grow align-middle flex flex-col ">
				<h2 class="title-font sm:text-4xl text-4xl mb-4 font-bold text-gray-900"><?= $args['title'] ?></h2>
				<p class="mb-8 text-lg font-medium text-gray-500"><?= $args['description'] ?></p>
			</div>
			<div class="my-auto sm:mb-10 md:my-auto relative h-96 items-center text-center lg:flex-grow align-middle">
				<?php if ( $args['media_type'] === 'lottie' ): ?>
					<div class="lottie w-full h-auto" data-animation-path="<?= jpp_assets( $args['media_url'] ) ?>"
						 data-anim-loop="true"></div>
				<?php else: ?>
					<img src="<?= jpp_assets( $args['media_url'] ) ?>"/>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

