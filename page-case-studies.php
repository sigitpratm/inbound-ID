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


	<div class="pt-[6.5rem] relative">

		<div class="container mx-auto">
			<div class="grid grid-cols-12 xl:py-8 2xl:py-12">
				<div class="col-span-6 w-full h-full flex flex-col items-start justify-center w-4/5 gap-8">
					<div class="flex items-center gap-2 text-2xl text-gray-600">
						<p class="font-bold">Paid Ads</p>
					</div>
					<p class="text-8xl font-bold text-scheme-green">
						TOYOTA
					</p>
					<p class="text-xl">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus ducimus ipsam
						iusto, laudantium modi sit vero. Commodi delectus ducimus eveniet
					</p>
					<div>
						<a href="#" class="text-xl text-scheme-green font-bold flex flex-row  items-center gap-2">
							<span>Read More</span>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
							     stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
							</svg>
						</a>
					</div>
				</div>

				<div class="col-span-6 xl:h-[36rem] 2xl:h-[44rem]">
					<img src="<?= jpp_assets( '/img/jpg/blog/blog1.jpg' ) ?>" alt=""
					     class="xl:h-[36rem] 2xl:h-[44rem] w-full object-cover rounded-3xl">
				</div>
			</div>

			<div class="flex items-center justify-center gap-6">
				<button class="btn-slider-milestone w-4 h-4 rounded-full bg-gray-300"></button>
				<button class="btn-slider-milestone w-4 h-4 rounded-full bg-gray-300"></button>
				<button class="btn-slider-milestone w-4 h-4 rounded-full bg-gray-300"></button>
				<button class="btn-slider-milestone w-4 h-4 rounded-full bg-gray-300"></button>
			</div>

		</div>

		<div class="container mx-auto">

		</div>

		<div class="grid grid-cols-12 relative pt-32 bg-scheme-light-gray relative z-20 relative">

			<div class="col-span-12 md:col-span-6">
				<img src="<?= emk_options( 'case-studies-last-section-image', 'url' ) ?>" alt=""
				     class="object-cover w-full">
			</div>

			<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
				<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

					<p class="text-lg xl:text-3xl 2xl:text-4xl font-bold text-scheme-green text-center">
						<?= emk_options( 'heading-case-studies-last-section' ) ?>
					</p>

					<div class="flex flex-col justify-center gap-4">
						<a href="<?= emk_options( 'case-studies-last-section-link-btn2' ) ?>" target="_blank"
						   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
							<?= emk_options( 'case-studies-last-section-text-btn1' ) ?>
						</a>

						<?php
						if ( emk_options( 'show-btn2-case-studies-last-section' ) ) :
							if ( emk_options( 'show-btn2-case-studies-last-section' ) === '1' ):?>
								<a href="<?= emk_options( 'case-studies-last-section-link-btn2' ) ?>" target="_blank"
								   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
									<?= emk_options( 'case-studies-last-section-text-btn2' ) ?>
								</a>
							<?php endif; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>

			<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-20">
		</div>

	</div>

<?php
get_footer();
