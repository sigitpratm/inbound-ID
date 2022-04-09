<?php
$AllPost = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => emk_options( 'home-awards-count-post' ),
		'cat'            => 5,
		'orderby'        => 'ID',
		'order'          => 'DESC',
) );
?>

<div class="py-16 md:py-28 relative block xl:space-y-12 2xl:space-y-24">
	<!-- heading -->
	<div class="space-y-4">
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">
			<?= emk_options( 'home-awards-title' ) ?>
		</p>
	</div>

	<!-- body -->
	<div class="w-full overflow-x-hidden flex flex-row">

		<div class="card-slider w-full flex-none overflow-hidden">
			<div class="w-full grid grid-cols-2 md:grid-cols-10 gap-6 md:gap-16">


				<?php if ( $AllPost->have_posts() ) : ?>
					<?php while ( $AllPost->have_posts() ) : $AllPost->the_post(); ?>

						<div class="grid-cols-1 md:col-span-2 space-y-2">
							<div class="h-72 flex items-center justify-center">
								<img src="<?= get_the_post_thumbnail_url( $AllPost->ID ) ?>" alt=""
								     class="object-contain max-h-72 h-full w-auto">
							</div>
							<div>
								<p class="text-lg font-bold text-scheme-green text-center">
									<?= get_the_title() ?>
								</p>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>


			</div>
		</div>
	</div>
</div>
