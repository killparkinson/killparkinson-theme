<?php
/**
 * Menu Icons Dependency Check
 *
 * @package Bootscore Child
 */

/**
 * Menu_Icons_Dependency_Check Class
 *
 * This class handles dependency checking for the Menu Icons plugin within a theme.
 * It ensures that the required plugin is either installed and active, or provides
 * clear instructions to the user to install or activate it. It displays appropriate
 * admin notices and provides a dedicated submenu page for plugin installation and
 * activation.
 *
 * Key Features:
 * - Checks if the Menu Icons plugin is installed and active
 * - Displays error in the admin area if the plugin is missing or inactive
 * - Provides installation and activation links
 * - Offers a dedicated admin page for managing the required plugin
 * - Validates plugin version against a minimum requirement (optional)
 */
class Menu_Icons_Dependency_Check {

	/**
	 * Path to the Menu Icons plugin file (relative to wp-content/plugins)
	 *
	 * @var string
	 */
	private $plugin_file = 'menu-icons/menu-icons.php';

	/**
	 * Slug of the Menu Icons plugin used in URLs and plugin management
	 *
	 * @var string
	 */
	private $plugin_slug = 'menu-icons';

	/**
	 * Human-readable name of the Menu Icons plugin
	 *
	 * @var string
	 */
	private $plugin_name = 'Menu Icons';

	/**
	 * Initializes the dependency check by setting up actions to verify plugin status
	 * and display notices or menus when the required plugin is missing or inactive.
	 *
	 * Registers hooks for:
	 * - 'admin_init': To check for plugin dependency and show notices if needed.
	 * - 'admin_menu': To add a submenu page for plugin installation/activation if required.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'check_dependency' ) );
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
	}

	/**
	 * Check if Menu Icons plugin is active
	 */
	public function is_plugin_active() {
		return is_plugin_active( $this->plugin_file );
	}

	/**
	 * Check if Menu Icons plugin is installed (but not necessarily active)
	 */
	public function is_plugin_installed() {
		$installed_plugins = get_plugins();
		return isset( $installed_plugins[ $this->plugin_file ] );
	}

	/**
	 * Get plugin data if installed
	 */
	public function get_plugin_data() {
		if ( ! $this->is_plugin_installed() ) {
			return false;
		}

		$installed_plugins = get_plugins();
		return $installed_plugins[ $this->plugin_file ];
	}

	/**
	 * Check dependency and show appropriate notices
	 */
	public function check_dependency() {
		// Only show notices to users who can manage plugins.
		if ( ! current_user_can( 'install_plugins' ) || ! is_admin() ) {
			return;
		}

		// If plugin is active, no need for notices.
		if ( $this->is_plugin_active() ) {
			return;
		}

		add_action( 'admin_notices', array( $this, 'display_dependency_notice' ) );
	}

	/**
	 * Display appropriate dependency notice
	 */
	public function display_dependency_notice() {
		$screen = get_current_screen();

		// Don't show on plugin installation pages to avoid conflicts.
		if ( in_array( $screen->id, array( 'update', 'update-core', 'update-core-network' ) ) ) {
			return;
		}

		$install_url = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'install-plugin',
					'plugin' => $this->plugin_slug,
				),
				network_admin_url( 'update.php' )
			),
			'install-plugin_' . $this->plugin_slug
		);

		$activate_url = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'activate',
					'plugin' => $this->plugin_file,
				),
				admin_url( 'plugins.php' )
			),
			'activate-plugin_' . $this->plugin_file
		);

		echo '<div class="notice notice-error">';
		echo '<p><strong>' . esc_html( sprintf( 'Theme Requires: %s', $this->plugin_name ) ) . '</strong></p>';

		if ( ! $this->is_plugin_installed() ) {
			// Plugin not installed.
			echo '<p>' . esc_html( sprintf( 'This theme requires the "%s" plugin for enhanced menu functionality.', $this->plugin_name ) ) . '</p>';
			echo '<p><a href="' . esc_url( $install_url ) . '" class="button button-primary">' . esc_html( sprintf( 'Install %s', $this->plugin_name ) ) . '</a></p>';
		} elseif ( ! $this->is_plugin_active() ) {
			// Plugin installed but not active.
			echo '<p>' . esc_html( sprintf( 'The "%s" plugin is installed but not activated. Please activate it for full theme functionality.', $this->plugin_name ) ) . '</p>';
			echo '<p><a href="' . esc_url( $activate_url ) . '" class="button button-primary">' . esc_html( sprintf( 'Activate %s', $this->plugin_name ) ) . '</a></p>';
		}

		echo '</div>';
	}

	/**
	 * Add admin menu for plugin installation if needed
	 */
	public function add_admin_menu() {
		if ( $this->is_plugin_active() ) {
			return;
		}

		add_submenu_page(
			'themes.php',
			__( 'Install Required Plugins', 'text-domain' ),
			__( 'Install Plugins', 'text-domain' ),
			'install_plugins',
			'install-required-plugins',
			array( $this, 'plugin_install_page' )
		);
	}

	/**
	 * Plugin installation page
	 */
	public function plugin_install_page() {
		if ( ! current_user_can( 'install_plugins' ) ) {
			wp_die( esc_html_e( 'You do not have sufficient permissions to access this page.', 'text-domain' ) );
		}

		echo '<div class="wrap">';
		echo '<h1>' . esc_html_e( 'Install Required Plugins', 'text-domain' ) . '</h1>';

		if ( ! $this->is_plugin_installed() ) {
			echo '<p>' . esc_html( sprintf( 'The theme requires the "%s" plugin to function properly.', $this->plugin_name ) ) . '</p>';

			$install_url = wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => $this->plugin_slug,
					),
					network_admin_url( 'update.php' )
				),
				'install-plugin_' . $this->plugin_slug
			);

			echo '<p><a href="' . esc_url( $install_url ) . '" class="button button-primary button-hero">' . esc_html( sprintf( 'Install %s Now', $this->plugin_name ) ) . '</a></p>';

		} elseif ( ! $this->is_plugin_active() ) {
			echo '<p>' . esc_html( sprintf( 'The "%s" plugin is installed but needs to be activated.', $this->plugin_name ) ) . '</p>';

			$activate_url = wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'activate',
						'plugin' => $this->plugin_file,
					),
					admin_url( 'plugins.php' )
				),
				'activate-plugin_' . $this->plugin_file
			);

			echo '<p><a href="' . esc_url( $activate_url ) . '" class="button button-primary button-hero">' . esc_html( sprintf( 'Activate %s Now', $this->plugin_name ) ) . '</a></p>';
		} else {
			echo '<div class="notice notice-success"><p>' . esc_html( sprintf( '%s is already active!', $this->plugin_name ) ) . '</p></div>';
		}

		echo '</div>';
	}

	/**
	 * Get plugin version if active
	 */
	public function get_plugin_version() {
		if ( ! $this->is_plugin_active() ) {
			return false;
		}

		$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $this->plugin_file );
		return isset( $plugin_data['Version'] ) ? $plugin_data['Version'] : false;
	}

	/**
	 * Check if plugin meets minimum version requirement
	 *
	 * @param string $min_version Minimum required version of the plugin (e.g., '1.2.0').
	 * @return bool True if current version is greater than or equal to the minimum version, false otherwise
	 */
	public function check_minimum_version( $min_version ) {
		$current_version = $this->get_plugin_version();

		if ( ! $current_version ) {
			return false;
		}

		return version_compare( $current_version, $min_version, '>=' );
	}
}
