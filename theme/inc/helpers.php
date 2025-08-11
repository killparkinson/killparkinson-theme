<?php
/**
 * Helper functions
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'icon' ) ) {
	/**
	 * Icon helper creates a feater SVG icon element
	 *
	 * @param string $name The name of the icon to render.
	 * @link https://feathericons.com
	 */
	function icon( $name ) {
		return '<svg class="icon"><use href="' . get_stylesheet_directory_uri() . '/assets/fonts/icon.svg#' . $name . '" aria-hidden="true"></svg>';
	}
}
