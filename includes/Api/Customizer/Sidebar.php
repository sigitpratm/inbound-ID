<?php
/**
 * Theme Customizer - Sidebar
 *
 * @package EmkalabTheme
 */

namespace EmkalabTheme\Api\Customizer;

use WP_Customize_Color_Control;
use Awps\Api\Customizer;

/**
 * Customizer class
 */
class Sidebar
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize )
	{
		$wp_customize->add_section( 'EmkalabTheme_sidebar_section' , array(
			'title' => __( 'Sidebar', __TEXT_DOMAIN__ ),
			'description' => __( 'Customize the Sidebar' ),
			'priority' => 161
		) );

		$wp_customize->add_setting( 'EmkalabTheme_sidebar_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'EmkalabTheme_sidebar_background_color', array(
			'label' => __( 'Background Color', __TEXT_DOMAIN__ ),
			'section' => 'EmkalabTheme_sidebar_section',
			'settings' => 'EmkalabTheme_sidebar_background_color',
		) ) );

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'EmkalabTheme_sidebar_background_color', array(
				'selector' => '#EmkalabTheme-sidebar-control',
				'render_callback' => array( $this, 'output' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function output()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '#sidebar', 'background-color', 'EmkalabTheme_sidebar_background_color' );
		echo '</style>';
	}
}
