<?php

namespace WPDocumentManager;

use WPDocumentManager\Controllers\PostTypeController;

class PostTypeWPDocumentManager {

	const POST_TYPE_NAME = 'wp-document-manager';

	/**
	 * @var array $labels
	 */
	private $labels;

	/**
	 * @var array $args
	 */
	private $args;

	/**
	 * Establish Attribute values and initiate the Custom Post Type
	 *
	 * PostTypeWPDocumentManager constructor.
	 */
	public function __construct() {

		$this->labels = [
			'name'          => __( 'Documents', \WPDocumentManager::PLUGIN_SLUG ),
			'singular_name' => __( 'Document', \WPDocumentManager::PLUGIN_SLUG ),
			'menu_name'     => __( 'Documents', \WPDocumentManager::PLUGIN_SLUG ),
			'add_new'       => __( 'Add New Document', \WPDocumentManager::PLUGIN_SLUG ),
		];

		$this->args = [
			'menu_icon' => 'dashicons-media-text',
			'supports'  => [
				'title',
			],
		];

		add_action( 'init', [ $this, 'registerPostType' ] );
	}

	/**
	 * Callback for the 'init' action
	 */
	public function registerPostType() {
		PostTypeController::registerPostType( self::POST_TYPE_NAME, $this->labels, $this->args );
	}
}