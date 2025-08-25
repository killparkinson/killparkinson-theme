<?php

/**
 * Breadcrumbs template
 * Works without Yoast. Place in child theme: /template-parts/content-breadcrumb.php
 */

defined( 'ABSPATH' ) || exit;

function bootscore_child_breadcrumbs() {

	echo '<nav class="breadcrumb" aria-label="breadcrumb">';

	// Home link
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">Home</a>';

	if ( is_home() || is_front_page() ) {
		// Nothing more
	}

	// Single posts
	elseif ( is_single() ) {
		$post_type = get_post_type();

		if ( $post_type === 'post' ) {
			$category = get_the_category();
			if ( $category ) {
				$cat_link = get_category_link( $category[0]->term_id );
				echo ' › <a href="' . esc_url( $cat_link ) . '">' . esc_html( $category[0]->name ) . '</a>';
			}
		} else {
			// Custom post types
			$post_type_obj = get_post_type_object( $post_type );
			if ( $post_type_obj && ! empty( $post_type_obj->has_archive ) ) {
				echo ' › <a href="' . get_post_type_archive_link( $post_type ) . '">' . esc_html( $post_type_obj->labels->singular_name ) . '</a>';
			}
		}

		echo ' › ' . esc_html( get_the_title() );
	}

	// Pages
	elseif ( is_page() ) {
		global $post;
		if ( $post->post_parent ) {
			$parents = array_reverse( get_post_ancestors( $post->ID ) );
			foreach ( $parents as $parent ) {
				echo ' › <a href="' . get_permalink( $parent ) . '">' . get_the_title( $parent ) . '</a>';
			}
		}
		echo ' › ' . esc_html( get_the_title() );
	}

	// Category / Taxonomy archive
	elseif ( is_category() || is_tax() ) {
		echo ' › ' . single_term_title( '', false );
	}

	// Tag archive
	elseif ( is_tag() ) {
		echo ' › Tag: ' . single_term_title( '', false );
	}

	// Author archive
	elseif ( is_author() ) {
		echo ' › Author: ' . esc_html( get_the_author() );
	}

	// Date archive
	elseif ( is_date() ) {
		if ( is_day() ) {
			echo ' › ' . get_the_date();
		} elseif ( is_month() ) {
			echo ' › ' . get_the_date( 'F Y' );
		} elseif ( is_year() ) {
			echo ' › ' . get_the_date( 'Y' );
		}
	}

	// Search
	elseif ( is_search() ) {
		echo ' › Search results for: ' . esc_html( get_search_query() );
	}

	// 404
	elseif ( is_404() ) {
		echo ' › 404 Not Found';
	}

	echo '</nav>';
}

bootscore_child_breadcrumbs();
