<?php
$arguments  = [
	// card-default
	'class'     => 'card-default',
	'position' => 'top',
	'author_image' => 'top',
	'author_name' => 'Jhon Doe',
	'post_date' => date("d M, Y"),
	'thumbnail' => 'https://getuikit.com/docs/images/light.jpg',
	'title'     => 'Default Title',
	'excerpt'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
	'url'   => '#',
];

/** @var $args */
$args = wp_parse_args( $args, $arguments  );
?>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white overflow-hidden pt-24 pb-16 bg-cover bg-no-repeat bg-center" style="background-image: url('<?= get_template_directory_uri() . '/assets/dist/img/bg-default.jpg'?>')">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 mx-auto lg:py-20 z-30">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
			<div class=" my-auto mx-auto max-w-7xl px-4 sm:mt-12 md:my-auto sm:px-6 lg:px-8 ">
				<div class="sm:text-center lg:text-left">
					<h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-5xl">
						<span class="block mb-5">Wordpress Theme</span>
						<span class="block mb-5">untuk kebutuhan</span>
						<span class="block text-green-600 xl:inline">project anda</span>
					</h1>
					<p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-md sm:max-w-xl sm:mx-auto md:mt-5 md:text-md lg:mx-0">
						Tidak perlu susah payah untuk membuat sebuah website untuk kebutuhan project anda. Hanya upload dan setting, website siap untuk dipromosikan!
					</p>
					<div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
						<div class="rounded-md shadow">
							<a href="<?= home_url('/product')?>" class="w-full flex items-center justify-center px-8 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-2 md:text-md md:px-10">
								Lihat Produk
							</a>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-3">
							<a target="_blank" href="https://demo.jippi.co.id" class="w-full flex items-center justify-center px-8 py-2 border border-transparent text-base font-medium rounded-md text-gray-100 bg-gray-800 hover:bg-gray-700 md:py-2 md:text-md md:px-10">
								Live demo
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="max-w-7xl mx-auto my-auto shadow-lg">
				<img class="" src="https://material.local/wp-content/uploads/2021/06/suaraku-mockup.png" alt="">
			</div>
		</div>
	</div>

</div>
