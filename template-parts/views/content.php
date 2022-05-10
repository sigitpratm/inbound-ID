<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jippi
 */


$terms = get_terms( array(
		'taxonomy'   => 'case-study-category',
		'hide_empty' => false,
) );


?>

<?php get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>

<div class="py-[6.5rem] w-full px-4 lg:px-16 xl:px-20 2xl:px-0 z-30 relative">

	<img src="<?= jpp_assets( 'img/png/img-bg-header.png' ) ?>" alt="bg-top"
		 class="hidden md:block absolute top-0 left-0">

	<!-- hero banner -->
	<?php get_template_part( 'template-parts/components/hero/hero-default', get_post_type() ) ?>

	<img src="<?= jpp_assets( '/img/png/img-bg-01.png' ) ?>" alt="" class="hidden md:block absolute top-[30%] left-0 opacity-50">
	<img src="<?= jpp_assets( '/img/png/img-bg-02.png' ) ?>" alt="" class="hidden md:block absolute bottom-[-5%] right-0">

	<div class="container mx-auto relative">

		<!-- our services -->
		<?php get_template_part( 'template-parts/components/section/section-services', get_post_type() ) ?>

		<!-- our works -->
		<?php get_template_part( 'template-parts/components/section/section-works', get_post_type() ) ?>

		<!-- latest article-->
		<?php get_template_part( 'template-parts/components/section/section-latest-article-home', get_post_type() ) ?>

		<!-- our clients -->
		<?php get_template_part( 'template-parts/components/section/section-clients', get_post_type() ) ?>

		<!-- awards -->
		<?php get_template_part( 'template-parts/components/section/section-awards', get_post_type() ) ?>
	</div>
</div>


<!-- last section -->
<div class="grid grid-cols-12 relative bg-scheme-light-gray">

	<div class="col-span-12 md:col-span-6">
		<img src="<?= emk_options( 'home-last-section-image', 'url' ) ?>" alt="" class="object-cover w-full">
	</div>

	<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-36 relative z-40">
		<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

			<p class="text-lg xl:text-3xl 2xl:text-5xl font-bold text-scheme-green text-center">
				<?= emk_options( 'home-last-section-text' ) ?>
			</p>

			<div class="flex flex-col justify-center gap-4">
				<a href="<?= emk_options( 'home-last-section-btn1-url' ) ?>"
				   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
					<?= emk_options( 'home-last-section-btn1-title' ) ?>
				</a>

				<?php $showButton2 = emk_options( 'home-last-section-use-btn2' );
				if ( $showButton2 === '1' ): ?>
					<a href="<?= emk_options( 'home-last-section-btn2-url' ) ?>"
					   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
						<?= emk_options( 'home-last-section-btn2-title' ) ?>
					</a>
				<?php endif; ?>

			</div>
		</div>
	</div>

	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-50">
</div>
