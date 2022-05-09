<div class="relative block pt-[5rem] md:pt-[6.5rem] text-gray-600 pb-40 md:pb-[24rem] px-4 md:px-0 overflow-hidden">
	<div class="container mx-auto text-gray-600">

		<!-- header -->
		<header class="text-center w-full md:w-1/2 mx-auto space-y-8 py-24">
			<h1 class="text-4xl font-bold text-scheme-green uppercase">
				<?= single_term_title() ?>
			</h1>

			<div class="text-xl">
				<?= get_the_archive_description() ?>
			</div>
		</header>

		<!-- post tax -->
		<div>
			<p class="text-scheme-green font-bold text-xl text-center uppercase pb-16">what we offer</p>

			<div class="space-y-2">
				<?php
				$tax     = get_the_terms( get_the_ID(), 'service-categories' );
				$usedTax = $tax[0]->slug;

				$args      = array(
						'post_type' => 'service',
						'order'     => 'ASC',
						'tax_query' => array(
								array(
										'taxonomy' => 'service-categories',
										'field'    => 'slug',
										'terms'    => $usedTax,
								),
						),
				);
				$the_query = new WP_Query( $args );


				// The Loop
				if ( $the_query->have_posts() ) {
					$index = 0;
					while ( $row = $the_query->have_posts() ) {
						$the_query->the_post(); ?>

						<?php if ( $index % 2 == 0 ): ?>
							<div class="flex flex-col md:flex-row  py-0 md:py-16 gap-4 md:gap-24 justify-center items-center">
								<div class="w-full h-[20rem] md:h-[28rem] bg-red-100 rounded-2xl overflow-hidden">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
										 class="w-full h-full object-cover">
								</div>

								<div class="w-full h-auto space-y-3 md:space-y-6 pr-0 md:pr-40">
									<p class="text-scheme-green text-5xl uppercase font-bold">
										<?= get_the_title() ?>
									</p>
									<p class="text-xl">
										<?= get_field( 'description' ) ?>
									</p>
								</div>
							</div>

						<?php else: ?>

							<div class="flex flex-col md:flex-row  py-0 md:py-16 gap-4 md:gap-24 justify-center items-center">
								<div class="w-full h-auto space-y-3 md:space-y-6 pr-0 md:pr-40">
									<p class="text-scheme-green text-5xl uppercase font-bold">
										<?= get_the_title() ?>
									</p>
									<p class="text-xl">
										<?= get_field( 'description' ) ?>
									</p>
								</div>

								<div class="w-full h-[20rem] md:h-[28rem] bg-red-100 rounded-2xl overflow-hidden">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
										 class="w-full h-full object-cover">
								</div>
							</div>
						<?php endif; ?>


						<?php $index ++;
					}
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();

				?>
			</div>

		</div>


		<!-- assets management -->
		<div class="text-center text-2xl space-y-8 md:space-y-24 py-16 md:py-32">
			<p class="text-center text-4xl md:text-5xl text-scheme-green font-bold">
				<?= emk_options( 'heading-achievement' ) ?>
			</p>
			<div class="w-full flex flex-col md:flex-row justify-between gap-12 md:gap-0">

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green"><?= emk_options( 'achievement-number-item1' ) ?></p>
					<p class="xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'achievement-desc-item1' ) ?>
					</p>
				</div>

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green">
						<span class="text-2xl md:text-5xl">IDR</span><span><?= emk_options( 'achievement-number-item2' ) ?></span>
					</p>
					<p class="xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'achievement-desc-item2' ) ?>
					</p>
				</div>

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green"><?= emk_options( 'achievement-number-item3' ) ?></p>
					<p class="xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'achievement-desc-item3' ) ?>
					</p>
				</div>

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green"><?= emk_options( 'achievement-number-item4' ) ?></p>
					<p class="xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'achievement-desc-item4' ) ?>
					</p>
				</div>

			</div>
		</div>


	</div>


	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-50">
</div>
