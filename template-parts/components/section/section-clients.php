<?php
$query = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => - 1,
		'meta_key'       => 'item_type',
		'meta_value'     => 1
) );

$data = $query->posts;

$limit    = 8;
$maxCount = ceil( count( $data ) / $limit );
$arrPost  = [];
for ( $i = 0; $i < $maxCount; $i ++ ) {
	$arrPost[] = array_slice( $data, $i * $limit, $limit );
}

?>

<div class="py-16 md:py-28 relative block space-y-8 xl:space-y-12 2xl:space-y-24">
	<!-- heading -->
	<div>
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">OUR CLIENTS</p>
	</div>

	<!-- body -->
	<div id="body-slider-client" class="w-full overflow-x-hidden flex flex-row">
		<?php $totSlide = intval( emk_options( 'client-select-slide' ) ); ?>
		<?php if ( $totSlide !== 0 ):
			$offsets = 0;
			$limit = 8;
			for ( $i = 0; $i < $totSlide; $i ++ ) :
				for ( $k = 0; $k < $totSlide; $k ++ ): ?>


					<div class="card-slider w-full flex-none overflow-hidden">
						<div class="w-full grid grid-cols-2 md:grid-cols-12 gap-12 md:gap-32">
							<?php for ( $j = 0; $j < count( (array) $arrPost[ $k ] ); $j ++ ):
								$item = $arrPost[ $k ][ $j ] ?>

								<div class="col-span-1 md:col-span-3 h-32 md:h-40 flex items-center justify-center">
									<img src="<?= get_the_post_thumbnail_url( $item->ID ) ?>" alt=""
										 class="object-contain max-h-32 md:max-h-40 h-full w-auto">
								</div>

							<?php endfor; ?>
						</div>
					</div>

				<?php endfor ?>
			<?php endfor ?>
		<?php endif ?>
	</div>


	<!-- footer -->
	<div id="nav-slider-client" class="flex items-center justify-center gap-6 py-6">
		<?php if ( $totSlide !== 0 ): ?>
			<?php for ( $i = 0; $i < $totSlide; $i ++ ) : ?>

				<button class="btn-slider-client w-4 h-4 rounded-full bg-gray-300"></button>

			<?php endfor ?>
		<?php endif ?>
	</div>
</div>

<script>
	document.getElementById('body-slider-client').children[0].classList.add('first-slider-client')
	document.getElementById('nav-slider-client').children[0].classList.add('active-btn-client')
</script>
