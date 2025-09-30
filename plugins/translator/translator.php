<?php
/**
 * Plugin Name:       Translate
 * Description:       Translate page content using DeepL
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            Thomas David
 * License:           AGPL-3.0-only
 * License URI:       https://spdx.org/licenses/AGPL-3.0-only.html
 * Text Domain:       translator
 *
 * @package Translator
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin directory path.
define( 'DEEPL_TRANSLATE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include the Composer autoloader.
if ( file_exists( DEEPL_TRANSLATE_PLUGIN_DIR . '/vendor/autoload.php' ) ) {
	require_once DEEPL_TRANSLATE_PLUGIN_DIR . '/vendor/autoload.php';
}

// Include the main plugin files.
require_once DEEPL_TRANSLATE_PLUGIN_DIR . 'includes/admin-deepl-translate.php';
require_once DEEPL_TRANSLATE_PLUGIN_DIR . 'includes/deepl-translate-api.php';
require_once DEEPL_TRANSLATE_PLUGIN_DIR . 'includes/deepl-translate.php';
