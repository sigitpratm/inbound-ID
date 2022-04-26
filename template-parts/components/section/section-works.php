<?php
$categories = emk_options( 'home-works-select-category' );

if ( $categories !== null ) {
	$selectCat = array_slice( $categories, 0, 5 );
}
if ( $selectCat !== null ) {
	$countCategories = count( $selectCat );
} ?>


<div class="py-16 md:py-28 space-y-12">
	<!-- heading -->
	<div class="space-y-4">
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">OUR WORKS</p>
	</div>

	<!-- body -->
	<div id="slide-body-works" class="body-slide-works relative h-[24rem] md:h-[40rem] w-full">
		<?php if ( $countCategories === null ): ?>
			<div class="bg-gray-200 w-full h-full flex items-center justify-center">
				<p class="text-center text-gray-500 text-xl">
					no post or haven't selected post yet
				</p>
			</div>
		<?php endif; ?>

		<?php
		for ( $i = 0; $i < $countCategories; $i ++ ):
			$args = array(
					'post_type'      => 'our-work',
					'posts_per_page' => 4,
					'order'          => 'ASC',
					'tax_query'      => array(
							array(
									'taxonomy' => 'work-categories',
									'field'    => 'id',
									'terms'    => $selectCat[ $i ],
							),
					),
			);

			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>



			<div class="slide-work card-slider-work ease-in-out grid grid-cols-12 absolute top-0 left-0 w-full opacity-0"
				 data-slider-work="slider-work<?= $i ?>">

				<div class="col-span-12 md:col-span-4 bg-transparent md:bg-scheme-dark-gray flex items-center justify-center h-auto md:h-[40rem] rounded-xl relative overflow-hidden">
					<img src="<?= jpp_assets( '/img/png/clip-art-top.png' ) ?>" alt="" class="hidden md:block absolute top-0 left-0">
					<img src="<?= jpp_assets( '/img/png/clip-art-bottom.png' ) ?>" alt=""
						 class="hidden md:block absolute bottom-0 left-0 w-full">
					<p class="w-full md:w-2/3 mx-auto text-center text-2xl md:text-4xl font-bold text-scheme-green uppercase py-4">
						<?= get_the_category_by_ID( $selectCat[ $i ] ); ?>
					</p>
				</div>

				<div class="col-span-12 md:col-span-8">
					<div class="grid grid-cols-12 overflow-hidden rounded-xl">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="col-span-6 rounded-xl h-44 md:h-[24rem] overflow-hidden">
								<img src="<?= get_field( 'image' ) ?>" alt=""
									 class="w-full h-full object-cover">
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>

			<?php wp_reset_postdata();
		else:
			echo "null";
		endif; ?>

		<?php endfor; ?>
	</div>

	<!-- footer -->
	<div class="flex items-center justify-center  <?php if ( $categories === null ) {
		echo "hidden";
	} ?>">
		<button id="prev-slide-work"
				class="w-8 h-8 rounded-full flex items-center justify-center border-4 bg-white border-scheme-green text-scheme-green">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd"
					  d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
					  clip-rule="evenodd"/>
			</svg>
		</button>

		<div id="slide-nav-works" class="w-full bg-gray-600 h-1 rounded-full flex justify-between items-center">
			<?php for ( $i = 0; $i < $countCategories; $i ++ ) : ?>
				<div class="link-slide-work ease-in-out w-full h-3 bg-gray-600 rounded-full opacity-0"></div>
			<?php endfor; ?>
		</div>

		<button id="next-slide-work"
				class="w-8 h-8 rounded-full flex items-center justify-center border-4 bg-white border-scheme-green text-scheme-green">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd"
					  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
					  clip-rule="evenodd"/>
			</svg>
		</button>
	</div>
</div>


<script>
	if (document.getElementById('slide-body-works').children[0] !== undefined) {
		document.getElementById('slide-body-works').children[0].classList.add('slide-work-active')
	}
	if (document.getElementById('slide-nav-works').children[0] !== undefined) {
		document.getElementById('slide-nav-works').children[0].classList.add('slide-nav-active')
	}
</script>
