/**
 * Manage global libraries like jQuery or THREE from the webpack.mix.js file
 */
require('lottie-web')
import axios from 'axios'
import Alpine from 'alpinejs'

window.Axios = axios
window.Alpine = Alpine
window.fetchingData = async function fetchingData(props) {
	try {
		return await axios.get(props.url, {
			headers: {
				"Content-Type": "application/json"
			},
			params: {
				...props.params
			}
		})
			.then((response) => {
				let newData = []
				let pagination = {
					total: 0,
					total_page: 0,
					current_page: 1,
					posts_per_page: props?.params?.limit ?? 10
				}
				if (response?.status === 200) {
					let data = response?.data
					if (typeof (data) !== "undefined") {
						pagination = {
							total: data?.total ?? 0,
							total_page: data?.total_page ?? 0,
							current_page: data?.current_page ?? 1,
							posts_per_page: data?.posts_per_page ?? 10
						}
						if (typeof (data?.results) !== "undefined") {
							newData = [
								...data?.results
							]
						}
					}
				}
				return {
					error: false,
					message: null,
					pagination,
					data: newData
				}
			})
			.catch((err) => {
				return {
					error: true,
					message: err.message,
					pagination: {
						total: 0,
						total_page: 0,
						current_page: 1,
						posts_per_page: this?.params?.limit ?? 10
					},
					data: []
				}
			})
	} catch (err) {
		return {error: true, message: err.message}
	}
}

window.dropdown = () => {
	Alpine.data('dropdown', () => ({
		open: false,

		toggle() {
			this.open = !this.open
		}
	}))
}

Alpine.store('accordion', {
	tab: 0
})
Alpine.start()

/**
 * PODCAST CARD
 */
const PodcastCard = function (attr) {
	let elems = document.querySelectorAll(`[data-podcast]`)

	if (typeof (elems) !== "undefined") {
		if (elems.length > 0) {
			// console.log(elems, "NEWS")
			elems.forEach((el) => {
				el.innerHTML = ""
				el.innerHTML = "<div class='w-full col-span-4 flex items-center justify-center h-[200px]'>Loading...</div>"
				// console.log(el, "ini item nya")
				axios.get(`${SITE_URL}/wp-json/emkalab/v1/post/`, {
					params: {
						limit: 10,
						paged: 1,
						post_type: "podcast",
						post_status: "publish",
						orderby: "date",
						order: "DESC",
						"meta_query[key]": "content_type",
						"meta_query[value]": el.getAttribute("data-podcast") ?? "watched",
						"meta_query[relation]": "OR",
					}
				})
					.then((response) => {
						el.innerHTML = ""
						if (typeof (response?.data?.results) !== "undefined" && Array.isArray(response?.data?.results)) {
							if (response?.data?.results.length > 0) {
								for (let i = 0; i < response?.data?.results.length; i++) {
									let data = response?.data?.results[i]
									el.append(cardPodcast(data))
								}
							} else {
								el.append(EmptyLayout(el.getAttribute("data-podcast-empty") ?? "Belum Ada Postingan"))
							}
						}
						ChangeImageOnError()
					})
					.catch((err) => {
						console.error(err, err.message)
					})
			})
		}
	}
}

window.PodcastCard = PodcastCard


/**
 * AWARD CARD
 */
const AwardCard = function (attr) {
	let elems = document.querySelectorAll(`[data-award]`)

	if (typeof (elems) !== 'undefined') {
		if (elems.length > 0) {
			// console.log(elems, "AWARDS")
			elems.forEach((el) => {
				el.innerHTML = ""
				el.innerHTML = "<div class='w-full grid-cols-1 md:col-span-2 space-y-2 h-[200px]'>Loading...</div>"
				axios.get(`${SITE_URL}/wp-json/emkalab/v1/post/`, {
					params: {
						limit: 5,
						paged: 1,
						post_type: "post",
						post_status: "publish",
						orderby: "date",
						order: "DESC",
						"meta_query[key]": "item_type",
						"meta_query[value]": 3,
					}
				})
					.then((response) => {
						el.innerHTML = ""
						if (typeof (response?.data?.results) !== "undefined" && Array.isArray(response?.data?.results)) {
							if (response?.data?.results.length > 0) {
								for (let i = 0; i < response?.data?.results.length; i++) {
									let data = response?.data?.results[i]
									el.append(cardAward(data))
								}
							} else {
								el.append(EmptyLayout(el.getAttribute("data-award-empty") ?? "Belum Ada Postingan"))
							}
						}
						ChangeImageOnError()
					})
					.catch((err) => {
						console.error("ERROR AWARDS:", err, err.message)
					})
			})
		}
	}
}

window.AwardCard = AwardCard


window.addEventListener('DOMContentLoaded', function () {
	PodcastCard('listened')
	AwardCard('listened')
})

/**
 * CREATE ELEMENT CARD PODCAST
 */
function cardPodcast(data = {}) {
	let elem = document.createElement("div")
	elem.className = "col-span-2 md:col-span-1 w-full min-h-[320px] rounded-xl space-y-6"
	let el1 = document.createElement("div")
	el1.className = "w-full min-h-[280px] bg-gray-50 rounded-xl overflow-hidden relative"

	let imgs = document.createElement('img')
	imgs.src = data?.thumbnail?.url ?? ""
	imgs.alt = "images-card"
	imgs.className = "w-full h-full absolute top-1/2 left-1/2 transform -translate-x-2/4 -translate-y-2/4 object-cover"

	el1.append(imgs)
	elem.append(el1)

	let el2 = document.createElement('div')
	el2.className = "w-full flex items-center justify-center relative px-0 md:px-6"

	let a = document.createElement("a")
	a.className = "w-full py-2 md:py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold text-center"
	a.target = "_blank"
	a.rel = "nofollow"
	if (typeof (data?.fields?.podcast?.social?.type) !== "undefined" && typeof (data?.fields?.podcast?.social?.url) !== "undefined") {
		a.href = data?.fields?.podcast?.social?.url

		if (data?.fields?.podcast?.content_type === "listened") {
			a.innerText = "Listen on Spotify"
		} else if (data?.fields?.podcast?.content_type === "watched") {
			a.innerText = "Watch on Youtube"
		} else if (data?.fields?.podcast?.content_type === "classes") {
			a.innerText = "See More"
		}
	}
	el2.append(a)
	elem.append(el2)

	return elem
}


/**
 * CREATE ELEMENT CARD AWARD
 */
function cardAward(data = {}) {
	let mainElem = document.createElement("div")
	mainElem.className = "grid-cols-1 md:col-span-2 space-y-6"

	let childEl1 = document.createElement("div")
	childEl1.className = "h-60 flex items-end justify-center"

	let imgChildEl1 = document.createElement("img")
	imgChildEl1.className = "object-contain max-h-60 h-full w-auto"
	imgChildEl1.src = data?.thumbnail?.url ?? ""
	imgChildEl1.alt = "img-card-award"

	let childEl2 = document.createElement("div")
	let pChildEl2 = document.createElement("p")
	pChildEl2.className = "text-lg font-bold text-scheme-green text-center"
	pChildEl2.innerText = data?.post_title ?? "-"

	childEl1.append(imgChildEl1)
	childEl2.append(pChildEl2)

	mainElem.append(childEl1)
	mainElem.append(childEl2)

	return mainElem
}

function EmptyLayout(txt, classes = "col-span-4 h-[240px] flex items-center justify-center") {
	let elem = document.createElement('div')
	elem.className = `${classes}`
	elem.innerText = txt
	return elem
}


/**
 * IMAGE ERROR
 */
function ChangeImageOnError() {
	let images = document.querySelectorAll('img')
	if (typeof (images) !== "undefined") {
		// console.log("ChangeImageOnError : ", images)

		if (images.length > 0) {
			images.forEach((el) => {
				el.addEventListener('error', function () {
					el.setAttribute("src", TEMPLATE_URL + "/assets/dist/img/post-notfound.png")
					return true;
				})
			})
		}
	}
}

ChangeImageOnError()


function ContentArticleTabByCategory(attr = "last-article", field = "slug", terms = null) {
	let elements = document.querySelectorAll(`[data-tab-content="${attr}"]`)


	if (typeof (elements) !== "undefined" && elements) {
		if (elements.length > 0) {
			elements.forEach((el) => {
				// console.log(el, "CONTENT ARTICLE TAB BY CTAEGORY")
				el.innerHTML = `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
				el.innerHTML += `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
				el.innerHTML += `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
				axios.get(`${SITE_URL}/wp-json/emkalab/v1/post/`, {
					params: {
						limit: 10,
						paged: 1,
						post_type: "post",
						post_status: "publish",
						orderby: "date",
						order: "DESC",
						// "meta_query[key]": "content_type",
						// "meta_query[value]": el.getAttribute("data-podcast") ?? "watched",
						// "meta_query[relation]": "OR",
						"tax_query[taxonomy]": "category",
						"tax_query[field]": field,
						"tax_query[terms]": terms
					}
				})
					.then((response) => {
						el.innerHTML = ""
						if (typeof (response?.data?.results) !== "undefined" && Array.isArray(response?.data?.results)) {
							if (response?.data?.results.length > 0) {
								for (let i = 0; i < response?.data?.results.length; i++) {
									let data = response?.data?.results[i]
									el.append(CardArticleDefault(data))
								}
							} else {
								el.append(EmptyLayout(el.getAttribute("data-podcast-empty") ?? "Belum Ada Postingan"))
							}
						}
						ChangeImageOnError()
					})
					.catch((err) => {
						console.error(err, err.message)
					})
				// window.fetchingData({
				// 	params: {
				//
				// 	}
				// })
			})
		}
	}
}

function ContentArticleTabByCategoryStudies(attr = "last-article", field = "slug", terms = null) {
	let elements = document.querySelectorAll(`[data-tab-content="${attr}"]`)

	if (typeof (elements) !== "undefined" && elements) {
		if (elements.length > 0) {
			elements.forEach((el) => {
				// console.log(el, "CONTENT ARTICLE TAB BY CTAEGORY")
				el.innerHTML = `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
				el.innerHTML += `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
				el.innerHTML += `<div class="animate-pulse col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"><div class="h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-gray-200"></div><div class="p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"><div class="w-full h-4 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="w-full h-3 bg-gray-200 rounded-full"></div><div class="px-6 py-2 bg-gray-200 rounded-full"></div></div></div>`
				axios.get(`${SITE_URL}/wp-json/emkalab/v1/post/`, {
					params: {
						limit: 4,
						paged: 1,
						post_type: "post",
						post_status: "publish",
						orderby: "date",
						order: "DESC",
						"meta_query[key]": "content_type",
						"meta_query[value]": 1,
						"meta_query[compare]": "IN",
						// "tax_query[taxonomy]": "category",
						// "tax_query[field]": field,
						// "tax_query[terms]": terms
					}
				})
					.then((response) => {
						el.innerHTML = ""
						if (typeof (response?.data?.results) !== "undefined" && Array.isArray(response?.data?.results)) {
							if (response?.data?.results.length > 0) {
								for (let i = 0; i < response?.data?.results.length; i++) {
									let data = response?.data?.results[i]
									el.append(CardArticleDefaultCaseStudies(data))
								}
							} else {
								el.append(EmptyLayout(el.getAttribute("data-podcast-empty") ?? "Belum Ada Postingan"))
							}
						}
						ChangeImageOnError()
					})
					.catch((err) => {
						console.error(err, err.message)
					})
				// window.fetchingData({
				// 	params: {
				//
				// 	}
				// })
			})
		}
	}
}

function CardArticleDefault(data = {}) {
	let div = document.createElement('div')
	div.className = "col-span-1 md:col-span-4 rounded-2xl md:rounded-3xl bg-white overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"
	let divImg = document.createElement('div')
	divImg.className = "h-full w-[80rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black"
	let img = document.createElement("img")
	img.src = data?.thumbnail?.url
	img.className = "object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60"
	img.alt = "images-card"
	divImg.append(img)
	div.append(divImg)

	let div2 = document.createElement("div")
	div2.className = "p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"

	let aTitle = document.createElement('a')
	aTitle.className = "text-lg md:text-3xl font-bold text-scheme-green line-clamp-2 min-h-[50px]"
	aTitle.href = data?.url ?? ""
	aTitle.innerText = data?.post_title ?? "-"

	div2.append(aTitle)

	let pDesc = document.createElement('p')
	pDesc.className = "text-sm md:text-base line-clamp-2 text-scheme-gray line-clamp-2 overflow-y-hidden"
	pDesc.innerText = data?.post_content ?? ""

	div2.append(pDesc)

	let aBtn = document.createElement('a')
	aBtn.className = "text-sm md:text-base text-scheme-green font-bold"
	aBtn.href = data?.url ?? ""
	aBtn.innerText = "Read More"

	div2.append(aBtn)

	div.append(div2)

	return div
}

function CardArticleDefaultCaseStudies(data = {}) {
	let div = document.createElement('div')
	div.className = "col-span-1 bg-red-300 md:col-span-3 rounded-2xl md:rounded-3xl overflow-hidden transition duration-300 hover:shadow-md flex flex-row md:block"
	let divImg = document.createElement('div')
	divImg.className = "h-full w-[32rem] md:w-auto xl:h-52 2xl:h-72 overflow-hidden bg-black"
	let img = document.createElement("img")
	img.src = data?.thumbnail?.url
	img.className = "object-cover w-full h-full xl:h-52 2xl:h-72 transition duration-300 ease-in-out hover:scale-105 hover:opacity-60"
	img.alt = "images-card"
	divImg.append(img)
	div.append(divImg)

	let div2 = document.createElement("div")
	div2.className = "p-4 md:p-8 flex flex-col items-start justify-center gap-2 md:gap-4"

	let aTitle = document.createElement('a')
	aTitle.className = "text-lg md:text-3xl font-bold text-scheme-green line-clamp-2"
	aTitle.href = data?.url ?? ""
	aTitle.innerText = data?.post_title ?? "-"

	div2.append(aTitle)

	let pDesc = document.createElement('p')
	pDesc.className = "text-sm md:text-base line-clamp-2 text-scheme-gray"
	pDesc.innerText = data?.post_content ?? ""

	div2.append(pDesc)

	let aBtn = document.createElement('a')
	aBtn.className = "text-sm md:text-base text-scheme-green font-bold"
	aBtn.href = data?.url ?? ""
	aBtn.innerText = "Read More"

	div2.append(aBtn)

	div.append(div2)

	return div
}

window.addEventListener('DOMContentLoaded', function () {
	let NavTabButtons = document.querySelectorAll(`[data-tab="last-article"]`)
	if (typeof (NavTabButtons) !== "undefined") {
		if (NavTabButtons.length > 0) {
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

			NavTabButtons.forEach((el, index) => {
				// el.classList.remove("active-btn-article")

				// console.log(index, "INDEX")
				// if(state[index].status){
				// 	el.classList.add('active-btn-article')
				// }else{
				// 	el.classList.remove("active-btn-article")
				// }
				el.addEventListener('click', (e) => {
					updateState(index)
					NavTabButtons.forEach(el => {
						el.classList.remove('active-btn-article')
					})
					// if(state[index].status){
					el.classList.add('active-btn-article')
					// }else{
					// 	el.classList.remove("active-btn-article")
					// }
					// console.log('clicked', el.getAttribute("data-target"))
					ContentArticleTabByCategory('last-article', 'slug', el.getAttribute("data-target"))
					ContentArticleTabByCategoryStudies('last-article-studies', 'slug', el.getAttribute("data-target"))
				})
			})
		}
	}
})


/**
 * ==============================================================================================
 * ALL DOM
 * ==============================================================================================
 */


/**
 * HEADER ON SCROLL
 */
let headerDefault = document.getElementById("header")

if (headerDefault !== null) {
	window.onscroll = () => {
		if (document.body.scrollTop >= 30 || document.documentElement.scrollTop >= 30) {
			headerDefault.classList.add("header-active")
		} else {
			headerDefault.classList.remove("header-active")
		}
	}
}


let headerHome = document.getElementById("header-home")

if (headerHome !== null) {
	window.onscroll = () => {
		if (document.body.scrollTop >= 30 || document.documentElement.scrollTop >= 30) {
			headerHome.classList.add("header-home-active")
		} else {
			headerHome.classList.remove("header-home-active")
		}
	}
}
