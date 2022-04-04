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
		<div class="pt-24 space-y-2 font-bold text-center">
			<p class="text-4xl md:text-6xl text-scheme-green">CREATE A BRIEF</p>
			<p class="text-gray-600 text-2xl">Tell us what you need!</p>
		</div>

		<!-- CATEGORY -->
		<div class="text-center space-y-8">
			<!-- tab head -->
			<div class="space-y-8">
				<div class="space-y-4">
					<p class="text-gray-600 text-3xl text-scheme-green font-bold">About Project</p>
					<p class="text-2xl font-semibold text-gray-600">What service you need?</p>
				</div>

				<div id="nav-tab-brief" class="flex flex-row gap-4 overflow-x-auto">
					<button data-button="tab-brief1"
					        class="btn-tab-brief active-btn-brief flex-none w-[14rem] xl:w-72 2xl:w-72 bg-scheme-green text-center rounded-xl md:rounded-3xl py-4 px-10 md:py-6 md:px-8 font-bold text-white text-sm md:text-lg xl:text-lg 2xl:text-xl">
						Strategic & Analytic
					</button>

					<button data-button="tab-brief1"
					        class="btn-tab-brief flex-none w-[14rem] xl:w-72 2xl:w-72 bg-scheme-green text-center rounded-xl md:rounded-3xl py-4 px-10 md:py-6 md:px-8 font-bold text-white text-sm md:text-lg xl:text-lg 2xl:text-xl">
						Digital Asset Management
					</button>

					<button data-button="tab-brief1"
					        class="btn-tab-brief flex-none w-[14rem] xl:w-72 2xl:w-72 bg-scheme-green text-center rounded-xl md:rounded-3xl py-4 px-10 md:py-6 md:px-8 font-bold text-white text-sm md:text-lg xl:text-lg 2xl:text-xl">
						Creative Content Production
					</button>

					<button data-button="tab-brief1"
					        class="btn-tab-brief flex-none w-[14rem] xl:w-72 2xl:w-72 bg-scheme-green text-center rounded-xl md:rounded-3xl py-4 px-10 md:py-6 md:px-8 font-bold text-white text-sm md:text-lg xl:text-lg 2xl:text-xl">
						Social Media Management
					</button>

					<button data-button="tab-brief1"
					        class="btn-tab-brief flex-none w-[14rem] xl:w-72 2xl:w-72 bg-scheme-green text-center rounded-xl md:rounded-3xl py-4 px-10 md:py-6 md:px-8 font-bold text-white text-sm md:text-lg xl:text-lg 2xl:text-xl">
						Digital Event Management
					</button>

				</div>

			</div>

			<!-- tab body -->
			<div class="space-y-8">
				<p class="text-2xl font-semibold text-gray-600">Detail of Service</p>

				<div class="text-white">
					<div id="tab-brief1" class="content-tab-brief hidden active-tab-brief grid-cols-10">
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Branding & Campaign Strategy
						</div>
					</div>

					<div id="tab-brief2" class="content-tab-brief hidden grid grid-cols-10 gap-4">
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Web Development
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Google Ads
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Fb Ads
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Tiktok Ads
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Linkedin Ads
						</div>
					</div>

					<div id="tab-brief3" class="content-tab-brief hidden grid grid-cols-10 gap-4">
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Article
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Infographics
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Video
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Motion Graphics
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Instagram AR Filter
						</div>
					</div>

					<div id="tab-brief4" class="content-tab-brief hidden grid grid-cols-10 gap-4">
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Content Production & Management
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Influencer Management
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Forum Management
						</div>
					</div>

					<div id="tab-brief5" class="content-tab-brief hidden grid grid-cols-10 gap-4">
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Webinar
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Facebook Live
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Youtube Live
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Instagram Live
						</div>
						<div class="col-span-10 md:col-span-2 bg-scheme-green py-4 md:py-8 text-sm md:text-lg font-bold rounded-xl md:rounded-3xl">
							Podcast
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- MAIN FORM -->
		<div class="space-y-24">
			<div class="space-y-6">
				<p class="text-3xl font-bold text-scheme-green text-center">About You</p>
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
				</div>
			</div>

			<div class="space-y-6 pb-20">
				<p class="text-3xl font-bold text-scheme-green text-center">Campaign Brief</p>
				<div class="grid grid-cols-2 gap-6">
					<label class="w-full col-span-2">
						<input type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Project Name">
					</label>

					<p class="col-span-2 font-semibold text-xl md:text-2xl text-gray-600">Campaign Duration</p>

					<label class="w-full col-span-2 md:col-span-1">
						<input id="start-date" type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Start" onclick="this.type = 'date'">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input id="end-date" type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="End" onclick="this.type = 'date'">
					</label>

					<label class="w-full col-span-2">
						<textarea type="date" cols="" rows="4"
						          class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						          placeholder="Tell us about your project"></textarea>
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input type="number"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Budget">
					</label>

					<label class="w-full col-span-2 md:col-span-1">
						<input id="deadline-date" type="text"
						       class="w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl placeholder-gray-400 focus:border-scheme-green focus:ring-0"
						       placeholder="Deadline" onclick="this.type = 'date'">
					</label>

					<label class="w-full col-span-2 bg-white w-full rounded-2xl border border-scheme-green p-4 md:p-6 font-semibold text-base md:text-xl">
						<div class="flex justify-between items-center">
							<span id="text-file-brief" class="text-gray-400">Upload your campaign brief files</span>
							<svg xmlns="http://www.w3.org/2000/svg" class="text-scheme-green h-8 w-8" fill="none"
							     viewBox="0 0 24 24"
							     stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round"
								      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
							</svg>
						</div>
						<input id="upload-file-brief" type="file" class="hidden">
					</label>

					<button class="col-span-2 py-6 bg-scheme-green text-white rounded-2xl shadow-lg transition duration-200 hover:bg-scheme-dark-green font-bold text-lg md:text-2xl">
						Submit Your Brief
					</button>

				</div>
			</div>
		</div>

	</div>

	<img src="<?= jpp_assets( '/img/png/img-bg-footer.png' ) ?>" alt="" class="">
<?php
get_footer();
