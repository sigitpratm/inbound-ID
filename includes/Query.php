<?php
namespace EmkalabTheme;

class Query {

	public static function post(String $post_type,  $is_count = false, $arguments = [], $is_single = false){

		if ($is_single) {
			$posts = get_post( $arguments );

		} else {
			$args = array(
				'post_type'   => $post_type,
			);

			if (count($arguments) > 0) {
				foreach ($arguments as $key => $argument) {
					$args[$key] = $argument;
				}
			}
			$posts = get_posts( $args );

		}
		if ($is_count) {
			return count( $posts );
		} else {

			return $posts;
		}
	}
}
