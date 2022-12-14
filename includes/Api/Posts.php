<?php

namespace EmkalabTheme\Api;

use WP_Query;

class Posts {
	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'createAcfMetaInRest' ] );
		add_action( 'rest_api_init', function () {
			//Path to meta query route
			register_rest_route( 'emkalab/v1', '/post/', array(
				'methods'  => 'GET',
				'callback' => [ $this, 'metaQuery' ]
			) );
		} );
		add_action( 'rest_api_init', function () {
			//Path to meta query route
			register_rest_route( 'emkalab/v1', '/podcast/', array(
				'methods'  => 'GET',
				'callback' => [ $this, 'podcast' ]
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
		$query     = $_GET['meta_query'];
		$tax_query = $_GET['tax_query'];
		$paged     = ( ! empty( $_GET['paged'] ) ) ? $_GET['paged'] : 1;
		$per_page  = $_GET['limit'] ?? 10;
		$taxQuery  = [];

		if ( ! empty( $tax_query ) ) {
			$terms = explode( ',', $tax_query["terms"] );

			if ( ! empty( $terms ) && count( $terms ) > 0 ) {
				$taxQuery[] = [
					'taxonomy' => $tax_query["taxonomy"],
					'field'    => $tax_query["field"] ?? "slug",
					'terms'    => $terms ?? [], //excluding the term you dont want.
					'operator' => 'IN',
				];
			}

		}


		$args = array(
			'post_type'      => $_GET['post_type'] ?? 'podcast',
			'post_status'    => $_GET['post_status'] ?? 'publish',
			'orderby'        => $_GET['orderby'] ?? 'date',
			'order'          => $_GET['order'] ?? 'DESC',
			'paged'          => $paged,
			'posts_per_page' => $per_page,
			'meta_query'     => array(
				'relation' => $query['relation'],
				array(
					'key'     => $query['key'],
					'value'   => $query['value'],
					'compare' => $query["compare"] ?? '=',
				),
			),
			"tax_query"      => $taxQuery

		);

		// Run a custom query
		$meta_query = new WP_Query( );

		$meta_query->set("post_type",$_GET['post_type'] ?? 'podcast');
		$meta_query->set("post_status",$_GET['post_status'] ?? 'publish');
		$meta_query->set("order",$_GET['orderby'] ?? 'date');
		$meta_query->set( 'posts_per_page', $per_page );
		$meta_query->set( 'paged', $paged );
		$meta_query->set( 'meta_query', $args["meta_query"] );
		$meta_query->set( 'tax_query', $args["tax_query"] );
		$meta_query->query( $meta_query->query_vars );


		if ( $meta_query->have_posts() ) {
			//Define and empty array
			$data = array();
			// Store each post's title in the array
			while ( $meta_query->have_posts() ) {
				$meta_query->the_post();
				$postItems = get_post_meta( get_the_ID() );
				$post      = get_post();
				$category  = get_the_category( get_the_ID() );

				$data[] = [
					'ID'            => get_the_ID(),
					'post_title'    => get_the_title(),
					'post_name'     => $post->post_name,
					'post_date'     => $post->post_date,
					'post_date_gmt' => $post->post_date_gmt,
					'post_content'  => $post->post_content,
					'post_type'	=> get_post_type(get_the_ID()),
					'guid'          => $post->guid,
					'url'           => get_permalink( get_the_ID() ),
					'thumbnail'     => [
						"url" => get_the_post_thumbnail_url( get_the_ID() ),
					],
					'fields'        => [
						'podcast'      => [
							"social"       => [
								"type"    => get_field( 'social', $post->ID ),
								"url"     => ! empty( get_field( 'youtube_url', $post->ID ) ) ? get_field( 'youtube_url', $post->ID ) : ( ! empty( get_field( 'spotify_url', $post->ID ) ) ? get_field( 'spotify_url', $post->ID ) : null ),
								"youtube" => get_field( 'youtube_url', $post->ID ),
								"spotify" => get_field( 'spotify_url', $post->ID )
							],
							"content_type" => get_field( "content_type", get_the_ID() ),
						],
						"content_type" => get_field( "content_type", $post->ID ) ?? null,
						"item_type"    => get_field( "item_type", $post->ID ) ?? null,
						"case_studies" => get_field( "case_studies", $post->ID ) ?? null,
						"awards"       => [
							"images"      => get_field( "awards_images", $post->ID ) ?? null,
							"description" => get_field( "awards_description", $post->ID ) ?? null
						],
						"study"		=> [
							'description' => get_field( "study_description", $post->ID ) ?? null
						],
						"media"        => get_field( "media", $post->ID ) ?? null,
						"icon"         => get_field( "icon", $post->ID ) ?? null,
					],
					"category"      => $category,
				];
			}

			// Return the data
			return [
				"params"         => [
					'tax_query' => $taxQuery,
				],
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
				'status'         => 'error',
				'message'        => "No post found",
				'total'          => $meta_query->found_posts,
				'total_page'     => ceil( $meta_query->found_posts / $per_page ),
				'current_page'   => intval( $paged ),
				'posts_per_page' => intval( $per_page ),
				"results"        => []
			];
		}
//		}

	}


	public static function podcast() {
//		$query     = $_GET['meta_query'];
//		$tax_query = $_GET['tax_query'];
		$paged     = ( ! empty( $_GET['paged'] ) ) ? $_GET['paged'] : 1;
		$per_page  = $_GET['limit'] ?? 10;
		$taxQuery  = [];

		if ( ! empty( $tax_query ) ) {
			$terms = explode( ',', $tax_query["terms"] );

			if ( ! empty( $terms ) && count( $terms ) > 0 ) {
				$taxQuery[] = [
					'taxonomy' => $tax_query["taxonomy"],
					'field'    => $tax_query["field"] ?? "slug",
					'terms'    => $terms ?? [], //excluding the term you dont want.
					'operator' => 'IN',
				];
			}

		}


		$args = array(
			'post_type'      => ["podcast"],
			'post_status'    => 'publish',
			'orderby'        => $_GET['orderby'] ?? 'date',
			'order'          => $_GET['order'] ?? 'DESC',
			'paged'          => $paged,
			'posts_per_page' => $per_page,
//			'meta_query'     => array(
//				'relation' => $query['relation'],
//				array(
//					'key'     => $query['key'],
//					'value'   => $query['value'],
//					'compare' => "=",
//				),
//			),
			"tax_query"      => $taxQuery

		);

		// Run a custom query
		$meta_query = new WP_Query();
		$meta_query->set( 'posts_per_page', $per_page );
		$meta_query->set( 'paged', $paged );
		$meta_query->set("post_type","podcast");
		$meta_query->set("post_status","publish");
		$meta_query->set("order",$_GET['orderby'] ?? 'date');
		$meta_query->set("tax_query", $args['tax_query']);
		$meta_query->query( $meta_query->query_vars );

		if ( $meta_query->have_posts() ) {
			//Define and empty array
			$data = array();
			// Store each post's title in the array
			while ( $meta_query->have_posts() ) {
				$meta_query->the_post();
				$postItems = get_post_meta( get_the_ID() );
				$post      = get_post();
				$category  = get_the_category( get_the_ID() );

				$data[] = [
					'ID'            => get_the_ID(),
					'post_title'    => get_the_title(),
					'post_name'     => $post->post_name,
					'post_date'     => $post->post_date,
					'post_date_gmt' => $post->post_date_gmt,
					'post_content'  => $post->post_content,
					'post_type'		=> get_post_type($post->ID),
					'guid'          => $post->guid,
					'url'           => get_permalink( get_the_ID() ),
					'thumbnail'     => [
						"url" => get_the_post_thumbnail_url( get_the_ID() ),
					],
					'fields'        => [
						'podcast'      => [
							"social"       => [
								"type"    => get_field( 'social', $post->ID ),
								"url"     => ! empty( get_field( 'youtube_url', $post->ID ) ) ? get_field( 'youtube_url', $post->ID ) : ( ! empty( get_field( 'spotify_url', $post->ID ) ) ? get_field( 'spotify_url', $post->ID ) : null ),
								"youtube" => get_field( 'youtube_url', $post->ID ),
								"spotify" => get_field( 'spotify_url', $post->ID )
							],
							"content_type" => get_field( "content_type", get_the_ID() ),
						],
						"content_type" => get_field( "content_type", $post->ID ) ?? null,
						"item_type"    => get_field( "item_type", $post->ID ) ?? null,
						"case_studies" => get_field( "case_studies", $post->ID ) ?? null,
						"awards"       => [
							"images"      => get_field( "awards_images", $post->ID ) ?? null,
							"description" => get_field( "awards_description", $post->ID ) ?? null
						],
						"studies"		=> [
							'description' => get_field( "study_description", $post->ID ) ?? null
						],
						"media"        => get_field( "media", $post->ID ) ?? null,
						"icon"         => get_field( "icon", $post->ID ) ?? null,
					],
					"category"      => $category,
				];
			}

			// Return the data
			return [
				"params"         => [
					'tax_query' => $taxQuery,
				],
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
				'status'         => 'error',
				'message'        => "No post found",
				'total'          => $meta_query->found_posts,
				'total_page'     => ceil( $meta_query->found_posts / $per_page ),
				'current_page'   => intval( $paged ),
				'posts_per_page' => intval( $per_page ),
				"results"        => []
			];
		}
//		}

	}
}
