<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}



// This is your option name where all the Redux data is stored.
$opt_name = __TEXT_DOMAIN__;

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$inbound = null;
$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => __THEME_NAME__,
	// Name that appears at the top of your panel
	'display_version'      => __VERSION__,
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => __( __THEME_NAME__, __TEXT_DOMAIN__ ),
	'page_title'           => __( __THEME_NAME__ . ' - Theme Options', __TEXT_DOMAIN__ ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => 'AIzaSyAQwGyNE8_9d7GJQNzeEZGQnhRTvEvycQw',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => $inbound,
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => true,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => 'redux_demo',
	// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => true,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.

	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,

	// HINTS
	'hints'                => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	)
);

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */


/*
 *
 * ---> START SECTIONS
 *
 */

/*

	As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


 */

// -> START Basic Fields
Redux::setSection( $opt_name, array(
	'title'            => __( 'General', __TEXT_DOMAIN__ ),
	'id'               => 'general',
	'desc'             => __( 'General Setup', __TEXT_DOMAIN__ ),
	'customizer_width' => '400px',
	'icon'             => 'el el-home'
) );

Redux::setSection( $opt_name, array(
	'title'            => __( 'Layout', __TEXT_DOMAIN__ ),
	'id'               => 'layout',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'general-layout',
			'type'    => 'radio',
			'title'   => __( 'General Layout', __TEXT_DOMAIN__ ),
			'options' => array(
				'boxed'      => __( 'Box layout', __TEXT_DOMAIN__ ),
				'full-width' => __( 'Fluid layout', __TEXT_DOMAIN__ )
			),
			'default' => 'boxed',
		),
		array(
			'id'      => 'lighting-mode',
			'type'    => 'radio',
			'title'   => __( 'Lighting Mode', __TEXT_DOMAIN__ ),
			'options' => array(
				'light-mode' => __( 'Light', __TEXT_DOMAIN__ ),
				'dark-mode'  => __( 'Dark', __TEXT_DOMAIN__ )
			),
			'default' => 'light-mode',
		)
	)
) );
Redux::setSection( $opt_name, array(
	'title'            => __( 'General Color', __TEXT_DOMAIN__ ),
	'id'               => 'general-color',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'general-color-background',
			'type'    => 'color',
			'title'   => __( 'Background Color', __TEXT_DOMAIN__ ),
			'default' => '#edf1f5'
		),
		array(
			'id'      => 'general-color-font-color',
			'type'    => 'color',
			'title'   => __( 'Font Color', __TEXT_DOMAIN__ ),
			'default' => '#404040'
		),
		array(
			'id'      => 'general-color-link-color',
			'type'    => 'color',
			'title'   => __( 'Link Color', __TEXT_DOMAIN__ ),
			'default' => '#4169e1'
		),
		array(
			'id'      => 'general-color-visited-link-color',
			'type'    => 'color',
			'title'   => __( 'Visited Link Color', __TEXT_DOMAIN__ ),
			'default' => '#BE3636'
		),
		array(
			'id'      => 'general-color-hover-link-color',
			'type'    => 'color',
			'title'   => __( 'Hover Link Color', __TEXT_DOMAIN__ ),
			'default' => '#4169e1'
		)
	)
) );

/**
 * Typography
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Typography', __TEXT_DOMAIN__ ),
	'id'               => 'typography',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'             => 'typography-heading-font',
			'type'           => 'typography',
			'title'          => __( 'Heading Font', __TEXT_DOMAIN__ ),
			'font-style'     => false,
			'font-weight'    => false,
			'font-size'      => false,
			'text-align'     => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'default'        => array(
				'font-family' => 'Overpass',
			)
		),
		array(
			'id'             => 'typography-body-font',
			'type'           => 'typography',
			'title'          => __( 'Body Font', __TEXT_DOMAIN__ ),
			'text-align'     => false,
			'text-transform' => false,
			'color'          => false,
			'default'        => array(
				'font-family' => 'Open Sans',
				'font-size'   => 16,
				'font-style'  => 'normal',
				'font-weight' => 'normal',
				'line-height' => 21
			)
		),
		array(
			'id'         => 'typography-h1-font-size',
			'type'       => 'slider',
			'title'      => __( 'H1 Font Size (EM)', __TEXT_DOMAIN__ ),
			'step'       => 0.1,
			'resolution' => 0.1,
			'min'        => 0.5,
			'max'        => 4,
			'default'    => 2
		),
		array(
			'id'         => 'typography-h2-font-size',
			'type'       => 'slider',
			'title'      => __( 'H2 Font Size (EM)', __TEXT_DOMAIN__ ),
			'step'       => 0.1,
			'resolution' => 0.1,
			'min'        => 0.5,
			'max'        => 4,
			'default'    => 1.5
		),
		array(
			'id'         => 'typography-h3-font-size',
			'type'       => 'slider',
			'title'      => __( 'H3 Font Size (EM)', __TEXT_DOMAIN__ ),
			'step'       => 0.1,
			'resolution' => 0.1,
			'min'        => 0.5,
			'max'        => 4,
			'default'    => 1.2
		),
		array(
			'id'         => 'typography-h4-font-size',
			'type'       => 'slider',
			'title'      => __( 'H4 Font Size (EM)', __TEXT_DOMAIN__ ),
			'step'       => 0.1,
			'resolution' => 0.1,
			'min'        => 0.5,
			'max'        => 4,
			'default'    => 1
		),
		array(
			'id'         => 'typography-h5-font-size',
			'type'       => 'slider',
			'title'      => __( 'H5 Font Size (EM)', __TEXT_DOMAIN__ ),
			'step'       => 0.1,
			'resolution' => 0.1,
			'min'        => 0.5,
			'max'        => 4,
			'default'    => 0.8
		),
		array(
			'id'         => 'typography-h6-font-size',
			'type'       => 'slider',
			'title'      => __( 'H6 Font Size (EM)', __TEXT_DOMAIN__ ),
			'step'       => 0.1,
			'resolution' => 0.1,
			'min'        => 0.5,
			'max'        => 4,
			'default'    => 0.6
		)
	)
) );
/**
 * Typography
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Comment', __TEXT_DOMAIN__ ),
	'id'               => 'comment',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'comment-system',
			'type'    => 'radio',
			'title'   => __( 'Select Comment System', __TEXT_DOMAIN__ ),
			'options' => array(
				'facebook' => __( 'Facebook Comment', __TEXT_DOMAIN__ ),
				'disqus'   => __( 'Disqus', __TEXT_DOMAIN__ )
			),
			'default' => 'disqus',
		),
		array(
			'id'       => 'comment-system-disqus',
			'title'    => __( 'Disqus ID', __TEXT_DOMAIN__ ),
			'desc'     => __( "Eg. https://<strong>username</strong>.disqus.com dan pilih color scheme dark di menu general", __TEXT_DOMAIN__ ),
			'type'     => 'text',
			'default'  => 'jippi-1',
			'required' => array( 'comment-system', '=', 'disqus' )
		),
		array(
			'id'       => 'comment-facebook-app-id',
			'title'    => __( 'Facebook App ID', __TEXT_DOMAIN__ ),
			'desc'     => __( "Get the facebook app id at https://developers.facebook.com/apps", __TEXT_DOMAIN__ ),
			'type'     => 'text',
			'default'  => '177516455919150',
			'required' => array( 'comment-system', '=', 'facebook' )
		),
		array(
			'id'       => 'comment-facebook-showing-comment',
			'title'    => __( 'Showing Comment', __TEXT_DOMAIN__ ),
			'desc'     => __( "Eg. 5 for showing 5 comments", __TEXT_DOMAIN__ ),
			'type'     => 'text',
			'default'  => '5',
			'required' => array( 'comment-system', '=', 'facebook' )
		),
	)
) );

/**
 * Header setup
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Header', __TEXT_DOMAIN__ ),
	'id'               => 'header',
	'customizer_width' => '400px',
	'icon'             => 'el el-pencil'
) );

Redux::setSection( $opt_name, array(
	'title'            => __( 'Layout', __TEXT_DOMAIN__ ),
	'id'               => 'header-layout',
	'customizer_width' => '450px',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'opt_header_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'Logo', 'demo' ),
			'compiler' => 'false',
			'subtitle' => __( 'Upload your logo', 'demo' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/img/sun.svg' ),
		),
		array(
			'id'      => 'header-style',
			'type'    => 'radio',
			'title'   => __( 'Header Style', __TEXT_DOMAIN__ ),
			'options' => array(
				'with-logo'       => __( 'With logo', __TEXT_DOMAIN__ ),
				'with-site-title' => __( 'With site title', __TEXT_DOMAIN__ )
			),
			'default' => 'with-logo',
		),
		array(
			'id'      => 'header-background-color',
			'type'    => 'color',
			'title'   => __( 'Background Color', __TEXT_DOMAIN__ ),
			'default' => '#2b2d42'
		),
		array(
			'id'      => 'header-menu-background-color',
			'type'    => 'color',
			'title'   => __( 'Menu - Background Color', __TEXT_DOMAIN__ ),
			'default' => '#2b2d42'
		),
		array(
			'id'      => 'header-menu-hover-background-color',
			'type'    => 'color',
			'title'   => __( 'Menu - Background Color (Hover and Active)', __TEXT_DOMAIN__ ),
			'default' => '#2b2d42'
		),
		array(
			'id'      => 'header-menu-link-color',
			'type'    => 'color',
			'title'   => __( 'Menu - Link Color', __TEXT_DOMAIN__ ),
			'default' => '#ffffff'
		),
	)
) );

/**
 * Menu
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Menu', __TEXT_DOMAIN__ ),
	'id'               => 'header-menu',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'menu-search',
			'type'    => 'switch',
			'title'   => __( 'Display Search Field', __TEXT_DOMAIN__ ),
			'default' => true
		),
	)
) );


/**
 *   HOME PAGE
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Home Page', __TEXT_DOMAIN__ ),
	'id'               => 'home',
	'customizer_width' => '400px',
	'icon'             => 'el el-home'
) );

/**
 * HOME - HERO BANNER
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-hero-banner',
	'title'            => __( 'Hero Banner', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-general-background-jumbotron-set',
			'type'    => 'switch',
			'title'   => __( 'Jumbotron - Display', __TEXT_DOMAIN__ ),
			'default' => true
		),
		array(
			'id'       => 'home-general-background-jumbotron-status',
			'type'     => 'switch',
			'title'    => __( 'Jumbotron - Image Hover in Card Post', __TEXT_DOMAIN__ ),
			'default'  => true,
			'required' => array( 'home-general-background-jumbotron-set', '=', 1 )
		),
		array(
			'id'       => 'home-general-background-jumbotron-color',
			'type'     => 'color',
			'title'    => __( 'Jumbotron - Background Color', __TEXT_DOMAIN__ ),
			'default'  => '#2b2d42',
			'required' => array( 'home-general-background-jumbotron-set', '=', 1 )
		),
	)
) );

/**
 * HOME - SERVICES
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-services',
	'title'            => __( 'Our Services', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-section-1-status',
			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'      => 'home-section-1-options',
			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
			'type'    => 'select',
			'options' => array(
				'TV'        => 'TV',
				'TV Short'  => 'TV Short',
				'Movie'     => 'Movie',
				'Leftovers' => 'Leftovers',
				'Special'   => 'OVA / ONA / SPECIALS'
			),
			'default' => 'TV'
		),
		array(
			'id'      => 'home-section-1-post',
			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
			'type'    => 'slider',
			'default' => 10,
			'min'     => 1,
			'max'     => 50
		),
		array(
			'id'      => 'home-section-1-card',
			'title'   => __( 'Card Row' ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
		array(
			'id'      => 'home-section-1-color-title',
			'title'   => __( 'Color Title' ),
			'type'    => 'color',
			'default' => '#fff'
		),
		array(
			'id'      => 'home-section-1-card',
			'title'   => __( 'Card Row' ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
	)
) );

/**
 * HOME - OUR WORKS
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-works',
	'title'            => __( 'Our Works', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-section-2-status',
			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'      => 'home-section-2-options',
			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
			'type'    => 'select',
			'options' => array(
				'TV'        => 'TV',
				'TV Short'  => 'TV Short',
				'Movie'     => 'Movie',
				'Leftovers' => 'Leftovers',
				'Special'   => 'OVA / ONA / SPECIALS'
			),
			'default' => 'TV Short'
		),
		array(
			'id'      => 'home-section-2-post',
			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
			'type'    => 'slider',
			'default' => 10,
			'min'     => 1,
			'max'     => 50
		),
		array(
			'id'      => 'home-section-2-card',
			'title'   => __( 'Card Row' ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
		array(
			'id'      => 'home-section-2-color-title',
			'title'   => __( 'Color Title' ),
			'type'    => 'color',
			'default' => '#494949'
		),
		array(
			'id'      => 'home-section-2-card',
			'title'   => __( 'Card Row' ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		)
	)
) );

/**
 * HOME - LATEST ARTICLE
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-latest-article',
	'title'            => __( 'Latest Article', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-section-3-status',
			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'      => 'home-section-3-options',
			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
			'type'    => 'select',
			'options' => array(
				'TV'        => 'TV',
				'TV Short'  => 'TV Short',
				'Movie'     => 'Movie',
				'Leftovers' => 'Leftovers',
				'Special'   => 'OVA / ONA / SPECIALS'
			),
			'default' => 'Movie'
		),
		array(
			'id'      => 'home-section-3-post',
			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
			'type'    => 'slider',
			'default' => 10,
			'min'     => 1,
			'max'     => 50
		),
		array(
			'id'      => 'home-section-3-card',
			'title'   => __( 'Card Row' ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
		array(
			'id'      => 'home-section-3-color-title',
			'title'   => __( 'Color Title' ),
			'type'    => 'color',
			'default' => '#494949'
		),
		array(
			'id'      => 'home-section-3-card',
			'title'   => __( 'Card Row' ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
	)
) );

/**
 * HOME - OUR CLIENT
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-clients',
	'title'            => __( 'Our Clients', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-section-4-status',
			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'      => 'home-section-4-options',
			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
			'type'    => 'select',
			'options' => array(
				'TV'        => 'TV',
				'TV Short'  => 'TV Short',
				'Movie'     => 'Movie',
				'Leftovers' => 'Leftovers',
				'Special'   => 'OVA / ONA / SPECIALS'
			),
			'default' => 'Leftovers'
		),
		array(
			'id'      => 'home-section-4-post',
			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
			'type'    => 'slider',
			'default' => 10,
			'min'     => 1,
			'max'     => 50
		),
		array(
			'id'      => 'home-section-4-card',
			'title'   => __( 'Card Row', __TEXT_DOMAIN__ ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
		array(
			'id'      => 'home-section-4-color-title',
			'title'   => __( 'Color Title' ),
			'type'    => 'color',
			'default' => '#494949'
		)
	)
) );

/**
 * HOME - AWARDS
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-awards',
	'title'            => __( 'Awards', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-section-5-status',
			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'      => 'home-section-5-options',
			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
			'type'    => 'select',
			'options' => array(
				'TV'        => 'TV',
				'TV Short'  => 'TV Short',
				'Movie'     => 'Movie',
				'Leftovers' => 'Leftovers',
				'Special'   => 'OVA / ONA / SPECIALS'
			),
			'default' => 'Special'
		),
		array(
			'id'      => 'home-section-5-post',
			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
			'type'    => 'slider',
			'default' => 10,
			'min'     => 1,
			'max'     => 50
		),
		array(
			'id'      => 'home-section-5-card',
			'title'   => __( 'Card Row', __TEXT_DOMAIN__ ),
			'type'    => 'radio',
			'options' => array(
				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
			),
			'default' => 'card--home-3'
		),
		array(
			'id'      => 'home-section-5-color-title',
			'title'   => __( 'Color Title' ),
			'type'    => 'color',
			'default' => '#494949'
		)
	)
) );

/**
 * HOME - LAST SECTION
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-last-section',
	'title'            => __( 'Last Section', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'       => 'home-last-section-image',
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'image', 'default' ),
			'compiler' => 'false',
			'subtitle' => __( 'Upload your logo', 'default' ),
			'default'  => array( 'url' => jpp_assets( '/img/png/img-footer.png' ) ),
		),

		array(
			'id'      => 'home-last-section-text',
			'title'   => __( 'Copy last section', __TEXT_DOMAIN__ ),
			'type'    => 'textarea',
			'default' => 'Have any other question? Feel free to contact us',
		),
	)
) );


Redux::setSection( $opt_name, array(
	'title'            => __( 'Footer', __TEXT_DOMAIN__ ),
	'id'               => 'footer',
	'customizer_width' => '400px',
	'icon'             => 'el el-lines'
) );

/**
 * Footer - General
 * @since 1.0.0
 */
Redux::setSection( $opt_name, array(
	'id'               => 'footer-general',
	'title'            => __( 'General', __TEXT_DOMAIN__ ),
	'customizer_width' => 450,
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'footer-website-description-style',
			'title'   => __( 'Description Style', __TEXT_DOMAIN__ ),
			'type'    => 'radio',
			'options' => array(
				'true'  => __( 'Normal', __TEXT_DOMAIN__ ),
				'false' => __( 'Quote', __TEXT_DOMAIN__ )
			),
			'default' => 'true'
		),
		array(
			'id'      => 'footer-website-description',
			'title'   => __( 'Website Description', __TEXT_DOMAIN__ ),
			'type'    => 'textarea',
			'desc'    => __( 'input description website....', __TEXT_DOMAIN__ ),
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu condimentum ligula. In pretium congue risus eu tincidunt. Nullam in venenatis erat. Sed eget tristique leo. Maecenas bibendum dapibus urna quis mattis. Ut feugiat dignissim consequat. Suspendisse potenti. Donec metus erat, varius ut metus id, hendrerit mattis sem. Nulla quis sem convallis tortor luctus malesuada. Cras ut lacus quis metus laoreet tristique id quis ex. Integer sagittis tempor sem, a aliquam nisi tristique eget.'
		),
		array(
			'id'       => 'footer-website-description-btn',
			'title'    => __( 'Button After Description ?', __TEXT_DOMAIN__ ),
			'type'     => 'switch',
			'default'  => true,
			'required' => array( 'footer-website-description-style', '=', 'true' )
		),
		array(
			'id'       => 'footer-website-description-btn-background',
			'title'    => __( 'Button - Background', __TEXT_DOMAIN__ ),
			'type'     => 'color',
			'default'  => '#2D3153',
			'required' => array( 'footer-website-description-btn', '=', '1' )
		),
		array(
			'id'       => 'footer-website-description-btn-Hover',
			'title'    => __( 'Button - Hover', __TEXT_DOMAIN__ ),
			'type'     => 'color',
			'default'  => '#3db4f2',
			'required' => array( 'footer-website-description-btn', '=', '1' )
		),
		array(
			'id'       => 'footer-website-description-btn-color',
			'title'    => __( 'Button - Color Text', __TEXT_DOMAIN__ ),
			'type'     => 'color',
			'default'  => '#3db4f2',
			'required' => array( 'footer-website-description-btn', '=', '1' )
		),
		array(
			'id'       => 'footer-website-description-btn-link',
			'title'    => __( 'Button - Url', __TEXT_DOMAIN__ ),
			'desc'     => __( 'Enter your url', __TEXT_DOMAIN__ ),
			'type'     => 'text',
			'default'  => '/',
			'required' => array( 'footer-website-description-btn', '=', '1' )
		),
		array(
			'id'       => 'footer-website-description-btn-text',
			'title'    => __( 'Button - Text', __TEXT_DOMAIN__ ),
			'desc'     => __( 'adjust the text inside the button', __TEXT_DOMAIN__ ),
			'type'     => 'text',
			'required' => array( 'footer-website-description-btn', '=', '1' ),
			'default'  => 'View More...'
		),
		array(
			'id'      => 'footer-column',
			'title'   => __( 'Widget Column', __TEXT_DOMAIN__ ),
			'type'    => 'radio',
			'options' => array(
				1 => __( '1 Column', __TEXT_DOMAIN__ ),
				2 => __( '2 Columns', __TEXT_DOMAIN__ ),
				3 => __( '3 Columns', __TEXT_DOMAIN__ ),
			),
			'default' => 3,
		),
		array(
			'id'       => 'footer-title-column-1',
			'title'    => __( 'Footer Column 1 - Title', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'default'  => 'Title Footer 1',
			'required' => array(
				array(
					'footer-column',
					'>',
					0
				),
			),
			'desc'     => __( 'just leave it blank if you don\'t want it to be displayed...', __TEXT_DOMAIN__ ),
		),
		array(
			'id'       => 'footer-title-column-2',
			'title'    => __( 'Footer Column 2 - Title', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'default'  => 'Title Footer 2',
			'required' => array(
				array(
					'footer-column',
					'>',
					1
				)
			),
			'desc'     => __( 'just leave it blank if you don\'t want it to be displayed...', __TEXT_DOMAIN__ ),
		),
		array(
			'id'       => 'footer-title-column-3',
			'title'    => __( 'Footer Column 3 - Title', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'default'  => 'Title Footer 3',
			'required' => array(
				array(
					'footer-column',
					'>',
					2
				)
			),
			'desc'     => __( 'just leave it blank if you don\'t want it to be displayed...', __TEXT_DOMAIN__ ),
		),
		array(
			'id'      => 'footer-copyright',
			'title'   => __( 'Copyright Text', __TEXT_DOMAIN__ ),
			'type'    => 'textarea',
			'default' => '&copy; 2020 AniClone.co'
		)
	)
) );

/**
 * Footer Color Subsection
 * @since   1.0.0
 */
Redux::setSection( $opt_name, array(
	'id'               => 'footer-color',
	'title'            => __( 'Color', __TEXT_DOMAIN__ ),
	'customizer_width' => 450,
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'footer-background-color',
			'title'   => __( 'Background Color', __TEXT_DOMAIN__ ),
			'type'    => 'color',
			'default' => '#171823'
		),
		array(
			'id'      => 'footer-title-color',
			'title'   => __( 'Footer Color Title', __TEXT_DOMAIN__ ),
			'type'    => 'color',
			'default' => '#ffffff'
		),
		array(
			'id'      => 'footer-description-color',
			'title'   => __( 'Description Color', __TEXT_DOMAIN__ ),
			'type'    => 'color',
			'default' => '#ffffff'
		),
		array(
			'id'      => 'footer-list-color',
			'title'   => __( 'Text List Color', __TEXT_DOMAIN__ ),
			'type'    => 'color',
			'default' => '#3db4f2'
		),
		array(
			'id'      => 'footer-hover-color',
			'type'    => 'color',
			'title'   => __( 'Hover List Color', __TEXT_DOMAIN__ ),
			'default' => '#6b7191'
		),
		array(
			'id'      => 'footer-copyright-background-color',
			'title'   => __( 'Copyright - Background Color', __TEXT_DOMAIN__ ),
			'type'    => 'color',
			'default' => '#2b2d42'
		),
		array(
			'id'      => 'footer-copyright-text-color',
			'title'   => __( 'Copyright - Text Color', __TEXT_DOMAIN__ ),
			'type'    => 'color',
			'default' => '#7F8191'
		),
		array(
			'id'      => 'footer-copyright-link-color',
			'type'    => 'color',
			'title'   => __( 'Copyright - Link Color', __TEXT_DOMAIN__ ),
			'default' => '#4169e1'
		),
		array(
			'id'      => 'footer-copyright-hover-color',
			'type'    => 'color',
			'title'   => __( 'Copyright - Hover Color', __TEXT_DOMAIN__ ),
			'default' => '#800080'
		),
	)
) );
// -> START Basic Fields
Redux::setSection( $opt_name, array(
	'title'            => __( 'Social', __TEXT_DOMAIN__ ),
	'id'               => 'socials',
	'customizer_width' => '400px',
	'icon'             => 'el el-icon-link',
	'fields'           => array(
		array(
			'id'    => 'socials-facebook',
			'title' => __( 'Social - Facebook', __TEXT_DOMAIN__ ),
			'type'  => 'text'
		),
		array(
			'id'    => 'socials-instagram',
			'title' => __( 'Social - Instagram', __TEXT_DOMAIN__ ),
			'type'  => 'text'
		),
		array(
			'id'    => 'socials-twitter',
			'title' => __( 'Social - Twitter', __TEXT_DOMAIN__ ),
			'type'  => 'text'
		),
		array(
			'id'    => 'socials-youtube',
			'title' => __( 'Social - Youtube ', __TEXT_DOMAIN__ ),
			'type'  => 'text'
		),
		array(
			'id'    => 'socials-other',
			'title' => __( 'Social - Other', __TEXT_DOMAIN__ ),
			'type'  => 'text'
		)
	)
) );
/**
 * Advanced
 * @since   1.0.0
 */
Redux::setSection( $opt_name, array(
	'id'               => 'advanced-features',
	'title'            => __( 'Advanced Features', __TEXT_DOMAIN__ ),
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'advanced-author-box',
			'title'   => __( 'Display Author Box in Single Page', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false
		),
		array(
			'id'       => 'advanced-author-box-count',
			'title'    => __( 'Author Box - Count Posts ', __TEXT_DOMAIN__ ),
			'type'     => 'switch',
			'default'  => false,
			'required' => array( 'advanced-author-box', '=', 1 )
		),

		array(
			'id'      => 'advanced-related-posts',
			'title'   => __( 'Display Related Posts in Single Page', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'       => 'advanced-number-related-posts',
			'title'    => __( 'Number of Related Posts', __TEXT_DOMAIN__ ),
			'type'     => 'slider',
			'min'      => 2,
			'max'      => 10,
			'default'  => 3,
			'required' => array(
				'advanced-related-posts',
				'=',
				1
			)
		),
		array(
			'id'       => 'advanced-column-related-posts',
			'title'    => __( 'Related Post Columns', __TEXT_DOMAIN__ ),
			'type'     => 'radio',
			'options'  => array(
				'one'   => __( '1 Column', __TEXT_DOMAIN__ ),
				'two'   => __( '2 Columns', __TEXT_DOMAIN__ ),
				'three' => __( '3 Columns', __TEXT_DOMAIN__ ),
				'four'  => __( '4 Columns', __TEXT_DOMAIN__ ),
			),
			'default'  => 'three',
			'required' => array(
				'advanced-related-posts',
				'=',
				1
			)
		),
		array(
			'id'       => 'advanced-related-by-posts',
			'title'    => __( 'Related By', __TEXT_DOMAIN__ ),
			'type'     => 'radio',
			'options'  => array(
				'category' => __( 'Post Categories', __TEXT_DOMAIN__ ),
				'post_tag' => __( 'Post Label', __TEXT_DOMAIN__ )
			),
			'default'  => 'category',
			'required' => array(
				'advanced-related-posts',
				'=',
				1
			)
		)
	)
) );

/**
 * Ads Placement
 * @since   1.0.0
 */
Redux::setSection( $opt_name, array(
	'id'               => 'ads',
	'title'            => __( 'Ads Placement', __TEXT_DOMAIN__ ),
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'ads-home-section',
			'title'   => __( 'Display Ads - Home section?', __TEXT_DOMAIN__ ),
			'desc'    => __( 'Put HTML code here and make sure that maximal height of ad is 970px and width 250px', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-home-section-1',
			'title'    => __( 'Home - Ads Section 1', __TEXT_DOMAIN__ ),
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 970px and width 250px', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'required' => array(
				'ads-home-section',
				'=',
				1
			)

		),
		array(
			'id'       => 'ads-home-section-2',
			'title'    => __( 'Home - Ads Section 2', __TEXT_DOMAIN__ ),
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 970px and width 250px', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'required' => array(
				'ads-home-section',
				'=',
				1
			)

		),
		array(
			'id'       => 'ads-home-section-3',
			'title'    => __( 'Home - Ads Section 3', __TEXT_DOMAIN__ ),
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 970px and width 250px', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'required' => array(
				'ads-home-section',
				'=',
				1
			)

		),
		array(
			'id'       => 'ads-home-section-4',
			'title'    => __( 'home - Ads Section 4', __TEXT_DOMAIN__ ),
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 970px and width 250px', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'required' => array(
				'ads-home-section',
				'=',
				1
			)

		),
		array(
			'id'       => 'ads-home-section-5',
			'title'    => __( 'Home - Ads Section 5', __TEXT_DOMAIN__ ),
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 970px and width 250px', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'required' => array(
				'ads-home-section',
				'=',
				1
			)

		),

		array(
			'id'      => 'ads-absolute',
			'title'   => __( 'Display Ads - Absolute Top / Bottom ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-absolute-middle',
			'title'    => __( 'Ads - Popup Other', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 720px and width 300px', __TEXT_DOMAIN__ ),
			'required' => array(
				'ads-absolute',
				'=',
				1
			)
		),
		array(
			'id'       => 'ads-absolute-top-left',
			'title'    => __( 'Ads - Top left', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 350px and width 250px', __TEXT_DOMAIN__ ),
			'required' => array(
				'ads-absolute',
				'=',
				1
			)
		),
		array(
			'id'       => 'ads-absolute-top-right',
			'title'    => __( 'Ads - Top Right', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 350px and width 250px', __TEXT_DOMAIN__ ),
			'required' => array(
				'ads-absolute',
				'=',
				1
			)
		),
		array(
			'id'       => 'ads-absolute-bottom-right',
			'title'    => __( 'Ads - Bottom Right', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 350px and width 250px', __TEXT_DOMAIN__ ),
			'required' => array(
				'ads-absolute',
				'=',
				1
			)
		),
		array(
			'id'       => 'ads-absolute-bottom-left',
			'title'    => __( 'Ads - Bottom Left', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 350px and width 250px', __TEXT_DOMAIN__ ),
			'required' => array(
				'ads-absolute',
				'=',
				1
			)
		),

		array(
			'id'      => 'ads-sidebar',
			'title'   => __( 'Display Ads - Sidebar ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-sidebar-1',
			'title'    => __( 'Ads - Sidebar 1', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-sidebar', '=', 1 )
		),
		array(
			'id'       => 'ads-sidebar-2',
			'title'    => __( 'Ads - Sidebar 2', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-sidebar', '=', 1 )
		),

		array(
			'id'      => 'ads-single-series',
			'title'   => __( 'Display Ads - Single Series?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-single-series-middle',
			'title'    => __( 'Ads - Panel Series Middle', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 90px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-single-series', '=', 1 )
		),
		array(
			'id'       => 'ads-single-series-bottom',
			'title'    => __( 'Ads - Panel Series Bottom', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and make sure that maximal height of ad is 90px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-single-series', '=', 1 )
		),
//		PAGES
		array(
			'id'      => 'ads-pages',
			'title'   => __( 'Display Ads - Pages ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-pages-top',
			'title'    => __( 'Ads - Pages Ads Top ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML code here and max size 980 x 120', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-after-post',
			'title'    => __( 'Ads - Pages ads After post ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max height 50px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-bottom',
			'title'    => __( 'Ads - Pages Ads Bottom ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-fixed-bottom-left',
			'title'    => __( 'Ads - Pages Ads Fixed Bottom Left ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-fixed-bottom-right',
			'title'    => __( 'Ads - Pages Ads Fixed Bottom Right ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-fixed-middle',
			'title'    => __( 'Ads - Pages Ads Fixed middle ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-fixed-top-left',
			'title'    => __( 'Ads - Pages Ads Fixed Top Left ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),
		array(
			'id'       => 'ads-pages-fixed-top-right',
			'title'    => __( 'Ads - Pages Ads Fixed Top Right ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-pages', '=', 1 )
		),


//      MANGA
		array(
			'id'      => 'ads-manga',
			'title'   => __( 'Display Ads - Post Type Manga ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-manga-top',
			'title'    => __( 'Ads - Manga Ads Top ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 970px & height = 250px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-middle',
			'title'    => __( 'Ads - Manga Ads Middle ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 970px & height = 250px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-bottom',
			'title'    => __( 'Ads - Manga Ads Bottom ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 970px & height = 250px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-float-top-right',
			'title'    => __( 'Ads - Manga Ads Float Top Right ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 300px & height = 600px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-fixed-middle',
			'title'    => __( 'Ads - Manga Ads Fixed Middle ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max height & width 350px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-fixed-top-right',
			'title'    => __( 'Ads - Manga Ads Fixed Top Right ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 250px & height = 300px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-fixed-top-left',
			'title'    => __( 'Ads - Manga Ads Fixed Top Left ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 250px & height = 300px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-fixed-bottom-right',
			'title'    => __( 'Ads - Manga Ads Fixed Bottom Right ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 250px & height = 300px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),
		array(
			'id'       => 'ads-manga-fixed-bottom-left',
			'title'    => __( 'Ads - Manga Ads Fixed Bottom Left ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here and max size width = 250px & height = 300px', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-manga', '=', 1 )
		),


		array(
			'id'      => 'ads-posttype-all',
			'title'   => __( 'Display Ads - Post Type All ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'ads-posttype-all-Top',
			'title'    => __( 'Ads - Other Post Type Top', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-posttype-all', '=', 1 )
		),
		array(
			'id'       => 'ads-posttype-all-middle',
			'title'    => __( 'Ads - Other Post Type Item Middle ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-posttype-all', '=', 1 )
		),
		array(
			'id'       => 'ads-posttype-all-bottom',
			'title'    => __( 'Ads - Other Post Type Bottom ', __TEXT_DOMAIN__ ),
			'type'     => 'textarea',
			'desc'     => __( 'Put HTML / Script code here...', __TEXT_DOMAIN__ ),
			'required' => array( 'ads-posttype-all', '=', 1 )
		),

	)
) );

/**
 * Other
 * @since   1.0.0
 */
Redux::setSection( $opt_name, array(
	'id'               => 'other',
	'title'            => __( 'Other', __TEXT_DOMAIN__ ),
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'    => 'other-facebook-pixel',
			'title' => __( 'Facebook Pixel ID', __TEXT_DOMAIN__ ),
			'type'  => 'text',
		),
		array(
			'id'    => 'other-google-analytic-code',
			'title' => __( 'Google Analytic Code', __TEXT_DOMAIN__ ),
			'type'  => 'textarea'
		),
		array(
			'id'    => 'other-head-script-before-body-tag',
			'title' => __( 'Head Script Before Body Tag', __TEXT_DOMAIN__ ),
			'type'  => 'textarea'
		),
		array(
			'id'    => 'other-head-script-after-body-tag',
			'title' => __( 'Head Script After Body Tag', __TEXT_DOMAIN__ ),
			'type'  => 'textarea'
		),
		array(
			'id'    => 'other-head-script-footer-tag',
			'title' => __( 'Footer Script', __TEXT_DOMAIN__ ),
			'type'  => 'textarea'
		),


	)
) );
