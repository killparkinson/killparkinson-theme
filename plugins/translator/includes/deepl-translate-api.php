<?php
/**
 * DeepL API translation endpoint
 *
 * @package DeepL Translate
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles translation requests using the DeepL API.
 *
 * This function processes translation requests via REST API, validates input parameters,
 * and returns translated text using the DeepL translation service.
 *
 * @param WP_REST_Request $request The REST request object containing translation parameters.
 * @return WP_REST_Response The response containing translation results or error messages.
 */
function deepl_translate_handle_translation_request( $request ) {
	// Get the request body.
	$params = $request->get_json_params();

	// Get the translation parameters.
	$texts       = $params['text'];
	$target_lang = $params['target_lang'];

	try {
		// Initialize DeepL client.
		$auth_key     = get_option( 'deepl_api_key_option', '' );
		$deepl_client = new \DeepL\DeepLClient( $auth_key );

		$translations = array();

		// Process each text.
		foreach ( $texts as $text ) {
			if ( ! empty( $text ) ) {
				$result         = $deepl_client->translateText( $text, null, $target_lang );
				$translations[] = array(
					'original_text'        => $text,
					'detected_source_lang' => $result->detectedSourceLang, // @phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase          
					'translation'          => $result->text,
				);
			}
		}

		// Return success response.
		return new WP_REST_Response(
			array(
				'status'       => 'success',
				'translations' => $translations,
				'count'        => count( $translations ),
			),
			200
		);

	} catch ( Exception $e ) {
		$error = new WP_Error(
			'translation_failed',
			'Translation failed:' . $e->getMessage(),
			array( 'status' => 500 )
		);

		// Handle DeepL API errors.
		return new WP_REST_Response( $error, 500 );
	}
}

/**
 * Add DeepL REST route for translation endpoint
 *
 * Registers a REST API route for handling translation requests
 * with proper permissions and callback functions.
 *
 * @since 1.0.0
 */
function add_deepl_rest_route() {
	register_rest_route(
		'deepl-translation/v1',
		'/translate',
		array(
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => 'deepl_translate_handle_translation_request',
			'permission_callback' => '__return_true',
			'args'                => array(
				'text'        => array(
					'minItems' => 1,
					'required' => true,
					'type'     => 'array',
					'items'    => array(
						'type' => 'string',
					),
				),
				'target_lang' => array(
					'required' => true,
					'type'     => 'string',
				),
			),
		)
	);
}
// Register the REST API route.
add_action( 'rest_api_init', 'add_deepl_rest_route' );
