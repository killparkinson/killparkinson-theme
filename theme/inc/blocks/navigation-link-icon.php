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
	$title       = $block_attrs['title'];
	$rel         = $block_attrs['rel'];
	$class_names = $block_attrs['className'];
	$icon_start  = '';
	$icon_end    = '';
	$icon_only   = '';

	if ( isset( $title ) && '' !== $title ) {
		$attributes .= ' title="' . esc_attr( $title ) . '"';
	}

	if ( isset( $rel ) && '' !== $rel ) {
		$attributes .= ' rel="' . esc_attr( $rel ) . '"';
	}

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

		$attributes .= ' class="wp-block-navigation-link__content' . $class_name . '"';
	} else {
		$attributes .= ' class="wp-block-navigation-link__content"';
	}

	if ( '' !== $icon_only ) {
		return '<a href="' . esc_url( $block_attrs['url'] ) . '"' . $attributes . ' aria-label="' . esc_attr( $block_attrs['label'] ) . '">' . $icon_only . '</a>';
	}

	return '<a href="' . esc_url( $block_attrs['url'] ) . '"' . $attributes . '>' . $icon_start . esc_html( $block_attrs['label'] ) . $icon_end . '</a>';
}
add_filter( 'render_block_core/navigation-link', 'add_navigation_link_icon', 10, 2 );
