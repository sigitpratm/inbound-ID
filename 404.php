<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package awps
 */

get_header(); ?>

	<div class="relative bg-white overflow-hidden md:pt-24 md:pb-2 bg-cover bg-no-repeat bg-center"
		 style="background-image: url('<?= jpp_assets( 'img/bg-default.jpg' ) ?>')"
		 x-bind:class="{'shadow-md' : atTop}"
		 xmlns:x-transition="http://www.w3.org/1999/xhtml" xmlns:x-transition="http://www.w3.org/1999/xhtml">
		<div class="max-w-7xl mx-auto mx-auto  z-30">
			<div class="grid grid-cols-2 gap-4">
				<div class=" my-auto max-w-7xl sm:mt-12 md:my-auto sm:px-6 lg:px-8 ">
					<div class="sm:text-center lg:text-left">
						<h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-5xl">
							<span class="block mb-5">404 Not Found</span>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="relative h-full">
		<div class="max-w-5xl mx-auto px-4 sm:px-6  md:py-24 block relative overflow-hidden text-center">
			<div class="lottie h-96 block" data-animation-path="<?= jpp_assets( 'json/lost-in-space.json' ) ?>"
				 data-anim-loop="true"></div>
			<h2 class="block overflow-hidden mb-6 text-2xl font-medium">Looks like you lost in space</h2>
			<a href="<?= home_url( '/product' ) ?>"
			   class="transition duration-300 px-12 py-3 font-medium rounded-md text-gray-100 bg-green-600 hover:bg-green-700 text-md uppercase">
				Back to Home
			</a>
		</div>
	</section>
<?php
get_footer();
