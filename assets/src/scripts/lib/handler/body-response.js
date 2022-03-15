export default class BodyResponse {
	constructor(props){
		return BodyResponse.getInstance(props)
	}
	static getInstance(props){
		return {
			...props,
			error:props?.error?? false,
			success:props?.success ?? false,
			message: props?.message?? null,
			data: props?.data ?? null
		}
	}
}
