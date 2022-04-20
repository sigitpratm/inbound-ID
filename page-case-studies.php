<?php
/**
 * Template Name: Home Page Design
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */
get_header(); ?>


<?php
$tot_slider = emk_options( 'hero-banner-case-studies-total-slider' );

$query_slider = new WP_Query( array(
		'post_type'      => 'case-study',
		'posts_per_page' => $tot_slider,
) );
?>


<?php

$terms = get_terms( array(
		'taxonomy'   => 'case-study-category',
		'hide_empty' => false,
) );

?>


	<div class="pt-16 md:pt-[6.5rem] relative">

		<!-- slider -->
		<div class="container mx-auto px-4 pb-8 md:pb-24">

			<div id="body-slider-case-studies"
				 class="body-slider-case-studies w-full overflow-x-hidden flex flex-row py-4 md:py-0">

				<?php if ( $query_slider->have_posts() ) : ?>

					<?php while ( $query_slider->have_posts() ) : $query_slider->the_post(); ?>

						<div class="card-slider w-full flex-none overflow-hidden">
							<div class="grid grid-cols-1 md:grid-cols-12 xl:py-8 2xl:py-12 gap-4 md:gap-0">

								<div class="order-2 md:order-1 col-span-1 md:col-span-6 w-full h-full flex flex-col  items-center md:items-start justify-center w-full md:w-4/5 gap-2 md:gap-8">
									<div class="flex items-center gap-2 text-lg md:text-2xl text-gray-600 text-center md:text-left">
										<p class="font-bold">
											<?php
											if ( ! empty( $terms ) ) {
												echo esc_html( $terms[0]->name );
											} else {
												echo esc_html( "Uncategories" );
											}
											?>
										</p>
									</div>
									<p class="text-4xl md:text-7xl font-bold text-scheme-green text-center md:text-left">
										<?= get_the_title() ?>
									</p>
									<p class="text-base md:text-xl line-clamp-3 leading-6 md:leading-8 text-center md:text-left">
										<?= get_the_excerpt() ?>
									</p>
									<div>
										<a href="<?= get_the_permalink() ?>"
										   class="text-xl text-scheme-green font-bold flex flex-row  items-center gap-2">
											<span>View more</span>
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
												 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
												<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
											</svg>
										</a>
									</div>
								</div>

								<div class="order-1 md:order-2 col-span-1 md:col-span-6 h-[16rem] lg:h-[20rem] xl:h-[36rem] 2xl:h-[44rem]">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
										 class="h-[16rem] lg:h-[20rem] xl:h-[36rem] 2xl:h-[44rem] w-full object-cover rounded-3xl">
								</div>

							</div>
						</div>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				<?php else : ?>

					<p><?php __( 'Article Not Found' ); ?></p>

				<?php endif; ?>


			</div>


			<div id="body-nav-slider-case-studies" class="flex items-center justify-center gap-6">
				<?php for ( $i = 0; $i < $tot_slider; $i ++ ) : ?>
					<button class="btn-slider-case-studies w-4 h-4 rounded-full bg-gray-300"></button>
				<?php endfor; ?>
			</div>

		</div>

		<!-- last post -->
		<?php
		get_template_part( 'template-parts/views/archive/content', 'case-studies' );
		?>

		<!-- last section -->
		<div class="grid grid-cols-12 relative pt-4 md:pt-24 bg-scheme-light-gray relative z-20 relative">

			<div class="col-span-12 md:col-span-6">
				<img src="<?= emk_options( 'case-studies-last-section-image', 'url' ) ?>" alt=""
					 class="object-cover w-full">
			</div>

			<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
				<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

					<p class="text-lg xl:text-3xl 2xl:text-4xl font-bold text-scheme-green text-center">
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

			<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-20">
		</div>

	</div>

	<script>
		document.getElementById('body-slider-case-studies').children[0].classList.add('first-slider-case-studies')
		document.getElementById('body-nav-slider-case-studies').children[0].classList.add('active-btn-case-studies')
	</script>

<?php
get_footer();
