<?php
$categories      = emk_options( 'select-category-service' );
$countCategories = count( $categories );
?>


<div class="py-28 space-y-12">

	<div class="space-y-4 mb-8">
		<p class="font-bold text-center text-5xl text-scheme-green">OUR SERVICES</p>
		<p class="text-center text-lg">Find the perfect-fit digital marketing solution that suits your business.</p>
	</div>

	<div class="w-full">
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
		<div id="nav-btn-service" class="pt-8 flex items-center justify-center overflow-x-auto relative gap-8">

			<?php
			$query   = new WP_Query( array(
					'post_type'      => 'service',
					'posts_per_page' => 8,
					'category'       => ''
			) );

			for ( $i = 0; $i < $countCategories; $i ++ ) : $catItems = $categories[ $i ];
				$cat = get_term_by( 'id', $catItems, 'service-categories' ) ?>
				<div class="xl:w-[210px] 2xl:w-[240px] relative flex-none">
					<div class="flex items-center flex-col">
						<button
								class="active-btn-service button-indicator w-full h-auto min-h-[80px] md:min-h-auto py-2 px-4 xl:px-8 2xl:px-8 bg-scheme-gray rounded-full text-white text-base xl:text-sm 2xl:text-lg ">
							<?= $cat->name ?>
						</button>
						<div class="bottom-indicator-service h-12 w-1 bg-gray-400 opacity-0 indicator-bottom-active-service ">
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>


		<!-- CONTENT -->
		<div class="p-4 md:p-10 rounded-2xl md:rounded-[4rem] border-4 border-scheme-green flex flex-row overflow-hidden">

			<?php
			for ( $i = 0; $i < $countCategories; $i ++ ) {

				$args      = array(
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
				$the_query = new WP_Query( $args ); ?>
				<div id="service<?= $i ?>" class="tabs content-tab-service hidden" data-tab="service<?= $i ?>"
					 style="display: none;">

					<?php if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							echo '<p>' . get_the_title() . '</p>';
						}
					} else {
						echo "no posts found";
					}
					wp_reset_postdata(); ?>

				</div>


			<?php } ?>


		</div>

	</div>
</div>

