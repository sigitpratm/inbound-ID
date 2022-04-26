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
$categories   = [ emk_options( 'blog-herobanner-select-article' ) ];
$count_slider = emk_options( 'hero-banner-blog-total-slider' );

$query_slider = new WP_Query( array(
		'post_type'      => 'post',
		'meta_key'       => 'content_type',
		'meta_value'     => 1,
		'posts_per_page' => $count_slider,

) );
?>

<?php get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>


	<div class="pt-16 md:pt-[6.5rem] relative overflow-hidden">

		<img src="<?= jpp_assets( '/img/png/img-bg-01.png' ) ?>" alt=""
			 class="hidden md:block absolute top-52 left-0 opacity-50">
		<img src="<?= jpp_assets( '/img/png/img-bg-02.png' ) ?>" alt=""
			 class="hidden md:block absolute top-[20%] right-0 opacity-80 z-10">

		<div class="container mx-auto px-4 xl:px-12 2xl:px-0 relative z-20">
			<div id="body-slider-inbound-blog" class="body-slider-inbound-blog w-full overflow-x-hidden flex flex-row">

				<?php if ( $query_slider->have_posts() ) : ?>

					<?php while ( $query_slider->have_posts() ) : $query_slider->the_post(); ?>

						<div class="card-slider w-full flex-none overflow-hidden">
							<div class="grid grid-cols-1 md:grid-cols-12 py-4 xl:py-8 2xl:py-12 gap-4 md:gap-0">

								<div class="order-2 md:order-1 col-span-1 md:col-span-6 w-full h-full flex flex-col items-center md:items-start justify-center w-full md:w-4/5 gap-4 md:gap-8">
									<div class="flex items-center gap-2 text-sm md:text-xl">
										<p class="font-bold uppercase text-gray-600">
											<?php
											$categories = get_the_category();
											if ( ! empty( $categories ) ) {
												echo esc_html( $categories[0]->name );
											} else {
												echo esc_html( "Uncategories" );
											}
											?>
										</p>
										<p class="text-gray-600">&#9679;</p>
										<p>
											<?= get_the_date() ?>
										</p>
									</div>
									<p class="text-3xl md:text-5xl font-bold text-scheme-green line-clamp-3 text-center md:text-left">
										<a href="<?= get_the_permalink() ?>">
											<?= get_the_title() ?>
										</a>
									</p>
									<p class="text-base md:text-xl line-clamp-4 leading-7 md:leading-8 text-center md:text-left">
										<?= get_the_excerpt() ?>
									</p>
									<div>
										<a href="<?= get_the_permalink() ?>"
										   class="text-xl text-scheme-green font-bold flex flex-row  items-center gap-2">
											<span>Read More</span>
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
												 viewBox="0 0 24 24"
												 stroke="currentColor" stroke-width="2">
												<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
											</svg>
										</a>
									</div>
								</div>

								<div class="order-1 md:order-2 col-span-1 md:col-span-6 h-[16rem] xl:h-[36rem] 2xl:h-[44rem]">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt="img-slider"
										 class="h-[16rem] xl:h-[36rem] 2xl:h-[44rem] w-full object-cover rounded-3xl">
								</div>

							</div>
						</div>


					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				<?php else : ?>

					<p><?php __( 'Article Not Found' ); ?></p>

				<?php endif; ?>


			</div>

			<div id="body-nav-slider-inbound-blog" class="flex items-center justify-center gap-6">
				<?php for ( $i = 0; $i < $count_slider; $i ++ ) : ?>
					<button class="btn-slider-inbound-blog w-4 h-4 rounded-full bg-gray-300"></button>
				<?php endfor; ?>
			</div>

		</div>

		<div class="container mx-auto px-4 xl:px-12 2xl:px-0 relative z-30">
			<?php get_template_part( 'template-parts/components/section/section-latest-article-blog', get_post_type() ) ?>
		</div>


		<!-- last section -->
		<div class="grid grid-cols-12 pt-4 md:pt-24 relative z-20 relative">

			<div class="col-span-12 md:col-span-6">
				<img src="<?= emk_options( 'blog-last-section-image', 'url' ) ?>" alt="" class="object-cover w-full">
			</div>

			<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
				<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

					<p class="text-lg xl:text-3xl 2xl:text-4xl font-bold text-scheme-green text-center">
						<?= emk_options( 'heading-blog-last-section' ) ?>
					</p>

					<div class="flex flex-col justify-center gap-4">
						<a href="<?= emk_options( 'blog-last-section-link-btn2' ) ?>" target="_blank"
						   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
							<?= emk_options( 'blog-last-section-text-btn1' ) ?>
						</a>

						<?php
						if ( emk_options( 'show-btn2-blog-last-section' ) ) :
							if ( emk_options( 'show-btn2-blog-last-section' ) === '1' ):?>
								<a href="<?= emk_options( 'blog-last-section-link-btn2' ) ?>" target="_blank"
								   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
									<?= emk_options( 'blog-last-section-text-btn2' ) ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>

		</div>
		<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-50">

	</div>

	<script>
		document.getElementById('body-slider-inbound-blog').children[0].classList.add('first-slider-inbound-blog')
		document.getElementById('body-nav-slider-inbound-blog').children[0].classList.add('active-btn-inbound-blog')
	</script>

<?php
get_footer();
