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
window.fetchingData = async function fetchingData(props){
	try{
		return await axios.get(props.url, {
			headers: {
				"Content-Type":"application/json"
			},
			params: {
				...props.params
			}
		})
			.then((response)=> {
				let newData = []
				let pagination = {
					total: 0,
					total_page: 0,
					current_page: 1,
					posts_per_page: props?.params?.limit ?? 10
				}
				if(response?.status === 200){
					let data = response?.data
					if(typeof(data) !== "undefined"){
						pagination = {
							total: data?.total ?? 0,
							total_page: data?.total_page ?? 0,
							current_page: data?.current_page ?? 1,
							posts_per_page: data?.posts_per_page ?? 10
						}
						if (typeof(data?.results) !== "undefined"){
							newData = [
								...data?.results
							]
						}
					}
				}
				return {
					error:false,
					message: null,
					pagination,
					data : newData
				}
			})
			.catch((err)=> {
				return {
					error:true,
					message: err.message,
					pagination: {
						total: 0,
						total_page: 0,
						current_page: 1,
						posts_per_page: this?.params?.limit ?? 10
					},
					data : []
				}
			})
	}catch(err){
		return {error:true,message:err.message}
	}
}
window.dropdown = () => {
	Alpine.data('dropdown', () => ({
		open: false,

		toggle() {
			this.open = ! this.open
		}
	}))
}

Alpine.store('accordion', {
	tab: 0
})
Alpine.start()

async function PodcastCard(attr){
	let elems =  document.querySelectorAll(`[data-podcast=${attr}]`)
	if(typeof(elems) !== "undefined") {
		if (Array.isArray(elems) && elems.length > 0) {
			elems.map(async (el, idx) => {
				await window.fetchingData({
					url:"http://localhost/core-wordpress/wp-json/emkalab/v1/post/",
					type: "list",
					params: {
						limit : 10,
						paged: 1,
						post_type: "podcast",
						post_status: "publish",
						orderby: "date",
						order : "DESC",
						"meta_query[key]": "social",
						"meta_query[value]": "spotify",
						"meta_query[relation]": "OR",
					}
				})
					.then((response)=> {
						if(typeof(response?.data) !== "undefined" && Array.isArray(response?.data)){
							if (response?.data.length > 0){
								response?.data.map((item,index)=> {
									el.append(cardPodcast(item))
								})
							}
						}
					})
			})
		}
	}
}

PodcastCard('listened')


function cardPodcast(data){
	let elem = document.create("div")
	elem.innerText = "testing"

	return elem
}
