<?php
/**
 * Show ACF field in Rest
 *
 * @package EmkalabTheme
 */

namespace EmkalabTheme\Api;

/**
 * Customizer class
 */
class Acf
{
	public function __construct() {
//		add_action( 'rest_api_init', [ $this, 'createAcfMetaInRest' ] );
//		flush_rewrite_rules(true);
	}

	public function createAcfMetaInRest() {
		$postypes_to_exclude       = [ 'acf-field-group', 'acf-field' ];
		$extra_postypes_to_include = __POST_TYPE__;
		$post_types                = array_diff( get_post_types( [ "_builtin" => false ], 'names' ), $postypes_to_exclude );

		array_push( $post_types, $extra_postypes_to_include );

		foreach ( $post_types as $post_type ) {
			register_rest_field( $post_type, 'acf', [
					'get_callback' => [ $this, 'exposeAcfFields'],
					'schema'       => null,
				]
			);
		}

	}

	public static function exposeAcfFields( $object ) {
		$ID = $object['id'];

		return get_fields( $ID );
	}
}
