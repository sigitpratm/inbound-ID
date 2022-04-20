<div class="flex flex-col w-full min-h-screen py-24">
	<div class="w-full max-w-[1360px] mx-auto min-h-screen xl:pt-20 space-y-20">
		<div class="w-full max-w-4xl space-y-10 mx-auto">
			<h1 class="lg:text-5xl text-[#3D9E26] font-bold text-center"><?= emk_options( 'podcast-section1-items1-heading' ) ?></h1>
			<p class="text-center text-base">
				<?= emk_options( 'podcast-section1-items1-subheading' ) ?>
			</p>
		</div>


		<?php
		$dataImgTitleItem2 = emk_options( 'podcast-section1-item2-btn-use-image' );

		if ( $dataImgTitleItem2 === '1' ) : ?>
			<?= get_template_part(
					'template-parts/components/section/section',
					'default-podcast',
					[
							"position" => "left",
							"data"     => [
									"with_icon"           => true,
									"images"              => emk_options( 'podcast-section1-items2-image1', 'url' ),
									"icon"                => emk_options( 'podcast-section1-items2-image2', 'url' ),
									"title"               => null,
									"title_classes"       => "text-4xl font-extrabold text-[#3D9E26] leading-tight",
									"description_classes" => "w-3/4",
									"description"         => emk_options( 'podcast-section1-item2-subheading' ),
									"btn_url"             => emk_options( 'podcast-section1-item2-btn-url' ),
									"btn_text"            => emk_options( 'podcast-section1-item2-btn-title' )
							]
					]
			); ?>

		<?php else: ?>

			<?= get_template_part(
					'template-parts/components/section/section',
					'default-podcast',
					[
							"position" => "left",
							"data"     => [
									"with_icon"           => false,
									"images"              => emk_options( 'podcast-section1-items2-image1', 'url' ),
									"icon"                => null,
									"title"               => "REBOUND \nPodcast by InboundID",
									"title_classes"       => "text-4xl font-extrabold text-[#3D9E26] leading-tight",
									"description_classes" => "w-3/4",
									"description"         => emk_options( 'podcast-section1-item2-subheading' ),
									"btn_url"             => emk_options( 'podcast-section1-item2-btn-url' ),
									"btn_text"            => emk_options( 'podcast-section1-item2-btn-title' )
							]
					]
			); ?>

		<?php endif; ?>


		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">
					<?= emk_options( 'podcast-section2-item1-heading' ) ?>
				</h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6 emk-podcast" data-podcast="listened"
				 data-podcast-empty="Belum ada item">
				<?php // ini biarin kosong udah di handle sama js ?>
			</div>
		</div>

		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
						"classes"  => [
								"card"      => "grid grid-cols-12 xl:gap-20 justify-between pb-14",
								"section-1" => "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
								"section-2" => "col-span-5 pr-10"
						],
						"position" => "right",
						"data"     => [
								"with_icon"           => false,
								"images"              => emk_options( 'podcast-section2-item1-image', 'url' ),
								"images_classes"      => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon"                => null,
								"title"               => emk_options( 'podcast-section2-item1-heading' ),
								"title_classes"       => "text-6xl font-extrabold text-[#3D9E26] leading-tight",
								"description_classes" => "w-full",
								"description"         => emk_options( 'podcast-section2-item1-subheading' ),
								"btn_url"             => emk_options( 'podcast-section2-item1-btn-url' ),
								"btn_text"            => emk_options( 'podcast-section2-item1-btn-title' )
						]
				]
		); ?>

		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">
					<?= emk_options( 'podcast-section2-item2-heading' ) ?>
				</h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6" data-podcast="watched" data-podcast-empty="Belum ada item">
				<?php
				// ini biarin kosong udah di handle sama js
				?>
			</div>
		</div>

		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
						"position" => "left",
						"data"     => [
								"with_icon"           => true,
								"images"              => emk_options( 'podcast-section2-item3-image1', 'url' ),
								"images_classes"      => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon"                => emk_options( 'podcast-section2-item3-image2', 'url' ),
								"icon_classes"        => "h-[150px] object-contain",
								"title"               => "REBOUND TALK",
								"title_classes"       => "text-6xl font-extrabold text-[#3D9E26] leading-tight",
								"description_classes" => "w-full",
								"description"         => emk_options( 'podcast-section2-item3-subheading' )
						]
				]
		); ?>

		<div class="block relative w-full mx-auto max-w-5xl xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">
					<?= emk_options( 'podcast-section3-item1-heading' ) ?>
				</h2>
			</div>
			<div class="w-full grid grid-cols-2 xl:gap-10">
				<div class="col-span-1 rounded-3xl overflow-hidden border">
					<img src="<?= emk_options( 'podcast-section3-item1-image1', 'url' ) ?>"
						 alt="img"
						 class="w-full object-contain">
				</div>

				<div class="col-span-1 rounded-3xl overflow-hidden border">
					<img src="<?= emk_options( 'podcast-section3-item1-image2', 'url' ) ?>"
						 alt="img"
						 class="w-full object-contain">
				</div>
			</div>

			<div class="w-full space-y-10 flex flex-col justify-center text-center xl:w-4/6 mx-auto">
				<p class="text-sm md:text-base lg:text-lg">
					<?= emk_options( 'podcast-section3-item1-subheading' ) ?>
				</p>
				<div>
					<a href="<?= emk_options( 'podcast-section3-item1-btn-url' ) ?>" rel="nofollow"
					   class="px-6 xl:px-14 py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold">
						<?= emk_options( 'podcast-section3-item1-btn-title' ) ?>
					</a>
				</div>
			</div>
		</div>


		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
						"classes"  => [
								"card"      => "grid grid-cols-12 xl:gap-20 justify-between pb-14",
								"section-1" => "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
								"section-2" => "col-span-5 pr-10"
						],
						"position" => "right",
						"data"     => [
								"with_icon"           => true,
								"images"              => emk_options( 'podcast-section3-item2-image1', 'url' ),
								"images_classes"      => "w-full h-full rounded-3xl relative overflow-hidden",
								"icon"                => emk_options( 'podcast-section3-item2-image2', 'url' ),
								"icon_classes"        => "h-[100px] object-contain",
								"description_classes" => "w-full",
								"description"         => emk_options( 'podcast-section3-item2-subheading' ),
								"btn_url"             => emk_options( 'podcast-section3-item2-btn-url' ),
								"btn_text"            => emk_options( 'podcast-section3-item2-btn-title' ),
						]
				]
		); ?>


		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center"><?= emk_options( 'podcast-section3-item3-heading' ) ?></h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6" data-podcast="classes" data-podcast-empty="Belum ada item">
				<?php
				// ini biarin kosong udah di handle sama js
				?>
			</div>
		</div>


	</div>
</div>
