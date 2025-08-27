<?php
/**
 * Enqueues and defines HTML templates for menu icon previews using SVG icons from a font.
 *
 * Templates are used in various preview contexts:
 * - Individual menu item field preview
 * - Sidebar preview before the label
 * - Sidebar preview after the label
 * - Sidebar preview with label hidden
 *
 * The icon URL is dynamically generated using the theme's stylesheet directory URI.
 *
 * @package Bootscore Child
 */

$icon_url = get_stylesheet_directory_uri() . '/assets/fonts/icon.svg';
?>

<script type="text/html" id="tmpl-iconpicker-font-item">
	<div class="attachment-preview js--select-attachment">
		<div class="thumbnail">
				<span class="_icon">
						<svg class="icon-picker-icon" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<use href="<?php echo esc_url( $icon_url ); ?>#{{ data.id }}"></use>
						</svg>
				</span>
				<div class="filename"><div>{{ data.name }}</div></div>
		</div>
</div>
<a class="check" href="#" title="Deselect"><div class="media-modal-icon"></div></a>			
</script>

<script type="text/html" id="tmpl-menu-icons-item-field-preview-font">
	<svg class="_icon icon"><use href="<?php echo esc_url( $icon_url ); ?>#{{ data.icon }}" aria-hidden="true"></svg>
</script>

<script type="text/html" id="tmpl-menu-icons-item-sidebar-preview-font-before">
	<a href="#">
		<svg class="_icon icon"><use href="<?php echo esc_url( $icon_url ); ?>#{{ data.icon }}" aria-hidden="true"
		style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"></svg>
		<span>{{ data.title }}</span>
	</a>
</script>

<script type="text/html" id="tmpl-menu-icons-item-sidebar-preview-font-after">
	<a href="#">
		<span>{{ data.title }}</span>
		<svg class="_icon icon"><use href="<?php echo esc_url( $icon_url ); ?>#{{ data.icon }}" aria-hidden="true"
		style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"></svg>
	</a>
</script>

<script type="text/html" id="tmpl-menu-icons-item-sidebar-preview-font-hide_label">
	<a href="#">
		<svg class="_icon icon"><use href="<?php echo esc_url( $icon_url ); ?>#{{ data.icon }}" aria-hidden="true"
		style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"></svg>
	</a>
</script>

<script type="text/html" id="tmpl-menu-icons-item-font">
	<a href="#">
		<svg class="_icon icon"><use href="<?php echo esc_url( $icon_url ); ?>#{{ data.icon }}" aria-hidden="true"
		style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"></svg>
	</a>
</script>

<?php
do_action( 'menu_icons_js_templates' );
