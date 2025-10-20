<?php
/**
 * Theme for KP.
 *
 * @package Bootscore Child
 *
 * @version 6.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once get_template_directory() . '/inc/scss-compiler.php';
require_once 'inc/helpers.php';
require_once 'inc/icon-shortcode.php';
require_once 'inc/block-button-icons.php';
require_once 'inc/block-button-variations.php';
require_once 'inc/menu-icons/menu-icons.php';
require_once 'inc/blocks/navigation-link-icon.php';
require_once 'inc/blocks/query-pagination-icon.php';
require_once 'inc/blocks/details-icon.php';

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'bootscore_child_enqueue_styles' );
/**
 * Enqueues styles and scripts for the child theme.
 */
function bootscore_child_enqueue_styles() {
	// Compiled main.css.
	$modified_bootscore_child_css = gmdate( 'YmdHi', filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css', array( 'parent-style' ), $modified_bootscore_child_css );

	// style.css.
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// custom.js
	// Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes.
	$modificated_custom_js = gmdate( 'YmdHi', filemtime( get_stylesheet_directory() . '/assets/js/custom.js' ) );
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), $modificated_custom_js, false, true );
}

/**
 * Enqueues the compiled admin CSS stylesheet for the Bootscore child theme.
 *
 * This function compiles the admin.scss file into CSS using a SCSS compiler,
 * then enqueues the resulting admin.css file with a version query parameter
 * based on the file's modification time to ensure caching is handled correctly.
 */
function bootscore_child_admin_enqueue_styles() {
	// Compile the admin.scss file.
	$scss_compiler_editor = new BootscoreScssCompiler();
	$scss_compiler_editor->scssFile( '/assets/scss/admin.scss' )
						->cssFile( '/assets/css/admin.css' )
						->addModifiedCheckTheme()
						->skipEnvironmentCheck()
						->compile();
	// admin.css.
	$modified_bootscore_child_admin_css = gmdate( 'YmdHi', filemtime( get_stylesheet_directory() . '/assets/css/admin.css' ) );
	wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/assets/css/admin.css', array(), $modified_bootscore_child_admin_css );
}
add_action( 'admin_enqueue_scripts', 'bootscore_child_admin_enqueue_styles' );

/**
 * Unregisters the core post excerpt block type from Gutenberg editor.
 *
 * This function is hooked to the 'init' action to ensure it runs during
 * WordPress initialization.
 */
function custom_init() {
	unregister_block_type( 'core/post-excerpt' );
}
add_action( 'init', 'custom_init' );

/**
 * Registers a custom post excerpt block with a custom render callback.
 *
 * This function registers the 'core/post-excerpt' block type and associates it
 * with the `render_custom_post_excerpt` function for rendering.
 */
function register_custom_post_excerpt_block() {
	register_block_type( 'core/post-excerpt', [ 'render_callback' => 'render_custom_post_excerpt' ] );
}
add_action( 'init', 'register_custom_post_excerpt_block' );

/**
 * Renders a custom post excerpt with customizable attributes.
 *
 * This function overrides the default WordPress post excerpt rendering,
 * allowing for dynamic styling, truncation, and "Read more" link customization.
 *
 * @since 1.0.0
 *
 * @param array $attributes {
 *     Block attributes from the editor.
 *
 *     @type int    $excerptLength         Optional. The number of characters to truncate the excerpt to. Default is 55.
 *     @type string $className             Optional. Class name for the outer container div.
 *     @type string $excerptClassName      Optional. Class name for the paragraph containing the excerpt text.
 *     @type string $moreText              Optional. Custom "Read more" link text to display.
 *     @type bool   $showMoreOnNewLine     Optional. Whether to wrap the "Read more" link in a new paragraph. Default is false.
 *     @type string $showMoreOnNewLineClassName Optional. Class name for the container paragraph of the "Read more" link.
 *     @type string $moreTextClassName     Optional. Class name for the anchor tag of the "Read more" link.
 *     @type string $moreTextPrefix        Optional. Text to display before the "Read more" link.
 *     @type string $moreTextSuffix        Optional. Text to display after the "Read more" link.
 * }
 *
 * @return string HTML markup for the custom excerpt.
 */
function render_custom_post_excerpt( $attributes ) {
	// set default excerpt length if not provided.
	$excerpt_length = isset( $attributes['excerptLength'] ) ? $attributes['excerptLength'] : 55;

	// start building the outer container div.
	$excerpt = '<div';

	// add class attribute if specified in block settings.
	if ( isset( $attributes['className'] ) ) {
		$excerpt .= ' class="' . $attributes['className'] . '"';
	} else {
		$excerpt .= '>';
	}

	// begin paragraph tag for the excerpt text.
	$excerpt .= '<p';

	// apply custom class to the paragraph if specified.
	if ( isset( $attributes['excerptClassName'] ) ) {
		$excerpt .= ' class="' . $attributes['excerptClassName'] . '">';
	} else {
		$excerpt .= '>';
	}

	// truncate or use full excerpt based on length.
	if ( strlen( get_the_excerpt() ) > $excerpt_length ) {
		// Truncate and add ellipsis if excerpt exceeds specified length.
		$excerpt .= substr( get_the_excerpt(), 0, $excerpt_length ) . '…';
	} else {
		$excerpt .= get_the_excerpt();
	}

	// close the paragraph tag.
	$excerpt .= '</p>';

	// conditionally append "Read more" link with custom styling/text.
	if ( isset( $attributes['moreText'] ) ) {
		// wrap "Read more" in a new paragraph if specified.
		if ( $attributes['showMoreOnNewLine'] ) {
			$excerpt .= '<p';

			// apply class to the container paragraph.
			if ( isset( $attributes['showMoreOnNewLineClassName'] ) ) {
				$excerpt .= ' class="' . $attributes['showMoreOnNewLineClassName'] . '"';
			}

			$excerpt .= '>';
		}

		// build anchor tag with custom classes, prefix, and suffix.
		$excerpt .= '<a ';

		if ( isset( $attributes['moreTextClassName'] ) ) {
			$excerpt .= 'class="' . $attributes['moreTextClassName'] . '" ';
		}

		$excerpt .= 'href="' . wp_get_canonical_url() . '">';

		// add optional prefix text before the "Read more" link.
		if ( isset( $attributes['moreTextPrefix'] ) ) {
			$excerpt .= $attributes['moreTextPrefix'];
		}

		// insert custom "Read more" text.
		$excerpt .= $attributes['moreText'];

		// add optional suffix text after the "Read more" link.
		if ( isset( $attributes['moreTextSuffix'] ) ) {
			$excerpt .= $attributes['moreTextSuffix'];
		}

		$excerpt .= '</a>';

		// close the paragraph tag if "Read more" was wrapped in a new line.
		if ( $attributes['showMoreOnNewLine'] ) {
			$excerpt .= '</p>';
		}
	}

	// close the outer container div.
	$excerpt .= '</div>';

	return $excerpt;
}

/**
 * Header position and bg
 */
function header_bg_class() {
	return 'sticky-top bg-body';
}
add_filter( 'bootscore/class/header', 'header_bg_class' );

/**
 * Header navbar border bottom
 */
function header_navbar_border_bottom() {
	return 'border-bottom shadow-transition navbar-expand-lg';
}
add_filter( 'bootscore/class/header/navbar/breakpoint', 'header_navbar_border_bottom' );

/**
 * Removes the 'mb-3' class from block buttons content.
 * Replaces "gap-1" class with "gap-2"
 *
 * @param string $block_content The original block content with classes.
 */
function block_flush_button( $block_content ) {
	return str_replace( 'gap-1 mb-3', 'gap-2', $block_content );
}
add_filter( 'bootscore/block/buttons/content', 'block_flush_button', 10, 1 );

/**
 * Adjusts the navbar items positioning to the left.
 */
function navbar_nav_position_item() {
	return 'me-auto';
}
add_filter( 'bootscore/class/header/navbar-nav', 'navbar_nav_position_item' );

/**
 * Adds Bootstrap classes to categories post terms.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block, including name and attributes.
 * @return string The filtered block content.
 */
function bootscore_child_block_post_categories_classes( $block_content, $block ) {
	if ( isset( $block['attrs'] ) && 'category' === $block['attrs']['term'] ) {
		$search  = array(
			'<a',
		);
		$replace = array(
			'<a class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis text-decoration-none border border-primary" ',
		);

		return str_replace( $search, $replace, $block_content );
	}
}
add_filter( 'render_block_core/post-terms', 'bootscore_child_block_post_categories_classes', 10, 2 );

/**
 * Custom language switcher dropdown for WordPress menus.
 *
 * This function modifies the language switcher menu to display a custom HTML structure
 * with flags and names of available languages. It replaces the default menu items
 * with a styled language switcher dropdown.
 *
 * @param array  $items     The list of menu items.
 * @param object $args     Menu arguments.
 * @return string          Modified menu items or custom language switcher HTML.
 */
function custom_language_switcher_dropdown( $items, $args ) {
	// check if this is the language switcher.
	if ( 'language-switcher' === $args->menu->slug ) {
		// get the current language slug.
		$current_lang_slug = pll_current_language( 'slug' );

		// get the list of languages slugs.
		$language_slugs = pll_languages_list();

		if ( ! empty( $language_slugs ) ) {
			$language_names   = pll_languages_list( array( 'fields' => 'name' ) );
			$language_locales = pll_languages_list( array( 'fields' => 'locale' ) );
			$post_id          = get_the_ID();

			if ( is_front_page() || ! is_singular( 'post' ) ) {
				$post_id = null;
			}

			$custom_html  = '<li id="top-language-switcher" class="mx-n3 px-3 pt-3 border-top mx-lg-0 p-lg-0 border-lg-0">';
			$custom_html .= '<div class="dropdown dropup dropdown-lg">';
			$custom_html .= '<button class="btn btn-ghost-secondary dropdown-toggle icon-css icon-start icon-end text-uppercase" data-bs-display="static" type="button" data-bs-toggle="dropdown" aria-expanded="false">';
			$custom_html .= '<span class="flag flag-' . strtoupper( $current_lang_slug ) . ' flag-round flag-lg"></span>';
			$custom_html .= $current_lang_slug;
			$custom_html .= '</button>';
			$custom_html .= '<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end shadow">';

			foreach ( $language_slugs as $key => $slug ) {
				// check if this is the current language.
				$is_current  = ( $slug === $current_lang_slug ) ? ' active icon-css' : '';
				$lang_name   = esc_attr( $language_names[ $key ] );
				$lang_locale = esc_attr( $language_locales[ $key ] );

				if ( $post_id ) {
					$lang_post_id = pll_get_post( $post_id, $slug );
					$lang_url     = get_permalink( $lang_post_id );
				} elseif ( is_author() ) {
					$user = get_queried_object();

					// Polylang does not provide a method to get the language url for authors.
					$lang_url = get_author_posts_url( $user->ID );
				} else {
						// Get the current term object.
					$term = get_queried_object();

					if ( ! empty( $term->term_id ) ) {
						$term_id  = pll_get_term( $term->term_id, $slug );
						$lang_url = get_term_link( $term_id );
					} else {
						// Fallback for non-post contexts like front page.
						$lang_url = pll_home_url( $slug );
					}
				}

				// display the language switcher item with flag and name.
				$custom_html .= '<li>';
				$custom_html .= '<a lang="' . $lang_locale . '" hreflang="' . $lang_locale . '" class="dropdown-item' . $is_current . '" href="' . $lang_url . '" title="' . $lang_name . '">';
				$custom_html .= '<span class="flag flag-' . strtoupper( $slug ) . ' flag-round flag-lg me-2"></span>';
				$custom_html .= $lang_name;
				$custom_html .= '</a>';
				$custom_html .= '</li>';
			}
			$custom_html .= '</ul></div></li>';
		}

		// return the custom HTML instead of the default menu.
		return $custom_html;
	}

	// for other menus, return the original items.
	return $items;
}
add_filter( 'wp_nav_menu_items', 'custom_language_switcher_dropdown', 10, 2 );

/**
 * Use container-fluid class instead of container on footer
 *
 * @param string $class_names The existing class name.
 * @param string $context The context where the class is applied (e.g., 'footer-info').
 * @return string Modified class name with container-fluid
 */
function footer_container_class( $class_names, $context ) {

	if ( 'footer-info' === $context ) {
		return 'container d-flex border-top py-5 mb-4 border-secondary flex-md-wrap flex-wrap-reverse justify-content-md-between justify-content-center align-content-stretch align-items-md-end';
	}

	return $class_names;
}
add_filter( 'bootscore/class/container', 'footer_container_class', 10, 2 );

/**
 * Change footer column wrapper classes
 */
function add_footer_class() {
	return 'py-5 mt-4';
}
add_filter( 'bootscore/class/footer/columns', 'add_footer_class', 10, 2 );


/**
 * Custom classes for each footer column in use
 *
 * @param string $class_names  The default class name(s).
 * @param string $location The footer column location (e.g., 'footer-1', 'footer-2').
 * @return string Modified class name
 */
function footer_col_class( $class_names, $location ) {

	if ( 'footer-1' === $location ) {
		return 'col-12 col-lg-2 order-1 order-md-1';
	}
	if ( 'footer-2' === $location ) {
		return 'col-12 col-lg-6 order-3 order-md-2';
	}
	if ( 'footer-3' === $location ) {
		return 'col-12 col-lg-4 order-2 order-md-3';
	}

	if ( 'footer-4' === $location ) {
		return 'd-none';
	}
	return $class_names;
}
add_filter( 'bootscore/class/footer/col', 'footer_col_class', 10, 2 );

/**
 * Custom classes for footer info
 */
function add_footer_info_class() {
	return 'text-body-secondary text-center';
}
add_filter( 'bootscore/class/footer/info', 'add_footer_info_class', 10, 2 );

/**
 * Sets the direction for the mobile menu in the offcanvas body.
 *
 * @param string $class_names The existing class names.
 * @param mixed  $context   The context in which the function is called.
 */
function mobile_offcanvas_body_direction( $class_names, $context ) {
	if ( 'menu' === $context ) {
		return 'd-flex flex-column flex-lg-row';
	}

	return $class_names;
}
add_filter( 'bootscore/class/offcanvas/body', 'mobile_offcanvas_body_direction', 10, 2 );

/**
 * Adds a flex-grow-1 class to the navbar nav.
 */
function grow_mobile_navbar_nav() {
	return 'flex-grow-1';
}
add_filter( 'bootscore/class/header/navbar-nav', 'grow_mobile_navbar_nav', 10, 2 );


/**
 * Disable Font Awesome
 */
add_filter( 'bootscore/load_fontawesome', '__return_false' );

/**
 * Change nav-toggler icon
 */
function change_nav_toggler_icon() {
	return icon( 'menu' );
}
add_filter( 'bootscore/icon/menu', 'change_nav_toggler_icon' );

/**
 * Change search-toggler icon
 */
function change_search_toggler_icon() {
	return icon( 'search' );
}
add_filter( 'bootscore/icon/search', 'change_search_toggler_icon' );

/**
 * Change account-toggler user icon
 */
function change_account_toggler_icon() {
	return icon( 'log-out' );
}
add_filter( 'bootscore/icon/user', 'change_account_toggler_icon' );

/**
 * Change cart-toggler bag icon
 */
function change_cart_toggler_icon() {
	return icon( 'shopping-cart' );
}
add_filter( 'bootscore/icon/cart', 'change_cart_toggler_icon' );

/**
 * Change back-to-cart-toggler arrow icon
 */
function change_back_to_cart_arrow_icon() {
	return icon( 'chevron-right' );
}
add_filter( 'bootscore/icon/arrow-left', 'change_back_to_cart_arrow_icon' );

/**
 * Change sidebar offcanvas-toggler icon
 */
function change_sidebar_toggler_icon() {
	return icon( 'more-horizontal' );
}
add_filter( 'bootscore/icon/ellipsis-vertical', 'change_sidebar_toggler_icon' );

/**
 * Change WooCommerce mini-cart trash icon
 */
function change_trash_icon() {
	return icon( 'trash' );
}
add_filter( 'bootscore/icon/trash', 'change_trash_icon' );

/**
 * Change star icon
 */
function change_star_icon() {
	return icon( 'map-pin' );
}
add_filter( 'bootscore/icon/star', 'change_star_icon' );

/**
 * Change comments icon
 */
function change_comments_icon() {
	return icon( 'message-square' );
}
add_filter( 'bootscore/icon/comments', 'change_comments_icon' );

/**
 * Change breadcrumb home icon
 */
function change_home_icon() {
	return icon( 'home' );
}
add_filter( 'bootscore/icon/home', 'change_home_icon' );

/**
 * Change to-top button icon
 */
function change_to_top_icon() {
	return icon( 'chevron-up' );
}
add_filter( 'bootscore/icon/chevron-up', 'change_to_top_icon' );

/**
 * Change category badge class
 */
function change_category_badge_link_class() {
	return 'badge bg-primary-subtle border border-primary-subtle text-primary-emphasis text-decoration-none border border-primary';
}
add_filter( 'bootscore/class/badge/category', 'change_category_badge_link_class' );

/**
 * Change widget categories badge
 *
 * @param string $block_content The content of the block.
 * @return string Modified block content with updated badge style.
 */
function change_block_widget_categories_badge( $block_content ) {

	$search  = array(
		'<span class="badge bg-primary-subtle text-primary-emphasis border border-primary">',
	);
	$replace = array(
		'<span class="badge bg-danger-subtle text-danger-emphasis border border-danger">',
	);

	return str_replace( $search, $replace, $block_content );
}
add_filter( 'bootscore/block/categories/content', 'change_block_widget_categories_badge', 10, 2 );

/**
 * Highlight the last word of a given string with a primary text color.
 *
 * @param string $input The input string to process.
 * @return string The modified string with the last word highlighted.
 */
function colour_last_word( $input ) {
	$text  = wp_strip_all_tags( $input );
	$words = preg_split( '/\s+/', trim( $text ) );

	if ( count( $words ) <= 1 ) {
		return $input;
	}

	$last_word = array_pop( $words );

	return implode( ' ', $words ) . ' <span class="text-primary">' . $last_word . '</span>';
}

/**
 * Wraps the last word in a heading with the `colour-last-word` class and applies a primary color.
 *
 * @param string $block_content The content of the block.
 * @return string Modified block content with the last word styled.
 */
function block_heading_colour_last_word( $block_content ) {
	// target headings that have our helper class.
	if ( ! str_contains( $block_content, 'colour-last-word' ) ) {
		return $block_content;
	}

	// grab heading inner text.
	preg_match( '/<h[1-6][^>]*?>(.*?)<\/h[1-6]>/is', $block_content, $matches );
	if ( empty( $matches[1] ) ) {
		return $block_content;
	}

	$new_text = colour_last_word( $matches[1] );

	return str_replace( $matches[1], $new_text, $block_content );
}
add_filter( 'render_block_core/heading', 'block_heading_colour_last_word', 10, 2 );

/**
 * Custom language switcher dropdown for Language Switcher widget.
 *
 * This function modifies the language switcher menu to display a custom HTML structure
 * with flags and names of available languages. It replaces the default menu items
 * with a styled language switcher dropdown.
 *
 * @param string $output     The list of menu items.
 * @param object $args     Menu arguments.
 * @return string          Modified menu items or custom language switcher HTML.
 */
function footer_language_switcher( $output, $args ) {
	if ( ! $args['dropdown'] ) {
		return $output;
	}

	$current_lang_slug = pll_current_language( 'slug' );
	$current_lang_name = pll_current_language( 'name' );
	$language_slugs    = pll_languages_list();

	$custom_html = '';

	if ( ! empty( $language_slugs ) ) {
		$language_names   = pll_languages_list( [ 'fields' => 'name' ] );
		$language_locales = pll_languages_list( [ 'fields' => 'locale' ] );

		$custom_html  = '<div class="fw-bold text-start">Language</div>';
		$custom_html .= '<div class="dropdown dropup">';
		$custom_html .= '<button
            class="btn btn-outline-secondary rounded-1 dropdown-toggle icon-css icon-start icon-end align-items-center justify-content-between"
            style="min-width: 18rem" data-bs-display="static" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">';
		$custom_html .= '<span class="d-flex align-items-center"><span
                    class="me-2 flag flag-' . strtoupper( $current_lang_slug ) . ' flag-round flag-lg"></span>';
		$custom_html .= $current_lang_name;
		$custom_html .= '</span>';
		$custom_html .= '</button>';
		$custom_html .= '<ul class="dropdown-menu shadow" style="min-width: 18rem">';

		foreach ( $language_slugs as $key => $slug ) {
			$is_current  = ( $slug === $current_lang_slug ) ? ' active icon-css' : '';
			$lang_name   = esc_attr( $language_names[ $key ] );
			$lang_locale = esc_attr( $language_locales[ $key ] );

			$custom_html .= '<li>';
			$custom_html .= '<a lang="' . $lang_locale . '" hreflang="' . $lang_locale . '"
                    class="dropdown-item' . $is_current . '" href="' . pll_home_url( $slug ) . '"
                    title="' . $lang_name . '">';
			$custom_html .= '<span class="flag flag-' . strtoupper( $slug ) . ' flag-round flag-lg me-2"></span>';
			$custom_html .= $lang_name;
			$custom_html .= '</a>';
			$custom_html .= '</li>';
		}

		$custom_html .= '</ul></div>';
	}

	return $custom_html;
}

add_filter( 'pll_the_languages', 'footer_language_switcher', 10, 2 );

/**
 * Replace the breadcrumbs.
 */
function the_breadcrumb() {
	if ( is_home() ) {
		return;
	}

	// phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
	$nav_classes = apply_filters( 'bootscore/class/breadcrumb/nav', 'overflow-x-auto text-nowrap mb-4 mt-2 py-2' );
	// phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
	$ol_classes = apply_filters( 'bootscore/class/breadcrumb/ol', 'mb-0' );
	// phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
	$link_class = apply_filters( 'bootscore/class/breadcrumb/item/link', '' );

	echo '<nav aria-label="breadcrumb" class="' . esc_html( $nav_classes ) . '">';
	echo '<ol class="breadcrumb ' . esc_html( $ol_classes ) . '">';
	echo '<li class="breadcrumb-item">
		<a class="' . esc_attr( $link_class ) . '" href="' . esc_url( home_url() ) . '">
			<span>' . esc_html__( 'Home', 'child-theme' ) . '</span>
		</a>
	</li>';

	// display parent category names with links.
	if ( is_category() || is_single() ) {
		$cat_ids = wp_get_post_categories( get_the_ID() );
		foreach ( $cat_ids as $cat_id ) {
			$cat = get_category( $cat_id );
			echo '<li class="breadcrumb-item lh-1 d-flex align-items-center">
				<a class="' . esc_attr( $link_class ) . '" href="' . esc_url( get_term_link( $cat->term_id ) ) . '">
					' . esc_html( $cat->name ) . '
				</a>
			</li>';
		}
	}

	// display current page name.
	if ( is_page() || is_single() ) {
		echo '<li class="breadcrumb-item active lh-1 d-md-flex d-none align-items-center" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
	}

	echo '</ol>';
	echo '</nav>';
}


function kip_custom_comment( $comment, $args, $depth ) {
	$tag = ( $args['style'] === 'ol' ) ? 'li' : 'div';
	?>
	<<?php echo $tag; ?> <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-body border-bottom pt-2">
			<div class="d-md-flex gap-2 align-items-center">
			<div class="comment-author vcard text-base">
	<?php printf( '<b class="fn">%s</b>', get_comment_author() ); ?>
			</div>

	<div class="comment-meta commentmetadata d-md-flex">
	<?php
		printf(
			esc_html__( '%s ago', 'bootscore' ),
			human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) )
		);
	?>
	<?php edit_comment_link( esc_html__( '(Edit)', 'bootscore' ), '  ', '' ); ?>
</div>
			</div>
			<div class="comment-text">
				<?php comment_text(); ?>
			</div>
		</div>
	<?php
}

// Add custom classses on the comment form section
add_filter(
	'comment_form_defaults',
	function ( $defaults ) {
		$defaults['class_container'] = 'comment-response rounded border border-2 border-secondary bg-light p-4';
		return $defaults;
	}
);

// Reorder comment form fields
add_filter(
	'comment_form_fields',
	function ( $fields ) {
		$new_fields = [];

		$new_fields['author'] = $fields['author'];
		$new_fields['email']  = $fields['email'];

		$new_fields['comment'] = $fields['comment'];

		if ( isset( $fields['cookies'] ) ) {
			$new_fields['cookies'] = $fields['cookies'];
		}

		return $new_fields;
	}
);
