<?php

namespace WPDocumentManager\Controllers;

class PostMetaDataController {

	/**
	 * @var bool $saveMetaData
	 */
	private $saveMetaData;

	/**
	 * @var \WP_Post $post
	 */
	private $post;

	/**
	 * PostMetaDataController constructor.
	 *
	 * @param \WP_Post $post
	 */
	public function __construct( \WP_Post $post ) {
		$this->post = $post;
		$this->setSaveMetaData( false );
	}

	/**
	 * @return bool
	 */
	public function isSaveMetaData(): bool {
		return $this->saveMetaData;
	}

	/**
	 * @param bool $saveMetaData
	 *
	 * @return PostMetaDataController
	 */
	public function setSaveMetaData( bool $saveMetaData ): PostMetaDataController {
		$this->saveMetaData = $saveMetaData;

		return $this;
	}

	/**
	 * Get the value of the provided $metaFieldName for the post
	 *
	 * @param string $metaFieldName
	 * @param bool $single
	 *
	 * @return mixed
	 */
	public function getMetaValue( string $metaFieldName, bool $single = true ) {
		return get_post_meta( $this->post->ID, $metaFieldName, $single );
	}

	/**
	 * Save the value of the $metaFieldName from the post posted data to the post meta
	 *
	 * @param array $postSubmissionData
	 * @param string $metaFieldName
	 *
	 * @return bool|int
	 */
	public function saveMetaData( array $postSubmissionData, string $metaFieldName ) {

		if ( ! $this->isSaveMetaData() || ! isset( $postSubmissionData[ $metaFieldName ] ) ) {
			return false;
		}

		return update_post_meta( $this->post->ID, $metaFieldName, $postSubmissionData[ $metaFieldName ] );
	}
}