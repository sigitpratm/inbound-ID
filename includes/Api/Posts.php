<?php

namespace EmkalabTheme\Api;

use WP_Query;

class Posts
{
	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'createAcfMetaInRest' ] );
		add_action( 'rest_api_init', function () {
			//Path to meta query route
			register_rest_route( 'emkalab/v1', '/post/', array(
				'methods'  => 'GET',
				'callback' => [ $this, 'metaQuery' ]
			) );
		} );
		flush_rewrite_rules( true );
	}

	function createAcfMetaInRest() {
		$postypes_to_exclude       = [ 'acf-field-group', 'acf-field' ];
		$extra_postypes_to_include = __POST_TYPE__;
		$post_types                = array_diff( get_post_types( [ "_builtin" => false ], 'names' ), $postypes_to_exclude );

		array_push( $post_types, $extra_postypes_to_include );

		foreach ( $post_types as $post_type ) {
			register_rest_field( $post_type, 'acf', [
					'get_callback' => [ $this, 'exposeAcfFields' ],
					'schema'       => null,
				]
			);
		}
	}

	public static function exposeAcfFields( $object ) {
		$ID = $object['id'];

		return get_fields( $ID );
	}

	public static function metaQuery() {
//		if ( ! empty( $_GET['meta_query'] ) ) {
		$query = $_GET['meta_query'];
		// Set the arguments based on our get parameters
		$paged    = ( ! empty( $_GET['paged'] ) ) ? $_GET['paged'] : 1;
		$per_page = $_GET['limit'] ?? 10;
		$args     = array(
			'post_type'      => $_GET['post_type'] ?? 'product',
			'post_status'    => $_GET['post_status']?? 'publish',
			'orderby'        => $_GET['orderby']?? 'date',
			'order'          => $_GET['order']?? 'DESC',
			'paged'          => $paged,
			'posts_per_page' => $per_page,
			'meta_query'     => array(
				'relation' => $query['relation'],
				array(
					'key'     => $query['key'],
					'value'   => $query['value'],
					'compare' => '=',
				),
			),

		);

		// Run a custom query
		$meta_query = new WP_Query( $args );
		$meta_query->set( 'posts_per_page', $per_page );
		$meta_query->set( 'paged', $paged );
		$meta_query->query( $meta_query->query_vars );
		if ( $meta_query->have_posts() ) {
			//Define and empty array
			$data = array();
			// Store each post's title in the array
			while ( $meta_query->have_posts() ) {
				$meta_query->the_post();
				$postItems = get_post_meta( get_the_ID() );
				$post      = get_post();

				$data[] = [
					'ID'            => get_the_ID(),
					'post_title'    => get_the_title(),
					'post_name'     => $post->post_name,
					'post_date'     => $post->post_date,
					'post_date_gmt' => $post->post_date_gmt,
					'post_content'  => $post->post_content,
					'guid'          => $post->guid,
					'url'           => get_permalink( get_the_ID() ),
					'fields'		=> [
						'podcast'=> [
							"social"=>[
								"type"=> get_field( 'social',$post->ID ),
								"youtube" => get_field( 'youtube_url',$post->ID ),
								"spotify" => get_field( 'spotify_url',$post->ID )
							],
							"content_type"=> get_field("content_type", $post->ID)
						]
					],
//					'jippi_field'   => [
//						'name'        => get_field( 'name', $post->ID ),
//						'currency'    => get_field( 'currency', $post->ID ),
//						'price'       => get_field( 'price', $post->ID ),
//						'sale_price'  => get_field( 'sale_price', $post->ID ),
//						'demo_url'    => get_field( 'demo_url', $post->ID ),
//						'buy_button'  => get_field( 'buy_button', $post->ID ),
//						'last_update' => get_field( 'last_update', $post->ID ),
//						'version'     => get_field( 'version', $post->ID ),
////							'position'  => get_field( 'position', $post->ID ),
////							'species'   => get_field( 'species', $post->ID ),
////							'gender'    => get_field( 'gender', $post->ID ),
////							'ocupation' => get_field( 'ocupation', $post->ID ),
////							'grade'     => get_field( 'grade', $post->ID ),
////							'series'    => ! empty( get_field( 'series', $post->ID ) ) ? get_field( 'series', $post->ID ) : null,
//					],
				];
			}

			// Return the data
			return [
				'status'         => 'success',
				'total'          => $meta_query->found_posts,
				'total_page'     => ceil( $meta_query->found_posts / $per_page ),
				'current_page'   => intval( $paged ),
				'posts_per_page' => intval( $per_page ),
				'results'        => $data
			];
		} else {
			// If there is no post
			return [
				'status'  => 'error',
				'message' => "No post found"
			];
		}
//		}

	}
}
