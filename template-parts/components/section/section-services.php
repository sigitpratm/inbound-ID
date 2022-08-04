<?php
$originData = emk_options( 'select-category-service' );
$dataSorted = array_map( 'intval', $originData );
sort( $dataSorted, SORT_NUMERIC );
$categories = $dataSorted;


if ( $categories !== null ) {
	$output = array_slice( $categories, 0, 5 );
}
if ( $output !== null ) {
	$countCategories = count( $output );
}
?>

<pre>

	<?php
	//	$test = array_map( 'intval', $categories );
	//	sort($test, SORT_NUMERIC);
	//	print_r($test);
	?>

	<?php


	//	var_dump( $categories );
	//
	//	$string = "1,2,3";
	//	$ids    = explode( ',', $string );
	//	var_dump( $string );
	//
	//	$integerIDs = array_map('intval', explode(',', $string));
	//
	//	var_dump( $integerIDs );

	?>
</pre>

<div class="py-28 space-y-12">

	<div class="space-y-4 mb-8">
		<p class="font-bold text-center text-5xl text-scheme-green"><?= emk_options( 'service-section-heading' ) ?></p>
		<p class="text-center text-lg"><?= emk_options( 'service-section-subheading' ) ?></p>
	</div>

	<div class="w-full relative">
		<!-- INDICATOR TOP  -->
		<div class=" flex flex-row items-center justify-center relative">
			<!-- indicator top  -->
			<div class="top-indicator-service w-full h-2 bg-gray-700 rounded-full opacity-0 indicator-top-active-service"></div>
			<div class="top-indicator-service w-full h-2 bg-gray-700 rounded-full opacity-0"></div>
			<div class="top-indicator-service w-full h-2 bg-gray-700 rounded-full opacity-0"></div>
			<div class="top-indicator-service w-full h-2 bg-gray-700 rounded-full opacity-0"></div>
			<div class="top-indicator-service w-full h-2 bg-gray-700 rounded-full opacity-0"></div>

			<!-- line -->
			<div class="w-full max-w-6xl h-1 bg-gray-700 mx-auto absolute top-1/4 left-1/5 rounded-full"></div>
		</div>

		<!-- NAV BUTTON -->
		<div id="nav-btn-service"
			 class="pt-8 flex items-center justify-start md:justify-center overflow-x-auto relative gap-4 md:gap-8">

			<?php
			$query = new WP_Query( array(
					'post_type'      => 'service',
					'posts_per_page' => 8,
					'category'       => '',
			) );

			$terms = get_terms( [
					'taxonomy' => 'service-categories',
					'orderby'  => 'ID',
					'order'    => 'ASC',
			] ); ?>


			<?php foreach ( $terms as $term ) : ?>
				<div class="xl:w-[210px] 2xl:w-[240px] relative flex-none">
					<div class="flex items-center flex-col">
						<button
								class="active-btn-service button-indicator w-full h-auto min-h-[52px] md:min-h-[80px] md:min-h-auto py-2 px-4 xl:px-8 2xl:px-8 bg-scheme-gray rounded-full text-white text-base xl:text-sm 2xl:text-lg ">
							<?= $term->name ?>
						</button>
						<div class="bottom-indicator-service h-12 w-1 bg-gray-400 opacity-0 indicator-bottom-active-service ">
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>


		<!-- CONTENT -->
		<div class="px-4 pt-4 pb-16 md:px-10 md:pt-10 md:pb-20 rounded-2xl md:rounded-[4rem] border-4 border-scheme-green flex flex-row overflow-hidden">

			<?php
			if ( $countCategories !== null || $countCategories !== 0 ) :

				for ( $i = 0; $i < $countCategories; $i ++ ) :

					$args = array(
							'post_type'      => 'service',
							'posts_per_page' => - 1,
							'tax_query'      => array(
									array(
											'taxonomy' => 'service-categories',
											'field'    => 'id',
											'terms'    => $categories[ $i ],
									),
							),
					);

					$the_query = new WP_Query( $args );
					?>

					<div id="service<?= $i ?>" class="tabs content-tab-service hidden" data-tab="service<?= $i ?>"
						 style="display: none;">
						<div class="grid grid-cols-12 gap-4">

							<?php if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) :
									$the_query->the_post(); ?>

									<div class="col-span-6 md:col-span-3 bg-gray-300 rounded-2xl w-full overflow-hidden min-h-[12rem] md:min-h-[20rem]">
										<div class="relative">
											<img src="<?= get_field( 'icon' ) ?>" alt=""
												 class="w-6 h-6 md:w-12 md:h-12 absolute top-4 left-4 md:top-6 md:left-6">
											<img src="<?php echo jpp_assets( 'img/png/clip-art-top-service.png' ) ?>"
												 alt="img-heading" class="w-full h-20 md:h-32">
										</div>

										<div class="flex items-center justify-center px-8 pt-4 pb-8">
											<p class="text-base md:text-3xl font-bold text-center uppercase text-scheme-dark-green"><?= get_the_title() ?></p>
										</div>
									</div>

								<?php endwhile; ?>
							<?php else : ?>
								<p class="col-span-6 text-center text-2xl text-gray-400">no posts yet</p>
							<?php endif;
							wp_reset_postdata(); ?>
						</div>
					</div>

				<?php endfor; ?>
			<?php endif; ?>
		</div>

		<div class="absolute -bottom-6 left-0 w-full">
			<div class="flex items-center justify-center">
				<a href="<?= get_post_type_archive_link( 'service' ); ?>"
				   class="text-sm md:text-base font-bold py-4 px-6 md:px-8 rounded-full border-2 border-scheme-green bg-scheme-light-gray text-scheme-dark-green transition duration-200 hover:bg-scheme-dark-green hover:text-white">
					Learn more about our service
				</a>
			</div>
		</div>

	</div>

</div>

