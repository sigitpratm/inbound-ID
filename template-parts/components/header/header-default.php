<header id="header" class="ease-in-out z-50 fixed top-0 w-full bg-transparent">
	<div class="container mx-auto flex flex-row justify-between py-4 md:py-8 px-4 xl:px-0 relative">
		<a href="<?= home_url() ?>" class="flex items-center">
			<img src="<?= jpp_assets( '/img/png/img-nav-logo-2.png' ) ?>" alt="" class="h-4 md:h-8 w-auto">
		</a>

		<!-- lg nav -->
		<div id="large-nav" class="hidden xl:flex items-center gap-6">
			<nav class="md:ml-auto flex flex-wrap items-center text-base justify-center font-bold text-scheme-green">
				<?php
				wp_nav_menu(
						array(
								'menu'           => 'default-menu',
								'theme_location' => 'default-menuku',
						)
				);
				?>
			</nav>
		</div>

		<div class="hidden md:flex justify-center items-center">
			<?php get_search_form() ?>
		</div>

		<!-- sm nav -->
		<div id="small-nav"
			 class="xl:hidden block small-nav w-full h-screen bg-scheme-light-gray absolute -left-full top-full z-40 border-t border-gray-300">
			<nav id="content-sm-nav" class="flex flex-col items-start justify-start p-4 gap-4 font-bold">
				<div class="relative w-full">
					<button class="p-2 bg-green-500 rounded-full absolute top-1 right-1.5 text-white">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
							 stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round"
								  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
						</svg>
					</button>
					<label class="block w-full">
						<input type="text"
							   class="w-full text-sm border border-gray-300 py-2 pl-6 pr-12 h-10 rounded-full bg-white"
							   placeholder="search..">
					</label>
				</div>

				<div id="item-nav" class="w-full flex flex-col items-start justify-start py-4 gap-4 text-sm">
					<a href="#"
					   class="hidden btn btn-nav-sm w-full p-2 rounded-md hover:text-green-700 transition duration-200 cursor-pointer active-nav">HOME</a>
					<div class="small-menu">
						<?php
						wp_nav_menu(
								array(
										'menu'           => 'default-menu',
										'theme_location' => 'default-menuku',
								)
						);
						?>
					</div>
				</div>

			</nav>
		</div>

		<!-- btn burger -->
		<div class="flex xl:hidden items-center">
			<button id="btn-burger">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd"
						  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						  clip-rule="evenodd"/>
				</svg>
			</button>
		</div>
	</div>
</header>
