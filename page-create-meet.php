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


	<div class="container pt-[6.5rem] lg:px-4 xl:px-12 2xl:px-0 mx-auto z-30 relative space-y-24 overflow-hidden px-4">
		<div class="pt-24 space-y-24">
			<div class="space-y-2 text-center font-bold">
				<p class="text-4xl md:text-6xl text-scheme-green">SET UP MEETING</p>
				<p class="text-gray-600 text-2xl">Let's discuss over a cup of coffee! </p>
			</div>

			<div class="grid grid-cols-2">
				<div class="col-span-1"></div>
				<div class="col-span-1 space-y-8 relative">

					<div class="space-y-2 relative">
						<p class="text-2xl text-gray-600 font-bold">Meeting Duration</p>
						<div>
							<div class="space-x-2">
								<label for="duration-opt1"
								       class="text-white bg-scheme-green rounded-2xl inline-flex text-2xl font-semibold items-center justify-center w-72 h-16 cursor-pointer">
									30 Minutes
								</label>
								<input id="duration-opt1" type="radio" class="hidden" value="30-minutes">

								<label for="duration-opt2"
								       class="text-white bg-scheme-green rounded-2xl inline-flex text-2xl font-semibold items-center justify-center w-72 h-16 cursor-pointer">
									1 Hours
								</label>
								<input id="duration-opt2" type="radio" class="hidden" value="1-hour">
							</div>
						</div>
					</div>

					<div class="space-y-2 relative">
						<p class="text-2xl text-gray-600 font-bold">Which one do you prefer?</p>
						<div>
							<div class="space-x-2">
								<label for="online-meet"
								       class="text-white bg-scheme-green rounded-2xl inline-flex text-2xl font-semibold items-center justify-center w-72 h-16 cursor-pointer">
									Online
								</label>
								<input id="online-meet" type="radio" class="hidden" value="online-meet">

								<label for="direct-meet"
								       class="text-white bg-scheme-green rounded-2xl inline-flex text-2xl font-semibold items-center justify-center w-72 h-16 cursor-pointer">
									Direct
								</label>
								<input id="direct-meet" type="radio" class="hidden" value="direct-meet">
							</div>
						</div>
					</div>

					<div class="space-y-2 relative">
						<p class="text-2xl text-gray-600 font-bold">What time works best?</p>
						<p class="text-xl text-scheme-green font-bold gap-2 flex items-center">
							<span>UCT +7 WIB Jakarta</span>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20"
							     fill="currentColor">
								<path fill-rule="evenodd"
								      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
								      clip-rule="evenodd"/>
							</svg>
						</p>

						<div class="relative flex">
							<div class="flex-none">
								<div class="space-x-2">
									<label for="online-meet"
									       class="text-white bg-scheme-green rounded-2xl inline-flex text-2xl font-semibold items-center justify-center w-72 h-16 cursor-pointer">
										Online
									</label>
									<input id="online-meet" type="radio" class="hidden" value="online-meet">

									<label for="direct-meet"
									       class="text-white bg-scheme-green rounded-2xl inline-flex text-2xl font-semibold items-center justify-center w-72 h-16 cursor-pointer">
										Direct
									</label>
									<input id="direct-meet" type="radio" class="hidden" value="direct-meet">
								</div>
							</div>

							<button>
								<svg xmlns="http://www.w3.org/2000/svg" class="text-scheme-green h-8 w-8"
								     viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd"
									      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
									      clip-rule="evenodd"/>
								</svg>
							</button>
						</div>
					</div>


				</div>
			</div>
		</div>


		<!-- MAIN FORM -->
		<div class="space-y-24">
			<div class="space-y-6">
				<div class="space-y-4 text-center">
					<p class="text-2xl font-bold text-scheme-green">Let's discuss!</p>
					<p class="text-gray-600 font-bold text-3xl">
						<span>1 Hour</span>
						<span>Online</span>
						<span>10:00</span>
					</p>
				</div>

				<div class="grid grid-cols-2 gap-6">

					<label class="w-full col-span-2 md:col-span-1">
						<input type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="First Name">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Last Name">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Brand Name">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Website">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input type="email"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Email">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input type="number"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Phone Number">
					</label>

					<label class="w-full col-span-2">
						<textarea type="text"
						          class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						          placeholder="Objective"></textarea>
					</label>
				</div>
			</div>
		</div>

	</div>

	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="">
<?php
get_footer();
