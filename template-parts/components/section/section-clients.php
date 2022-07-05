<?php
$query = new WP_Query( array(
		'post_type'      => 'client',
		'posts_per_page' => - 1,
		'order'          => 'DESC',
		'post_status'    => "publish",
) );

$data = $query->posts;

$limit    = 8;
$maxCount = ceil( count( $data ) / $limit );
$arrPost  = [];
for ( $i = 0; $i < $maxCount; $i ++ ) {
	$arrPost[] = array_slice( $data, $i * $limit, $limit );
}

?>

<div class="py-16 md:py-28 relative block space-y-8 xl:space-y-12 2xl:space-y-16">
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
						<div class="w-full grid grid-cols-2 md:grid-cols-4 gap-12 md:gap-16 xl:gap-20 2xl:gap-24">
							<?php for ( $j = 0; $j < count( (array) $arrPost[ $k ] ); $j ++ ):
								$item = $arrPost[ $k ][ $j ] ?>
								<div class="col-span-1 md:col-span-1 h-auto">
									<img src="<?= get_the_post_thumbnail_url( $item->ID ) ?>" alt=""
										 class="w-full h-full">
								</div>

							<?php endfor; ?>
						</div>
					</div>

				<?php endfor ?>
			<?php endfor ?>
		<?php endif ?>
	</div>


	<!-- footer -->
	<div id="nav-slider-client" class="flex items-center justify-center gap-6">
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
