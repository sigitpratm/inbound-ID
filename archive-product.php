<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

get_header(); ?>
	<section class="relative bg-white overflow-hidden md:pt-24 md:pb-4 bg-cover bg-no-repeat bg-center "
			 x-bind:class="{'shadow-md' : atTop}"
		 style="background-image: url('<?= jpp_assets( 'img/bg-green.jpg' ) ?>')"
		 xmlns:x-transition="http://www.w3.org/1999/xhtml" xmlns:x-transition="http://www.w3.org/1999/xhtml">
		<div class="max-w-7xl mx-auto mx-auto z-30">
			<div class="grid grid-cols-2 gap-4">
				<div class=" my-auto max-w-7xl sm:mt-12 md:my-auto sm:px-6 lg:px-8 ">
					<div class="sm:text-center lg:text-left">
						<h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-5xl">Products
						</h1>
					</div>
				</div>
				<div class="text-right my-auto px-8 ">
					<a href="#"
					   class="inline mr-1 px-3 py-2 rounded-md font-medium text-sm rounded-sm text-gray-700 bg-gray-100 hover:bg-gray-200">
						Wordpress Theme
					</a>
				</div>
			</div>
		</div>
	</section>
<!--	<section class="relative mx-auto px-4 sm:px-9 py-12 mb-6">-->
<!--		<div class="max-w-7xl mx-auto px-4 sm:px-9">-->
<!--			hallo-->
<!--		</div>-->
<!--	</section>-->
	<section class="text-gray-600 block my-16">
		<div class="max-w-7xl mx-auto px-4 sm:px-9 grid md:grid-cols-9 grid-cols-1 gap-3">
			<div class="md:col-span-2 sm:mb-10 relative">
				<div class="block border border-t-0 border-l-0 border-r-0 mb-4 pb-8">
					<h2 class="font-medium text-lg block mb-2">Category</h2>
					<ul class="block mt-4 product-categories">
						<?php
						$categories = wp_list_categories( [
								'taxonomy'   => 'product-category',
//								'orderby'      => '$orderby',
//								'show_count'   => true,
//								'pad_counts'   => $pad_counts,
//								'hierarchical' => $hierarchical,
								'hide_empty' => false,
								'title_li'   => false
						] );
						echo $categories;
						?>
					</ul>
				</div>
				<div class="block  mb-4 pb-8">
					<h2 class="font-medium text-lg block mb-2">Tags</h2>
					<div class="block h-52 scrollbar overflow-y-auto mt-2 ">
						<?php
						$terms = get_terms( [
								'taxonomy'   => 'tags',
								'hide_empty' => false,
						] );
						foreach ( $terms as $term ):?>
							<a href="<?= get_term_link( $term->term_id, 'tags' ) ?>"
							   class="flex w-full justify-between py-2 items-center">
								<span class="text-sm text-gray-800 font-medium whitespace-nowrap overflow-hidden overflow-ellipsis w-5/6"><?= $term->name ?></span>
								<span class="text-sm text-gray-400 w-6 text-center"><?= $term->count ?></span>
							</a>
						<?php
						endforeach;
						?>
					</div>
				</div>
			</div>
			<div class="md:col-span-7 sm:mb-10 relative block">
				<?php
				if ( have_posts() ) :
					?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :

						the_post();

						do_action( 'jpp_radiant_component', [
								'type' => 'card',
								'name' => 'card-product-list',
								'args' => [
										'id'         => $post->ID,
										'thumbnail'  => get_the_post_thumbnail_url( $post->ID ),
										'title'      => $post->post_title,
										'version'    => get_field( 'version', $post->ID ),
										'currency'   => get_field( 'currency', $post->ID ),
										'url'        => get_the_permalink( $post->ID ),
										'excerpt'    => get_the_excerpt( $post->ID ),
										'updated'    => get_field( 'last_update', $post->ID ),
										'price'      => number_format( get_field( 'price', $post->ID ) ),
										'categories' => get_the_terms( $post->ID, 'product-category' )
								]
						] );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'views/content', 'none' );

				endif;
				?>

			</div>

		</div>
	</section>


<?php
get_footer();
