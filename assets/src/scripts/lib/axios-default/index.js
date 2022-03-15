import axios from 'axios'

export default class AxiosDefault{
	constructor(props = {}) {
		this.state = {
			...props,
			url: props?.url ?? null,
			headers: props?.headers ?? {},
			params: props?.params ?? {}
		}
		return this.getInstance();
	}

	async getInstance(){
		let baseURL = this.state.url

		let headers  = {}

		const axiosInstance = axios.create({
			baseURL: baseURL,
			headers: {
				...headers,
				...this.state.headers,
			}
		})

		axiosInstance.isCancel = axios.isCancel;

		axiosInstance.interceptors.response.use(
			(res)=> {
				new Promise((resolve)=> {
					resolve(res)
				})
			},
			(err)=>{
				if(!err.response){
					return new Promise((resolve,reject)=> {
						reject(err)
					})
				}
				if(err.response.status === 401){
					return new Promise((resolve,reject)=> {
						console.warn(`Error: ${err.response.status} - ${err.response.message ?? ""}`)
						reject(err)
					})
				}else{
					return new Promise((resolve,reject)=> {
						reject(err)
					})
				}
			}
		)

		return axiosInstance
	}


}
