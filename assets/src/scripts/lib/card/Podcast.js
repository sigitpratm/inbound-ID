import axios from "axios";


export default class Podcast {

	constructor(props = {}) {
		this.url = props?.url ?? "http://localhost/core-wordpress/wp-json/emkalab/v1/post/" //?post_type=podcast&post_status=publish&orderby=date&order=DESC&limit=2&paged=1
		this.elemType = props?.elemType ?? "listened"
		this.type = props?.type ?? "list"
		this.params = {
			...props?.params,
			limit : props?.params?.limit ?? 10,
			paged: props?.params?.paged ?? 1,
			post_type: props?.params?.post_type ?? "podcast",
			post_status: props?.params?.post_status ?? "publish",
			orderby: props?.params?.orderby ?? "date",
			order : props?.params?.order ?? "DESC",
			"meta_query[key]": props?.params["meta_query[key]"] ?? "OR",
			"meta_query[value]": props?.params["meta_query[value]"] ?? null,
			"meta_query[relation]": props?.params["meta_query[relation]"] ?? null,
		}
		// return this.getInstance(this.type)
	}

	async getInstance(type){
		switch (type){
			case "list":
				return await this.list()
			case "single":
				return await this.single()
			default:
				return await this.list()
		}
	}

	async fetchingData(){
		console.log(this, "FETCHING DATA")
		try{
			return await axios.get(this.url, {
				headers: {
					"Content-Type":"application/json"
				},
				params: {
					...this.params
				}
			})
				.then((response)=> {
					let newData = []
					let pagination = {
						total: 0,
						total_page: 0,
						current_page: 1,
						posts_per_page: this?.params?.limit ?? 10
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

	async list(){
		try{
			let elems =  document.querySelectorAll(`[data-podcast=${this.elemType}]`)
			if(typeof(elems) !== "undefined"){
				if (Array.isArray(elems) && elems.length > 0){
					elems.map((el,idx)=> {
						this.fetchingData()
							.then((response)=> {
								if(typeof(response?.data) !== "undefined" && Array.isArray(response?.data)){
									if (response?.data.length > 0){
										response?.data.map((item,index)=> {
											el.append(this.cardPodcast(item))
										})
									}
								}
							})
					})
				}
			}
		}catch(err){

		}

	}

	async single(){
		return await this.fetchingData()
	}


	cardPodcast(data){
		let elem = document.create("div")
		elem.innerText = "testing"

		return elem
	}
}
