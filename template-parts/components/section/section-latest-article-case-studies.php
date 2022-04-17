<?php
$arguments = [
		"category" => [
				[
						"key"   => "seo",
						"label" => "SEO"
				],
				[
						"key"   => "digital-advertising",
						"label" => "Digital Advertising"
				]
		]
];
?>

<?php
$data = emk_options( "case-studies-article-categories" );
?>


<div class="py-16 md:py-28 relative block space-y-8 md:space-y-12">
	<?php if ( ! empty( emk_options( "case-studies-article-categories" ) ) ): ?>
		<!-- body -->
		<div class="overflow-hidden relative space-y-8 px-4">

			<!-- tab links -->
			<div id="nav-tab-article"
				 class="relative flex flex-row gap-2 md:items-center md:justify-center overflow-x-auto">
				<?php
				for ( $i = 0; $i < count( $data ); $i ++ ):
					$item = get_term( $data[ $i ] );
					if ( ! empty( $item ) ):
						?>

						<button data-target="<?= $item->slug ?>" data-tab="last-article"
								data-tab-active="<?= $i === 0 ?>" data-index="<?= $i; ?>"
								class="flex-none <?= $i === 0 ? "active-btn-article" : "" ?>  btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-2 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
							<?= $item->name ?>
						</button>

					<?php endif; ?>
				<?php endfor; ?>
			</div>

			<!-- tab contents -->
			<div id="panel-article-tab">
				<div id="tab-article-seo" data-tab-content="last-article-studies"
					 class="active-tab-article content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">

					<!-- card -->
					<?php
					$args       = array(
							'post_status'    => 'publish',
							'posts_per_page' => 4,
							'post_type'      => 'post',
							'meta_query'     => array(
									'relation' => 'AND',
									array(
											'key'     => 'content_type',
											'value'   => 1,
											'compare' => 'IN',
									),
									array(
											'key'     => 'case_studies',
											'value'   => '1',
											'compare' => '=',
									),
							),
					);
					$meta_query = new WP_Query( $args );
					$meta_query->set( 'posts_per_page', 3 );
					$meta_query->set( 'paged', 1 );
					$meta_query->query( $meta_query->query_vars );


					if ( $meta_query->have_posts() ) {
						//Define and empty array
						$data = array();
						// Store each post's title in the array
						while ( $meta_query->have_posts() ) {
							$meta_query->the_post();

							?>
							<div class="col-span-1 md:col-span-3 rounded-2xl md:rounded-2xl overflow-hidden transition duration-300 flex flex-row md:block">
								<div class="h-full w-[80rem] md:w-auto xl:h-52 2xl:h-60 overflow-hidden bg-black">
									<img src="<?= get_the_post_thumbnail_url( get_the_ID() ); ?>" alt=""
										 class="object-cover w-full h-full xl:h-52 2xl:h-60 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
								</div>

								<div class="py-4 px-4 md:px-0 flex flex-col items-start justify-center gap-2 md:gap-4">
									<p class="uppercase font-bold text-sm md:text-xl text-gray-500">
										<?php
										$categories = get_the_category();
										if ( ! empty( $categories ) ) {
											echo esc_html( $categories[0]->name );
										} else {
											echo esc_html( "Uncategories" );
										}
										?>
									</p>
									<a href=""
									   class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2 min-h-[50px]">
										<?= get_the_title( get_the_ID() ) ?>
									</a>
									<p class="text-sm md:text-base line-clamp-2 text-gray-600 line-clamp-2 overflow-y-hidden">
										<?= wp_strip_all_tags( get_the_excerpt() ); ?>
									</p>
									<a href=""
									   class="text-sm md:text-base text-scheme-green font-bold flex items-center justify-center">
										<span>View more</span>
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
											 fill="currentColor">
											<path fill-rule="evenodd"
												  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
												  clip-rule="evenodd"/>
										</svg>
									</a>
								</div>
							</div>
						<?php }
					}
					wp_reset_postdata();
					wp_reset_query();
					?>
				</div>
			</div>
		</div>

	<?php endif; ?>
</div>
