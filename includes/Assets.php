<?php

namespace AniManga;



class Assets {

	public function __construct() {
		$this->script();
		$this->style();
	}

//	public static function init(){
//		self::script();
//		self::style();
//	}

	public static function style() {
//		wp_enqueue_style( 'animanga-skeleton', animanga_assets( 'css', 'skeleton.css' ), array(), _S_VERSION );
		wp_enqueue_style( 'animanga-style', animanga_assets( 'build/css', 'style.css' ), array(), _S_VERSION );
//		wp_enqueue_style( 'mdi-font', animanga_assets( 'css', 'mdi.css' ), array(), _S_VERSION );
	}

	public static function script() {
		// If serves as AMP page, then let it be
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) :
			return;
		endif;

//		wp_enqueue_script( 'jippi-api', animanga_assets( 'js', 'api.js' ), array(), _S_VERSION, true );
		wp_enqueue_script( 'jippi-main-js', animanga_assets( 'build', 'js/main.js' ), array(), true, true );
		wp_enqueue_script( 'animanga-navigation', animanga_assets( 'js', 'navigation.js' ), array(), _S_VERSION, true );
//		wp_enqueue_script( 'animanga-styled', animanga_assets( 'js', 'styled.js' ), array(), _S_VERSION, true );
//		wp_enqueue_script( 'animanga-lazy-load', animanga_assets( 'js', 'jquery.lazy.min.js' ), array(), _S_VERSION, true );
		wp_enqueue_script( 'animanga-skip-link-focus-fix', animanga_assets( 'js', 'skip-link-focus-fix.js' ), array(), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public static function updateChecker() {


	}
}