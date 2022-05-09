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

<?php //get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>


	<div class="relative block pt-[5rem] md:pt-[6.5rem] text-gray-600 pb-40 md:pb-[32rem] px-4 md:px-0 overflow-hidden">
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
					Elevate your company’s market value and brand equity using our inbound marketing strategies to help
					you retain customers, improve sales targets, and achieve profits.
				</p>
			</div>

			<div>
				<div class="space-y-20 md:space-y-16">
					<?php
					$terms = get_terms( 'service-categories' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
						foreach ( $terms as $key => $term ) : ?>

							<?php if ( $key % 2 == 0 ): ?>
								<div class="flex flex-col md:flex-row  py-0 md:py-16 gap-4 md:gap-24 justify-center items-center">

									<div class="w-full h-[20rem] md:h-[28rem] bg-red-100 rounded-2xl overflow-hidden">
										<?php $img = get_field( 'image', $term ); ?>
										<img src="<?= $img['url'] ?>" alt="" class="w-full h-full object-cover">
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
										<img src="<?= $img['url'] ?>" alt="" class="w-full h-full object-cover">
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

		<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-50">
	</div>


<?php
get_footer();
