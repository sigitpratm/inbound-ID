<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

get_header(); ?>
	<div class="uk-container uk-margin-top">
		<div class="uk-child-width-1-2@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 100;">
			<?php
			for($i = 1; $i <= 4; $i++){?>
				<div>
					<?php do_action( 'jpp_radiant_component', [
							'type' => 'card',
							'name' => 'card-default',
							'args' => [
									'position' => 'left',
									'title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
									'categories' => [
											[
													'id' => 1,
													'name' => 'Business',
													'url' => '#business'
											],
											[
													'id' => 2,
													'name' => 'Technology',
													'url' => '#technology'
											],
											[
													'id' => 3,
													'name' => 'News',
													'url' => '#news'
											],
											[
													'id' => 4,
													'name' => 'Review',
													'url' => '#review'
											],
									]
							]
					] ); ?>
				</div>
				<?php
			}
			?>
		</div>


		<div class="uk-child-width-1-4@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 100;">
			<?php
			for($i = 1; $i <= 4; $i++){?>
				<div>
					<?php do_action( 'jpp_radiant_component', [
							'type' => 'card',
							'name' => 'card-default',
							'args' => [
									'title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
									'categories' => [
											[
													'id' => 1,
													'name' => 'Business',
													'url' => '#business'
											],
											[
													'id' => 2,
													'name' => 'Technology',
													'url' => '#technology'
											],
											[
													'id' => 3,
													'name' => 'News',
													'url' => '#news'
											],
											[
													'id' => 4,
													'name' => 'Review',
													'url' => '#review'
											],
									]
							]
					] ); ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
<div class="container">
	<div class="row align-stretch">

		<div class="col-sm-8">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
						?>
							<header>
								<h1 class="page-title"><?php single_post_title(); ?></h1>
							</header>

						<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/views/content', get_post_format() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/views/content', 'none' );

					endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .col- -->

		<div id="sidebar" class="col-sm-4">
			<?php get_sidebar(); ?>
		</div><!-- .col- -->

	</div><!-- .row -->

</div><!-- .container -->

<?php
get_footer();
