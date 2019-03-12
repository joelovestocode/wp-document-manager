<?php
/**
 * Plugin Name: WP Document Manager
 * Plugin URI: https://github.com/joelovestocode/wp-document-manager
 * Description: Lightweight Document Manager for WordPress
 * Author: Joe Johnson
 * Version: 1.0.0
 */

require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

class WPDocumentManager {

	const PLUGIN_SLUG = 'wp-document-manager';
	const PLUGIN_VERSION = '1.0.0';

	/**
	 * WPDocumentManager constructor.
	 */
	public function __construct() {

		if ( ! defined( 'WPDM_PLUGIN_VERSION' ) ) {
			define( 'WPDM_PLUGIN_VERSION', self::PLUGIN_VERSION );
		}

		$this->pluginInit();
	}

	private function pluginInit() {
		new \WPDocumentManager\PostTypeWPDocumentManager();
	}

	/**
	 * @return string
	 */
	public static function getPluginDirectoryPath() {
		return plugin_dir_path( __FILE__ );
	}

	/**
	 * @return string
	 */
	public static function getPluginDirectoryUrl() {
		return plugin_dir_url( __FILE__ );
	}
}

new WPDocumentManager();

//TODO: Determine the allowed types of documents
//TODO: Add custom meta fields to the post type - title, upload type, caption, thumbnail (featured-image), file-upload
//TODO: Add Category Taxonomy to Uploads
//TODO: Add ability to determine upload destination when uploading the file
//TODO: Add/restrict user capabilities for the actions
//TODO:

