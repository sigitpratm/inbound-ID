<?php

$arguments = [
		"classes"  => [
				"card"      => "grid grid-cols-2 xl:gap-8 2xl:gap-20 justify-between pb-10 px-4 space-y-6 md:space-y-0",
				"section-1" => "col-span-2 md:col-span-1 h-[24rem] md:h-[32rem] bg-gray-200 rounded-xl",
				"section-2" => "col-span-2 md:col-span-1 rounded-xl h-full flex items-center"
		],
		"position" => "left",
		"data"     => [
				"with_icon"           => false,
				"images"              => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_332-300x201.png",
				"images_classes"      => "w-full h-full rounded-xl relative overflow-hidden",
				"icon"                => null,
				"icon_classes"        => "object-contain w-full h-full",
				"title"               => null,
				"title_classes"       => "",
				"description_classes" => "xl:w-3/4",
				"description"         => null, //Lorem ipsum dolor sit amet
				"btn_url"             => "/",
				"btn_text"            => "Listen on Spotify"
		]
];

/** @var $args */
$args = wp_parse_args( $args, $arguments );
?>

<div class="<?= $args["classes"]["card"] ?>">
	<?php
	if ( $args["position"] === "left" ):
		?>
		<div class="<?= $args["classes"]["section-1"] ?>">
			<div class="<?= $args["data"]["images_classes"] ?? "w-full h-full rounded-xl relative overflow-hidden"; ?>">
				<?php if ( ! empty( $args["data"]["images"] ) ): ?>
					<img src="<?= $args["data"]["images"]; ?>"
						 alt="image-our-program"
						 class="w-full h-full object-cover">
				<?php endif; ?>
			</div>
		</div>
		<div class="<?= $args["classes"]["section-2"]; ?>">
			<div class="w-full flex flex-col space-y-6 md:space-y-12">
				<?php if ( ! empty( $args["data"]["with_icon"] ) ): ?>
					<?php if ( $args["data"]["with_icon"] && ! empty( $args["data"]["icon"] ) ): ?>
						<div class="w-1/2 mx-auto md:mx-0 rounded-xl">
							<img src="<?= $args["data"]["icon"]; ?>" alt="with-icon"
								 class="<?= $args["data"]["icon_classes"] ?>">
						</div>
					<?php else: ?>
						<div class="w-full block relative">
							<h3 class="<?= $args["data"]["title_classes"] ?>"><?= str_replace( array(
										'\r\n',
										'\n\r',
										'\n',
										'\r'
								), '<br>', $args["data"]["title"] ); ?></h3>
						</div>
					<?php endif; ?>
				<?php else: ?>
					<div class="w-full block relative">
						<h3 class="<?= $args["data"]["title_classes"] ?>"><?= $args["data"]["title"]; ?></h3>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $args["data"]["description"] ) ): ?>
					<div class="<?= $args["data"]["description_classes"] ?>">
						<p class="text-center md:text-left text-base md:text-base lg:text-lg"><?= $args["data"]["description"]; ?></p>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $args["data"]["btn_url"] ) && ! empty( $args["data"]["btn_text"] ) ): ?>
					<div class="w-full md:block relative flex items-start justify-center">
						<a href="<?= $args["data"]["btn_url"]; ?>"
						   class="w-full md:w-auto text-center xl:px-10 py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold"><?= $args["data"]["btn_text"] ?></a>
					</div>
				<?php endif; ?>


			</div>
		</div>

	<?php else: ?>
		<div class="<?= $args["classes"]["section-2"] ?>">
			<div class="w-full flex flex-col space-y-6 md:space-y-12">
				<?php if ( ! empty( $args["data"]["with_icon"] ) ): ?>
					<?php if ( $args["data"]["with_icon"] === true && ! empty( $args["data"]["icon"] ) ): ?>
						<div class="w-full rounded-xl flex items-center justify-center md:justify-start">
							<img src="<?= $args["data"]["icon"]; ?>" alt="with-icon"
								 class="<?= $args["data"]["icon_classes"] ?>">
						</div>
					<?php else: ?>
						<div class="w-full block relative">
							<h3 class="<?= $args["data"]["title_classes"] ?>"><?= preg_replace( "\n", '<br/>', $args["data"]["title"] ); ?></h3>
						</div>
					<?php endif; ?>
				<?php else: ?>
					<div class="w-full block relative">
						<h3 class="<?= $args["data"]["title_classes"] ?>"><?= $args["data"]["title"]; ?></h3>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $args["data"]["description"] ) ): ?>
					<div class="<?= $args["data"]["description_classes"] ?>">
						<p class="text-base text-center md:text-left md:text-base lg:text-lg"><?= $args["data"]["description"]; ?></p>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $args["data"]["btn_url"] ) && ! empty( $args["data"]["btn_text"] ) ): ?>
					<div class="w-full md:block relative flex items-start justify-center">
						<a href="<?= $args["data"]["btn_url"]; ?>"
						   class="w-full md:w-auto xl:px-10 py-3 text-center bg-scheme-green shadow-lg rounded-full text-white font-bold">
							<?= $args["data"]["btn_text"] ?>
						</a>
					</div>
				<?php endif; ?>

			</div>
		</div>
		<div class="<?= $args["classes"]["section-1"] ?>">
			<div class="<?= $args["data"]["images_classes"] ?? "w-full h-full rounded-xl relative overflow-hidden" ?>">
				<?php if ( ! empty( $args["data"]["images"] ) ): ?>
					<img src="<?= $args["data"]["images"]; ?>"
						 alt="image-our-program"
						 class="w-full h-full absolute top-1/2 left-1/2 transform -translate-x-2/4 -translate-y-2/4 object-cover">
				<?php endif; ?>
			</div>
		</div>

	<?php endif; ?>
</div>
