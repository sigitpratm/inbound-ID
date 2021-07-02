<?php
/**
 * ACF PRO
 *
 * @link https://github.com/elliotcondon/acf
 *
 * @package jippi
 */

namespace JippiTheme\Plugins;

class Acf
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{
		add_filter( 'acf/settings/save_json', array( &$this, 'jippi_acf_json_save_point' ) );
		add_filter( 'acf/settings/load_json', array( &$this, 'jippi_acf_json_load_point' ) );
		require_once get_template_directory() . '/includes/Plugins/advanced-custom-fields-pro/acf.php';
	}

	public function jippi_acf_json_save_point( $path )
	{
		// update path
		$path = get_stylesheet_directory() . '/acf-json';

		// return
		return $path;
	}

	public function jippi_acf_json_load_point( $paths )
	{
		// remove original path (optional)
		unset( $paths[0] );

		// append path
		$paths[] = get_stylesheet_directory() . '/acf-json';

		// return
		return $paths;
	}
}
