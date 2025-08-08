<?php
/**
 * Feather icons
 *
 * @package Bootscore Child
 * @version 6.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Shortcode for inserting Feather icons on Gutenberg level.
 *
 * @param array $attributes Attributes passed to the shortcode.
 * @return string HTML SVG code for a Feather icon.
 */
function icon_code( $attributes ) {
	if ( isset( $attributes['name'] ) ) {
		$icon  = '<svg class="icon">';
		$icon .= '<use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#' . $attributes['name'] . '" />';
		$icon .= '</svg>';

		return $icon;
	}

	return '';
}
add_shortcode( 'icon', 'icon_code' );
