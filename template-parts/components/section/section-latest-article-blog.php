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
//$data = array_reverse( array( emk_options( "last-article-categories" ) ) );
$data = emk_options( "last-article-categories" );
?>

<div class="py-16 md:py-28 relative block space-y-8 md:space-y-12">
	<?php if ( ! empty( emk_options( "last-article-categories" ) ) ): ?>
		<!-- body -->
		<div class="overflow-hidden relative space-y-8">

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
				<div id="tab-article-seo" data-tab-content="last-article"
					 class="active-tab-article content-tab-article grid grid-cols-3 gap-4 md:gap-8">

					<!-- card -->
					<?php
					$args       = array(
							'post_type'      => "post",
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
							'paged'          => 1,
							'posts_per_page' => 3,
							"tax_query"      => [
									[
											'taxonomy' => "category",
											'field'    => "slug",
											'terms'    => get_term( $data[0] )->slug,
											'operator' => 'IN',
									]
							]
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
							$meta_query->the_post(); ?>


							<div class="col-span-3 md:col-span-1 bg-white rounded-3xl overflow-hidden text-gray-500">
								<div class="flex flex-col">
									<div class="h-[180px] md:h-xl:h-[200px] xl:h-[230px] 2xl:h-[300px] bg-red-100 overflow-hidden">
										<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
											 class="object-cover w-full h-full transition duration-500 hover:scale-105">
									</div>
									<div class="px-6 py-4 md:px-8 md:py-6 space-y-4 xl:space-y-4 2xl:space-y-6">
										<p class="line-clamp-2 text-scheme-green font-bold text-xl xl:text-2xl 2xl:text-3xl">
											<a href="<?= get_the_permalink() ?>">
												<?= get_the_title() ?>
											</a>
										</p>
										<p class="line-clamp-3 text-sm xl:text-sm 2xl:text-base">
											<?= wp_strip_all_tags( get_the_excerpt() ) ?>
										</p>
										<div>
											<a href="<?= get_the_permalink() ?>"
											   class="">
												<span class="font-bold text-lg text-scheme-green">Read more</span>
											</a>
										</div>
									</div>
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
