<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jippi
 */
function jpp_product_screenshot() {
	$screenshots = get_field( 'screenshot', get_the_ID() );
	if ( ! empty( $screenshots ) ) {
		$result = [];
		foreach ( $screenshots as $screenshot ) {
			array_push( $result, $screenshot['url'] );
		}

		return "'" . implode( "','", $result ) . "'";
	}

	return false;
}

$categories = get_the_terms( get_the_ID(), 'product-category' );

?>

<div class="relative bg-white overflow-hidden md:pt-24 md:pb-2 bg-cover bg-no-repeat bg-center"
	 style="background-image: url('<?= jpp_assets( 'img/bg-default.jpg' ) ?>')"
	 x-bind:class="{'shadow-md' : atTop}"
	 xmlns:x-transition="http://www.w3.org/1999/xhtml" xmlns:x-transition="http://www.w3.org/1999/xhtml">
	<div class="max-w-7xl mx-auto mx-auto  z-30">
		<div class="grid grid-cols-2 gap-4">
			<div class=" my-auto max-w-7xl sm:mt-12 md:my-auto sm:px-6 lg:px-8 ">
				<div class="sm:text-center lg:text-left">
					<h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-5xl">
						<span class="block mb-5"><?= get_field( 'name', get_the_ID() ) ?></span>
					</h1>
				</div>
			</div>
			<div class="text-right my-auto px-8 ">
				<?php if ( ! empty( $categories ) && count( $categories ) > 0 ): ?>
					<div class="flex justify-end">
						<?php foreach ( $categories as $category ): ?>
							<a href="<?= get_term_link($category->term_id) ?>"
							   class="ml-2 flex items-center font-medium justify-center px-2 py-1 text-sm rounded-sm text-gray-500
				   bg-gray-100 hover:bg-gray-200 transition duration-300 ">
								<?= $category->name?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
<section class="relative">
	<div class="max-w-5xl mx-auto px-4 sm:px-6 grid md:grid-cols-6 grid-cols-1 gap-6 md:py-24 "
		 x-data="{ openLightbox: false }"
		 @keydown.escape="openLightbox = false">
		<article id="product-<?= get_the_ID()?>" class="md:col-start-1 md:col-end-5 sm:mb-10 relative block overflow-hidden">
			<div class="bg-white relative rounded-lg overflow-hidden mb-16 border border-gray-100 ">
				<div class="relative h-96 block overflow-hidden">
					<img src="<?= get_the_post_thumbnail_url( get_the_ID() ) ?>"
						 class="w-full h-auto block overflow-hidden"/>
				</div>
				<div class="flex justify-center overflow-hidden px-4 py-4 bg-white">
					<a target="_blank" href="<?= get_field( 'demo_url', get_the_ID() ) ?>"
					   class="w-40 text-center  inline mr-2 px-6 py-2 rounded-sm font-medium text-sm rounded-sm text-gray-50 bg-green-600 hover:bg-green-700 uppercase transition duration-300">
						Preview
					</a>
					<button @click="openLightbox = true"
							class="w-40 text-center inline px-6 py-2 rounded-sm font-medium text-sm rounded-sm text-gray-50 bg-yellow-500 hover:bg-yellow-600 uppercase transition duration-300">
						Screenshot
					</button>
				</div>
			</div>


			<div class="fixed top-0 left-0 w-full h-full flex items-center justify-center backdrop-filter backdrop-blur-md"
				 x-transition:enter="transition ease-out duration-300"
				 x-transition:enter-start="opacity-0"
				 x-transition:enter-end="opacity-100"
				 x-transition:leave="transition ease-in duration-300"
				 x-transition:leave-start="opacity-100"
				 x-transition:leave-end="opacity-0"
				 style="display: none; z-index:9999; background-color: rgba(0,0,0,.5);" x-show.transition="openLightbox">
				<div class="flex items-center justify-start w-12 m-2 ml-6 mb-4 md:m-2 z-50 absolute bottom-0 transform translate-x-12 md:translate-x-32">
					<button
							class="text-white w-12 h-12 rounded-full flex items-center justify-center focus:outline-none"
							style="background-color: rgba(0,0,0,.4);"
							@click="openLightbox = false">
						<img src="https://obr.now.sh/remixicon/system/close-fill/64/ffffff" class="w-6 h-6">
					</button>
				</div>
				<div class="h-full w-full flex items-center justify-center overflow-hidden"
					 x-data="{activeSlide: 0, slides: [<?= jpp_product_screenshot() ?>]}">


					<template x-for="(slide, index) in slides" :key="index">
						<div class="h-full w-full flex items-center justify-center absolute">
							<div class="absolute top-0 bottom-0 py-2 md:py-24 px-2 flex flex-col items-center justify-center"
								 x-show="activeSlide === index"
								 x-transition:enter="transition ease-out duration-150"
								 x-transition:enter-start="opacity-0 transform scale-90"
								 x-transition:enter-end="opacity-100 transform scale-100"
								 x-transition:leave="transition ease-in duration-150"
								 x-transition:leave-start="opacity-100 transform scale-100"
								 x-transition:leave-end="opacity-0 transform scale-90">

								<img :src="slide" class="object-contain max-w-full max-h-full rounded shadow-lg"/>
								<div
										class="bg-white rounded-full flex-shrink-0 px-3 py-1 shadow-sm leading-tight text-xs lg:text-sm max-w-sm text-center mx-4 mt-4 hidden md:block"
								>
									Screenshot <span x-text="index + 1"></span>
								</div>
							</div>
							<div class="fixed text-white text-sm font-bold bottom-0 transform -translate-x-10 w-40 h-12 mb-2 hidden md:flex justify-center items-center"
								 x-show="activeSlide === index">
								<span class="w-12 text-right" x-text="index + 1"></span>
								<span class="w-4 text-center">/</span>
								<span class="w-12 text-left" x-text="slides.length"></span>
							</div>
						</div>
					</template>

					<div class="fixed z-30 bottom-0 mb-4 md:mb-2 transform -translate-x-8 md:-translate-x-10 flex justify-center">
						<div class="flex items-center justify-end w-12 mr-3 md:mr-16">
							<button
									type="button"
									class="w-12 h-12 rounded-full focus:outline-none flex items-center justify-center"
									style="background-color: rgba(0,0,0,.4);"
									@click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1">
								<img src="https://obr.now.sh/remixicon/system/arrow-left-s-line/64/ffffff"
									 class="w-6 h-6">
							</button>
						</div>
						<div class="flex items-center justify-start w-12 md:ml-16">
							<button
									type="button"
									class="text-white font-bold w-12 h-12 rounded-full focus:outline-none flex items-center justify-center"
									style="background-color: rgba(0,0,0,.4);"
									@click="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1">
								<img src="https://obr.now.sh/remixicon/system/arrow-right-s-line/64/ffffff"
									 class="w-6 h-6">
							</button>
						</div>
					</div>


				</div>
			</div>

			<div class="relative block ">
				<?php
					$features = get_field('features', get_the_ID());
					foreach ($features as $feature):?>
						<div class="bg-white   rounded-3xl p-4 mb-6 ">
							<div class="grid grid-cols-3 gap-4">
								<div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
									<img src="<?= $feature['image']?>"
										 alt="Just a flower"
										 class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
								</div>
								<div class="col-span-2">
									<h2 class="flex-auto text-xl font-medium text-gray-800"><?= $feature['title']?></h2>
									<p class="mt-3 text-gray-700 text-md font-normal"><?= $feature['title']?></p>

								</div>
							</div>
						</div>
					<?php endforeach;?>
			</div>

			<?php do_action('jpp_radiant_component', [
					'type' => 'accordion',
					'name' => 'accordion-default',
						'args' => [
								'data' => get_field('faq', get_the_ID())
						]
					]
			)?>
		</article>
		<aside class="md:col-start-5 md:col-end-7 sm:mb-10 relative ">
			<div class="bg-white relative rounded-md hover:shadow-md transition duration-300 border border-gray-100 mb-6">
				<div class="block overflow-hidden px-4 py-4 ">

					<?php foreach ( get_field( 'billing_price', get_the_ID() ) as $price ): ?>
						<div class="grid grid-cols-3 gap-4 mb-4 items-center">
							<div class="col-span-2 font-medium text-gray-500">
								<span class="block text-xs uppercase text-green-700"><?= $price['license_type'] ?></span>
								<div class="flex uppercase items-center text-gray-600">
									<span class="inline-flex mr-2 text-xl items-center"><span
												class="text-sm mr-1 "><?= get_field( 'currency', get_the_ID() ) ?></span><?= number_format( $price['price'] ) ?></span>
								</div>
							</div>
							<div class="text-gray-600 font-medium text-md text-right"><?= $price['license'] ?> Domain
							</div>
						</div>
					<?php endforeach; ?>
					<a href="<?= get_field( 'buy_button', get_the_ID() ) ?>"
					   class="block w-full text-center  px-6 py-3 rounded-md font-medium text-md rounded-sm text-gray-50 bg-green-600 hover:bg-green-700 uppercase transition duration-300">
						Beli Sekarang
					</a>
				</div>
			</div>
			<div class="bg-white relative rounded-md hover:shadow-md transition duration-300 border border-gray-100 mb-6">
				<div class="block overflow-hidden px-4 py-4 ">
					<div class="grid grid-cols-3 gap-4 mb-4">
						<div class="text-sm font-medium text-gray-500">Version</div>
						<div class="col-span-2 text-gray-800 font-medium text-md"><?= get_field( 'version', get_the_ID() ) ?></div>
					</div>
					<div class="grid grid-cols-3 gap-4 mb-4">
						<div class="text-sm font-medium text-gray-500">Last Update</div>
						<div class="col-span-2 text-gray-800 font-medium text-md"><?= get_field( 'last_update', get_the_ID() ) ?></div>
					</div>
					<div class="grid grid-cols-3 gap-4 mb-4">
						<div class="text-sm font-medium text-gray-500">Published</div>
						<div class="col-span-2 text-gray-800 font-medium text-md"><?= get_the_date( 'j F Y' ) ?></div>
					</div>
					<div class="grid grid-cols-3 gap-4 mb-4">
						<div class="text-sm font-medium text-gray-500">Compatible Browser</div>
						<div class="col-span-2 text-gray-800 font-medium text-md"><?php
							foreach ( get_field( 'browser_compatibility', get_the_ID() ) as $item ) {
								echo $item . ', ';
							}
							?></div>
					</div>
					<div class="grid grid-cols-3 gap-4 mb-4">
						<div class="text-sm font-medium text-gray-500">WP Version</div>
						<div class="col-span-2 text-gray-800 font-medium text-md"><?= get_field( 'wp_compatibility', get_the_ID() ) ?></div>
					</div>
					<div class="grid grid-cols-3 gap-4 mb-4">
						<div class="text-sm font-medium text-gray-500">Tags</div>
						<div class="col-span-2 text-gray-800 font-medium text-md"><?php
							foreach ( get_the_terms( get_the_ID(), 'tags' ) as $tag ) { ?>
								<a href="<?= get_tag_link( $tag->term_id ) ?>"><?= $tag->name ?></a>,
								<?php
							}
							?></div>
					</div>
				</div>
			</div>
			<div class="bg-white relative rounded-md hover:shadow-md transition duration-300 border border-gray-100 mb-6">
				<div class="block overflow-hidden px-4 py-4 ">
					<div class="block mb-8">

						<h2 class="block mb-3 font-medium text-xl text-gray-700 ">Keuntungan</h2>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#43a047"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1"
								 width="24" height="24" viewBox="0 0 24 24">
								<path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Dokumentasi Online</h2>
						</div>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#43a047"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1"
								 width="24" height="24" viewBox="0 0 24 24">
								<path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Full Support</h2>
						</div>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#43a047"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1"
								 width="24" height="24" viewBox="0 0 24 24">
								<path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Remove Copyright</h2>
						</div>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#43a047"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1"
								 width="24" height="24" viewBox="0 0 24 24">
								<path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Lifetime License</h2>
						</div>
					</div>
					<div class="block mb-8">

						<h2 class="block mb-3 font-medium text-xl text-gray-700 ">Personal License</h2>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#d32f2f"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1" width="24" height="24" viewBox="0 0 24 24">
								<path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Dilarang install di web client atau
								orang lain</h2>
						</div>
						<div class="flex items-center mb-3">

							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#d32f2f"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1" width="24" height="24" viewBox="0 0 24 24">
								<path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Dilarang untuk jasa pembuatan
								website</h2>
						</div>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#d32f2f"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1" width="24" height="24" viewBox="0 0 24 24">
								<path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Dilarang dijual ulang</h2>
						</div>
					</div>
					<div class="block mb-8">

						<h2 class="block mb-3 font-medium text-xl text-gray-700 ">Developer License</h2>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#43a047"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1"
								 width="24" height="24" viewBox="0 0 24 24">
								<path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Install di web client / orang
								lain.</h2>
						</div>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#43a047"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1"
								 width="24" height="24" viewBox="0 0 24 24">
								<path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Jasa pembuatan website</h2>
						</div>
						<div class="flex items-center mb-3">
							<svg class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-full text-white flex-shrink-0"
								 fill="#d32f2f"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								 version="1.1" width="24" height="24" viewBox="0 0 24 24">
								<path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z"/>
							</svg>
							<h2 class="text-gray-700 text-md title-font font-medium">Dijual Ulang</h2>
						</div>
					</div>
				</div>
			</div>
		</aside>
	</div>
</section>

