<?php
$caseTerms = get_terms( array(
		'taxonomy'   => 'case-study-category',
		'hide_empty' => false,
) );

$casePost = get_terms( array(
		'taxonomy'   => 'post',
		'hide_empty' => false,
) );

$catPost  = get_the_category();
$postType = get_post_type();
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>

	<div class="py-[6.5rem] w-full px-4 lg:px-16 xl:px-20 2xl:px-0 mx-auto z-30 relative pb-16">
		<div class="container mx-auto space-y-10">

			<!-- post image -->
			<div class="bg-green-600 w-full h-80 rounded-xl md:rounded-3xl overflow-hidden mt-0 md:mt-8">
				<img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="h-96 w-full object-cover">
			</div>

			<!-- heading -->
			<header class="relative block space-y-10 max-w-5xl mx-auto">
				<div class="text-center flex items-center justify-start gap-4 text-lg font-bold text-gray-600">
					<div class="capitalize flex items-center gap-2">
						<?php
						if ( $postType == "post" ) {
							$main_cat = get_the_category();
							echo $main_cat[0]->name;
						} elseif ( $postType == "case-study" ) {
							$tax = get_the_terms( get_the_ID(), 'case-study-category' );
							echo $tax[0]->name;
						}
						?>
					</div>
					<span>&#8226;</span>
					<p class="font-normal">
						<?= get_the_date() ?>
					</p>
				</div>

				<h1 class="text-left text-3xl md:text-5xl font-bold text-scheme-green mx-auto w-full leading-tight">
					<a href="<?php the_permalink() ?>" rel="bookmark"
					   class=" transition duration-200 hover:text-scheme-dark-green"
					   title="Permanent link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
			</header>

			<!-- content -->
			<div class="h-full h-auto relative">
				<div class="max-w-5xl mx-auto pb-16 text-base md:text-lg text-gray-600">

					<div class="leading-9">
						<?php
						if ( get_the_content() ):

							the_content();

							?>
							<div class="pagination-post">
								<?php wp_link_pages();
								?>
							</div>
						<?php else:
							the_content()
							?>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- share option -->
			<div class="max-w-5xl mx-auto h-[100px]">
				<div class="flex flex-col md:flex-row items-center justify-between text-gray-500 gap-8 md:gap-0">
					<div class="w-full flex items-center justify-start gap-4">
						<p>Share this article</p>
						<button>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
								 stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round"
									  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
							</svg>
						</button>

						<button id="share-copy-link" class="relative">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
								 stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round"
									  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
							</svg>
						</button>

						<a href="https://twitter.com/intent/tweet?text=<?= get_the_permalink() ?>" target="_blank">
							<img src="<?php echo jpp_assets( 'img/png/icTw-gray.png' ) ?>" alt="" class="h-6">
						</a>

						<a href="https://www.facebook.com/share.php?u=<?= get_the_permalink() ?>" target="_blank">
							<img src="<?php echo jpp_assets( 'img/png/icFb-gray.png' ) ?>" alt="" class="h-6">
						</a>

						<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_the_permalink() ?>"
						   target="_blank">
							<img src="<?php echo jpp_assets( 'img/png/icLinked-gray.png' ) ?>" alt="" class="h-6">
						</a>
					</div>

					<?php
					$type      = get_post_type();
					$link      = '';
					$btn_title = '';


					if ( $type == 'post' ) {
						$link      = get_permalink( get_page_by_path( 'inbound-blog' ) );
						$btn_title = 'BACK TO BLOG';
					} elseif ( $type == 'case-study' ) {
						$link      = get_permalink( get_page_by_path( 'case-studies' ) );
						$btn_title = 'BACK TO CASE STUDIES';
					}

					?>
					<div class="w-full">
						<a href="<?= $link ?>" class="w-full flex items-center justify-start md:justify-end gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
								 fill="currentColor">
								<path fill-rule="evenodd"
									  d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
									  clip-rule="evenodd"/>
							</svg>
							<span class="text-right font-bold"><?= $btn_title ?></span>
						</a>
					</div>
				</div>

				<div id="permalink-content" class="my-4 flex items-center justify-start gap-2 hidden permalink-content">
					<button class="text-gray-400 hover:text-gray-600 transition" onclick="funcCopyText()">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
							 stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round"
								  d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
						</svg>
					</button>
					<label class="w-full md:w-1/2">
						<input id="the-permalink" type="text" value="<?= get_the_permalink() ?>"
							   class="w-full text-xs border-none rounded-md">
					</label>
				</div>
			</div>

			<!-- other post -->
			<div class="pt-20 text-gray-600 space-y-8 md:space-y-16">
				<p class="text-lg font-bold text-center">OTHER ARTICLES</p>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-16">
					<?php
					$args      = array(
							'post_type'      => get_post_type(),
							'post_status'    => 'publish',
							'orderby'        => 'rand',
							'order'          => 'DESC',
							'posts_per_page' => 3,
					);
					$the_query = new WP_Query( $args );
					?>

					<?php
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) :
							$the_query->the_post(); ?>

							<div class="space-y-2 md:space-y-4">
								<div class="h-40 md:h-64 overflow-hidden rounded-xl md:rounded-3xl">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
										 class="w-full h-full object-cover transition hover:scale-110 duration-500">
								</div>

								<div class="space-y-2 md:space-y-4">
									<div class="flex items-center justify-start gap-2">
										<p class="font-bold">
											<?php
											if ( $postType == "post" ) {
												$main_cat = get_the_category();
												echo $main_cat[0]->name;
											} elseif ( $postType == "case-study" ) {
												$tax = get_the_terms( get_the_ID(), 'case-study-category' );
												echo $tax[0]->name;
											}
											?>
										</p>
										<span class="text-2xl">&#8226;</span>
										<p><?= get_the_date() ?></p>
									</div>

									<p class="text-scheme-green text-xl md:text-2xl font-bold line-clamp-2">
										<a href="<?= get_permalink() ?>"><?= get_the_title() ?></a>
									</p>
								</div>
								<div class="text-gray-600 font-bold flex items-center">
									<a href="<?= get_permalink() ?>" target="_blank">Read more</a>
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
									</svg>
								</div>
							</div>

						<?php endwhile; ?>
					<?php endif; ?>

				</div>

			</div>


		</div>
	</div>

	<div class="relative block z-50">
		<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="">
	</div>

	<script>
		function funcCopyText() {
			let jsCopy = document.getElementById("the-permalink");
			jsCopy.select();
			jsCopy.setSelectionRange(0, 99999)
			document.execCommand("copy");
			alert("link berhasil di salin")
		}


		let btnLink = document.getElementById('share-copy-link');
		btnLink.addEventListener('click', function () {
			let element = document.getElementById("permalink-content");
			element.classList.toggle("hidden");
		})

	</script>
<?php
get_footer();
