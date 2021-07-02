<?php
/**
 * Template Name: Home Page Design
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

get_header(); ?>
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>
	<?php do_action( 'jpp_hero' ); ?>

	<section class="section-default bg-white py-16">
		<div class="max-w-7xl mx-auto px-4 sm:px-6">
			<div class="flex justify-between mb-4">
				<h2 class="font-medium text-gray-600 text-xl">Produk Terbaru</h2>
				<a href="<?= home_url( '/product' ) ?>"
				   class="px-4 py-2 font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 text-sm">
					View All
				</a>
			</div>
			<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 md:py-12">
				<?php
				$options = array(
						'post_type'     => 'product',
						'post_per_page' => 6,
						'nopaging'      => true,
				);
				$query   = new WP_Query( $options );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ): $query->the_post();
						do_action( 'jpp_radiant_component', [
								'type' => 'card',
								'name' => 'card-product',
								'args' => [
										'thumbnail'  => get_the_post_thumbnail_url( get_the_ID() ),
										'title'      => get_the_title( get_the_ID() ),
										'excerpt'    => get_the_excerpt( get_the_ID() ),
										'demo_url'   => get_field( 'demo_url', get_the_ID() ),
										'price'      => number_format( get_field( 'price', get_the_ID() ) ),
										'currency'   => get_field( 'currency', get_the_ID() ),
										'url'        => get_the_permalink( get_the_ID() ),
										'categories' => get_the_terms( get_the_ID(), 'product-category' ),
								]
						] );
					endwhile;
					wp_reset_query();
				}

				?>

			</div>

			<div class="flex justify-center">
				<a href="<?= home_url( '/product' ) ?>"
				   class="transition duration-300 px-12 py-2 font-medium rounded-full text-gray-100 bg-green-600 hover:bg-green-700 text-md uppercase">
					View All
				</a>
			</div>
		</div>
	</section>

	<?php
	do_action( 'jpp_radiant_component', [
			'type' => 'section',
			'name' => 'section-default',
			'args' => [
					'position'    => "left",
					'bg_class'    => "bg-gray-50",
					'media_type'  => "lottie",
					'media_url'   => "json/responsive-design.json",
					'title'       => "Responsive Design",
					'description' => "Design yang responsive & Mobile friendly membuat tampilan website tetap terlihat cantik di semua device."
			]
	] );
	?>
	<?php
	do_action( 'jpp_radiant_component', [
			'type' => 'section',
			'name' => 'section-default',
			'args' => [
					'position'    => "right",
					'bg_class'    => "bg-white",
					'media_type'  => "lottie",
					'media_url'   => "json/edanisman.json",
					'title'       => "Support 24/7",
					'description' => "Jika anda mendapatkan kesulitan saat melakukan installasi theme & plugin kami, anda dapat menghubungi kami melalui live chat & email."
			]
	] );
	?>

	<?php
	do_action( 'jpp_radiant_component', [
			'type' => 'section',
			'name' => 'section-default',
			'args' => [
					'bg_class'    => "bg-gray-50",
					'title'       => "Update secara berkala",
					'description' => "Untuk memastikan script berjalan dengan semestinya, kami selalu melakukan pembaruan secara berkala, agar compatible dengan versi wordpress terbaru."
			]
	] );
endwhile;
?>
<?php
get_footer();
