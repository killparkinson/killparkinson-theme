<?php
/**
 * Block Button Variations
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Modifies button block HTML to move Bootstrap-specific btn-* classes from the wrapper div to the anchor element.
 *
 * This function processes the button block content and looks for Bootstrap button classes (btn-*)
 * in the wrapper div. When found, it moves these classes to the anchor element and removes them
 * from the div wrapper to ensure proper Bootstrap button styling.
 *
 * @param string $block_content The original HTML content of the button block.
 * @return string The modified HTML content with btn-* classes moved to the anchor element.
 *
 * @example
 * Input:  <div class="wp-block-button btn-secondary"><a class="wp-block-button__link">Button</a></div>
 * Output: <div class="wp-block-button"><a class="btn-secondary wp-block-button__link">Button</a></div>
 */
function block_button_variations( $block_content ) {
	return preg_replace_callback(
		'/<div class="wp-block-button ([^"]*)">\s*<a class="([^"]+)"([^>]*)>(.*?)<\/a>\s*<\/div>/s',
		function ( $matches ) {
			$div_classes    = $matches[1];
			$anchor_classes = $matches[2];
			$anchor_attrs   = $matches[3];
			$anchor_content = $matches[4];

			// extract btn-* classes from div classes.
			if ( preg_match_all( '/\bbtn-[^\s"]+/', $div_classes, $btn_classes ) ) {
				$btn_class_list = implode( ' ', $btn_classes[0] );

				// remove btn-* classes from div classes.
				$new_div_classes = preg_replace( '/\bbtn-[^\s"]+/', '', $div_classes );
				$new_div_classes = trim( preg_replace( '/\s+/', ' ', $new_div_classes ) );

				// remove btn-* classes from anchor classes.
				$cleaned_anchor_classes = preg_replace( '/\bbtn-[^\s"]+/', '', $anchor_classes );
				$cleaned_anchor_classes = trim( preg_replace( '/\s+/', ' ', $cleaned_anchor_classes ) );

				// add btn-* classes to anchor classes.
				$new_anchor_classes = trim( $btn_class_list . ' ' . $cleaned_anchor_classes );

				// rebuild div class attribute.
				$div_class_attr = $new_div_classes ? ' class="wp-block-button ' . $new_div_classes . '"' : ' class="wp-block-button"';

				return '<div' . $div_class_attr . '>' . "\n" .
					'<a class="' . $new_anchor_classes . '"' . $anchor_attrs . '>' . $anchor_content . '</a>' . "\n" .
					'</div>';
			}

			// if no btn classes found, return original.
			return $matches[0];
		},
		$block_content
	);
}

add_filter( 'bootscore/block/buttons/content', 'block_button_variations', 10, 2 );

