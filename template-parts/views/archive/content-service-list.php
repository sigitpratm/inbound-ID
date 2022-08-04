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

<?php get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>

	<div class="relative block pt-[5rem] md:pt-[6.5rem] text-gray-600">
		<div class="px-4 lg:px-16 xl:px-20 2xl:px-0 overflow-hidden">
			<img src="<?= jpp_assets( '/img/png/img-bg-01.png' ) ?>" alt=""
				 class="hidden md:block absolute top-52 left-0 z-10 opacity-40">
			<img src="<?= jpp_assets( '/img/png/img-bg-02.png' ) ?>" alt=""
				 class="hidden md:block absolute top-[20%] right-0 z-10 opacity-40">

			<div class="container mx-auto relative z-20">
				<div class="space-y-4 md:space-y-10 py-16 mx-auto w-full md:w-[60%]">
					<p class="text-3xl md:text-5xl text-scheme-green font-bold text-center">LET'S COLLABORATE!</p>
					<div class="text-lg md:text-xl text-center">
						<p>
							Be the right solution to the right audience.
						</p>
						<p>
							Find the perfect-fit digital marketing solution that suits your business.
						</p>
					</div>
					<p class="text-lg md:text-xl text-center">
						Elevate your company’s market value and brand equity using our inbound marketing strategies to
						help
						you retain customers, improve sales targets, and achieve profits.
					</p>
				</div>


				<div>
					<div class="space-y-20 md:space-y-16">
						<?php
						$terms = get_terms( [
								'taxonomy' => 'service-categories',
								'orderby'  => 'ID',
								'order'    => 'ASC',
						] );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
							foreach ( $terms as $key => $term ) : ?>

								<?php if ( $key % 2 == 0 ): ?>
									<div class="flex flex-col md:flex-row  py-0 md:py-16 gap-4 md:gap-24 justify-center items-center">

										<div class="w-full h-[20rem] md:h-[28rem] bg-red-100 rounded-2xl overflow-hidden">
											<?php $img = get_field( 'image', $term ); ?>
											<img src="<?= $img['url'] ?>" alt=""
												 class="w-full h-full object-cover transition duration-300 hover:scale-110">
										</div>

										<div class="w-full h-auto space-y-3 md:space-y-6">
											<p class="text-2xl md:text-4xl text-scheme-green w-full uppercase w-full text-center md:text-left md:w-2/3 font-bold"><?= $term->name ?></p>
											<p class="text-base md:text-xl"><?= $term->description ?></p>

											<div class="space-y-2">
												<?php
												$args      = array(
														'post_type' => 'service',
														'tax_query' => array(
																array(
																		'taxonomy' => 'service-categories',
																		'field'    => 'slug',
																		'terms'    => $term->slug,
																),
														),
												);
												$the_query = new WP_Query( $args );


												// The Loop
												if ( $the_query->have_posts() ) {
													while ( $the_query->have_posts() ) {
														$the_query->the_post(); ?>

														<p class="text-scheme-green text-base md:text-lg font-bold post-service">
															<?= get_the_title() ?>
														</p>

													<?php }
												} else {
													// no posts found
												}
												/* Restore original Post Data */
												wp_reset_postdata();

												?>
											</div>

										</div>
									</div>
								<?php else: ?>
									<div class="flex flex-col md:flex-row  py-0 md:py-16 gap-4 md:gap-24 justify-center items-center">

										<div class="order-2 md:order-1 w-full h-auto space-y-3 md:space-y-6">
											<p class="text-2xl md:text-4xl text-scheme-green w-full uppercase w-full text-center md:text-left md:w-2/3 font-bold"><?= $term->name ?></p>
											<p class="text-base md:text-xl"><?= $term->description ?></p>

											<div class="space-y-2">
												<?php
												$args      = array(
														'post_type' => 'service',
														'tax_query' => array(
																array(
																		'taxonomy' => 'service-categories',
																		'field'    => 'slug',
																		'terms'    => $term->slug,
																),
														),
												);
												$the_query = new WP_Query( $args );


												// The Loop
												if ( $the_query->have_posts() ) {
													while ( $the_query->have_posts() ) {
														$the_query->the_post(); ?>

														<p class="text-scheme-green  text-base md:text-lg font-bold post-service">
															<?= get_the_title() ?>
														</p>

													<?php }
												} else {
													// no posts found
												}
												/* Restore original Post Data */
												wp_reset_postdata();

												?>
											</div>

										</div>

										<div class="order-1 md:order-2 w-full h-[20rem] md:h-[28rem] bg-red-100 rounded-2xl overflow-hidden">
											<?php $img = get_field( 'image', $term ); ?>
											<img src="<?= $img['url'] ?>" alt=""
												 class="w-full h-full object-cover transition duration-300 hover:scale-110">
										</div>
									</div>
								<?php endif; ?>

							<?php
							endforeach;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="relative">
			<div class="grid grid-cols-12 pt-12 md:pt-24 relative z-20 relative">

				<div class="col-span-12 md:col-span-6 rounded-3xl md:rounded-none overflow-hidden">
					<img src="<?= emk_options( 'service-last-section-image', 'url' ) ?>" alt=""
						 class="object-cover w-full">
				</div>

				<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
					<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

						<p class="text-lg xl:text-3xl 2xl:text-5xl font-bold text-scheme-green text-center">
							<?= emk_options( 'service-last-section-heading' ) ?>
						</p>

						<div class="flex flex-col justify-center gap-4">
							<a href="<?= emk_options( 'service-last-section-link-btn1' ) ?>" target="_blank"
							   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
								<?= emk_options( 'service-last-section-text-btn1' ) ?>
							</a>

							<?php
							if ( emk_options( 'show-btn2-service-last-section' ) ) :
								if ( emk_options( 'show-btn2-service-last-section' ) === '1' ):?>
									<a href="<?= emk_options( 'service-last-section-link-btn2' ) ?>" target="_blank"
									   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
										<?= emk_options( 'service-last-section-text-btn2' ) ?>
									</a>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
			<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt=""
				 class="w-full absolute bottom-0 left-0 z-50">
		</div>

	</div>


<?php
get_footer();
