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

<?php if ( $postType === 'case-study' ): ?>
	<div class="py-[6.5rem] w-full px-4 lg:px-16 xl:px-20 2xl:px-0 mx-auto z-30 relative pb-16 text-scheme-gray-text relative">
		<div class="container mx-auto space-y-16 md:space-y-24">

			<!-- content top -->
			<div class="pt-4 md:pt-20 space-y-4 text-center">
				<h1 class="text-3xl md:text-4xl font-bold text-scheme-green">
					<?= get_the_title() ?>
				</h1>
				<p class="font-bold text-gray-600 text-lg md:text-xl">
					<?php
					$studyCat = get_the_terms( get_the_ID(), 'case-study-category' );
					if ( $studyCat !== null || $studyCat !== '' ) {
						echo $studyCat[0]->name;
					}
					?>
				</p>
				<p class="text-xl leading-relaxed md:leading-9 mx-auto w-full md:w-2/3">
					<?php
					if ( get_field( 'study_summary' ) !== null || get_field( 'study_summary' ) !== '' ) {
						echo get_field( 'study_summary' );
					}
					?>
				</p>
			</div>

			<!-- image brand -->
			<div class="w-2/3 md:w-1/3 mx-auto">
				<?php if ( get_field( 'icon_brand_study' ) !== null || get_field( 'icon_brand_study' ) !== '' ) : ?>
					<img src="<?= get_field( 'icon_brand_study' ) ?>" alt="logo-brand" class="w-full">
				<?php endif; ?>
			</div>

			<!-- case study -->
			<div class="space-y-6 md:space-y-12">
				<div class="text-center space-y-6">
					<p class="text-3xl md:text-4xl font-bold text-scheme-green">
						Case Study
					</p>
					<p class="md:w-2/3 mx-auto text-lg md:text-xl leading-relaxed md:leading-9">
						<?php if ( get_field( 'icon_brand_study' ) !== null || get_field( 'icon_brand_study' ) !== '' ) {
							echo get_field( 'study_description' );
						} ?>
					</p>
				</div>

				<div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-20">
					<?php
					$dataFirst  = get_field( 'second_improvement' );
					$dataSecond = get_field( 'second_improvement' );

					if ( $dataFirst !== null && $dataSecond !== null ) { ?>
						<div class="w-auto h-auto text-center space-y-2 md:space-y-6">
							<p class="text-4xl md:text-7xl font-bold text-scheme-green">
								<?= get_field( 'first_improvement' ) ?>
							</p>
							<p class="text-xl md:text-xl">
								<?= get_field( 'first_improvement_data' ) ?>
							</p>
						</div>

						<div class="w-auto h-auto text-center space-y-2 md:space-y-6">
							<p class="text-4xl md:text-7xl font-bold text-scheme-green">
								<?= get_field( 'second_improvement' ) ?>
							</p>
							<p class="text-xl md:text-xl">
								<?= get_field( 'second_improvement_data' ) ?>
							</p>
						</div>
					<?php } else { ?>
						<div class="w-full h-auto text-center font-bold text-scheme-green space-y-2">
							<p class="text-xl md:text-2xl">
								<?= get_field( 'first_improvement' ) ?>
							</p>
							<p class="text-4xl md:text-7xl">
								<?= get_field( 'first_improvement_data' ) ?>
							</p>
						</div>
					<?php } ?>
				</div>
			</div>

			<!-- the story -->
			<div class="w-full flex flex-col md:flex-row items-start gap-6 md:gap-16">
				<div class="w-full h-auto space-y-4 pt-8">
					<p class="text-3xl text-center md:text-left md:text-4xl font-bold text-scheme-green">
						The Story
					</p>
					<p class="text-center md:text-left text-lg md:text-xl leading-relaxed md:leading-9">
						<?= get_field( 'story_description' ) ?>
					</p>
				</div>

				<div class="w-full h-auto">
					<div class="w-full h-72 md:h-[26rem] bg-red-200 rounded-xl overflow-hidden">
						<img src="<?= get_field( 'story_image' ) ?>" alt="image-story"
							 class="w-full h-full object-cover">
					</div>
				</div>
			</div>

			<!-- the goal -->
			<div class="text-center space-y-4">
				<p class=" text-3xl md:text-4xl font-bold text-scheme-green">
					The Goal
				</p>
				<p class="text-xl md:text-2xl font-bold uppercase">
					<?= get_field( 'goal_title' ) ?>
				</p>
				<p class="text-xl w-full md:w-2/3 mx-auto leading-relaxed md:leading-9">
					<?= get_field( 'goal_description' ) ?>
				</p>
			</div>

			<!-- the solution -->
			<div class="space-y-2 md:space-y-16">
				<div class="text-center space-y-2 md:space-y-6">
					<p class="text-3xl md:text-4xl font-bold text-scheme-green">
						The Solution
					</p>
					<p class="font-bold text-lg md:text-xl">
						<?php
						$studyCat = get_the_terms( get_the_ID(), 'case-study-category' );
						if ( $studyCat !== null || $studyCat !== '' ) {
							echo $studyCat[0]->name;
						}
						?>
					</p>
				</div>

				<div class="w-full h-auto flex flex-col md:flex-row items-start gap-4 md:gap-16">
					<div class="w-full h-auto md:h-full md:min-h-[26rem] flex items-center justify-center space-y-4 md:pt-8">
						<p class=" text-lg text-center md:text-left md:text-xl leading-relaxed md:leading-9">
							<?= get_field( 'solution_description' ) ?>
						</p>
					</div>

					<div class="w-full h-auto">
						<div class="w-full h-72 md:h-[26rem] bg-red-200 rounded-xl overflow-hidden">
							<img src="<?= get_field( 'solution_image' ) ?>" alt="image-story"
								 class="w-full h-full object-cover">
						</div>
					</div>
				</div>
			</div>

			<!-- the results -->
			<div>
				<div class="w-full h-auto flex flex-col-reverse md:flex-row items-start gap-6 md:gap-16">
					<div class="w-full h-auto">
						<div class="w-full h-72 md:h-[26rem] bg-red-200 rounded-xl overflow-hidden">
							<img src="<?= get_field( 'results_image' ) ?>" alt="image-story"
								 class="w-full h-auto md:h-full object-cover">
						</div>
					</div>

					<div class="w-full h-auto md:h-full md:min-h-[26rem] flex flex-col items-center md:items-start justify-start md:justify-center space-y-4 md:space-y-6">
						<p class="text-center md:text-left text-4xl text-scheme-green font-semibold">
							The Results
						</p>

						<p class="text-center md:text-left text-2xl md:text-4xl font-bold text-scheme-green">
							<?= get_field( 'results_title' ) ?>
						</p>

						<p class="text-center md:text-left text-lg md:text-xl leading-relaxed md:leading-9">
							<?= get_field( 'results_description' ) ?>
						</p>
					</div>
				</div>
			</div>

			<!-- the services -->
			<div class="text-center space-y-6">
				<p class="text-4xl font-bold text-scheme-green">
					Services Used
				</p>

				<?php
				$rows = get_field( 'item_service' );
				if ( $rows ) : ?>
					<div class="flex items-start justify-center gap-6">
						<?php foreach ( $rows as $row ) : ?>

							<div class="w-80 flex flex-col items-center justify-center gap-4">
								<div class="w-full rounded-xl py-8 md:py-16 text-white bg-scheme-green font-bold text-lg md:text-xl uppercase">
									<p>
										<?= $row['name_service'] ?>
									</p>
								</div>

								<p class="text-lg md:px-8">
									<?= $row['effect_service'] ?>
								</p>
							</div>

						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- testimonies -->
			<div class="space-y-6 md:space-y-12">
				<p class="text-center text-4xl font-bold text-scheme-green">
					TESTIMONIES
				</p>

				<div class="flex flex-col md:flex-row items-center justify-center gap-4 md:gap-20">
					<div class="w-full">
						<p class="text-lg md:text-xl text-center md:text-left leading-relaxed md:leading-9">
							<?= get_field( 'testimony_text' ) ?>
						</p>
					</div>

					<div class="w-full flex flex-col md:flex-row items-center md:items-center justify-center md:justify-center gap-6 md:gap-0">
						<div class="w-36 md:w-72 h-36 md:h-44 mx-auto md:mx-0 overflow-hidden">
							<img src="<?= get_field( 'testimony_image' ) ?>" alt="image-testimony"
								 class="w-36 md:w-44 h-36 md:h-44 object-cover rounded-full">
						</div>
						<div class="w-full space-y-2 md:space-y-4 text-xl text-center md:text-left">
							<p class="font-bold uppercase">
								<?= get_field( 'testimony_name' ) ?>
							</p>
							<p class="w-full md:w-1/2">
								<?= get_field( 'testimony_role' ) ?>
							</p>
						</div>
					</div>
				</div>

				<a href="<?= get_permalink( get_page_by_path( 'case-studies' ) ); ?>"
				   class="flex items-center justify-center text-gray-500 font-bold gap-4 pt-8 md:pt-16">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd"
							  d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
							  clip-rule="evenodd"/>
					</svg>
					<span>
						BACK TO CASE STUDIES
					</span>
				</a>
			</div>

		</div>
	</div>

	<div class="relative">
		<!-- last section -->
		<div class="grid grid-cols-12 pt-4 md:pt-24 relative z-30">

			<div class="col-span-12 md:col-span-6">
				<img src="<?= emk_options( 'case-studies-last-section-image', 'url' ) ?>" alt=""
					 class="object-cover w-full">
			</div>

			<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
				<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

					<p class="text-lg xl:text-3xl 2xl:text-5xl font-bold text-scheme-green text-center">
						<?= emk_options( 'heading-case-studies-last-section' ) ?>
					</p>

					<div class="flex flex-col justify-center gap-4">
						<a href="<?= emk_options( 'case-studies-last-section-link-btn2' ) ?>" target="_blank"
						   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
							<?= emk_options( 'case-studies-last-section-text-btn1' ) ?>
						</a>

						<?php
						if ( emk_options( 'show-btn2-case-studies-last-section' ) ) :
							if ( emk_options( 'show-btn2-case-studies-last-section' ) === '1' ):?>
								<a href="<?= emk_options( 'case-studies-last-section-link-btn2' ) ?>" target="_blank"
								   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
									<?= emk_options( 'case-studies-last-section-text-btn2' ) ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>

		</div>
		<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute w-full bottom-0 z-50">
	</div>
<?php else : ?>
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
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
										 fill="currentColor">
										<path fill-rule="evenodd"
											  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
											  clip-rule="evenodd"/>
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
<?php endif; ?>


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
