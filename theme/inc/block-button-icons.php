<?php
/**
 * Block Buttons Icons
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Adds icon support to the button block by parsing custom icon classes
 * such as `icon-start-{name}` and `icon-end-{name}` from the block's wrapper div,
 * and injecting corresponding SVG icons inside the button's anchor tag.
 *
 * @param string $block_content The original block content HTML.
 *
 * @return string The modified block content with icons injected.
 */
function block_button_icons( $block_content ) {
	// pattern to match the button block and capture all icon classes.
	$pattern = '/(<div class="wp-block-button [^"]*"[^>]*>)(.*?)(<\/div>)/is';

	$block_content = preg_replace_callback(
		$pattern,
		function ( $matches ) {
			$full_div      = $matches[1];
			$inner_content = $matches[2];
			$closing_div   = $matches[3];

			// extract the class attribute to find all icon classes.
			preg_match( '/class="([^"]*)"/', $full_div, $class_matches );

			if ( ! isset( $class_matches[1] ) ) {
				return $matches[0];
			}

			$class_names = $class_matches[1];

			// find all icon-start-* and icon-end-* classes.
			preg_match_all( '/icon-(start|end)-([a-zA-Z0-9\-_]+)/', $class_names, $icon_matches, PREG_SET_ORDER );

			if ( empty( $icon_matches ) ) {
				return $matches[0];
			}

			// remove icon-*-* classes from div and collect position classes for a tag.
			$positions = [];
			foreach ( $icon_matches as $match ) {
				$position    = $match[1];
				$positions[] = 'icon-' . $position;
			}

			// remove all icon-start-* and icon-end-* classes from div.
			$cleaned_class_names = preg_replace( '/\s*icon-(start|end)-[a-zA-Z0-9\-_]+/', '', $class_names );
			$full_div            = str_replace( $class_names, $cleaned_class_names, $full_div );

			// extract the <a> tag.
			$a_pattern     = '/(<a[^>]*class=")([^"]*)(".*?>)(.*?)(<\/a>)/is';
			$inner_content = preg_replace_callback(
				$a_pattern,
				function ( $a_matches ) use ( $icon_matches, $positions ) {
					$opening_a_start = $a_matches[1];
					$a_classes       = $a_matches[2];
					$opening_a_end   = $a_matches[3];
					$text            = $a_matches[4];
					$closing_a       = $a_matches[5];

					// add position classes to a tag.
					$unique_positions = array_unique( $positions );
					$a_classes       .= ' ' . implode( ' ', $unique_positions );

					$start_icons = '';
					$end_icons   = '';

					// build SVG icons for start and end positions.
					foreach ( $icon_matches as $match ) {
						$position  = $match[1];
						$icon_name = $match[2];

						$icon_svg = icon( $icon_name );

						if ( 'start' === $position ) {
							$start_icons .= $icon_svg;
						} else {
							$end_icons .= $icon_svg;
						}
					}

					// inject icons at the start and end of the text.
					$text = $start_icons . $text . $end_icons;

					return $opening_a_start . $a_classes . $opening_a_end . $text . $closing_a;
				},
				$inner_content
			);

			return $full_div . $inner_content . $closing_div;
		},
		$block_content
	);

	return $block_content;
}
add_filter( 'bootscore/block/buttons/content', 'block_button_icons', 10, 2 );
