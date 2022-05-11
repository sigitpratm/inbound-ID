<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `inc/Custom/Custom.php` to write your custom functions
 *
 * @package awps
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;


if ( class_exists( 'EmkalabTheme\\Init' ) ) :
	EmkalabTheme\Init::register_services();
endif;


/**
 * @define [ REDUX ]
 */
if (
	! class_exists( 'ReduxFramework' ) &&
	file_exists( get_template_directory() . '/includes/Plugins/redux-core/framework.php' )
) {
	require_once( get_template_directory() . '/includes/Plugins/redux-core/framework.php' );
}

if ( class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/includes/Plugins/redux-options.php' );
}


/**
 * @define [ REDUX ]
 */
if (
	! class_exists( 'ReduxFramework' ) &&
	file_exists( get_template_directory() . '/includes/Plugins/redux-core/framework.php' )
) {
	require_once( get_template_directory() . '/includes/Plugins/redux-core/framework.php' );
}

if ( class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/includes/Plugins/redux-options.php' );
}


function jpp_search_form() {
	$form = '<form role="search" method="get" id="searchform" class="my-0 mx-0" action="' . home_url( '/' ) . '" >
				<div class="relative inline-flex">
					<button type="submit" id="searchsubmit" class="p-2 bg-green-700 rounded-full absolute top-1 right-1.5 text-white focus:outline-0 focus:ring-0">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
							 stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round"
								  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
						</svg>
					</button>
					<label class="block">
						<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="search here"
							   class="text-sm pl-4  pr-12 w-56 border border-gray-300 py-2 h-10 rounded-full bg-white"
							   placeholder="Search here" required>
					</label>
				</div>
    		</form>';

	return $form;
}

add_filter( 'get_search_form', 'jpp_search_form' );

function wpb_search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', [ 'post', 'case-study' ] );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'wpb_search_filter' );








//function delete_post_type(){
//	unregister_post_type( 'sejoli-product' );
//	$labels = [
//		'name'               => _x( 'Products', 'post type general name', 'sejoli' ),
//		'singular_name'      => _x( 'Product', 'post type singular name', 'sejoli' ),
//		'menu_name'          => _x( 'Products', 'admin menu', 'sejoli' ),
//		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'sejoli' ),
//		'add_new'            => _x( 'Add New', 'product', 'sejoli' ),
//		'add_new_item'       => __( 'Add New Product', 'sejoli' ),
//		'new_item'           => __( 'New Product', 'sejoli' ),
//		'edit_item'          => __( 'Edit Product', 'sejoli' ),
//		'view_item'          => __( 'View Product', 'sejoli' ),
//		'all_items'          => __( 'All Products', 'sejoli' ),
//		'search_items'       => __( 'Search Products', 'sejoli' ),
//		'parent_item_colon'  => __( 'Parent Products:', 'sejoli' ),
//		'not_found'          => __( 'No products found.', 'sejoli' ),
//		'not_found_in_trash' => __( 'No products found in Trash.', 'sejoli' )
//	];
//
//	$args = [
//		'labels'             => $labels,
//		'description'        => __( 'Description.', 'sejoli' ),
//		'public'             => true,
//		'publicly_queryable' => true,
//		'show_ui'            => true,
//		'show_in_menu'       => true,
//		'show_in_rest'       => true,
//		'query_var'          => true,
//		'rewrite'            => [ 'slug' => 'product' ],
//		'capability_type'    => 'sejoli_product',
//		'capabilities'		 => array(
//			'publish_posts'      => 'publish_sejoli_products',
//			'edit_posts'         => 'edit_sejoli_products',
//			'edit_others_posts'  => 'edit_others_sejoli_products',
//			'read_private_posts' => 'read_private_sejoli_products',
//			'edit_post'          => 'edit_sejoli_product',
//			'delete_posts'       => 'delete_sejoli_product',
//			'read_post'          => 'read_sejoli_product'
//		),
//		'has_archive'        => true,
//		'hierarchical'       => false,
//		'menu_position'      => null,
//		'supports'           => [ 'title', 'editor', 'thumbnail' ],
//		'menu_icon'			 => plugin_dir_url( __FILE__ ) . 'images/icon.png'
//	];
//
//	register_post_type( SEJOLI_PRODUCT_CPT, $args );
//}
//add_action('init','delete_post_type', 100);


//print_r( sejoli_get_request());
//function sejoli_header($slug = '')
//{
//	$file = 'header';
//	$file = ('' !== $slug) ? $file . '-'.$slug : $file;
//
//	sejoli_get_template_part($file.'.php');
//}
//add_action('plugins_loaded','remove_whatever');
//function remove_whatever() {
//	if (function_exists('sejoli_header')) {
//		remove_all_actions('sejoli_header');
//	}
//}
//require dirname(FILE) .'/includes/Plugins/redux-options.php';

//var_dump(dirname( __FILE__ ));
//die;

//function search_filter( $query ) {
//	if ( ! is_admin() && $query->is_main_query() ) {
//		if ( $query->is_search ) {
//			$query->set( 'paged', ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1 );
//			$query->set( 'posts_per_page', 6 );
//		}
//	}
//}
//
//add_action( 'init', 'search_filter' );
