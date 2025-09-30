<?php
/**
 * DeepL API management
 *
 * @package DeepL Translate
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add DeepL API key settings page to WordPress admin menu
 */
function deepl_translate_add_api_key_settings_page() {
	add_menu_page(
		'DeepL API Key Settings',
		'Deepl Translate',
		'manage_options',
		'deepl-api-key-settings',
		'deepl_translate_render_api_key_settings_page',
		'dashicons-admin-site-alt2'
	);
}
add_action( 'admin_menu', 'deepl_translate_add_api_key_settings_page' );

/**
 * Render the DeepL API key settings page
 */
function deepl_translate_render_api_key_settings_page() {
	?>
	<div class="wrap">
		<h1>DeepL API Key Settings</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'deepl_api_key_settings_group' );
			do_settings_sections( 'deepl-api-key-settings' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Register DeepL API key settings
 */
function deepl_translate_register_api_key_settings() {
	register_setting( 'deepl_api_key_settings_group', 'deepl_api_key_option' );

	add_settings_section(
		'deepl_api_key_section',
		'API Configuration',
		null,
		'deepl-api-key-settings'
	);

	add_settings_field(
		'deepl_api_key_field',
		'Enter Your API Key',
		'deepl_translate_render_api_key_field',
		'deepl-api-key-settings',
		'deepl_api_key_section'
	);
}
add_action( 'admin_init', 'deepl_translate_register_api_key_settings' );

/**
 * Render the DeepL API key input field
 */
function deepl_translate_render_api_key_field() {
	$api_key = get_option( 'deepl_api_key_option', '' );
	echo '<input type="text" id="deepl_api_key_field" name="deepl_api_key_option" minlength="39" maxlength="39" required
          value="' . esc_attr( $api_key ) . '" class="regular-text">';
	echo '<p class="description">Enter your DeepL API key here.</p>';
}
