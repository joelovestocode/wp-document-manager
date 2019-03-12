<?php

namespace WPDocumentManager\Controllers;

class PostTypeController {

	/**
	 * Establish defaults for the custom post type and register the post type
	 *
	 * @param string $postTypeName
	 * @param array $labels
	 * @param array $args
	 */
	public static function registerPostType( string $postTypeName, array $labels, array $args ) {

		$args = array_merge(
			[
				'labels'             => $labels,
				'public'             => false,
				'publicly_queryable' => false,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => false,
				'has_archive'        => false,
				'menu_icon'          => 'dashicons-admin-post',
				'menu_position'      => 2,
			],
			$args
		);

		register_post_type( $postTypeName, $args );
	}
}