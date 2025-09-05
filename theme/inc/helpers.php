<?php
/**
 * Helper functions
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Icon helper creates a feater SVG icon element
 *
 * @param string $name The name of the icon to render.
 * @link https://feathericons.com
 */
function icon( $name ) {
	return '<svg class="icon"><use href="' . get_stylesheet_directory_uri() . '/assets/fonts/icon.svg#' . $name . '" aria-hidden="true"></svg>';
}

/**
 * Extracts icon position SVG elements from CSS class names.
 *
 * This function parses CSS class names to find icon-start-* and icon-end-* classes,
 * then generates corresponding SVG icons using the icon() helper function.
 *
 * @param string $class_names CSS class names to parse for icon positions.
 * @return array Associative array with 'start' and 'end' keys containing generated SVG icons.
 */
function icon_position_svg( $class_names ) {
	// find all icon-start-* and icon-end-* classes.
	preg_match_all( '/icon(?:-(start|end))?-([a-zA-Z0-9\-_]+)/', $class_names, $icon_matches, PREG_SET_ORDER );
	$icon_svg = array(
		'start' => '',
		'end'   => '',
	);
	foreach ( $icon_matches as $m ) {
		$pos               = ! empty( $m[1] ) ? $m[1] : 'start';
		$icon_svg[ $pos ] .= icon( $m[2] );
	}
	return $icon_svg;
	foreach ( $icon_matches as $match ) {
		// append the icon to the appropriate position ('start' or 'end').
		$icon_svg[ $match[1] ] .= icon( $match[2] );
	}

	return $icon_svg;
}
