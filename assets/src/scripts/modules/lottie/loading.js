let loading =  lottie.loadAnimation({
	container: document.querySelector('.loading'),
	renderer: 'svg',
	loop: true,
	autoplay: true,
	path: '@json/loading.json'
})

export default loading
