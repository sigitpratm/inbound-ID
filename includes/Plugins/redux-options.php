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
$args    = array(
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
//	'fields'           => array(
//		array(
//			'id'      => 'home-general-background-jumbotron-set',
//			'type'    => 'switch',
//			'title'   => __( 'Jumbotron - Display', __TEXT_DOMAIN__ ),
//			'default' => true
//		),
//		array(
//			'id'       => 'home-general-background-jumbotron-status',
//			'type'     => 'switch',
//			'title'    => __( 'Jumbotron - Image Hover in Card Post', __TEXT_DOMAIN__ ),
//			'default'  => true,
//			'required' => array( 'home-general-background-jumbotron-set', '=', 1 )
//		),
//		array(
//			'id'       => 'home-general-background-jumbotron-color',
//			'type'     => 'color',
//			'title'    => __( 'Jumbotron - Background Color', __TEXT_DOMAIN__ ),
//			'default'  => '#2b2d42',
//			'required' => array( 'home-general-background-jumbotron-set', '=', 1 )
//		),
//	)
) );

/**
 * HOME - SERVICES
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-services',
	'title'            => __( 'Our Services', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
//	'fields'           => array(
//		array(
//			'id'      => 'home-section-1-status',
//			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
//			'type'    => 'switch',
//			'default' => true
//		),
//		array(
//			'id'      => 'home-section-1-options',
//			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
//			'type'    => 'select',
//			'options' => array(
//				'TV'        => 'TV',
//				'TV Short'  => 'TV Short',
//				'Movie'     => 'Movie',
//				'Leftovers' => 'Leftovers',
//				'Special'   => 'OVA / ONA / SPECIALS'
//			),
//			'default' => 'TV'
//		),
//		array(
//			'id'      => 'home-section-1-post',
//			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
//			'type'    => 'slider',
//			'default' => 10,
//			'min'     => 1,
//			'max'     => 50
//		),
//		array(
//			'id'      => 'home-section-1-card',
//			'title'   => __( 'Card Row' ),
//			'type'    => 'radio',
//			'options' => array(
//				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
//				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
//			),
//			'default' => 'card--home-3'
//		),
//		array(
//			'id'      => 'home-section-1-color-title',
//			'title'   => __( 'Color Title' ),
//			'type'    => 'color',
//			'default' => '#fff'
//		),
//		array(
//			'id'      => 'home-section-1-card',
//			'title'   => __( 'Card Row' ),
//			'type'    => 'radio',
//			'options' => array(
//				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
//				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
//			),
//			'default' => 'card--home-3'
//		),
//	)
) );

/**
 * HOME - OUR WORKS
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-works',
	'title'            => __( 'Our Works', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
//	'fields'           => array(
//		array(
//			'id'      => 'home-section-2-status',
//			'title'   => __( 'Section Show', __TEXT_DOMAIN__ ),
//			'type'    => 'switch',
//			'default' => true
//		),
//		array(
//			'id'      => 'home-section-2-options',
//			'title'   => __( 'Format', __TEXT_DOMAIN__ ),
//			'type'    => 'select',
//			'options' => array(
//				'TV'        => 'TV',
//				'TV Short'  => 'TV Short',
//				'Movie'     => 'Movie',
//				'Leftovers' => 'Leftovers',
//				'Special'   => 'OVA / ONA / SPECIALS'
//			),
//			'default' => 'TV Short'
//		),
//		array(
//			'id'      => 'home-section-2-post',
//			'title'   => __( 'Post Length', __TEXT_DOMAIN__ ),
//			'type'    => 'slider',
//			'default' => 10,
//			'min'     => 1,
//			'max'     => 50
//		),
//		array(
//			'id'      => 'home-section-2-card',
//			'title'   => __( 'Card Row' ),
//			'type'    => 'radio',
//			'options' => array(
//				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
//				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
//			),
//			'default' => 'card--home-3'
//		),
//		array(
//			'id'      => 'home-section-2-color-title',
//			'title'   => __( 'Color Title' ),
//			'type'    => 'color',
//			'default' => '#494949'
//		),
//		array(
//			'id'      => 'home-section-2-card',
//			'title'   => __( 'Card Row' ),
//			'type'    => 'radio',
//			'options' => array(
//				'card--home-3' => __( '3', __TEXT_DOMAIN__ ),
//				'card--home-2' => __( '2', __TEXT_DOMAIN__ ),
//			),
//			'default' => 'card--home-3'
//		)
//	)
) );

/**
 * HOME - LATEST ARTICLE
 */
Redux::setSection( $opt_name, array(
	'id'               => 'home-last-article',
	'title'            => __( 'Last Article', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'      => 'home-last-article-title',
			'title'   => __( 'Title Section Last Article', __TEXT_DOMAIN__ ),
			'type'    => 'text',
			'default' => 'LAST ARTICLE',
			'desc'    => '*input title for heading section last article'
		),
		array(
			'id'    => 'last-article-categories',
			'title' => ( 'Last Article' ),
			'type'  => 'select',
			'multi' => true,
			'data'  => 'categories',
			'args'  => array( 'post_type' => array( 'post' ), 'numberposts' => - 1 ),
		)
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
				'id'      => 'client-select-slide',
				'type'    => 'select',
				'title'   => esc_html__( 'Select Option', __TEXT_DOMAIN__ ),
				'options' => array(
					'1' => '1 Slide',
					'2' => '2 Slide',
					'3' => '3 Slide',
					'4' => '4 Slide',
					'5' => '5 Slide'
				),
				'default' => '2',
			),
		)
	)
);

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
			'id'      => 'home-awards-title',
			'title'   => __( 'Title Section Award', __TEXT_DOMAIN__ ),
			'type'    => 'text',
			'default' => 'AWARDS',
			'desc'    => '*input title for heading section awards'
		),
		array(
			'id'      => 'home-awards-count-post',
			'title'   => __( 'Total Show Post', __TEXT_DOMAIN__ ),
			'type'    => 'select',
			'desc'    => __( '*select the number of posts you want to appear on the screen' ),
			'options' => array(
				'5'  => '5 post',
				'10' => '10 post',
				'15' => '15 post',
			),
			'default' => array( '5' )
		),
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


/**
 * ABOUT US
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'About Us', __TEXT_DOMAIN__ ),
	'id'               => 'about-us',
	'customizer_width' => '400px',
	'icon'             => 'el el-pencil'
) );


/**
 * ABOUT US - DESC 1 & DESC 2
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'About Us Descriptions', __TEXT_DOMAIN__ ),
	'id'               => 'about-us-desc1',
	'customizer_width' => '450px',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'about-us-desc1',
			'title'   => "About Us Content Section 1",
			'type'    => 'textarea',
			'default' => 'Content Section 1',
		),
		array(
			'id'      => 'about-us-desc2',
			'title'   => "About Us Content Section 2",
			'type'    => 'textarea',
			'default' => 'Content Section 2',
		),
	)
) );


/**
 * ABOUT US - ACHIEVEMENT
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Our Achievement', __TEXT_DOMAIN__ ),
	'id'               => 'about-us-achievement',
	'customizer_width' => '450px',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'heading-achievement',
			'title'   => "Heading Achievement",
			'type'    => 'text',
			'default' => 'OUR ACHIEVEMENT!',
		),
		array(
			'id'      => 'achievement-number-item1',
			'title'   => "Number Item 1",
			'type'    => 'text',
			'default' => '150+',
		),
		array(
			'id'      => 'achievement-desc-item1',
			'title'   => "Description Item 1",
			'type'    => 'text',
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing',
		),
		array(
			'id'      => 'achievement-number-item2',
			'title'   => "Number Item 2",
			'type'    => 'text',
			'default' => '110+',
		),
		array(
			'id'      => 'achievement-desc-item2',
			'title'   => "Description Item 2",
			'type'    => 'text',
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing',
		),
		array(
			'id'      => 'achievement-number-item3',
			'title'   => "Number Item 3",
			'type'    => 'text',
			'default' => '5000+',
		),
		array(
			'id'      => 'achievement-desc-item3',
			'title'   => "Description Item 3",
			'type'    => 'text',
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing',
		),
		array(
			'id'      => 'achievement-number-item4',
			'title'   => "Number Item 4",
			'type'    => 'text',
			'default' => '2800+',
		),
		array(
			'id'      => 'achievement-desc-item4',
			'title'   => "Description Item 4",
			'type'    => 'text',
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing',
		),
	)
) );


/**
 * ABOUT US - LAST SECTION
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Last Section', __TEXT_DOMAIN__ ),
	'id'               => 'about-us-last-section',
	'customizer_width' => '450px',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'heading-about-us-last-section',
			'title'   => "Heading last Section About Us",
			'type'    => 'textarea',
			'default' => 'Heading last Section About Us',
		),
		array(
			'id'       => 'about-us-last-section-image',
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'image', 'default' ),
			'compiler' => 'false',
			'subtitle' => __( 'Upload your logo', 'default' ),
			'default'  => array( 'url' => jpp_assets( '/img/png/img-footer.png' ) ),
		),
		array(
			'id'      => 'about-us-last-section-link-btn1',
			'title'   => "Link Button 1",
			'type'    => 'text',
			'default' => 'https://www.google.com',
		),
		array(
			'id'      => 'about-us-last-section-text-btn1',
			'title'   => "Text Button 1",
			'type'    => 'text',
			'default' => 'Create a Brief',
		),
		array(
			'id'      => 'show-btn2-about-us-last-section',
			'title'   => __( 'Show Button 2 ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'about-us-last-section-link-btn2',
			'title'    => "Link Button 2",
			'type'     => 'text',
			'default'  => 'https://www.google.com',
			'required' => array( 'show-btn2-about-us-last-section', '=', '1' )
		),
		array(
			'id'       => 'about-us-last-section-text-btn2',
			'title'    => "Text Button 2",
			'type'     => 'text',
			'default'  => 'Set a Meeting',
			'required' => array( 'show-btn2-about-us-last-section', '=', '1' )
		),
	)
) );


/**
 * CONTACT US
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Contact Us', __TEXT_DOMAIN__ ),
	'id'               => 'contact-us',
	'customizer_width' => '400px',
	'icon'             => 'el el-pencil',
	'fields'           => array(
		array(
			'id'      => 'desc-contact-us',
			'title'   => "Description Contact Us",
			'type'    => 'textarea',
			'default' => 'ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci, blanditiis cum deleniti distinctio',
		),
		array(
			'id'      => 'location-contact-us',
			'title'   => "Location Contact Us",
			'type'    => 'text',
			'default' => 'Lorem ipsum dolor sit amet, consectetur',
		),
		array(
			'id'      => 'email-contact-us',
			'title'   => "Email Contact Us",
			'type'    => 'text',
			'default' => 'admin@inbound.com',
		),
		array(
			'id'      => 'phone-contact-us',
			'title'   => "Phone Number Contact Us",
			'type'    => 'text',
			'default' => '+62 812 3456 7890',
		),
		array(
			'id'      => 'contact-us-btn1-text',
			'title'   => "Button 1 Text",
			'type'    => 'text',
			'default' => 'Button Text 1',
		),
		array(
			'id'      => 'contact-us-btn1-link',
			'title'   => "Button 1 Link",
			'type'    => 'text',
			'default' => 'https://www.google.com',
		),
		array(
			'id'      => 'contact-us-btn2-text',
			'title'   => "Button 2 Text",
			'type'    => 'text',
			'default' => 'Button Text 2',
		),
		array(
			'id'      => 'contact-us-btn2-link',
			'title'   => "Button 2 Link",
			'type'    => 'text',
			'default' => 'https://www.google.com',
		),
	)
) );


/**
 * INBOUND BLOG
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Blog Inbound', __TEXT_DOMAIN__ ),
	'id'               => 'inbound-blog',
	'customizer_width' => '400px',
	'icon'             => 'el el-pencil'
) );


/**
 * INBOUND BLOG - LAST POST
 */
Redux::setSection( $opt_name, array(
	'id'               => 'blog-last-article',
	'title'            => __( 'Last Article Blog', __TEXT_DOMAIN__ ),
	'subsection'       => true,
	'customizer_width' => 450,
	'fields'           => array(
		array(
			'id'    => 'last-article-categories',
			'title' => ( 'Last Article' ),
			'type'  => 'select',
			'multi' => true,
			'data'  => 'categories',
			'args'  => array( 'post_type' => array( 'post' ), 'numberposts' => - 1 ),
		)
	)
) );


/**
 * INBOUND BLOG - LAST SECTION
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Last Section', __TEXT_DOMAIN__ ),
	'id'               => 'blog-last-section',
	'customizer_width' => '450px',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'heading-blog-last-section',
			'title'   => "Heading last Section About Us",
			'type'    => 'textarea',
			'default' => 'Heading last Section Inbound Blog',
		),
		array(
			'id'       => 'blog-last-section-image',
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'image', 'default' ),
			'compiler' => 'false',
			'subtitle' => __( 'Upload your logo', 'default' ),
			'default'  => array( 'url' => jpp_assets( '/img/png/img-footer.png' ) ),
		),
		array(
			'id'      => 'blog-last-section-link-btn1',
			'title'   => "Link Button 1",
			'type'    => 'text',
			'default' => 'https://www.google.com',
		),
		array(
			'id'      => 'blog-last-section-text-btn1',
			'title'   => "Text Button 1",
			'type'    => 'text',
			'default' => 'Create a Brief',
		),
		array(
			'id'      => 'show-btn2-blog-last-section',
			'title'   => __( 'Show Button 2 ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'blog-last-section-link-btn2',
			'title'    => "Link Button 2",
			'type'     => 'text',
			'default'  => 'https://www.google.com',
			'required' => array( 'show-btn2-blog-last-section', '=', '1' )
		),
		array(
			'id'       => 'blog-last-section-text-btn2',
			'title'    => "Text Button 2",
			'type'     => 'text',
			'default'  => 'Set a Meeting',
			'required' => array( 'show-btn2-blog-last-section', '=', '1' )
		),
	)
) );


/**
 * CASE STUDIES
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Case Studies', __TEXT_DOMAIN__ ),
	'id'               => 'case-studies',
	'customizer_width' => '400px',
	'icon'             => 'el el-pencil'
) );


/**
 * CASE STUDIES - LAST SECTION
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Last Section', __TEXT_DOMAIN__ ),
	'id'               => 'case-studies-last-section',
	'customizer_width' => '450px',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'heading-case-studies-last-section',
			'title'   => "Heading last Section About Us",
			'type'    => 'textarea',
			'default' => 'Heading last Section Case Studies',
		),
		array(
			'id'       => 'case-studies-last-section-image',
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'image', 'default' ),
			'compiler' => 'false',
			'subtitle' => __( 'Upload your logo', 'default' ),
			'default'  => array( 'url' => jpp_assets( '/img/png/img-footer.png' ) ),
		),
		array(
			'id'      => 'case-studies-last-section-link-btn1',
			'title'   => "Link Button 1",
			'type'    => 'text',
			'default' => 'https://www.google.com',
		),
		array(
			'id'      => 'case-studies-last-section-text-btn1',
			'title'   => "Text Button 1",
			'type'    => 'text',
			'default' => 'Create a Brief',
		),
		array(
			'id'      => 'show-btn2-case-studies-last-section',
			'title'   => __( 'Show Button 2 ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'case-studies-last-section-link-btn2',
			'title'    => "Link Button 2",
			'type'     => 'text',
			'default'  => 'https://www.google.com',
			'required' => array( 'show-btn2-case-studies-last-section', '=', '1' )
		),
		array(
			'id'       => 'case-studies-last-section-text-btn2',
			'title'    => "Text Button 2",
			'type'     => 'text',
			'default'  => 'Set a Meeting',
			'required' => array( 'show-btn2-case-studies-last-section', '=', '1' )
		),
	)
) );

/**
 * MAIN FOOTER
 */
Redux::setSection( $opt_name, array(
	'title'            => __( 'Footer', __TEXT_DOMAIN__ ),
	'id'               => 'footer',
	'customizer_width' => '400px',
	'icon'             => 'el el-lines'
) );


/**
 * FOOTER - CONTENT
 * @since 1.0.0
 */
Redux::setSection( $opt_name, array(
	'id'               => 'footer-content',
	'title'            => __( 'Content', __TEXT_DOMAIN__ ),
	'customizer_width' => 450,
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'      => 'footer-heading-btn',
			'title'   => __( 'Used Image For Heading Footer ?', __TEXT_DOMAIN__ ),
			'type'    => 'switch',
			'default' => false,
		),
		array(
			'id'       => 'image-heading-footer',
			'title'    => __( 'Image Heading Footer', __TEXT_DOMAIN__ ),
			'type'     => 'media',
			'url'      => true,
			'desc'     => esc_html__( '*Please select image with png extension' ),
			'default'  => array(
				'url' => 'https://s.wordpress.org/style/images/codeispoetry.png'
			),
			'required' => array( 'footer-heading-btn', '=', '1' )
		),
		array(
			'id'      => 'address-footer',
			'title'   => __( 'Address', __TEXT_DOMAIN__ ),
			'type'    => 'textarea',
			'default' => '4346 Roosevelt Road, Dodge City, Kansas',
		),
		array(
			'id'      => 'phone-footer',
			'title'   => __( 'Phone Number', __TEXT_DOMAIN__ ),
			'type'    => 'text',
			'default' => '620-280-0177',
		),
		array(
			'id'      => 'email-footer',
			'title'   => __( 'Email', __TEXT_DOMAIN__ ),
			'type'    => 'text',
			'default' => 'admin@admin.com',
		),
		array(
			'id'      => 'copyright-footer',
			'title'   => __( 'Copyright', __TEXT_DOMAIN__ ),
			'type'    => 'text',
			'default' => 'copyright &#169; admin@admin.com 2022',
		),

	)
) );

/**
 * FOOTER - SOCIAL
 * @since   1.0.0
 */
Redux::setSection( $opt_name, array(
		'id'               => 'footer-social',
		'title'            => __( 'Social', __TEXT_DOMAIN__ ),
		'customizer_width' => 450,
		'subsection'       => true,
		'fields'           => array(
			array(
				'id'      => 'footer-social-title',
				'title'   => __( 'Heading Social', __TEXT_DOMAIN__ ),
				'type'    => 'text',
				'default' => 'Follow Us',
			),
			array(
				'id'      => 'footer-social-instagram',
				'title'   => __( 'URL Instagram', __TEXT_DOMAIN__ ),
				'type'    => 'text',
				'default' => 'https://www.instagram.com'
			),
			array(
				'id'      => 'footer-social-twitter',
				'title'   => __( 'URL Twitter', __TEXT_DOMAIN__ ),
				'type'    => 'text',
				'default' => 'https://www.twitter.com'
			),

			array(
				'id'      => 'footer-social-facebook',
				'title'   => __( 'URL Facebook', __TEXT_DOMAIN__ ),
				'type'    => 'text',
				'default' => 'https://www.facebook.com'
			),

			array(
				'id'      => 'footer-social-linkedin',
				'title'   => __( 'URL Linkedin', __TEXT_DOMAIN__ ),
				'type'    => 'text',
				'default' => 'https://www.linkedin.com'
			),

			array(
				'id'      => 'footer-social-youtube',
				'title'   => __( 'URL Youtube', __TEXT_DOMAIN__ ),
				'type'    => 'text',
				'default' => 'https://www.youtube.com'
			),
			array(
				'id'      => 'social-custom-btn',
				'title'   => __( 'Add Custom Social Item?', __TEXT_DOMAIN__ ),
				'type'    => 'switch',
				'default' => false,
			),
			array(
				'id'       => 'custom-social-url',
				'title'    => __( 'URL Custom Social', __TEXT_DOMAIN__ ),
				'type'     => 'text',
				'default'  => 'https://www.google.com',
				'required' => array( 'social-custom-btn', '=', '1' )
			),
			array(
				'id'       => 'custom-social-img',
				'title'    => __( 'Icon Custom Social', __TEXT_DOMAIN__ ),
				'type'     => 'media',
				'url'      => true,
				'desc'     => esc_html__( '*Please select image with png extension' ),
				'default'  => array(
					'url' => 'https://s.wordpress.org/style/images/codeispoetry.png'
				),
				'required' => array( 'social-custom-btn', '=', '1' )
			),
		)
	)
);
