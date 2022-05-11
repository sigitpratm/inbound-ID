<?php
$query = new WP_Query( array(
		'post_type'      => 'award',
		'posts_per_page' => 5,
		'order'          => 'ASC',
		'post_status'    => "publish",
) );
?>

<div class="py-12 md:py-28 relative block space-y-8 xl:space-y-12 2xl:space-y-24">
	<!-- heading -->
	<div class="space-y-4">
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">
			<?= emk_options( 'home-awards-title' ) ?>
		</p>
	</div>

	<!-- body -->
	<div class="w-full overflow-x-hidden flex flex-row">

		<div class="card-slider w-full flex-none overflow-hidden">
			<!-- parent card awards -->
			<div class="w-full flex md:grid md:grid-cols-10 gap-6 md:gap-20 snap-x md:snap-none overflow-x-auto">

				<?php if ( $query->have_posts() ) : ?>

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>

						<div class="flex-none w-72 md:w-auto md:col-span-2 space-y-6 snap-center md:snap-none">
							<div class="h-40 md:h-60 flex items-end justify-center">
								<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
									 class="object-contain max-h-40 md:max-h-60 h-full w-auto">
							</div>

							<div class="text-sm md:text-lg font-bold text-scheme-green text-center">
								<p class="line-clamp-6 text-base md:text-lg">
									<?= get_the_title() ?>
								</p>
							</div>
						</div>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php else : ?>

					<p><?php __( 'Article Not Found' ); ?></p>

				<?php endif; ?>
			</div>
		</div>

	</div>
</div>
