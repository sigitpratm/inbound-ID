<div class="py-16 md:py-28 relative block space-y-8 md:space-y-12">
	<!-- heading -->
	<div>
		<p class="font-bold text-center text-4xl md:text-5xl text-scheme-green">
			<?= emk_options( 'home-last-article-title' ) ?>
		</p>
	</div>

	<!-- body -->
	<div class="overflow-hidden relative space-y-8">
		<!-- tab links -->
		<div id="nav-tab-article" class="relative flex flex-row gap-2 overflow-x-auto">
			<button data-target="tab-article-seo"
			        class="flex-none active-btn-article btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				SEO
			</button>

			<button data-target="tab-article-ads"
			        class="flex-none btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				Digital Advertising
			</button>

			<button data-target="tab-article-analytic"
			        class="flex-none btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				Analytic & Measurement
			</button>

			<button data-target="tab-article-marketing"
			        class="flex-none btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				Content Marketing
			</button>

			<button data-target="tab-article-socmed"
			        class="flex-none btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				Social Media
			</button>

			<button data-target="tab-article-strategy"
			        class="flex-none btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				Campaign Strategy
			</button>

			<button data-target="tab-article-news"
			        class="flex-none btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-1 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				News
			</button>
		</div>

		<!-- tab contents -->
		<div id="panel-article-tab">
			<div id="tab-article-seo"
			     class="hidden active-tab-article content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">

				<!-- card -->
				<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
					<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
						<img src="<?= jpp_assets( '/img/jpg/hero-banner1.jpg' ) ?>" alt=""
						     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
					</div>

					<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
						<a href="" class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2">
							Lorem ipsum dolor sit amet.
						</a>
						<p class="text-sm md:text-base line-clamp-2 text-scheme-gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet animi dolore,
							doloribus ex incidunt magnam molestiae mollitia quod sapiente.
						</p>
						<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
					</div>
				</div>

				<!-- card -->
				<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
					<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
						<img src="<?= jpp_assets( '/img/jpg/hero-banner2.jpg' ) ?>" alt=""
						     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
					</div>

					<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
						<a href="" class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2">
							Lorem ipsum dolor sit amet.
						</a>
						<p class="text-sm md:text-base line-clamp-2 text-scheme-gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet animi dolore,
							doloribus ex incidunt magnam molestiae mollitia quod sapiente.
						</p>
						<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
					</div>
				</div>

				<!-- card -->
				<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
					<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
						<img src="<?= jpp_assets( '/img/jpg/hero-banner3.jpg' ) ?>" alt=""
						     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
					</div>

					<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
						<a href="" class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2">
							Lorem ipsum dolor sit amet.
						</a>
						<p class="text-sm md:text-base line-clamp-2 text-scheme-gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet animi dolore,
							doloribus ex incidunt magnam molestiae mollitia quod sapiente.
						</p>
						<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
					</div>
				</div>

			</div>

			<div id="tab-article-ads"
			     class="hidden content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">

				<!-- card -->
				<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
					<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
						<img src="<?= jpp_assets( '/img/jpg/hero-banner4.jpg' ) ?>" alt=""
						     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
					</div>

					<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
						<a href="" class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2">
							Lorem ipsum dolor sit amet.
						</a>
						<p class="text-sm md:text-base line-clamp-2 text-scheme-gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet animi dolore,
							doloribus ex incidunt magnam molestiae mollitia quod sapiente.
						</p>
						<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
					</div>
				</div>

				<!-- card -->
				<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
					<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
						<img src="<?= jpp_assets( '/img/jpg/hero-banner5.jpg' ) ?>" alt=""
						     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
					</div>

					<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
						<a href="" class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2">
							Lorem ipsum dolor sit amet.
						</a>
						<p class="text-sm md:text-base line-clamp-2 text-scheme-gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet animi dolore,
							doloribus ex incidunt magnam molestiae mollitia quod sapiente.
						</p>
						<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
					</div>
				</div>

				<!-- card -->
				<div class="col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block">
					<div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black">
						<img src="<?= jpp_assets( '/img/jpg/hero-banner1.jpg' ) ?>" alt=""
						     class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
					</div>

					<div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4">
						<a href="" class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2">
							Lorem ipsum dolor sit amet.
						</a>
						<p class="text-sm md:text-base line-clamp-2 text-scheme-gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad amet animi dolore,
							doloribus ex incidunt magnam molestiae mollitia quod sapiente.
						</p>
						<a href="" class="text-sm md:text-base text-scheme-green font-bold">Read more</a>
					</div>
				</div>
			</div>

			<div id="tab-article-analytic"
			     class="hidden content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">
				<div class="col-span-12">
					<p class="text-2xl text-center py-56 text-scheme-gray">Article not found</p>
				</div>
			</div>

			<div id="tab-article-marketing"
			     class="hidden content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">
				<div class="col-span-12">
					<p class="text-2xl text-center py-56 text-scheme-gray">Article not found</p>
				</div>
			</div>

			<div id="tab-article-socmed"
			     class="hidden content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">
				<div class="col-span-12">
					<p class="text-2xl text-center py-56 text-scheme-gray">Article not found</p>
				</div>
			</div>

			<div id="tab-article-strategy"
			     class="hidden content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">
				<div class="col-span-12">
					<p class="text-2xl text-center py-56 text-scheme-gray">Article not found</p>
				</div>
			</div>

			<div id="tab-article-news"
			     class="hidden content-tab-article grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8">
				<div class="col-span-12">
					<p class="text-2xl text-center py-56 text-scheme-gray">Article not found</p>
				</div>
			</div>
		</div>

		<div class="flex items-center justify-center">
			<button class="px-12 py-4 rounded-full border-4 border-scheme-green text-scheme-green transition duration-300 hover:text-white hover:bg-scheme-green font-bold">
				Read More Our Articles
			</button>
		</div>
	</div>
</div>
