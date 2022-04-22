<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

?>

<article id="post-<?php the_ID(); ?>"
		 class="col-span-1 md:col-span-6 border border-gray-200 bg-white rounded-xl p-4 transition duration-200 hover:shadow-md min-h-[12rem] md:min-h-[14rem]">
	<div class="flex items-start justify-center gap-4">
		<div class="w-[52rem] w-[52rem] overflow-hidden rounded-lg border">
			<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
				 class="w-full h-full object-cover transition ease-in-out duration-300 hover:scale-110">
		</div>

		<div class="space-y-2">
			<div>
				<p class="line-clamp-2 font-bold text-xl md:text-2xl text-scheme-dark-green">
					<a href="<?= get_the_permalink() ?>">
						<?= the_title() ?>
					</a>
				</p>
				<div class="flex items-center justify-start text-gray-500 gap-1 font-bold text-sm md:text-base">
					<p class="capitalize"><?php echo str_replace( '-', ' ', get_post_type() ); ?></p>
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
						 viewBox="0 0 20 20"
						 fill="currentColor">
						<path fill-rule="evenodd"
							  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
							  clip-rule="evenodd"/>
					</svg>
					<p><?= get_the_date() ?></p>
				</div>
			</div>
			<p class="line-clamp-3 text-gray-400 text-sm md:text-base"><?= get_the_excerpt() ?></p>
			<div class="flex items-center justify-start gap-1 text-scheme-green">
				<?php if ( 'podcast' === get_post_type() ) : ?>
					<?php if ( get_field( 'spotify_url' ) === null ) : ?>
						<a href="<?= get_field( 'youtube_url' ) ?>" target="_blank"
						   class="font-bold">
							View more
						</a>
					<?php else : ?>
						<a href="<?= get_field( 'spotify_url' ) ?>" target="_blank"
						   class="font-bold">
							View more
						</a>
					<?php endif; ?>

				<?php else : ?>
					<a href="<?= get_the_permalink() ?>" class="font-bold">View more</a>
				<?php endif; ?>

				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
					 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
		</div>

	</div>
</article>
