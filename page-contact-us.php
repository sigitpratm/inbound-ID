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

<?php get_template_part( 'template-parts/components/section/section-sticky-sosmed', get_post_type() ) ?>

	<div class="relative pt-[5rem] md:pt-[6.5rem] overflow-hidden">
		<img src="<?= jpp_assets( '/img/png/img-bg-01.png' ) ?>" alt=""
			 class="hidden md:block absolute top-52 left-0">
		<img src="<?= jpp_assets( '/img/png/img-bg-02.png' ) ?>" alt=""
			 class="hidden md:block absolute top-[20%] right-0 z-10">

		<div class="container mx-auto h-full relative z-20 xl:px-20 2xl:px-0 md:mb-24">

			<div class="grid grid-cols-1 md:grid-cols-12 px-4 md:px-0 space-y-6 md:space-y-0">
				<!-- left -->
				<div class="col-span-1 col-span-5">

					<div class="space-y-6 md:space-y-12 pr-0 md:pr-24 flex flex-col items-start w-full h-full justify-center">
						<!-- desc -->
						<p class="text-lg md:text-2xl text-center md:text-left">
							<?= emk_options( 'desc-contact-us' ) ?>
						</p>

						<!-- address -->
						<div class="flex flex-row items-center justify-center md:justify-start gap-4 pr-0 md:pr-24">
							<svg xmlns="http://www.w3.org/2000/svg" class="flex-none text-scheme-green w-8 md:w-12"
								 viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd"
									  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
									  clip-rule="evenodd"/>
							</svg>

							<p class="text-base md:text-xl">
								<?= emk_options( 'location-contact-us' ) ?>
							</p>
						</div>

						<!-- mail -->
						<div class="flex flex-row items-center justify-center md:justify-start gap-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="flex-none text-scheme-green w-8 md:w-12"
								 viewBox="0 0 20 20" fill="currentColor">
								<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
								<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
							</svg>

							<p class="text-base md:text-xl">
								<?= emk_options( 'email-contact-us' ) ?>
							</p>
						</div>

						<!-- phone -->
						<div class="flex flex-row items-center justify-center md:justify-start gap-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="flex-none text-scheme-green w-8 md:w-12"
								 viewBox="0 0 20 20" fill="currentColor">
								<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
							</svg>

							<p class="text-base md:text-xl">
								<?= emk_options( 'phone-contact-us' ) ?>
							</p>
						</div>

					</div>
				</div>

				<!-- right -->
				<div class="col-span-1 col-span-7 relative h-[24rem] xl:h-[40rem] 2xl:h-[52rem] overflow-hidden">
					<div class="relative z-20 flex flex-col items-center justify-center w-full h-full gap-8">
						<a href="<?= emk_options( 'contact-us-btn1-link' ) ?>" target="_blank"
						   class="rounded-full px-16 line-clamp-1 md:px-24 py-4 xl:py-8 2xl:py-10 xl:text-2xl 2xl:text-3xl font-bold bg-white text-scheme-green transition duration-300 hover:bg-scheme-green hover:text-white">
							<?= emk_options( 'contact-us-btn1-text' ) ?>
						</a>
						<p class="xl:text-2xl 2xl:text-3xl font-bold text-center text-white">or</p>
						<a href="<?= emk_options( 'contact-us-btn2-link' ) ?>" target="_blank"
						   class="rounded-full px-16 line-clamp-1 md:px-24 py-4 xl:py-8 2xl:py-10 xl:text-2xl 2xl:text-3xl font-bold bg-white text-scheme-green transition duration-300 hover:bg-scheme-green hover:text-white">
							<?= emk_options( 'contact-us-btn2-text' ) ?>
						</a>
					</div>
					<img src="<?= jpp_assets( '/img/png/banner-image1.png' ) ?>" alt=""
						 class="absolute top-0 left-0 w-full h-full xl:h-[40rem] 2xl:h-[52rem] z-10">
				</div>
			</div>

		</div>
		<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-50">
	</div>


<?php
get_footer();
