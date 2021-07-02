<?php
/**
 * Theme Customizer - Header
 *
 * @package jippitheme
 */

namespace JippiTheme\Api\Customizer;

use WP_Customize_Color_Control;
use Awps\Api\Customizer;

/**
 * Customizer class
 */
class Header
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize )
	{
		$wp_customize->add_section( 'jippitheme_header_section' , array(
			'title' => __( 'Header', __TEXT_DOMAIN__ ),
			'description' => __( 'Customize the Header' ),
			'priority' => 35
		) );

		$wp_customize->add_setting( 'jippitheme_header_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'jippitheme_header_text_color' , array(
			'default' => '#333333',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_setting( 'jippitheme_header_link_color' , array(
			'default' => '#004888',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jippitheme_header_background_color', array(
			'label' => __( 'Header Background Color', __TEXT_DOMAIN__ ),
			'section' => 'jippitheme_header_section',
			'settings' => 'jippitheme_header_background_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jippitheme_header_text_color', array(
			'label' => __( 'Header Text Color', __TEXT_DOMAIN__ ),
			'section' => 'jippitheme_header_section',
			'settings' => 'jippitheme_header_text_color',
		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jippitheme_header_link_color', array(
			'label' => __( 'Header Link Color', __TEXT_DOMAIN__ ),
			'section' => 'jippitheme_header_section',
			'settings' => 'jippitheme_header_link_color',
		) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-title a',
				'render_callback' => function() {
					bloginfo( 'name' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'render_callback' => function() {
					bloginfo( 'description' );
				},
			) );
			$wp_customize->selective_refresh->add_partial( 'jippitheme_header_background_color', array(
				'selector' => '#jippitheme-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'jippitheme_header_text_color', array(
				'selector' => '#jippitheme-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
			$wp_customize->selective_refresh->add_partial( 'jippitheme_header_link_color', array(
				'selector' => '#jippitheme-header-control',
				'render_callback' => array( $this, 'outputCss' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '.site-header', 'background-color', 'jippitheme_header_background_color' );
			echo Customizer::css( '.site-header', 'color', 'jippitheme_header_text_color' );
			echo Customizer::css( '.site-header a', 'color', 'jippitheme_header_link_color' );
		echo '</style>';
	}
}
