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
function add_navigation_link_icon( $block_content, $block ) {
	$block_attrs = $block['attrs'];
	$attributes  = '';
	$title       = $block_attrs['title'] ?? '';
	$rel         = $block_attrs['rel'] ?? '';
	$class_names = $block_attrs['className'] ?? '';
	$label       = $block_attrs['label'] ?? '';
	$url         = $block_attrs['url'] ?? '#';

	if ( $title !== '' ) {
		$attributes .= ' title="' . esc_attr( $title ) . '"';
	}

	if ( $rel !== '' ) {
		$attributes .= ' rel="' . esc_attr( $rel ) . '"';
	}

	$icon_start = '';
	$icon_end   = '';

	if ( $class_names !== '' ) {
		// Create icon SVG markup (supports start, end, and plain icon-{name}).
		$icon_svg   = icon_position_svg( $class_names );
		$icon_start = $icon_svg['start'];
		$icon_end   = $icon_svg['end'];

		// Remove icon-* classes from className.
		$class_name = preg_replace( '/\s*icon(?:-(start|end))?-[a-zA-Z0-9\-_]+/', '', $class_names );

		if ( $icon_start !== '' || $icon_end !== '' ) {
			$class_name .= ' has-icon';
		}

		$attributes .= ' class="wp-block-navigation-link__content' . esc_attr( $class_name ) . '"';
	} else {
		$attributes .= ' class="wp-block-navigation-link__content"';
	}

	// Build link text: icon(s) + label.
	if ( $label === '' ) {
		// Icon-only link (allow start or end).
		$content = $icon_start . $icon_end;
	} else {
		$content = $icon_start . esc_html( $label ) . $icon_end;
	}

	return '<a href="' . esc_url( $url ) . '"' . $attributes . '>' . $content . '</a>';
}
add_filter( 'render_block_core/navigation-link', 'add_navigation_link_icon', 10, 2 );

