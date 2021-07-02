import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
const router = new Router({
	mode: 'history',
	base: '/',
	scrollBehavior(to, from, savedPosition) {
		if (savedPosition) {
			return savedPosition
		} else {
			return {x: 0, y: 0}
		}
	},
	routes: [
		// ...coreRouter,
		// ...settingRoute,
		// ...orderRoute,
		// ...backlinkRoute,
	]
})


// router.afterEach(async (to, from, next) => {
// 	store.commit('core/GLOBAL_LOADING', false, {root: true})
// 	store.commit('core/BEFORE_RENDER_LOADER', false, {root: true})
//
// 	Vue.nextTick(() => {
// 		document.title = `${to.meta.pageTitle}`;
// 	});
// })
export default router
