<?php
/**
 * Image icon handler
 *
 * @package Bootscore Child
 */

/**
 * Image icon
 */
class Icon_Picker_Type_Feather extends Icon_Picker_Type_Font {

	/**
	 * Icon type ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = 'feather';

	/**
	 * Icon type name
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $name = 'Feather';

	/**
	 * Template ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $template_id = 'font';

	/**
	 * Stylesheet URI
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $stylesheet_uri = '';

	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @param array $args Optional arguments passed to parent class.
	 */
	public function __construct( array $args = array() ) {
		parent::__construct( $args );

		$this->icon = get_stylesheet_directory_uri() . '/assets/fonts/icon.svg';
	}

	/**
	 * Register assets
	 *
	 * @since   0.1.0
	 * @wp_hook action icon_picker_loader_init
	 *
	 * @param Icon_Picker_Loader $loader Icon_Picker_Loader instance.
	 *
	 * @return void
	 */
	public function register_assets( Icon_Picker_Loader $loader ) {
		$loader->add_style( $this->stylesheet_id );
	}

	/**
	 * Get icon groups
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_groups() {
		// For simplicity, we can have one default group.
		// You could potentially parse categories from Feather's data if available.
		$groups = array(
			array(
				'id'   => 'all',
				'name' => __( 'All', 'icon-picker' ),
			),
		);

		/**
		 * Filter feather icon groups.
		 *
		 * @since 1.0.0
		 * @param array $groups Icon groups.
		 */
		$groups = apply_filters( 'icon_picker_feather_groups', $groups );

		return $groups;
	}


	/**
	 * Get icon names (items)
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_items() {
		// List of Feather icon names.
		$icons = array(
			array(
				'group' => 'all',
				'id'    => 'activity',
				'name'  => __( 'Activity', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'airplay',
				'name'  => __( 'Airplay', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'alert-circle',
				'name'  => __( 'Alert Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'alert-octagon',
				'name'  => __( 'Alert Octagon', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'alert-triangle',
				'name'  => __( 'Alert Triangle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'align-center',
				'name'  => __( 'Align Center', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'align-justify',
				'name'  => __( 'Align Justify', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'align-left',
				'name'  => __( 'Align Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'align-right',
				'name'  => __( 'Align Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'anchor',
				'name'  => __( 'Anchor', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'aperture',
				'name'  => __( 'Aperture', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'archive',
				'name'  => __( 'Archive', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-down-circle',
				'name'  => __( 'Arrow Down Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-down-left',
				'name'  => __( 'Arrow Down Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-down-right',
				'name'  => __( 'Arrow Down Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-down',
				'name'  => __( 'Arrow Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-left-circle',
				'name'  => __( 'Arrow Left Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-left',
				'name'  => __( 'Arrow Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-right-circle',
				'name'  => __( 'Arrow Right Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-right',
				'name'  => __( 'Arrow Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-up-circle',
				'name'  => __( 'Arrow Up Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-up-left',
				'name'  => __( 'Arrow Up Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-up-right',
				'name'  => __( 'Arrow Up Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'arrow-up',
				'name'  => __( 'Arrow Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'at-sign',
				'name'  => __( 'At Sign', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'award',
				'name'  => __( 'Award', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bar-chart-2',
				'name'  => __( 'Bar Chart 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bar-chart',
				'name'  => __( 'Bar Chart', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'battery-charging',
				'name'  => __( 'Battery Charging', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'battery',
				'name'  => __( 'Battery', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bell-off',
				'name'  => __( 'Bell Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bell',
				'name'  => __( 'Bell', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bluetooth',
				'name'  => __( 'Bluetooth', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bold',
				'name'  => __( 'Bold', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'book-open',
				'name'  => __( 'Book Open', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'book',
				'name'  => __( 'Book', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'bookmark',
				'name'  => __( 'Bookmark', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'box',
				'name'  => __( 'Box', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'briefcase',
				'name'  => __( 'Briefcase', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'calendar',
				'name'  => __( 'Calendar', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'camera-off',
				'name'  => __( 'Camera Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'camera',
				'name'  => __( 'Camera', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cast',
				'name'  => __( 'Cast', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'check-circle',
				'name'  => __( 'Check Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'check-square',
				'name'  => __( 'Check Square', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'check',
				'name'  => __( 'Check', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevron-down',
				'name'  => __( 'Chevron Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevron-left',
				'name'  => __( 'Chevron Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevron-right',
				'name'  => __( 'Chevron Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevron-up',
				'name'  => __( 'Chevron Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevrons-down',
				'name'  => __( 'Chevrons Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevrons-left',
				'name'  => __( 'Chevrons Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevrons-right',
				'name'  => __( 'Chevrons Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chevrons-up',
				'name'  => __( 'Chevrons Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'chrome',
				'name'  => __( 'Chrome', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'circle',
				'name'  => __( 'Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'clipboard',
				'name'  => __( 'Clipboard', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'clock',
				'name'  => __( 'Clock', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cloud-drizzle',
				'name'  => __( 'Cloud Drizzle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cloud-lightning',
				'name'  => __( 'Cloud Lightning', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cloud-off',
				'name'  => __( 'Cloud Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cloud-rain',
				'name'  => __( 'Cloud Rain', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cloud-snow',
				'name'  => __( 'Cloud Snow', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cloud',
				'name'  => __( 'Cloud', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'code',
				'name'  => __( 'Code', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'codepen',
				'name'  => __( 'Codepen', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'codesandbox',
				'name'  => __( 'Codesandbox', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'coffee',
				'name'  => __( 'Coffee', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'columns',
				'name'  => __( 'Columns', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'command',
				'name'  => __( 'Command', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'compass',
				'name'  => __( 'Compass', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'copy',
				'name'  => __( 'Copy', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-down-left',
				'name'  => __( 'Corner Down Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-down-right',
				'name'  => __( 'Corner Down Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-left-down',
				'name'  => __( 'Corner Left Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-left-up',
				'name'  => __( 'Corner Left Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-right-down',
				'name'  => __( 'Corner Right Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-right-up',
				'name'  => __( 'Corner Right Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-up-left',
				'name'  => __( 'Corner Up Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'corner-up-right',
				'name'  => __( 'Corner Up Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'cpu',
				'name'  => __( 'CPU', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'credit-card',
				'name'  => __( 'Credit Card', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'crop',
				'name'  => __( 'Crop', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'crosshair',
				'name'  => __( 'Crosshair', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'database',
				'name'  => __( 'Database', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'delete',
				'name'  => __( 'Delete', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'disc',
				'name'  => __( 'Disc', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'dollar-sign',
				'name'  => __( 'Dollar Sign', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'download-cloud',
				'name'  => __( 'Download Cloud', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'download',
				'name'  => __( 'Download', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'droplet',
				'name'  => __( 'Droplet', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'edit-2',
				'name'  => __( 'Edit 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'edit-3',
				'name'  => __( 'Edit 3', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'edit',
				'name'  => __( 'Edit', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'external-link',
				'name'  => __( 'External Link', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'eye-off',
				'name'  => __( 'Eye Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'eye',
				'name'  => __( 'Eye', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'facebook',
				'name'  => __( 'Facebook', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'fast-forward',
				'name'  => __( 'Fast Forward', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'feather',
				'name'  => __( 'Feather', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'figma',
				'name'  => __( 'Figma', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'file-minus',
				'name'  => __( 'File Minus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'file-plus',
				'name'  => __( 'File Plus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'file-text',
				'name'  => __( 'File Text', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'file',
				'name'  => __( 'File', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'film',
				'name'  => __( 'Film', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'filter',
				'name'  => __( 'Filter', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'flag',
				'name'  => __( 'Flag', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'folder-minus',
				'name'  => __( 'Folder Minus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'folder-plus',
				'name'  => __( 'Folder Plus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'folder',
				'name'  => __( 'Folder', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'framer',
				'name'  => __( 'Framer', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'frown',
				'name'  => __( 'Frown', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'gift',
				'name'  => __( 'Gift', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'git-branch',
				'name'  => __( 'Git Branch', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'git-commit',
				'name'  => __( 'Git Commit', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'git-merge',
				'name'  => __( 'Git Merge', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'git-pull-request',
				'name'  => __( 'Git Pull Request', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'github',
				'name'  => __( 'Github', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'gitlab',
				'name'  => __( 'Gitlab', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'globe',
				'name'  => __( 'Globe', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'grid',
				'name'  => __( 'Grid', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'hard-drive',
				'name'  => __( 'Hard Drive', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'hash',
				'name'  => __( 'Hash', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'headphones',
				'name'  => __( 'Headphones', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'heart',
				'name'  => __( 'Heart', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'help-circle',
				'name'  => __( 'Help Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'hexagon',
				'name'  => __( 'Hexagon', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'home',
				'name'  => __( 'Home', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'image',
				'name'  => __( 'Image', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'inbox',
				'name'  => __( 'Inbox', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'info',
				'name'  => __( 'Info', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'instagram',
				'name'  => __( 'Instagram', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'italic',
				'name'  => __( 'Italic', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'key',
				'name'  => __( 'Key', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'layers',
				'name'  => __( 'Layers', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'layout',
				'name'  => __( 'Layout', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'life-buoy',
				'name'  => __( 'Life Buoy', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'link-2',
				'name'  => __( 'Link 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'link',
				'name'  => __( 'Link', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'linkedin',
				'name'  => __( 'Linkedin', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'list',
				'name'  => __( 'List', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'loader',
				'name'  => __( 'Loader', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'lock',
				'name'  => __( 'Lock', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'log-in',
				'name'  => __( 'Log In', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'log-out',
				'name'  => __( 'Log Out', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'mail',
				'name'  => __( 'Mail', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'map-pin',
				'name'  => __( 'Map Pin', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'map',
				'name'  => __( 'Map', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'maximize-2',
				'name'  => __( 'Maximize 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'maximize',
				'name'  => __( 'Maximize', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'meh',
				'name'  => __( 'Meh', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'menu',
				'name'  => __( 'Menu', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'message-circle',
				'name'  => __( 'Message Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'message-square',
				'name'  => __( 'Message Square', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'mic-off',
				'name'  => __( 'Mic Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'mic',
				'name'  => __( 'Mic', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'minimize-2',
				'name'  => __( 'Minimize 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'minimize',
				'name'  => __( 'Minimize', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'minus-circle',
				'name'  => __( 'Minus Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'minus-square',
				'name'  => __( 'Minus Square', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'minus',
				'name'  => __( 'Minus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'monitor',
				'name'  => __( 'Monitor', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'moon',
				'name'  => __( 'Moon', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'more-horizontal',
				'name'  => __( 'More Horizontal', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'more-vertical',
				'name'  => __( 'More Vertical', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'mouse-pointer',
				'name'  => __( 'Mouse Pointer', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'move',
				'name'  => __( 'Move', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'music',
				'name'  => __( 'Music', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'navigation-2',
				'name'  => __( 'Navigation 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'navigation',
				'name'  => __( 'Navigation', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'octagon',
				'name'  => __( 'Octagon', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'package',
				'name'  => __( 'Package', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'paperclip',
				'name'  => __( 'Paperclip', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'pause-circle',
				'name'  => __( 'Pause Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'pause',
				'name'  => __( 'Pause', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'pen-tool',
				'name'  => __( 'Pen Tool', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'percent',
				'name'  => __( 'Percent', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone-call',
				'name'  => __( 'Phone Call', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone-forwarded',
				'name'  => __( 'Phone Forwarded', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone-incoming',
				'name'  => __( 'Phone Incoming', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone-missed',
				'name'  => __( 'Phone Missed', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone-off',
				'name'  => __( 'Phone Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone-outgoing',
				'name'  => __( 'Phone Outgoing', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'phone',
				'name'  => __( 'Phone', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'pie-chart',
				'name'  => __( 'Pie Chart', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'play-circle',
				'name'  => __( 'Play Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'play',
				'name'  => __( 'Play', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'plus-circle',
				'name'  => __( 'Plus Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'plus-square',
				'name'  => __( 'Plus Square', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'plus',
				'name'  => __( 'Plus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'pocket',
				'name'  => __( 'Pocket', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'power',
				'name'  => __( 'Power', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'printer',
				'name'  => __( 'Printer', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'radio',
				'name'  => __( 'Radio', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'refresh-ccw',
				'name'  => __( 'Refresh CCW', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'refresh-cw',
				'name'  => __( 'Refresh CW', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'repeat',
				'name'  => __( 'Repeat', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'rewind',
				'name'  => __( 'Rewind', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'rotate-ccw',
				'name'  => __( 'Rotate CCW', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'rotate-cw',
				'name'  => __( 'Rotate CW', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'rss',
				'name'  => __( 'RSS', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'save',
				'name'  => __( 'Save', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'scissors',
				'name'  => __( 'Scissors', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'search',
				'name'  => __( 'Search', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'send',
				'name'  => __( 'Send', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'server',
				'name'  => __( 'Server', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'settings',
				'name'  => __( 'Settings', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'share-2',
				'name'  => __( 'Share 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'share',
				'name'  => __( 'Share', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'shield-off',
				'name'  => __( 'Shield Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'shield',
				'name'  => __( 'Shield', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'shopping-bag',
				'name'  => __( 'Shopping Bag', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'shopping-cart',
				'name'  => __( 'Shopping Cart', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'shuffle',
				'name'  => __( 'Shuffle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'sidebar',
				'name'  => __( 'Sidebar', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'skip-back',
				'name'  => __( 'Skip Back', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'skip-forward',
				'name'  => __( 'Skip Forward', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'slack',
				'name'  => __( 'Slack', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'slash',
				'name'  => __( 'Slash', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'sliders',
				'name'  => __( 'Sliders', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'smartphone',
				'name'  => __( 'Smartphone', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'smile',
				'name'  => __( 'Smile', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'speaker',
				'name'  => __( 'Speaker', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'square',
				'name'  => __( 'Square', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'star',
				'name'  => __( 'Star', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'stop-circle',
				'name'  => __( 'Stop Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'sun',
				'name'  => __( 'Sun', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'sunrise',
				'name'  => __( 'Sunrise', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'sunset',
				'name'  => __( 'Sunset', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'tablet',
				'name'  => __( 'Tablet', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'tag',
				'name'  => __( 'Tag', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'target',
				'name'  => __( 'Target', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'terminal',
				'name'  => __( 'Terminal', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'thermometer',
				'name'  => __( 'Thermometer', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'thumbs-down',
				'name'  => __( 'Thumbs Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'thumbs-up',
				'name'  => __( 'Thumbs Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'toggle-left',
				'name'  => __( 'Toggle Left', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'toggle-right',
				'name'  => __( 'Toggle Right', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'tool',
				'name'  => __( 'Tool', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'trash-2',
				'name'  => __( 'Trash 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'trash',
				'name'  => __( 'Trash', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'trello',
				'name'  => __( 'Trello', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'trending-down',
				'name'  => __( 'Trending Down', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'trending-up',
				'name'  => __( 'Trending Up', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'triangle',
				'name'  => __( 'Triangle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'truck',
				'name'  => __( 'Truck', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'tv',
				'name'  => __( 'TV', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'twitch',
				'name'  => __( 'Twitch', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'twitter',
				'name'  => __( 'Twitter', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'type',
				'name'  => __( 'Type', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'umbrella',
				'name'  => __( 'Umbrella', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'underline',
				'name'  => __( 'Underline', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'unlock',
				'name'  => __( 'Unlock', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'upload-cloud',
				'name'  => __( 'Upload Cloud', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'upload',
				'name'  => __( 'Upload', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'user-check',
				'name'  => __( 'User Check', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'user-minus',
				'name'  => __( 'User Minus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'user-plus',
				'name'  => __( 'User Plus', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'user-x',
				'name'  => __( 'User X', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'user',
				'name'  => __( 'User', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'users',
				'name'  => __( 'Users', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'video-off',
				'name'  => __( 'Video Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'video',
				'name'  => __( 'Video', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'voicemail',
				'name'  => __( 'Voicemail', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'volume-1',
				'name'  => __( 'Volume 1', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'volume-2',
				'name'  => __( 'Volume 2', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'volume-x',
				'name'  => __( 'Volume X', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'volume',
				'name'  => __( 'Volume', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'watch',
				'name'  => __( 'Watch', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'wifi-off',
				'name'  => __( 'Wifi Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'wifi',
				'name'  => __( 'Wifi', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'wind',
				'name'  => __( 'Wind', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'x-circle',
				'name'  => __( 'X Circle', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'x-octagon',
				'name'  => __( 'X Octagon', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'x-square',
				'name'  => __( 'X Square', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'x',
				'name'  => __( 'X', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'youtube',
				'name'  => __( 'Youtube', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'zap-off',
				'name'  => __( 'Zap Off', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'zap',
				'name'  => __( 'Zap', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'zoom-in',
				'name'  => __( 'Zoom In', 'icon-picker' ),
			),
			array(
				'group' => 'all',
				'id'    => 'zoom-out',
				'name'  => __( 'Zoom Out', 'icon-picker' ),
			),
		);

		/**
		 * Filter feather icons.
		 *
		 * @since 1.0.0
		 * @param array $icons Icon names.
		 */
		$icons = apply_filters( 'icon_picker_feather_items', $icons );

		return $icons;
	}

	/**
	 * Get stylesheet URI
	 *
	 * @since  0.1.0
	 * @return string
	 */
	public function get_stylesheet_uri() {
		return '';
	}

	/**
	 * Get media templates
	 *
	 * @since  0.1.0
	 * @return array
	 */
	public function get_templates() {
		$templates = array(
			'icon' => '<svg class="icon"><use href="' . esc_url( $this->icon ) . '#{{ data.id }}" aria-hidden="true"></svg>',
			'item' => sprintf(
				'<div class="attachment-preview js--select-attachment">
            <div class="thumbnail">
                <span class="_icon">
                    <svg class="icon-picker-icon" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="' . esc_url( $this->icon ) . '#{{ data.id }}"></use>
                    </svg>
                </span>
                <div class="filename"><div>{{ data.name }}</div></div>
            </div>
        </div>
        <a class="check" href="#" title="%s"><div class="media-modal-icon"></div></a>',
				esc_attr__( 'Deselect', 'icon-picker' )
			),
		);

		/**
		 * Filter media templates
		 *
		 * @since 0.1.0
		 * @param array $templates Media templates.
		 */
		$templates = apply_filters( 'icon_picker_feather_media_templates', $templates );

		return $templates;
	}
}
