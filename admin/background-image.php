<?php

/**
 *	Class Karma_Sublanguage
 */
class Karma_Background_Image {

	/**
	 * get image sizes data
	 */
	public function get_image_data($attachement_id) {

		$metadata = wp_get_attachment_metadata($attachement_id);

		$sources = apply_filters('background-image-manager-sources', array(array(
			'src' => wp_get_attachment_url($attachement_id),
			'width' => $metadata['width'],
			'height' => $metadata['height']
		)), $attachement_id);

		return $sources;
	}

	/**
	 * get all image sizes data
	 */
	public function get_images_data($attachement_ids) {

		$images = array();

		foreach ($attachement_ids as $attachement_id) {

			$images[] = $this->get_image_data($attachement_id);

		}

		return $images;
	}

}

global $karma_background_image;
$karma_background_image = new Karma_Background_Image;

function karma_get_image_data($attachement_id) {
	global $karma_background_image;

	return $karma_background_image->get_image_data($attachement_id);
}
function karma_get_images_data($attachement_ids) {
	global $karma_background_image;

	return $karma_background_image->get_images_data($attachement_ids);
}
