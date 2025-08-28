<?php
/**
 * Feather Icon Support for Menu Icons
 *
 * @package Bootscore Child
 */

require_once 'class-menu-icons-dependency-check.php';

/**
 * Initializes the Menu Icons Dependency Check by ensuring the necessary WordPress
 * plugin functions are available and then instantiating the MenuIconsDependencyCheck class.
 */
function initialize_menu_icons_check() {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	new Menu_Icons_Dependency_Check();
}
add_action( 'init', 'initialize_menu_icons_check' );

/**
 * Registers the Feather icon type in the Icon Picker registry.
 *
 * This function is hooked into the 'icon_picker_types_registry_ready' action
 * to add the Feather icon type to the available icon picker types.
 *
 * @param Icon_Picker $icon_picker The Icon_Picker instance that manages the icon types registry.
 */
function add_menu_icon_feather_type( $icon_picker ) {
	require_once 'class-icon-picker-type-feather.php';

	$icon_picker->registry->add( new Icon_Picker_Type_Feather() );
}
add_filter( 'icon_picker_types_registry_ready', 'add_menu_icon_feather_type', 10, 1 );

/**
 * Enqueues media templates by including the media-templates.php file.
 * This function is hooked into the 'print_media_templates' filter to ensure
 * media templates are printed during the menu icon media handling process.
 */
function enqueue_media_templates() {
	require_once 'media-templates.php';
}
add_filter( 'print_media_templates', 'enqueue_media_templates', 10, 0 );

/**
 * Remove one or more icon types
 *
 * Uncomment one or more line to remove icon types
 *
 * @param  array $types Registered icon types.
 * @return array
 */
function my_remove_menu_icons_type( $types ) {
	unset( $types['dashicons'] );
	unset( $types['elusive'] );
	unset( $types['fa'] );
	unset( $types['foundation-icons'] );
	unset( $types['genericon'] );
	unset( $types['image'] );

	return $types;
}
add_filter( 'menu_icons_types', 'my_remove_menu_icons_type' );

/**
 * Override menu item markup
 *
 * @param string  $markup  Menu item title markup.
 * @param integer $id      Menu item ID.
 * @param array   $meta    Menu item meta values.
 * @param string  $title   Menu item title.
 *
 * @return string
 */
function my_menu_icons_override_markup( $markup, $id, $meta, $title ) {
	if ( 'feather' !== $meta['type'] ) {
		return $markup;
	}

	$icon   = icon( $meta['icon'] );
	$markup = preg_replace( '/<i[^>]*>.*?<\/i>/i', $icon, $markup );

	return $markup;
}
/**
 * Dequeues the extra CSS stylesheet for menu icons.
 *
 * @return void
 */
function dequeue_menu_icons_extra_css() {
	wp_dequeue_style( 'menu-icons-extra' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_menu_icons_extra_css' );
