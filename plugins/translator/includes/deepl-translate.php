<?php
/**
 * DeepL translate meta box
 *
 * @package DeepL Translate
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add DeepL translate meta box to posts
 */
function deepl_translate_add_meta_box() {
	add_meta_box(
		'deepl_translate_box',
		'Translate Post',
		'deepl_translate_render_meta_box',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'deepl_translate_add_meta_box' );

/**
 * Renders the DeepL translation meta box for posts.
 *
 * This function displays a button to trigger translation of the current post
 * using the DeepL API, but only if an API key is configured. If no API key
 * is found, it displays an error message with a link to the settings page.
 *
 * @param WP_Post $post The post object being edited.
 */
function deepl_translate_render_meta_box( $post ) {
	// Retrieve the stored API key.
	$deepl_api_key = get_option( 'deepl_api_key_option', '' );

	// Display the API key.
	if ( ! empty( $deepl_api_key ) ) {
		// Add a "Translate" button.
		echo '<button type="button" id="deepl-translate-button" class="button button-primary"data-target-lang="' . esc_attr(
			pll_get_post_language( $post->ID )
		) . '">Translate to ' . esc_html( pll_get_post_language( $post->ID, 'name' ) ) . '</button>';
	} else {
		echo '<p class="error">No API key configured!</p>';
		echo '<p>Please set your API key in <a href="' . esc_attr( admin_url( 'options-general.php?page=deepl-api-key-settings' ) ) . '">Settings → API Key Manager</a></p>';
	}
}

/**
 * Enqueue scripts for the post editor
 *
 * @param string $hook The current admin page hook.
 * @return void
 */
function deepl_translate_enqueue_scripts( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	wp_enqueue_script(
		'deepl-translate-post',
		plugin_dir_url( __FILE__ ) . '../js/deepl-translate-post.js',
		array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-data' ),
		'1.0',
		true
	);
}
add_action( 'admin_enqueue_scripts', 'deepl_translate_enqueue_scripts' );
