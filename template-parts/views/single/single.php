<?php
$caseTerms = get_terms( array(
		'taxonomy'   => 'case-study-category',
		'hide_empty' => false,
) );

$casePost = get_terms( array(
		'taxonomy'   => 'post',
		'hide_empty' => false,
) );

$catPost = get_the_category();

$postType = get_post_type();

get_header();

?>
	<div class="py-[6.5rem] w-full px-4 lg:px-16 xl:px-12 2xl:px-0 mx-auto z-30 relative pb-16">
		<div class="container mx-auto space-y-8">


			<!-- post image -->
			<div class="bg-green-600 w-full h-96">
				<img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="h-96 w-full object-cover">
			</div>

			<!-- heading -->
			<header class="relative block space-y-6">
				<h1 class="text-center text-3xl md:text-5xl font-bold text-gray-600 mx-auto w-full md:w-2/4 leading-tight">
					<a href="<?php the_permalink() ?>" rel="bookmark"
					   class=" transition duration-200 hover:text-scheme-dark-green"
					   title="Permanent link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="text-center flex items-center justify-center gap-4 text-lg font-bold text-gray-600">
					<div class="text-scheme-dark-green capitalize flex items-center gap-2">
						<?php
						if ( is_singular( 'post' ) ) {
							echo $catPost[0]->name;
						} elseif ( is_singular( 'case-study' ) ) {
							echo $caseTerms[0]->name;
						}
						?>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
							  clip-rule="evenodd"/>
					</svg>
					<p>
						<?= get_the_date() ?>
					</p>
				</div>
			</header>

			<!-- content -->
			<div class="h-full h-auto relative">
				<div class="max-w-5xl mx-auto pb-24 text-lg">

					<div>
						<?php
						if ( get_the_content() ):

							the_content();

							?>
							<div class="pagination-post">
								<?php wp_link_pages();
								?>
							</div>
						<?php else:
							the_content()
							?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="">


	<div class="container hidden">

		<div class="row">

			<div class="col-sm-8">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'views/content', get_post_format() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile;

						?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div><!-- .col- -->

			<div class="col-sm-4">
				<?php get_sidebar(); ?>
			</div><!-- .col- -->

		</div><!-- .row -->

	</div>
<?php
get_footer();
