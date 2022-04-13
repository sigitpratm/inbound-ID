import Podcast from './lib/card/Podcast'

window.addEventListener('load', async function () {
	await new Podcast({
		elemType: "listened",
		type: "list",
		params: {
			limit: 10,
			paged: 1,
			post_type: "podcast",
			post_status: "publish",
			orderby: "date",
			order: "DESC",
			"meta_query[key]": "social",
			"meta_query[value]": "spotify",
			"meta_query[relation]": "OR",
		}
	}).list()
})
