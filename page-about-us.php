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

	<div class="pt-[6.5rem] z-30 relative">

		<div class="container mx-auto px-4 md:px-0">
			<!-- desc 1 -->
			<div class="text-center space-y-8 py-16 md:py-32">
				<?php
				$data = emk_options( 'about-us-desc1' );
				echo htmlspecialchars_decode( $data )
				?>
			</div>

			<!-- desc 2-->
			<div class="text-center space-y-8 py-16 py-16 md:py-32">
				<?php
				$data = emk_options( 'about-us-desc2' );
				echo htmlspecialchars_decode( $data )
				?>
			</div>

			<!-- our achievement -->
			<div class="text-center text-2xl space-y-8 md:space-y-24 py-16 md:py-32">
				<p class="text-center text-4xl md:text-5xl text-scheme-green font-bold">
					<?= emk_options( 'heading-achievement' ) ?>
				</p>
				<div class="w-full flex flex-col md:flex-row justify-between gap-12 md:gap-0">

					<div class="w-full h-full space-y-2 md:space-y-8">
						<p class="text-5xl md:text-8xl font-bold text-scheme-green"><?= emk_options( 'achievement-number-item1' ) ?></p>
						<p class="text-lg px-12">
							<?= emk_options( 'achievement-desc-item1' ) ?>
						</p>
					</div>

					<div class="w-full h-full space-y-2 md:space-y-8">
						<p class="text-5xl md:text-8xl font-bold text-scheme-green">
							<span class="text-2xl md:text-5xl">IDR</span><span><?= emk_options( 'achievement-number-item2' ) ?></span>
						</p>
						<p class="text-lg px-12">
							<?= emk_options( 'achievement-desc-item2' ) ?>
						</p>
					</div>

					<div class="w-full h-full space-y-2 md:space-y-8">
						<p class="text-5xl md:text-8xl font-bold text-scheme-green"><?= emk_options( 'achievement-number-item3' ) ?></p>
						<p class="text-lg px-12">
							<?= emk_options( 'achievement-desc-item3' ) ?>
						</p>
					</div>

					<div class="w-full h-full space-y-2 md:space-y-8">
						<p class="text-5xl md:text-8xl font-bold text-scheme-green"><?= emk_options( 'achievement-number-item4' ) ?></p>
						<p class="text-lg px-12">
							<?= emk_options( 'achievement-desc-item4' ) ?>
						</p>
					</div>

				</div>
			</div>
		</div>

		<!-- milestone -->
		<div class="hidden md:block text-center space-y-8 py-32">
			<p class="text-center text-5xl text-scheme-green font-bold">MILESTONE</p>

			<div id="body-slider-milestone" class="w-full overflow-x-hidden flex flex-row">

				<div class="pl-[222px] card-slider w-full flex-none overflow-hidden first-slider-inbound-blog">
					<ul class="flex flex-row progression-first relative overflow-hidden">
						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden"></div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2009
							</div>
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-start items-center gap-6 pt-10">
									<p class="text-lg">Inboundid Founded</p>
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="h-auto max-h-32 w-auto">
								</div>
							</div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-end items-center gap-6 pb-10">
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="w-auto h-auto max-h-32">
									<p class="text-lg">
										Unilever, Indosat, Qm Financial joined as our first clients
									</p>
								</div>
							</div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2012
							</div>
							<div class="inline-block h-64 w-full overflow-hidden"></div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden"></div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2013
							</div>
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-start items-center gap-6 pt-10">
									<p class="text-lg">
										InboundID got: Google Premier Partner badge Facebook Preferred
										Partner badge
									</p>
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="h-auto max-h-32 w-auto">
								</div>
							</div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-end items-center gap-6 pb-10">
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="w-auto h-auto max-h-32">
									<p class="text-lg">
										InboundID won teh Google All Star Challenge 2014
									</p>
								</div>
							</div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2014
							</div>
							<div class="inline-block h-64 w-full overflow-hidden"></div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden"></div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2015
							</div>
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-start items-center gap-6 pt-10">
									<p class="text-lg">
										Became part of digital marketing team of Indonesia Ministry of Tourism
									</p>
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="h-auto max-h-32 w-auto">
								</div>
							</div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-end items-center gap-6 pb-10">

								</div>
							</div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2016
							</div>
							<div class="inline-block h-64 w-full overflow-hidden"></div>
						</li>
					</ul>
				</div>

				<div class="pr-[222px] card-slider w-full flex-none overflow-hidden">
					<ul class="flex flex-row progression-second relative overflow-hidden">
						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden"></div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2017
							</div>
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-start items-center gap-6 pt-10">
									<p class="text-lg">
										Managed 100 Billion campaign budget Joined FreakOut Group
									</p>
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="h-auto max-h-32 w-auto">
								</div>
							</div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-end items-center gap-6 pb-10">
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="w-auto h-auto max-h-32">
									<p class="text-lg">
										Received Premier Partner Award 2018
									</p>
								</div>
							</div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2018
							</div>
							<div class="inline-block h-64 w-full overflow-hidden"></div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden"></div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2019
							</div>
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-start items-center gap-6 pt-10">
									<p class="text-lg">
										Managed 150+ clients from different industries
									</p>
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="h-auto max-h-32 w-auto">
								</div>
							</div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-end items-center gap-6 pb-10">
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="w-auto h-auto max-h-32">
									<p class="text-lg">
										#3 Facebook Agency League in Q4 2020
									</p>
								</div>
							</div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2020
							</div>
							<div class="inline-block h-64 w-full overflow-hidden"></div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden"></div>
							<div class="inline-block px-10 py-4 text-white text-2xl rounded-full bg-scheme-green font-bold">
								2021
							</div>
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-start items-center gap-6 pt-10 text-lg">
									<p>
										Runner Up Young Lions Competitions 2021 Media Category #1 Facebook Agency League
										in 2021
									</p>
									<img src="<?= jpp_assets( '/img/png/clients/img-client-04.png' ) ?>" alt=""
										 class="h-auto max-h-32 w-auto">
								</div>
							</div>
						</li>

						<!-- items milestone -->
						<li class="w-full">
							<div class="inline-block h-64 w-full overflow-hidden">
								<div class="w-full h-full flex flex-col justify-end items-center gap-6 pb-10"></div>
							</div>
							<div class="inline-block w-full h-auto">
								<div class="flex items-center justify-center overflow-hidden bg-scheme-light-gray">

								</div>
							</div>
							<div class="inline-block h-64 w-full overflow-hidden"></div>
						</li>
					</ul>

				</div>

			</div>

			<div id="nav-slider-milestone" class="flex items-center justify-center gap-6">
				<button class="btn-slider-milestone w-4 h-4 rounded-full bg-gray-300 active-btn-milestone"></button>
				<button class="btn-slider-milestone w-4 h-4 rounded-full bg-gray-300"></button>
			</div>


		</div>

		<div class="container mx-auto px-4 md:px-0">
			<!-- awards -->
			<?php get_template_part( 'template-parts/components/section/section-awards', get_post_type() ) ?>
		</div>
	</div>

	<!-- last section  -->
	<div class="grid grid-cols-12 relative pt-4 md:pt-32 bg-scheme-light-gray relative z-20 relative">

		<div class="col-span-12 md:col-span-6">
			<img src="<?= emk_options( 'about-us-last-section-image', 'url' ) ?>" alt="" class="object-cover w-full">
		</div>

		<div class="col-span-12 md:col-span-6 lg:px-24 xl:px-32 2xl:px-44 relative z-40">
			<div class="w-full h-full flex flex-col items-center justify-center space-y-8 md:space-y-16 pt-8 md:pt-0 pb-32 md:pb:0 px-4 md:px-0">

				<p class="text-lg xl:text-3xl 2xl:text-4xl font-bold text-scheme-green text-center">
					<?= emk_options( 'heading-about-us-last-section' ) ?>
				</p>

				<div class="flex flex-col justify-center gap-4">
					<a href="<?= emk_options( 'about-us-last-section-link-btn2' ) ?>" target="_blank"
					   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
						<?= emk_options( 'about-us-last-section-text-btn1' ) ?>
					</a>

					<?php
					if ( emk_options( 'show-btn2-about-us-last-section' ) ) :
						if ( emk_options( 'show-btn2-about-us-last-section' ) === '1' ):?>
							<a href="<?= emk_options( 'about-us-last-section-link-btn2' ) ?>" target="_blank"
							   class="min-w-[16rem] bg-scheme-green py-4 xl:py-4 2xl:py-6 flex-none text-center rounded-full font-bold text-white transition duration-200 hover:shadow-lg">
								<?= emk_options( 'about-us-last-section-text-btn2' ) ?>
							</a>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="absolute bottom-0 left-0 z-20">
	</div>

	<script>
		document.getElementById('body-slider-milestone').children[0].classList.add('first-slider-milestone')
		document.getElementById('nav-slider-milestone').children[0].classList.add('active-btn-milestone')
	</script>

<?php
get_footer();
