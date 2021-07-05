module.exports = {
	// corePlugins: {
	// 	fontFamily: false,
	// },
	purge: [
		'*.php',
		'**/*.php',
		'**/**/*.php',
		'./assets/src/**/*.html',
		'./assets/src/**/*.vue',
		'./assets/src/**/*.jsx',
	],

	darkMode: false, // or 'media' or 'class'
	theme: {
		fontFamily: {
			'sans': ['ui-sans-serif', 'system-ui'],
			'serif': ['ui-serif', 'Georgia'],
			'mono': ['ui-monospace', 'SFMono-Regular'],
			'display': 'var(--font-family)',
			'body': ['Poppins', 'sans-serif'],
		},
		extend: {
			backgroundImage: theme => ({
				'hero-pattern': "url('/wp-content/themes/shopee/assets/dist/img/bg-default.jpg')",
				'footer-texture': "url('/img/footer-texture.png')",
			})
		},
	},
	variants: {
		extend: {},
	},
	plugins: [

		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('tailwindcss'),
		// require('tailwindcss-children'),
	],
}
