<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package awps
 */

get_header(); ?>


	<div class="pt-[5rem] md:py-[6.5rem] w-full lg:px-16 xl:px-12 2xl:px-0 mx-auto z-30 relative">
		<div class="container mx-auto">
			<section id="primary" class="space-y-8 px-4">
				<!-- heading -->
				<header>
					<h1 class="page-title font-bold text-gray-600 text-2xl md:text-3xl">
						<?php
						printf(
						/* translators: %s: Search Term. */
								esc_html__( 'Search Results for: %s', __TEXT_DOMAIN__ ),
								'<span class="text-scheme-dark-green">' . get_search_query() . '</span>'
						);
						?>
					</h1>
				</header>

				<!-- body -->
				<div class="grid grid-cols-1 md:grid-cols-12 gap-4">
					<?php
					if ( have_posts() ):
						while ( have_posts() ): the_post(); ?>

							<?php get_template_part( 'template-parts/views/content', 'search' ) ?>

						<?php endwhile; ?>

						<div class="col-span-1 md:col-span-12 flex py-4 items-center justify-center gap-4">
							<button class="text-scheme-green font-bold text-lg">
								<?php posts_nav_link(); ?>
							</button>
						</div>


					<?php else:
						echo '<p> Post tidak ditemukan </p>';
					endif;
					?>
				</div>
			</section>

		</div>
	</div>


	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="">
<?php
get_footer();
