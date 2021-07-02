<?php
$arguments  = [
	// card-default
	'thumbnail' => 'https://www.wowthemes.net/thumb//assets/images/themes/artistique-html-template.png',
	'title'     => 'Default Jippi Product',
	'excerpt'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
	'url'   => '#',
	'demo_url'   => '#',
	'price'   => '45,00',
	'currency'   => '$',
	'categories' => [ 1 , 2 ]
];

/** @var $args */
$args = wp_parse_args( $args, $arguments  );
?>
<article class="rounded-lg overflow-hidden block rounded-lg mb-6">
	<a href="<?= esc_html($args['url'])?>" class="c-card block bg-white relative rounded-lg overflow-hidden max-h-60">
		<img class="w-full inset-0 rounded-lg overflow-hidden h-auto"
		     src="<?= esc_html($args['thumbnail'])?>"
		     alt="<?= esc_html($args['title'])?>">
	</a>
	<div class="relative block h-52">
		<div class="absolute -top-7 w-full left-0 right-0 px-3">
			<div class="block bg-white shadow-lg rounded-lg overflow-hidden p-6">
				<div class="flex mb-3">
					<?php if ( ! empty( $args['categories'] ) && count( $args['categories'] ) > 0 ): ?>
						<div class="flex mb-2">
							<?php foreach ( $args['categories'] as $category ): ?>
								<a href="<?= get_term_link($category->term_id) ?>"
								   class="mr-2 flex items-center font-medium justify-center px-2 py-1 text-xs rounded-sm text-gray-500
				   bg-gray-100 hover:bg-gray-200 transition duration-300 ">
									<?= $category->name?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</div>
				<h2 class="mt-2 mb-2 font-medium text-lg">
					<a href="<?= esc_html($args['url'])?>"><?= esc_html($args['title'])?></a>
				</h2>

				<div class="mt-3 flex items-center">
					<span class="text-sm font-semibold"><?= esc_html($args['currency'])?></span>&nbsp;<span
						class="font-bold text-xl"><?= esc_html($args['price'])?></span>
				</div>

				<div class="mt-3 flex items-center">
					<a href="<?= esc_html($args['url'])?>" class=" mr-2 w-full flex items-center justify-center px-8 py-2 text-base font-bold rounded-md text-gray-100 bg-green-600 hover:bg-green-700 transition duration-300  md:py-2 md:text-md md:px-10">
						Buy now
					</a>
					<a href="<?= esc_html($args['demo_url'])?>" class="flex items-center justify-center px-3 py-2 text-base font-medium rounded-md text-white bg-gray-200 hover:bg-gray-300 md:py-2">
						<svg fill="#6b6b6b" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" /></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</article>
