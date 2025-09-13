<?php
/**
 * Navigation Link Icon Block Extension
 *
 * @package Bootscore Child
 */

/**
 * Adds icon support to navigation link blocks.
 *
 * This function modifies the output of core/navigation-link blocks to include
 * icons before or after the link text based on the block's className attribute.
 * It processes the icon positioning and adds appropriate CSS classes for styling.
 *
 * @param string $block_content The block content being rendered.
 * @param array  $block         The full block data including attributes.
 *
 * @return string Modified block content with icons included.
 */
function add_details_icon( $block_content, $block ) {
	// pattern to match the details block.
	$pattern = '/(<details class="[^"]*"[^>]*>)(.*?)(<\/details>)/is';

	$block_content = preg_replace_callback(
		$pattern,
		function ( $matches ) {
			$open_details    = $matches[1];
			$inner_content   = $matches[2];
			$closing_details = $matches[3];

			// extract the class attribute to find all icon classes.
			preg_match( '/class="([^"]*)"/', $open_details, $class_matches );

			if ( ! isset( $class_matches[1] ) ) {
				return $matches[0];
			}

			$class_names = $class_matches[1];

			// create icon svg relative to their positions.
			$icon_svg = icon_position_svg( $class_names );

			// remove all icon-start-* and icon-end-* classes from div.
			$cleaned_class_names = preg_replace( '/\s*icon-(start|end|only)-[a-zA-Z0-9\-_]+/', '', $class_names );
			$open_details        = str_replace( $class_names, $cleaned_class_names, $open_details );
		
			// extract the <a> tag.
			$summary_pattern = '/(<summary)(>)(.*?)(<\/summary>)/is';
			$inner_content   = preg_replace_callback(
			$summary_pattern,
				function ( $matches ) use ( $icon_svg ) {
					$opening_summary       = $matches[1];
					$opening_summary_arrow = $matches[2];
					$text                  = $matches[3];
					$closing_summary       = $matches[4];
					$summary_classes       = '';
					
					if ( '' !== $icon_svg['only'] ) {
						$text = $icon_svg['only'] . '<span class="visually-hidden">' . $text . '</span>';
					} elseif ( '' !== $icon_svg['start'] || '' !== $icon_svg['end'] ) {
						$summary_classes .= ' class="icon-link"';

						// inject icons at the start and end of the text.
						$text = $icon_svg['start'] . $text . $icon_svg['end'];
					}

					return $opening_summary . $summary_classes . $opening_summary_arrow . $text . $closing_summary;
				},
				$inner_content
			);

			return $open_details . $inner_content . $closing_details;
		},
		$block_content
	);

	return $block_content;
}
add_filter( 'render_block_core/details', 'add_details_icon', 10, 2 );
