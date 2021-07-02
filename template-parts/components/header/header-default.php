<!-- This example requires Tailwind CSS v2.0+ -->
<header class="fixed w-full bg-transparent transition duration-300 border-b" style="z-index: 999"
		x-bind:class="{ 'bg-white shadow-lg': !atTop }"
		x-data="{ openMobileMenu: false }" xmlns:x-bind="http://www.w3.org/1999/xhtml">
	<div class="max-w-7xl mx-auto px-4 sm:px-6">
		<div class="flex justify-between items-center  py-4 md:justify-start md:space-x-10 2xl:font-medium">
			<div class="flex justify-start lg:w-0 lg:flex-1">
				<a href="<?= home_url('/')?>">
					<span class="sr-only">Workflow</span>
					<img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
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
				<div class="relative" x-data="{ open: false }">
					<!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
					<button type="button" @click="open = ! open"
							class="group rounded-md inline-flex items-center text-base font-medium hover:text-green-900
							focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent text-gray-700 text-lg"
					>
						<span>Products</span>
						<!--
						  Heroicon name: solid/chevron-down

						  Item active: "text-gray-600", Item inactive: "text-gray-400"
						-->
						<svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
							 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
							 aria-hidden="true">
							<path fill-rule="evenodd"
								  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
								  clip-rule="evenodd"/>
						</svg>
					</button>

					<!--
					  'Solutions' flyout menu, show/hide based on flyout menu state.

					  Entering: "transition ease-out duration-200"
						From: "opacity-0 translate-y-1"
						To: "opacity-100 translate-y-0"
					  Leaving: "transition ease-in duration-150"
						From: "opacity-100 translate-y-0"
						To: "opacity-0 translate-y-1"
					-->
					<div x-show="open" x-transition:enter="transition ease-out duration-200"
						 x-transition:enter-start="opacity-0 translate-y-1"
						 x-transition:enter-end="opacity-100 translate-y-0"
						 x-transition:leave="transition ease-in duration-150"
						 x-transition:leave-start="opacity-100 translate-y-0"
						 x-transition:leave-end="opacity-0 translate-y-1"
						 x-description="'Solutions' flyout menu, show/hide based on flyout menu state."
						 class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
						 x-ref="panel" @click.away="open = false">
						<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
							<div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
								<a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
									<!-- Heroicon name: outline/chart-bar -->
									<svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										 stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
									</svg>
									<div class="ml-4">
										<p class="text-base font-medium text-gray-900">
											Suaraku
										</p>
										<p class="mt-1 text-sm text-gray-500">
											Get a better understanding of where your traffic is coming from.
										</p>
									</div>
								</a>

								<a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
									<!-- Heroicon name: outline/cursor-click -->
									<svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										 stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											  d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
									</svg>
									<div class="ml-4">
										<p class="text-base font-medium text-gray-900">
											VidioMax
										</p>
										<p class="mt-1 text-sm text-gray-500">
											Speak directly to your customers in a more meaningful way.
										</p>
									</div>
								</a>

								<a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
									<!-- Heroicon name: outline/shield-check -->
									<svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										 stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
									</svg>
									<div class="ml-4">
										<p class="text-base font-medium text-gray-900">
											Jalan Pintas
										</p>
										<p class="mt-1 text-sm text-gray-500">
											Your customers&#039; data will be safe and secure.
										</p>
									</div>
								</a>

								<a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
									<!-- Heroicon name: outline/view-grid -->
									<svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
										 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										 stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											  d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
									</svg>
									<div class="ml-4">
										<p class="text-base font-medium text-gray-900">
											IndoXXI
										</p>
										<p class="mt-1 text-sm text-gray-500">
											Connect with third-party tools that you&#039;re already using.
										</p>
									</div>
								</a>
							</div>
							<div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">

								<a href="#"
								   class=" text-center -m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
									<!-- Heroicon name: outline/play -->
									<svg class="flex-shrink-0 h-6 w-6 text-gray-400"
										 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										 stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											  d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											  d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
									</svg>
									<span class="ml-3">More Products</span>
								</a>
							</div>

						</div>
					</div>
				</div>

				<a href="#" class="text-base font-medium text-gray-700 text-lg hover:text-gray-900">
					Backlink
				</a>
				<a href="#" class="text-base font-medium text-gray-700 text-lg hover:text-gray-900">
					Docs
				</a>
			</nav>
			<div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0"
				 x-data="{ profileOpen: false }">
				<a href="#"
				   class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-8 py-2 border border-transparent rounded-3xl shadow-sm text-base font-medium text-white bg-gray-800 hover:bg-gray-900">
					Sign in
				</a>
				<!--				<div class="relative">-->
				<!--					<div>-->
				<!--						<button type="button"-->
				<!--								@click="profileOpen = true"-->
				<!--								class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"-->
				<!--								id="user-menu-button" aria-expanded="false" aria-haspopup="true">-->
				<!--							<span class="sr-only">Open user menu</span>-->
				<!--							<img class="h-8 w-8 rounded-full"-->
				<!--								 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"-->
				<!--								 alt="">-->
				<!--						</button>-->
				<!--					</div>-->
				<!---->
				<!--					<div-->
				<!--							@click.away="profileOpen = false"-->
				<!--							x-show="profileOpen"-->
				<!--							x-transition:enter="transition ease-out duration-100"-->
				<!--							x-transition:enter-start="transform opacity-0 scale-95"-->
				<!--							x-transition:enter-end="transform opacity-100 scale-100"-->
				<!--							x-transition:leave="transition ease-in duration-75"-->
				<!--							x-transition:leave-start="transform opacity-100 scale-100"-->
				<!--							x-transition:leave-end="transform opacity-0 scale-95"-->
				<!--							class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"-->
				<!--							role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">-->
				<!--						 Active: "bg-gray-100", Not Active: "" -->
				<!--						<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"-->
				<!--						   id="user-menu-item-0">Your Profile</a>-->
				<!--						<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"-->
				<!--						   id="user-menu-item-1">Settings</a>-->
				<!--						<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"-->
				<!--						   id="user-menu-item-2">Sign out</a>-->
				<!--					</div>-->
				<!--				</div>-->
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
						<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
							 alt="Workflow">
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
							<svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Analytics
              </span>
						</a>

						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/cursor-click -->
							<svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Engagement
              </span>
						</a>

						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/shield-check -->
							<svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Security
              </span>
						</a>

						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/view-grid -->
							<svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Integrations
              </span>
						</a>

						<a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
							<!-- Heroicon name: outline/refresh -->
							<svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
								 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
							</svg>
							<span class="ml-3 text-base font-medium text-gray-900">
                Automations
              </span>
						</a>
					</nav>
				</div>
			</div>
			<div class="py-6 px-5 space-y-6">
				<div class="grid grid-cols-2 gap-y-4 gap-x-8">
					<a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
						Pricing
					</a>

					<a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
						Docs
					</a>

					<a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
						Help Center
					</a>

					<a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
						Guides
					</a>

					<a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
						Events
					</a>

					<a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
						Security
					</a>
				</div>
				<div>
					<a href="#"
					   class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
						Sign up
					</a>
					<p class="mt-6 text-center text-base font-medium text-gray-500">
						Existing customer?
						<a href="#" class="text-indigo-600 hover:text-indigo-500">
							Sign in
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</header>
