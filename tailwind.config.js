const defaultColors = require('tailwindcss/colors')
const colors = {
	...defaultColors,
	...{
		"scheme": {
			"green": "#48A835",
			"dark-green": "#2D8D29",
			"gray": "#D4D5D5",
			"dark-gray": "#bbbbbb",
			"light-gray": "#EDEEEF",
		}

	},
}
module.exports = {
	mode: "jit",
	darkMode: 'class',
	content: [
		'*.php',
		'./includes/**/*.php',
		'./includes/**/**/*.php',
		'./includes/**/**/**/*.php',
		'./includes/**/**/**/**/*.php',
		'./includes/**/**/**/**/**/*.php',
		'./includes/**/**/**/**/**/**/*.php',
		'./template-parts/*.php',
		'./template-parts/**/*.php',
		'./template-parts/**/**/*.php',
		'./template-parts/**/**/**/*.php',
		'./template-parts/**/**/**/**/*.php',
		'./template-parts/**/**/**/**/**/*.php',
		'./template-parts/**/**/**/**/**/**/*.php',
		'./template-parts/**/**/**/**/**/**/**/*.php',
		'./template-parts/**/**/**/**/**/**/**/**/*.php',
		'**/*.php',
		'**/**/*.php',
		'**/**/**/*.php',
		'**/**/**/**/*.php',
		'**/**/**/**/**/*.php',
		'**/**/**/**/**/**/*.php',
		'**/**/**/**/**/**/**/*.php',
		'**/**/**/**/**/**/**/**/*.php',
		'**/**/**/**/**/**/**/**/**/*.php',
		'./assets/src/**/*.html',
		'./assets/src/**/**/*.html',
		'./assets/src/**/**/**/*.html',
		'./assets/src/**/**/**/**/*.html',
		'./assets/src/**/*.js',
		'./assets/src/**/**/*.js',
		'./assets/src/**/**/**/*.js',
		'./assets/src/**/**/**/**/*.js',
		'./assets/src/**/**/**/**/**/*.js',
		'./assets/src/**/**/**/**/**/**/*.js',
		'./assets/src/**/**/**/**/**/**/**/*.js',
	],

	theme: {
		colors: colors,
		screens: {
			'xs': '375px',
			'2xs': '425px',
			'sm': '640px',
			// => @media (min-width: 640px) { ... }

			'md': '768px',
			// => @media (min-width: 768px) { ... }

			'lg': '1024px',
			// => @media (min-width: 1024px) { ... }

			'xl': '1280px',
			// => @media (min-width: 1280px) { ... }

			'2xl': '1536px',
			// => @media (min-width: 1536px) { ... }
		},
	},

	variants: {
		extend: {}
	},
	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/line-clamp'),
	],
}
