<?php
/**
 * Remove titles from front page and contact page
 *
 * @package Bootscore Child
 * @version 6.0.0
 */

/**
 * Modify page titles for specific pages
 *
 * Returns empty string for front page and contact page (ID 3583)
 * All other pages return their original title
 *
 * @param string   $title The original page title.
 * @param int|null $post_id The post ID being processed.
 *
 * @return string Modified or original title
 */
function page_titles( $title, $post_id = null ) {
	// prevent removal in admin.
	if ( is_admin() ) {
		return $title;
	}

	// if no post context, return title (e.g., widgets, menus).
	if ( ! $post_id || ! in_the_loop() ) {
		return $title;
	}

	if (
		is_page() &&
		(
			is_front_page() ||
			3583 === $post_id
		)
	) {
		return '';
	}

	return $title;
}
add_filter( 'the_title', 'page_titles', 10, 2 );
