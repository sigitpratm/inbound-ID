/*
 * AWPS uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel-mix.com/
 */
let mix = require( 'laravel-mix' );
require('mix-tailwindcss');
require( '@tinypixelco/laravel-mix-wp-blocks' );
require('laravel-mix-postcss-config');
const tailwindcss = require('tailwindcss');
const path = require('path');

// mix.autoload({
// 	jquery: ['$', 'window.jQuery', 'jQuery']
// });
// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery.
// mix.autoload({
// 	jquery: ['$', 'window.jQuery', 'jQuery'],
// });
mix.setPublicPath( './assets/dist' )


// Compile assets.
mix
	.webpackConfig(webpack => {
		return {
			// plugins: [
			// 	new webpack.ProvidePlugin({
			// 		$: 'jquery',
			// 		jQuery: 'jquery',
			// 		'window.jQuery': 'jquery',
			// 	})
			// ],
			// node: {
			// 	fs: "empty"
			// },
			output: {
				chunkFilename: mix.inProduction() ? '[chunkhash].js' : '[name].js',
			},
			optimization: {
				runtimeChunk: false,
				splitChunks: {
					chunks: 'all',
				}
			},
			resolve: {
				extensions: [ '.tsx', '.ts', '.js', '.vue' ],
				alias: {
					'@': path.resolve(__dirname, 'assets/src/scripts'),
					'@json': path.resolve(__dirname, 'assets/src/json'),
					'@sass': path.resolve(__dirname, 'assets/src/sass'),
				},
			},
			module: {
				rules: [
					// {
					// 	test: /\.scss$/,
					// 	loader: 'postcss-loader',
					// 	options: {
					// 		ident: 'postcss-scss',
					// 		syntax: 'postcss-scss',
					// 		plugins: () => [require('postcss-flexbugs-fixes')()]
					// 	}
					// }
				]
			},
		}


	})
	.js( 'assets/src/scripts/app.js', 'assets/dist/js' )
	// .js( 'assets/src/scripts/admin.js', 'assets/dist/js' )
	// .block( 'assets/src/scripts/gutenberg.js', 'assets/dist/js' )
	// .postCss("assets/src/sass/style.scss", "assets/dist/css", [
	// 	require("tailwindcss"),
	// ])
	.sass( 'assets/src/sass/style.scss', 'assets/dist/css' )
	// .sass( 'assets/src/sass/admin.scss', 'assets/dist/css' )
	// .sass( 'assets/src/sass/gutenberg.scss', 'assets/dist/css' )
	.copy('assets/src/json', 'assets/dist/json')
	.copy('assets/src/img', 'assets/dist/img')
	.copy('assets/src/fonts', 'assets/dist/fonts');
mix.postCss('assets/src/sass/style.css', 'assets/dist/css/style.css',
	// tailwindcss('./tailwind.config.js')
require("tailwindcss"),
);
// mix.extract(['jquery'])

// mix.tailwind('./tailwind.config.js');
// mix.postCss('assets/src/sass/style.css', 'assets/dist/css')
// 	.postCssConfig();
// Add source map and versioning to assets in production environment.
if ( mix.inProduction() ) {
	mix.sourceMaps().version();
}
