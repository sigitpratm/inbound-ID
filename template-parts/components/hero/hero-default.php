<div class="relative container mx-auto md:pb-32">
	<div class="w-full overflow-x-hidden flex flex-row">

		<?php
		$arrBanner      = emk_options( 'homepage-banner-post' );
		$countArrBanner = count( $arrBanner );
		for ( $i = 0; $i < count( $arrBanner ); $i ++ ):
			$postItem = $arrBanner[ $i ];
			$data       = get_post( $postItem ); ?>

			<div class="card-slider w-full flex-none xl:h-[38rem] 2xl:h-[50rem] first-slider-hero overflow-hidden">
				<div class="grid grid-cols-12 w-full h-full gap-6 lg:gap-0">
					<!-- CONTENT LEFT -->
					<div class="col-span-12 lg:col-span-5 space-y-6 md:space-y-12 flex justify-between md:justify-start flex-col text-center lg:text-left pt-0 xl:pt-16 2xl:pt-32">
						<?php if ( get_field( 'use_image_banner', $data ) === true ) : ?>
							<div>
								<img src="<?= get_field( 'image_banner', $data ) ?>" alt=""
									 class="xl:w-[24rem] 2xl:w-[32rem] h-auto object-contain">
							</div>
						<?php else: ?>
							<p class="text-4xl xl:text-7xl 2xl:text-8xl font-bold text-white line-clamp-2">
								<?= $data->post_title ?>
							</p>
						<?php endif; ?>


						<p class="text-base lg:text-sm xl:text-base 2xl:text-lg text-white w-full lg:w-4/5 line-clamp-5 leading-7">
							<?= get_field( 'description', $data ) ?>
						</p>

						<div class="text-lg flex flex-col items-start justify-start gap-4 text-scheme-green">
							<?php $cta1 = get_field( 'use_cta_1', $data );
							if ( $cta1 === true ) : ?>
								<a href="<?= get_field( 'cta_1_url', $data ) ?>"
								   class="w-full lg:w-auto min-w-[20rem] py-4 lg:py-4 xl:py-6 bg-white text-scheme-green  lg:text-lg xl:text-xl font-bold rounded-full text-center transition duration-300 hover:shadow-xl">
									<?= get_field( 'cta_1_title', $data ) ?>
								</a>
							<?php endif; ?>

							<?php $cta2 = get_field( 'use_cta_2', $data );
							if ( $cta2 === true ) : ?>
								<a href="<?= get_field( 'cta_2_url', $data ) ?>"
								   class="w-full lg:w-auto min-w-[20rem] py-4 lg:py-4 xl:py-6 bg-white text-scheme-green  lg:text-lg xl:text-xl font-bold rounded-full text-center transition duration-300 hover:shadow-xl">
									<?= get_field( 'cta_2_title', $data ) ?>
								</a>
							<?php endif; ?>
						</div>
					</div>

					<!-- CONTENT RIGHT-->
					<div class="col-span-12 lg:col-span-7 flex items-center">
						<img src="<?= get_the_post_thumbnail_url( $data ) ?>" alt="image-hero"
							 class="h-full">
					</div>
				</div>
			</div>
		<?php endfor; ?>
	</div>


	<div id="nav-slider" class="flex items-center justify-center gap-6 py-6">
		<?php for ( $i = 0; $i < $countArrBanner; $i ++ ) : ?>
			<button class="btn-slider-hero w-4 h-4 rounded-full bg-gray-300"></button>
		<?php endfor; ?>
	</div>
</div>
<script>
	window.addEventListener("DOMContentLoaded", function () {
		document.getElementById('nav-slider').children[0].classList.add("active-btn-hero");
	})

</script>



