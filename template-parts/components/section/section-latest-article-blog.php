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
//$data = array_reverse( array( emk_options( "last-article-categories" ) ) );
$data = emk_options( "last-article-categories" );
?>

<div class="py-16 md:py-28 relative block space-y-8 md:space-y-12">
	<?php if ( ! empty( emk_options( "last-article-categories" ) ) ): ?>
		<!-- body -->
		<div class="overflow-hidden relative space-y-8">

			<!-- tab links -->
			<div id="nav-tab-article2"

				 class="relative flex flex-row gap-2 md:items-center md:justify-center overflow-x-auto">
				<?php
				for ( $i = 0; $i < count( $data ); $i ++ ):
					$item = get_term( $data[ $i ] );
					if ( ! empty( $item ) ):
						?>

						<button data-target="<?= $item->slug ?>" data-tab="last-article-blog"
								data-tab-active="<?= $i === 0 ?>" data-index="<?= $i; ?>"
								class="flex-none <?= $i === 0 ? "active-btn-article" : "" ?>  btn-tab-article w-48 xl:w-52 bg-scheme-gray px-4 rounded-full py-2 lg:py-4 font-bold text-white text-sm lg:text-sm 2xl:text-base">
							<?= $item->name ?>
						</button>

					<?php endif; ?>
				<?php endfor; ?>
			</div>

			<!-- tab contents -->
			<div id="panel-article-tab2">
				<div id="tab-article-seo2" data-tab-content="last-article-blog"
					 class="active-tab-article content-tab-article flex flex-col lg:grid lg:grid-cols-12 gap-4 md:gap-8">

					<!-- card -->
					<?php
					$args       = array(
							'post_type'      => "post",
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
							'paged'          => 1,
							'posts_per_page' => 3,
							"tax_query"      => [
									[
											'taxonomy' => "category",
											'field'    => "slug",
											'terms'    => get_term( $data[0] )->slug,
											'operator' => 'IN',
									]
							]
					);
					$meta_query = new WP_Query( $args );
					$meta_query->set( 'posts_per_page', 3 );
					$meta_query->set( 'paged', 1 );
					$meta_query->query( $meta_query->query_vars );


					if ( $meta_query->have_posts() ) {
						//Define and empty array
						$data = array();
						// Store each post's title in the array
						while ( $meta_query->have_posts() ) {
							$meta_query->the_post(); ?>

							<div class="col-span-1 md:col-span-4 overflow-hidden bg-white  rounded-3xl transition duration-300 flex flex-row md:block gap-4">
								<div class="flex flex-col">
									<div class="h-[180px] md:h-xl:h-[200px] xl:h-[230px] 2xl:h-[300px] bg-red-100 overflow-hidden">
										<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
											 class="object-cover w-full h-full transition duration-500 hover:scale-105">
									</div>
									<div class="px-6 py-4 md:px-8 md:py-6 space-y-4 xl:space-y-4 2xl:space-y-6">
										<p class="line-clamp-2 text-scheme-green font-bold text-xl xl:text-2xl 2xl:text-3xl">
											<a href="<?= get_the_permalink() ?>">
												<?= get_the_title() ?>
											</a>
										</p>
										<p class="line-clamp-3 text-sm xl:text-sm 2xl:text-base">
											<?= wp_strip_all_tags( get_the_excerpt() ) ?>
										</p>
										<div>
											<a href="<?= get_the_permalink() ?>"
											   class="">
												<span class="font-bold text-lg text-scheme-green">Read more</span>
											</a>
										</div>
									</div>
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

	<?php endif; ?>
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

	handleChangeTabs('[data-tab="last-article-blog"]', (target) => {
		ContentFetching(`[data-tab-content="last-article-blog"]`, 'slug', target)
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
							limit: 3,
							paged: 1,
							post_type: "post",
							post_status: "publish",
							orderby: "date",
							order: "DESC",
							// "meta_query[key]": "case_studies",
							// "meta_query[value]": 1,
							// "meta_query[relation]": "OR",
							// "meta_query[compare]": "=",
							"tax_query[taxonomy]": "category",
							"tax_query[field]": field,
							"tax_query[terms]": terms
						}
					} else {
						params = {
							limit: 3,
							paged: 1,
							post_type: "post",
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
							el.innerHTML = ""
							if (typeof (response?.data) !== "undefined" && Array.isArray(response?.data)) {
								if (response?.data?.length > 0) {
									for (let i = 0; i < response?.data?.length; i++) {
										let data = response?.data[i]
										if (i < 3) {
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
			element.className = `col-span-1 md:col-span-4 overflow-hidden gap-4 bg-white rounded-3xl transition duration-300 flex flex-row md:block`

			let divSpecials = document.createElement('div')
			divSpecials.className = 'flex flex-col'

			let elImages = document.createElement("div")
			elImages.className = `h-[180px] md:h-xl:h-[200px] xl:h-[230px] 2xl:h-[300px] bg-red-100 overflow-hidden`

			let img = document.createElement('img')
			img.src = data?.thumbnail?.url ?? ""
			img.className = `object-cover w-full h-full transition duration-500 hover:scale-105`
			img.alt = "images"

			elImages.append(img)
			divSpecials.append(elImages)



			let elFirst = document.createElement("div")
			elFirst.className = "p-4 flex flex-col items-start justify-center gap-2 overflow-hidden"

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
			elTitle.className = `text-lg md:text-3xl w-full font-bold text-scheme-green line-clamp-2 `
			elTitle.innerText = typeof (data?.post_title) !== "undefined" ? data?.post_title : "-"
			elTitle.style.textOverflow = "ellipsis"
			elTitle.href = typeof (data?.url) !== "undefined" ? data?.url : ""


			divElFirst.append(elTitle)

			elFirst.append(divElFirst)

			console.log({data},'POST CONTENT')
			let elDesc = document.createElement("p")
			elDesc.className = 'text-sm md:text-base line-clamp-2  line-clamp-3 overflow-y-hidden'
			elDesc.innerHTML = data?.post_content !== "" ?data?.post_content :  data?.fields?.study?.description ?? "-"

			elFirst.append(elDesc)


			let elHref = document.createElement("a")
			elHref.href = typeof (data?.post_title) !== "undefined" ? data?.post_title : "-"
			elHref.className = `text-sm md:text-base text-scheme-green font-bold`
			elHref.innerText = `Read More >`

			elFirst.append(elHref)

			divSpecials.append(elFirst)
			element.append(divSpecials	)

			return element
		} catch (err) {
			return ""
		}
	}

</script>
