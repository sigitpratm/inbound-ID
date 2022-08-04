<?php
$theme = wp_get_theme();
define( '__TEXT_DOMAIN__', esc_html( $theme->get( 'TextDomain' ) ) );
define( '__JPP_COMPONENT__', 'template-parts/components' );
define( '__VERSION__', esc_html( $theme->get( 'Version' ) ) );
define( '__THEME_NAME__', esc_html( $theme->get( 'Name' ) ) );
define( '__CSS_FRAMEWORK__', getenv( 'STYLE_FRAMEWORK' ) );
define( '__JS_FRAMEWORK__', getenv( 'JS_FRAMEWORK' ) );
define( 'JIPPI_ACF_DIR', get_template_directory() . '/includes/Plugins/advanced-custom-fields-pro' );
define( '__POST_TYPE__', [ 'post', 'page', 'artist', 'manga' ] );
if ( ! function_exists( 'emk_options' ) ) {
	/**
	 * @param $opt_name
	 * @param null $opt_name_2
	 *
	 * @return false|mixed|null
	 */

	function emk_options( $opt_name, $opt_name_2 = null ) {
		global $emkalab;
		if ( ! empty( $opt_name ) ) {
			if ( ! empty( $opt_name_2 ) ) {
				return ! empty( $emkalab[ $opt_name ][ $opt_name_2 ] ) ? $emkalab[ $opt_name ][ $opt_name_2 ] : null;
			} else {
				return ! empty( $emkalab[ $opt_name ] ) ? $emkalab[ $opt_name ] : null;
			}
		}

		return false;
	}
}
/**
 * Helpers methods
 * List all your static functions you wish to use globally on your theme
 *
 * @package awps
 */

if ( ! function_exists( 'dd' ) ) {
	/**
	 * Var_dump and die method
	 *
	 * @return void
	 */
	function dd() {
		echo '<pre>';
		array_map( function ( $x ) {
			var_dump( $x );
		}, func_get_args() );
		echo '</pre>';
		die;
	}
}

if ( ! function_exists( 'starts_with' ) ) {
	/**
	 * Determine if a given string starts with a given substring.
	 *
	 * @param string $haystack
	 * @param string|array $needles
	 *
	 * @return bool
	 */
	function starts_with( $haystack, $needles ) {
		foreach ( (array) $needles as $needle ) {
			if ( $needle != '' && substr( $haystack, 0, strlen( $needle ) ) === (string) $needle ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'mix' ) ) {
	/**
	 * Get the path to a versioned Mix file.
	 *
	 * @param string $path
	 * @param string $manifestDirectory
	 *
	 * @return string
	 *
	 * @throws \Exception
	 */
	function mix( $path, $manifestDirectory = '' ) {
		if ( ! $manifestDirectory ) {
			//Setup path for standard AWPS-Folder-Structure
			$manifestDirectory = "assets/dist/";
		}
		static $manifest;
		if ( ! starts_with( $path, '/' ) ) {
			$path = "/{$path}";
		}
		if ( $manifestDirectory && ! starts_with( $manifestDirectory, '/' ) ) {
			$manifestDirectory = "/{$manifestDirectory}";
		}
		$rootDir = dirname( __FILE__, 2 );
//		if (file_exists($rootDir . '/' . $manifestDirectory.'/hot')) {
//			return getenv('WP_SITEURL') . ":8080" . $path;
//		}
		if ( ! $manifest ) {
			$manifestPath = $rootDir . $manifestDirectory . 'mix-manifest.json';
			if ( ! file_exists( $manifestPath ) ) {
				throw new Exception( 'The Mix manifest does not exist.' );
			}
			$manifest = json_decode( file_get_contents( $manifestPath ), true );
		}

		if ( starts_with( $manifest[ $path ], '/' ) ) {
			$manifest[ $path ] = ltrim( $manifest[ $path ], '/' );
		}

		$path = $manifestDirectory . $manifest[ $path ];

		return get_template_directory_uri() . $path;
	}
}

if ( ! function_exists( 'assets' ) ) {
	/**
	 * Easily point to the assets dist folder.
	 *
	 * @param string $path
	 */
	function assets( $path ) {
		if ( ! $path ) {
			return;
		}

		echo get_template_directory_uri() . '/assets/dist/' . $path;
	}
}

if ( ! function_exists( 'svg' ) ) {
	/**
	 * Easily point to the assets dist folder.
	 *
	 * @param string $path
	 */
	function svg( $path ) {
		if ( ! $path ) {
			return;
		}

		echo get_template_part( 'assets/dist/svg/inline', $path . '.svg' );
	}
}


if ( ! function_exists( 'get_post_count_by_meta' ) ) {
	function get_post_count_by_meta( $meta_key, $meta_value, $post_type ) {
		$args = [
				'posts_per_page' => - 1,
				'post_status'    => 'publish',
				'meta_query'     => array(
						'relation' => 'AND',
						array(
								'key'     => $meta_key,
								'value'   => $meta_value,
								'compare' => '=',
						),
				),
		];

		return \EmkalabTheme\Query::post( $post_type, true, $args );
	}
}
require_once get_template_directory() . '/includes/helpers/comment.php';

if ( ! function_exists( 'jpp_header' ) ) {
	function jpp_header( $type ) {
		if ( ! empty( $type ) ) {
			get_template_part( 'template-parts/components/header/header', $type );

		} else {
			get_template_part( 'template-parts/components/header/header', 'default' );

		}
	}

	add_action( 'jpp_header', 'jpp_header', 10, 2 );
}

if ( ! function_exists( 'jpp_hero' ) ) {
	function jpp_hero( $type ) {
		if ( ! empty( $type ) ) {
			get_template_part( 'template-parts/components/header/header', $type );

		} else {
			get_template_part( 'template-parts/components/hero/hero', 'default' );

		}
	}

	add_action( 'jpp_hero', 'jpp_hero', 10, 2 );
}


if ( ! function_exists( 'jpp_lottie' ) ) {
	function jpp_lottie( $filename ) {
		if ( ! empty( $filename ) ):
			?>
			<div style="width:50px;height:50px" class="lottie"
			     data-animation-path="<?= get_template_directory_uri() . '/assets/dist/json/' . $filename . '.json' ?>"
			     data-anim-loop="true" data-name="loading"></div>
		<?php
		endif;
	}

	add_action( 'jpp_lottie', 'jpp_lottie', 10, 1 );
}


if ( ! function_exists( 'jpp_radiant_component' ) ) {
	function jpp_radiant_component( array $args ) {
		if ( ! empty( $args ) ) {
			$type = $args['type'];
			$name = $args['name'];
			if ( ! empty( $type ) && ! empty( $name ) ) {
				if ( ! empty( $args['args'] ) ) {
					get_template_part( __JPP_COMPONENT__ . "/$type/$name", null, $args['args'] );

				} else {
					get_template_part( __JPP_COMPONENT__ . "/$type/$name" );
				}
			}
		}
	}

	add_action( 'jpp_radiant_component', 'jpp_radiant_component', 10, 1 );
}

if ( ! function_exists( 'jpp_radiant_section' ) ) {
	function jpp_radiant_section( $args ) {
		if ( ! empty( $args ) ) {
			$type = $args['type'];
			$name = $args['name'];
			if ( ! empty( $type ) && ! empty( $name ) ) {
				if ( ! empty( $args['args'] ) ) {
					get_template_part( __JPP_COMPONENT__ . '/section/section', 'default',
							[
									'class'            => 'uk-section-default',
									'fullwidth'        => false,
									'container_class'  => '',
									'heading'          => 'Hello Worlds',
									'subheading'       => '',
									'content_template' => get_template_part( __JPP_COMPONENT__ . "/$type/$name", null, $args['args'] )
							]
					);

				} else {
					do_action( 'jpp_radiant_component', [
							'type' => $type,
							'name' => $name
					] );
				}
			}
		}
	}

	add_action( 'jpp_radiant_section', 'jpp_radiant_section', 10, 1 );
}

//var_dump();
//
//function roots_flush_rewrites() {
//	global $wp_rewrite;
//	$wp_rewrite->flush_rules();
//}
//
//function roots_add_rewrites($content) {
////	$theme_name = next(explode('/themes/', get_stylesheet_directory()));
//	$mval = explode( '/themes/', get_stylesheet_directory() );
//	$theme_name = next( $mval );
//	global $wp_rewrite;
//	$roots_new_non_wp_rules = array(
//			'assets/dist/css/(.*)'      => 'wp-content/themes/'. $theme_name . '/assets/dist/css/$1',
//			'assets/dist/js/(.*)'       => 'wp-content/themes/'. $theme_name . '/assets/dist/js/$1',
//			'assets/dist/img/(.*)'      => 'wp-content/themes/'. $theme_name . '/assets/dist/img/$1',
////			'plugins/(.*)'  => 'wp-content/plugins/$1'
//	);
//	$wp_rewrite->non_wp_rules += $roots_new_non_wp_rules;
//}
//
//add_action('admin_init', 'roots_flush_rewrites');
//
//function roots_clean_assets($content) {
//	$nval = explode( '/themes/', $content );
//	$theme_name = next( $nval );
////	$theme_name = next(explode('/themes/', $content));
//	$current_path = '/wp-content/themes/' . $theme_name;
//	$new_path = '';
//	$content = str_replace($current_path, $new_path, $content);
//	return $content;
//}
//
//function roots_clean_plugins($content) {
//	$current_path = '/wp-content/plugins';
//	$new_path = '/plugins';
//	$content = str_replace($current_path, $new_path, $content);
//	return $content;
//}
//
//add_action('generate_rewrite_rules', 'roots_add_rewrites');
//if (!is_admin()) {
////	add_filter( 'plugins_url', 'roots_clean_plugins' );
//	add_filter( 'bloginfo', 'roots_clean_assets' );
//	add_filter( 'stylesheet_directory_uri', 'roots_clean_assets' );
//	add_filter( 'template_directory_uri', 'roots_clean_assets' );
////	add_filter( 'script_loader_src', 'roots_clean_plugins' );
////	add_filter( 'style_loader_src', 'roots_clean_plugins' );
//}

if ( ! function_exists( 'jpp_assets' ) ) {
	function jpp_assets( $filename ) {
		if ( ! empty( $filename ) ) {
//			var_dump(get_template_directory_uri() . "/assets/dist/$filename");
			return get_template_directory_uri() . "/assets/dist/$filename";
		}
	}
}
