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
	!class_exists('ReduxFramework') &&
	file_exists(get_template_directory() . '/includes/Plugins/redux-core/framework.php')
) {
	require_once(get_template_directory() . '/includes/Plugins/redux-core/framework.php');
}

if (class_exists('ReduxFramework')) {
	require_once(get_template_directory() . '/includes/Plugins/redux-options.php');
}


function jpp_search_form(  ) {
	$form = '<form role="search" method="get" id="searchform" class="jpp-search-form" action="' . home_url( '/' ) . '" >
    <input class="search-field" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="search product" />
    <button type="submit" id="searchsubmit" class="search-submit">
	    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
		    <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
		</svg>
    </button>
    </form>';

	return $form;
}

add_filter( 'get_search_form', 'jpp_search_form' );
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
