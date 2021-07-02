<?php
$arguments = [
	// card-default
	'thumbnail'  => 'https://www.wowthemes.net/thumb//assets/images/themes/artistique-html-template.png',
	'title'      => 'Default Jippi Product',
	'excerpt'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
	'id'         => get_the_ID(),
	'url'        => '#',
	'demo_url'   => '#',
	'price'      => '45,00',
	'updated'    => date( 'd M Y' ),
	'currency'   => '$',
	'categories' => []
];

/** @var $args */
$args = wp_parse_args( $args, $arguments );
?>
<article
	id="product-<?= esc_html( $args['id'] ) ?>"
	class="rounded-lg overflow-hidden grid md:grid-cols-8 grid-cols-1 gap-2 rounded-lg mb-6 bg-white p-4 shadow-md drop-shadow ">
	<a href="<?= esc_html( $args['url'] ) ?>"
	   class="col-span-2 block relative rounded-sm overflow-hidden md:h-36 h-52 bg-gray-50">
		<img class="w-full inset-0 rounded-sm overflow-hidden h-auto"
		     src="<?= esc_html( $args['thumbnail'] ) ?>"
		     alt="<?= esc_html( $args['title'] ) ?>">
	</a>
	<div class="col-span-4 relative overflow-hidden px-2">
		<h2 class="font-medium text-lg block mb-2">
			<a href="<?= esc_html( $args['url'] ) ?>"
			   class="transition duration-200 transform border-b-2 border-transparent hover:border-gray-700"><?= esc_html( $args['title'] ) ?></a>
		</h2>

		<div class="block ">
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
			<p class="mb-2 text-sm text-gray-500"><?= esc_html( $args['excerpt'] ) ?></p>
		</div>
	</div>
	<div class="col-span-2 md:border-l-2 relative overflow-hidden block">

		<div class="md:absolute bottom-0 pl-4 w-full">
			<div class="block mb-4 relative md:text-center text-left">
				<h3 class="block text-xl font-medium mb-1"><?= esc_html( $args['currency'] ) ?><?= esc_html( $args['price'] ) ?></h3>
				<span class="block text-md font-medium mb-1">v<?= esc_html( $args['version'] ) ?></span>
				<span
					class="block text-sm font-normal text-gray-400">Updated: <?= esc_html( $args['updated'] ) ?></span>
			</div>

			<!-- Buy Button -->
			<a href="<?= esc_html( $args['url'] ) ?>"
			   class="w-full flex items-center justify-center px-8 py-2 text-base font-medium rounded-sm text-gray-100 bg-green-600 hover:bg-green-700 transition duration-300  md:py-2 md:text-md md:px-10">
				Buy now
			</a>
		</div>
	</div>
</article>
