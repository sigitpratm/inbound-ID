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
	<!-- heading -->
	<div>
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">
			<?= emk_options( 'home-last-article-title' ) ?>
		</p>
	</div>

	<?php if ( ! empty( emk_options( "last-article-categories" ) ) ): ?>
		<!-- body -->
		<div class="overflow-hidden relative space-y-8">

			<!-- tab links -->
			<div id="nav-tab-article" class="relative flex flex-row gap-2 overflow-x-auto">
				<?php
				for ( $i = 0; $i < count( $data ); $i ++ ):
					$item = get_term( $data[ $i ] );
					if ( ! empty( $item ) ):
						?>

						<button data-target="<?= $item->slug ?>" data-tab="last-article"
						        data-tab-active="<?= $i === 0 ?>" data-index="<?= $i; ?>"
						        class="flex-none <?= $i === 0 ? "active-btn-article" : "" ?>  btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
							<?= $item->name ?>
						</button>

					<?php endif; ?>
				<?php endfor; ?>
			</div>

			<!-- tab contents -->
			<div id="panel-article-tab">
				<div id="tab-article-seo" data-tab-content="last-article"
				     class="active-tab-article content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">

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
										//excluding the term you dont want.
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
							$meta_query->the_post();

							?>
							<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
								<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
									<img src="<?= get_the_post_thumbnail_url( get_the_ID() ); ?>" alt=""
									     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
								</div>

								<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
									<a href=""
									   class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2 min-h-[50px]">
										<?= get_the_title( get_the_ID() ) ?>
									</a>
									<p class="text-sm md:text-base line-clamp-2 text-scheme-gray line-clamp-2 overflow-y-hidden">
										<?= wp_strip_all_tags( get_the_excerpt() ); ?>
									</p>
									<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
								</div>
							</div>
						<?php }
					}
					wp_reset_postdata();
					wp_reset_query();
					?>
				</div>
			</div>

			<div class="flex items-center justify-center">
				<a href="<?= esc_url( get_page_link( 34 ) ); ?>" target="_blank"
				   class="px-12 py-4 rounded-full border-4 border-scheme-green text-scheme-green transition duration-300 hover:text-white hover:bg-scheme-green font-bold">
					Read More Our Articles
				</a>
			</div>
		</div>

	<?php endif; ?>
</div>
