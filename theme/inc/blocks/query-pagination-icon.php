<?php
/**
 * Query Pagination Icon Block Extension
 *
 * @package Bootscore Child
 */

/**
 * Adds icon support to query pagination blocks.
 *
 * This function modifies the output of core/query-pagination blocks to include
 * icons before or after the link text based on the block's className attribute.
 * It processes the icon positioning and adds appropriate CSS classes for styling.
 *
 * @param string $block_content The block content being rendered.
 * @param array  $block         The full block data including attributes.
 *
 * @return string Modified block content with icons included.
 */
function add_pagination_link_icon( $block_content, $block ) {
	// exit if no pagination.
	if ( '' === $block_content ) {
		return $block_content;
	}

	// regular expression pattern to match anchor tags and extract their href attribute.
	$pattern = '/<a\s+[^>]*href\s*=\s*["\']([^"\']*)["\'][^>]*>/i';

	// attempt to find the first anchor tag with an href attribute in the block content.
	preg_match( $pattern, $block_content, $matches );

	// check if a match was found and the href attribute exists.
	if ( ! isset( $matches[1] ) ) {
		return $block_content;
	}

	$href        = $matches[2];
	$block_attrs = $block['attrs'];
	$attributes  = '';
	$label       = $block_attrs['label'];
	$class_names = $block_attrs['className'];
	$icon_start  = '';
	$icon_end    = '';
	$icon_only   = '';

	if ( isset( $class_names ) && '' !== $class_names ) {
		// remove icon position classes.
		$class_name = preg_replace( '/\s*icon-(start|end|only)-[a-zA-Z0-9\-_]+/', '', $class_names );

		// create icon svg markup.
		$icon_svg   = icon_position_svg( $class_names );
		$icon_start = $icon_svg['start'];
		$icon_end   = $icon_svg['end'];
		$icon_only  = $icon_svg['only'];

		if ( '' !== $icon_start || '' !== $icon_end || '' !== $icon_only ) {
			$class_name .= ' icon-link';
		}

		$attributes .= ' class="wp-block-query-pagination-previoust' . $class_name . '"';
	} else {
		$attributes .= ' class="wp-block-query-pagination-previous"';
	}

	if ( '' !== $icon_only ) {
		return '<a href="' . esc_url( $href ) . '"' . $attributes . ' aria-label="' . esc_attr( $label ) . '">' . $icon_only . '</a>';
	}

	return '<a href="' . esc_url( $href ) . '"' . $attributes . '>' . $icon_start . esc_html( $label ) . $icon_end . '</a>';
}
add_filter( 'render_block_core/query-pagination-previous', 'add_pagination_link_icon', 10, 2 );
add_filter( 'render_block_core/query-pagination-next', 'add_pagination_link_icon', 10, 2 );
