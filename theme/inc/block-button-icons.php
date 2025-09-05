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

			// create icon svg relative to their positions.
			$icon_svg = icon_position_svg( $class_names );

			// Remove all icon-* classes from wrapper (start, end, or plain).
			$cleaned_class_names = preg_replace( '/\s*icon(?:-(start|end))?-[a-zA-Z0-9\-_]+/', '', $class_names );
			$full_div            = str_replace( $class_names, trim( $cleaned_class_names ), $full_div );

			// extract the <a> tag.
			$a_pattern     = '/(<a[^>]*class=")([^"]*)(".*?>)(.*?)(<\/a>)/is';
			$inner_content = preg_replace_callback(
				$a_pattern,
				function ( $a_matches ) use ( $icon_svg ) {
					$opening_a_start = $a_matches[1];
					$a_classes       = $a_matches[2];
					$opening_a_end   = $a_matches[3];
					$text            = trim( $a_matches[4] );
					$closing_a       = $a_matches[5];

					$start = $icon_svg['start'];
					$end   = $icon_svg['end'];

					if ( '' !== $start ) {
						$a_classes .= ' icon-start';
					}
					if ( '' !== $end ) {
						$a_classes .= ' icon-end';
					}

					if ( '' === $text ) {
						// If you used icon-{name}, it’s in $start by default.
						// If someone used only icon-end-*, still render it.
						if ( '' !== $start || '' !== $end ) {
							$text = $start . $end;
						}
					} else {
						$text = $start . $text . $end;
					}

					return $opening_a_start . trim( $a_classes ) . $opening_a_end . $text . $closing_a;
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
