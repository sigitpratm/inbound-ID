/**
 * Manage global libraries like jQuery or THREE from the webpack.mix.js file
 */
require('lottie-web')
// require("./custom");
// import "./custom"
// import custom from './custom'
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

const PodcastCard = function (attr) {
	let elems = document.querySelectorAll(`[data-podcast]`)

	if (typeof (elems) !== "undefined") {
		if (elems.length > 0) {
			console.log(elems, "NEWS")
			elems.forEach((el) => {
				el.innerHTML = ""
				el.innerHTML = "<div class='w-full col-span-4 flex items-center justify-center h-[200px]'>Loading...</div>"
				console.log(el, "ini item nya")
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
							}else{
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

window.addEventListener('DOMContentLoaded', function () {
	PodcastCard('listened')

})


function cardPodcast(data = {}) {
	let elem = document.createElement("div")
	elem.className = "col-span-1 w-full min-h-[320px] rounded-xl space-y-6"
	let el1 = document.createElement("div")
	el1.className = "w-full min-h-[280px] bg-gray-50 rounded-xl overflow-hidden relative"

	let imgs = document.createElement('img')
	imgs.src = data?.thumbnail?.url ?? ""
	imgs.alt = "images-card"
	imgs.className = "w-full h-full absolute top-1/2 left-1/2 transform -translate-x-2/4 -translate-y-2/4 object-cover"

	el1.append(imgs)
	elem.append(el1)

	let el2 = document.createElement('div')
	el2.className = "w-full flex items-center justify-center relative px-6"

	let a = document.createElement("a")
	a.className = "w-full py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold text-center"
	a.target = "_blank"
	a.rel = "nofollow"
	if (typeof (data?.fields?.podcast?.social?.type) !== "undefined" && typeof (data?.fields?.podcast?.social?.url) !== "undefined") {
		a.href = data?.fields?.podcast?.social?.url

		if (data?.fields?.podcast?.content_type === "listened") {
			a.innerText = "Listen on Spotify"
		} else if (data?.fields?.podcast?.content_type === "watched") {
			a.innerText = "Watch on Youtube"
		}else if (data?.fields?.podcast?.content_type === "classes"){
			a.innerText = "See More"
		}
	}
	el2.append(a)
	elem.append(el2)


	// elem.innerHTML = "testing"

	return elem
}


function EmptyLayout(txt, classes = "col-span-4 h-[240px] flex items-center justify-center"){
	let elem = document.createElement('div')
	elem.className = `${classes}`
	elem.innerText = txt
	return elem
}


/**
 * IMAGE ERROR
 */

function ChangeImageOnError(){
	let images = document.querySelectorAll('img')
	if(typeof(images) !== "undefined"){
		console.log(images)

		if(images.length > 0 ){
			images.forEach((el)=> {
				el.addEventListener('error',function(){
					el.setAttribute("src", TEMPLATE_URL +"/assets/dist/img/post-notfound.png")
					return true;
				})
			})
		}
	}
}
ChangeImageOnError()
