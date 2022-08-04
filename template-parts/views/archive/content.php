<?php get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>

<div class="relative block pt-[5rem] md:pt-[6.5rem] text-gray-600 px-4 lg:px-16 xl:px-20 2xl:px-0 overflow-hidden">

	<img src="<?= jpp_assets( '/img/png/img-bg-01.png' ) ?>" alt=""
		 class="hidden md:block absolute top-52 left-0 opacity-50 z-10">
	<img src="<?= jpp_assets( '/img/png/img-bg-02.png' ) ?>" alt=""
		 class="hidden md:block absolute top-[20%] right-0 opacity-80 z-10">

	<div class="container mx-auto text-gray-600 relative z-20">

		<!-- header -->
		<header class="text-center w-full md:w-1/2 mx-auto space-y-8 py-16 md:py-24">
			<h1 class="text-3xl md:text-4xl font-bold text-scheme-green uppercase">
				<?= single_term_title() ?>
			</h1>

			<div class="text-lg md:text-xl">
				<?= get_the_archive_description() ?>
			</div>
		</header>

		<!-- post tax -->
		<div>
			<p class="text-scheme-green font-bold text-3xl md:text-2xl text-center uppercase pb-16">what we offer</p>

			<div class="space-y-20 md:space-y-2 pb-12 md:pb-0">
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
								<div class="w-full h-[20rem] md:h-[28rem] rounded-2xl overflow-hidden">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
										 class="w-full h-full object-cover transition duration-500 hover:scale-110">
								</div>

								<div class="w-full h-auto space-y-3 md:space-y-6 pr-0 md:pr-40">
									<p class="text-scheme-green text-2xl md:text-5xl uppercase font-bold text-center md:text-left">
										<?= get_the_title() ?>
									</p>
									<p class="text-base md:text-xl text-center md:text-left">
										<?= get_field( 'description' ) ?>
									</p>
								</div>
							</div>

						<?php else: ?>

							<div class="flex flex-col md:flex-row  py-0 md:py-16 gap-4 md:gap-24 justify-center items-center">
								<div class="order-2 md:order-1 w-full h-auto space-y-3 md:space-y-6 pr-0 md:pr-40">
									<p class="text-scheme-green text-2xl md:text-5xl uppercase font-bold text-center md:text-left">
										<?= get_the_title() ?>
									</p>
									<p class="text-base md:text-xl text-center md:text-left">
										<?= get_field( 'description' ) ?>
									</p>
								</div>

								<div class="order-1 md:order-2 w-full h-[20rem] md:h-[28rem] rounded-2xl overflow-hidden">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
										 class="w-full h-full object-cover transition duration-500 hover:scale-110">
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
		<div class="text-center text-2xl space-y-8 md:space-y-24 py-12 md:py-32">
			<p class="text-center text-3xl md:text-4xl md:text-5xl text-scheme-green font-bold">
				<?= emk_options( 'heading-assets-management' ) ?>
			</p>
			<div class="w-full flex flex-col md:flex-row justify-between gap-12 md:gap-0">

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green"><?= emk_options( 'assets-management-data1-number' ) ?></p>
					<p class="text-lg xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'assets-management-data1-desc' ) ?>
					</p>
				</div>

				<div class="w-full h-full space-y-2 md:space-y-8">
					<?php
					$idr = emk_options( 'assets-management-data2-show-idr' );
					?>
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green">
						<span class="<?= ( $idr ) ? 'inline-block' : 'hidden' ?> text-2xl md:text-5xl">IDR</span><span><?= emk_options( 'assets-management-data2-number' ) ?></span>
					</p>
					<p class="text-lg xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'assets-management-data2-desc' ) ?>
					</p>
				</div>

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green"><?= emk_options( 'assets-management-data3-number' ) ?></p>
					<p class="text-lg xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'assets-management-data3-desc' ) ?>
					</p>
				</div>

				<div class="w-full h-full space-y-2 md:space-y-8">
					<p class="text-5xl xl:text-7xl 2xl:text-8xl font-bold text-scheme-green"><?= emk_options( 'assets-management-data4-number' ) ?></p>
					<p class="text-lg xl:text-base 2xl:text-lg px-12">
						<?= emk_options( 'assets-management-data4-desc' ) ?>
					</p>
				</div>

			</div>
		</div>

		<!-- featured works -->
		<div class="py-12 md:py-24 space-y-12 md:space-y-20">
			<p class="text-center text-3xl md:text-5xl text-scheme-green font-bold uppercase">
				Featured Works
			</p>

			<div class="grid grid-cols-2 md:grid-cols-12 gap-6">
				<?php
				$term          = get_queried_object();
				$featuredWorks = get_field( 'featured_works', $term );

				if ( $featuredWorks ) : ?>
					<?php foreach ( $featuredWorks as $row ) : ?>
						<div class="col-span-1 md:col-span-3 space-y-6 md:space-y-16">
							<div class="w-full h-52 md:h-80 rounded-2xl overflow-hidden bg-red-100">
								<img src="<?= $row['featured_work_image'] ?>" alt=""
									 class="h-full w-full object-cover transition duration-500 hover:scale-110">
							</div>
							<p class="text-center text-scheme-green text-lg md:text-xl font-bold"><?= $row['featured_work_name'] ?></p>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>

		<!-- other service -->
		<div class="py-12 md:py-28 space-y-12 md:space-y-20">
			<p class="text-center text-3xl md:text-5xl text-scheme-green font-bold uppercase">
				OTHER SERVICES
			</p>

			<div class="flex flex-col items-center justify-center md:flex-row gap-6">
				<?php
				$max      = 4; //number of categories to display
				$taxonomy = 'service-categories';
				$terms    = get_terms( 'taxonomy=' . $taxonomy . '&orderby=name&order=ASC&hide_empty=0' );

				// Random order
				if ( $terms ) {
					shuffle( $terms );
				}

				// Get first $max items
				$terms = array_slice( $terms, 0, $max );

				// Sort by name
				usort( $terms, function ( $a, $b ) {
					return strcasecmp( $a->name, $b->name );
				} );

				// Echo random terms sorted alphabetically
				if ( $terms ) :
					foreach ( $terms as $term ) : ?>
						<div class="w-full text-center space-y-4 md:space-y-8">
							<div class="text-white font-bold text-base md:text-xl bg-scheme-green py-6 md:py-10 rounded-2xl md:rounded-full">
								<p><?= $term->name ?></p>
							</div>
							<div>
								<a href="<?= get_term_link( $term, $taxonomy ) ?>" target="_blank"
								   class="font-bold text-scheme-green hover:text-scheme-dark-green transition duration-300 text-lg md:text-xl">
									View more
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<div class="text-center space-y-8">
						<p class="text-xl text-center font-bold text-gray-400">No post yet</p>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>

	<!-- last section -->
	<div class="grid grid-cols-12 pt-12 md:pt-24 relative z-20 relative">

		<div class="col-span-12 md:col-span-6 rounded-3xl md:rounded-none overflow-hidden">
			<img src="<?= emk_options( 'service-last-section-image', 'url' ) ?>" alt="" class="object-cover w-full">
		</div>

		<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
			<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

				<p class="text-lg xl:text-3xl 2xl:text-5xl font-bold text-scheme-green text-center">
					<?= emk_options( 'service-last-section-heading' ) ?>
				</p>

				<div class="flex flex-col justify-center gap-4">
					<a href="<?= emk_options( 'service-last-section-link-btn1' ) ?>" target="_blank"
					   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
						<?= emk_options( 'service-last-section-text-btn1' ) ?>
					</a>

					<?php
					if ( emk_options( 'show-btn2-service-last-section' ) ) :
						if ( emk_options( 'show-btn2-service-last-section' ) === '1' ):?>
							<a href="<?= emk_options( 'service-last-section-link-btn2' ) ?>" target="_blank"
							   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
								<?= emk_options( 'service-last-section-text-btn2' ) ?>
							</a>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="w-full absolute bottom-0 left-0 z-50">

</div>

