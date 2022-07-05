<?php
$arguments = [
		"category" => [
				[
						"key"   => "seo",
						"label" => "SEO"
				],
				[
						"key"   => "digital-advertising",
						"label" => "Digital Advertising"
				]
		]
];
?>

<?php
$data = array_reverse( emk_options( "case-studies-select-categories" ) );
?>

<div class="w-full space-y-10 mx-auto container px-4 md:px-0">
	<div class=" py-20 flex flex-col space-y-6">
		<div class="w-full flex items-center md:justify-center gap-4 overflow-x-auto pb-4 md:pb-0">
			<button
					data-tax-query="[{key:'slug',}]"
					data-target="all" data-tab="case-studies"
					data-tab-active="0" data-index="0"
					class="flex-none active-btn-article btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-2 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
				ALL
			</button>
			<?php
			for ( $i = 0; $i < count( $data ); $i ++ ):
				$item = get_term( $data[ $i ] );
				if ( ! empty( $item ) ): ?>
					<button
							data-tax-query="[{key:'slug',}]"
							data-target="<?= $item->slug ?>" data-tab="case-studies"
							data-tab-active="<?= $i === 0 ?>" data-index="<?= $i + 1; ?>"
							class="flex-none  btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-2 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
						<?= $item->name ?>
					</button>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
		<!-- tab contents -->
		<div id="panel-article-tab">
			<div data-tab-content="case-studies"
				 class="active-tab-article content-tab-article flex flex-col lg:grid lg:grid-cols-12 gap-4 md:gap-8">

				<!-- card -->
				<?php
				$args       = array(
						'post_type'      => [ 'case-study' ],
						'post_status'    => 'publish',
						'order'          => 'DESC',
						'paged'          => 1,
						'posts_per_page' => 4,
				);
				$meta_query = new WP_Query( $args );
				$meta_query->set( 'posts_per_page', 4 );
				$meta_query->set( 'paged', 1 );
				$meta_query->query( $meta_query->query_vars );


				if ( $meta_query->have_posts() ) {
					//Define and empty array
					$data = array();
					// Store each post's title in the array
					while ( $meta_query->have_posts() ) {
						$meta_query->the_post();

						?>
						<div class="col-span-1 md:col-span-3 overflow-hidden bg-white  rounded-2xl md:rounded-none md:bg-transparent transition duration-300 flex flex-row md:block gap-4">
							<div class="h-full flex-none w-[10rem] md:w-auto xl:h-52 overflow-hidden bg-black rounded-tl-2xl rounded-tr-2xl">
								<img src="<?= get_the_post_thumbnail_url( get_the_ID() ); ?>" alt=""
									 class="object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60">
							</div>

							<div class="py-4 flex flex-col items-start justify-center gap-2">
								<div class="flex flex-col space-y-1 w-full flex-grow overflow-hidden">
									<a href="<?= get_the_permalink(get_the_ID());?>"
									   class="text-lg md:text-3xl font-bold text-scheme-green line-clamp-2 ">
										<?= get_the_title( get_the_ID() ) ?>
									</a>
								</div>


								<p class="text-sm md:text-base overflow-y-hidden line-clamp-3">
									<?php
									$excerpt = get_the_excerpt();
									$excerpt = substr( $excerpt, 0, 100 );
									$result  = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
									echo $result;
									?>
								</p>
								<a href="<?= get_permalink( get_the_ID() ); ?>"
								   class="text-sm md:text-base text-scheme-green font-bold flex items-center">
									<span>Read more</span>
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
										 fill="currentColor">
										<path fill-rule="evenodd"
											  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
											  clip-rule="evenodd"/>
									</svg>
								</a>
							</div>
						</div>
					<?php }
				}
				wp_reset_postdata();
				wp_reset_query();
				?>
			</div>
		</div>
	</div>


</div>


<script>
	function handleChangeTabs(attr = null, callback = () => {
	}) {
		try {
			let elements = document.querySelectorAll(attr)
			if (typeof (elements) !== "undefined" && elements) {
				if (elements.length > 0) {
					let state = [
						{id: 0, active: true},
						{id: 1, active: false},
						{id: 2, active: false},
					]

					function updateState(id) {
						let NewState = []
						for (let i = 0; i < state.length; i++) {
							let item = state[i]
							if (item.id === id) {
								NewState.push({
									id: id,
									status: true
								})
							} else {
								NewState.push({
									id: item.id,
									status: false
								})
							}
						}

						state = NewState
						return state
					}

					elements.forEach((el, index) => {

						el.addEventListener('click', (e) => {
							updateState(index)
							elements.forEach(el => {
								el.classList.remove('active-btn-article')
							})
							el.classList.add('active-btn-article')
							callback(el.getAttribute("data-target"))
						})
					})
				}
			}
		} catch (err) {

		}
	}

	handleChangeTabs('[data-tab="case-studies"]', (target) => {
		ContentFetching(`[data-tab-content="case-studies"]`, 'slug', target)
	})

	function ContentFetching(attr, field = "slug", terms = null) {
		let elements = document.querySelectorAll(attr)


		if (typeof (elements) !== "undefined" && elements) {
			if (elements.length > 0) {
				elements.forEach((el) => {
					el.innerHTML = el.getAttribute("data-podcast-empty")
					el.innerHTML = `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
					el.innerHTML += `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
					el.innerHTML += `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`

					let params = {}

					if (terms !== "all") {
						params = {
							limit: 10,
							paged: 1,
							post_type: "case-study",
							post_status: "publish",
							orderby: "date",
							order: "DESC",
							// "meta_query[key]": "case_studies",
							// "meta_query[value]": 1,
							// "meta_query[relation]": "OR",
							// "meta_query[compare]": "=",
							"tax_query[taxonomy]": "case-study-category",
							"tax_query[field]": field,
							"tax_query[terms]": terms
						}
					} else {
						params = {
							limit: 4,
							paged: 1,
							post_type: "case-study",
							post_status: "publish",
							orderby: "date",
							order: "DESC",
							// "meta_query[key]": "case_studies",
							// "meta_query[value]": 1,
							// "meta_query[relation]": "OR",
							// "meta_query[compare]": "=",
						}
					}

					window.fetchingData({
						url: `${SITE_URL}/wp-json/emkalab/v1/post/`,
						params: {
							...params
						}
					})
						.then((response) => {
							console.log(response, "REPSONSE")
							el.innerHTML = ""
							if (typeof (response?.data) !== "undefined" && Array.isArray(response?.data)) {
								if (response?.data?.length > 0) {
									for (let i = 0; i < response?.data?.length; i++) {
										let data = response?.data[i]
										if (i < 4) {
											el.append(CardHTML(data))
										}
										// if (typeof(CardHTML) !== "undefined" && typeof(CardHTML) === "function"){

										// }

									}
								} else {
									if (typeof (EmptyLayout) !== "undefined" && typeof (EmptyLayout) === "function") {
										el.append(EmptyLayout(el.getAttribute("data-podcast-empty") ?? "Belum Ada Postingan"))
									}
								}
							}

							if (typeof (ChangeImageOnError) !== "undefined" && typeof (ChangeImageOnError) === "function") {
								ChangeImageOnError()
							}
						})
						.catch((err) => {
							console.log(err, 'error')
						})
				})
			}
		}
	}

	function CardHTML(data = {}) {
		try {
			let element = document.createElement("div")
			element.className = `col-span-1 md:col-span-3 overflow-hidden gap-4 bg-white rounded-xl md:bg-transparent transition duration-300 flex flex-row md:block`

			let elImages = document.createElement("div")
			elImages.className = `h-full flex-none w-[10rem] md:w-auto xl:h-52 overflow-hidden rounded-xl md:rounded-tl-2xl md:rounded-tr-2xl`

			let img = document.createElement('img')
			img.src = data?.thumbnail?.url ?? ""
			img.className = `object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60`
			img.alt = "images"

			elImages.append(img)

			element.append(elImages)

			let elFirst = document.createElement("div")
			elFirst.className = "pr-4 md:pr-0 py-4 flex flex-col items-start justify-center gap-2"

			let divElFirst = document.createElement("div")
			divElFirst.className = "flex flex-col space-y-1 overflow-hidden"
			/**
			 * category
			 */
			let Pcat = document.createElement("p")
			Pcat.className = "font-bold"

			if (typeof (data?.category) !== "undefined" && data?.category.length > 0) {
				Pcat.innerText = data?.category[0]?.cat_name ?? "-"
			}

			divElFirst.append(Pcat)


			let elTitle = document.createElement("a")
			elTitle.className = `text-lg md:text-3xl w-full font-bold text-scheme-green whitespace-nowrap `
			elTitle.innerText = typeof (data?.post_title) !== "undefined" ? data?.post_title : "-"
			elTitle.style.textOverflow = "ellipsis"
			elTitle.href = typeof (data?.url) !== "undefined" ? data?.url : ""


			divElFirst.append(elTitle)

			elFirst.append(divElFirst)

			let elDesc = document.createElement("p")
			elDesc.className = 'text-sm md:text-base line-clamp-2  line-clamp-3 overflow-y-hidden'
			elDesc.innerText = data?.post_content ?? "-"

			elFirst.append(elDesc)


			let elHref = document.createElement("a")
			elHref.href = typeof (data?.post_title) !== "undefined" ? data?.post_title : "-"
			elHref.className = `text-sm md:text-base text-scheme-green font-bold`
			elHref.innerText = `Read More >`

			elFirst.append(elHref)

			element.append(elFirst)

			return element
		} catch (err) {
			return ""
		}
	}

</script>
