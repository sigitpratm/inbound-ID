<!-- This example requires Tailwind CSS v2.0+ -->
<header class="fixed w-full bg-transparent transition duration-300 border-b" style="z-index: 999"
		x-bind:class="{ 'bg-white shadow-lg': !atTop }"
		x-data="{ openMobileMenu: false }" xmlns:x-bind="http://www.w3.org/1999/xhtml">
	<div class="max-w-7xl mx-auto px-4 sm:px-6">
		<div class="flex justify-between items-center  py-4 md:justify-start md:space-x-10 2xl:font-medium">
			<div class="flex justify-start lg:w-0 lg:flex-1">
				<a href="<?= home_url( '/' ) ?>">
					<span class="sr-only">Jippi Themes</span>
					<img class="h-8 w-auto sm:h-10" src="<?= jpp_assets('img/logo-jippi.png')?>"
						 alt="">
				</a>
			</div>
			<div class="-mr-2 -my-2 md:hidden">
				<button type="button"
						@click="openMobileMenu = true"
						class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
						aria-expanded="false">
					<span class="sr-only">Open menu</span>
					<!-- Heroicon name: outline/menu -->
					<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						 stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							  d="M4 6h16M4 12h16M4 18h16"/>
					</svg>
				</button>
			</div>
			<nav class="hidden md:flex space-x-10">
				<a href="<?= home_url( '/product' ) ?>"
				   class="text-base font-medium text-gray-700 text-lg hover:text-gray-900">
					Product
				</a>
				<a target="_blank" href="https://jippi.co.id"
				   class="text-base font-medium text-gray-700 text-lg hover:text-gray-900">
					Backlink
				</a>
				<a target="_blank" href="https://docs.jippi.co.id"
				   class="text-base font-medium text-gray-700 text-lg hover:text-gray-900">
					Docs
				</a>
			</nav>
			<div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0"
				 x-data="{ profileOpen: false }">
				<a href="https://my.jippi.id"
				   class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-8 py-2 border border-transparent rounded-3xl shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-900">
					Sign in
				</a>
			</div>
		</div>
	</div>

	<!--
	  Mobile menu, show/hide based on mobile menu state.

	  Entering: "duration-200 ease-out"
		From: "opacity-0 scale-95"
		To: "opacity-100 scale-100"
	  Leaving: "duration-100 ease-in"
		From: "opacity-100 scale-100"
		To: "opacity-0 scale-95"
	-->
	<div
			style="display: none"
			x-show="openMobileMenu" x-transition:enter="transition ease-out duration-200"
			x-transition:enter-start="opacity-0 translate-y-1"
			x-transition:enter-end="opacity-100 translate-y-0"
			x-transition:leave="transition ease-in duration-150"
			x-transition:leave-start="opacity-100 translate-y-0"
			x-transition:leave-end="opacity-0 translate-y-1"
			class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
		<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
			<div class="pt-5 pb-6 px-5">
				<div class="flex items-center justify-between">
					<div>
						<img class="h-8 w-auto" src="<?= jpp_assets('img/logo-jippi.png')?>"
							 alt="Jippi">
					</div>
					<div class="-mr-2">
						<button type="button"
								@click="openMobileMenu = false"
								class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
							<span class="sr-only">Close menu</span>
							<!-- Heroicon name: outline/x -->
							<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
								 stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M6 18L18 6M6 6l12 12"/>
							</svg>
						</button>
					</div>
				</div>
				<div class="mt-6">
					<nav class="grid gap-y-8">
						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/chart-bar -->
							<svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Product
              </span>
						</a>

						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/cursor-click -->
							<svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                PBN Backlink
              </span>
						</a>


						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/view-grid -->
							<svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Documentation
              </span>
						</a>
					</nav>
				</div>
			</div>
			<div class="py-6 px-5 space-y-6">
				<div>
					<a href="https://my.jippi.id"
					   class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">
						Sign in
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
