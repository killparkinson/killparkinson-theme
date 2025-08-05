<?php
/**
 * Title: KiP - Button Group
 * Slug: theme/s-hero-img-left
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 *
 * @package Bootscore
 * @version 6.2.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>


<!-- wp:paragraph {"metadata":{"name":"mb-0"},"className":"mb-0 d-flex gap-2"} -->
<p class="mb-0 d-flex flex-md-row flex-column gap-2">
	<button class="btn btn-secondary">Secondary button</button>
	<button class="btn icon-end btn-outline-secondary">
		Button

		<svg class="icon">
			<use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-right" />
		</svg>
	</button>
</p>
<!-- /wp:paragraph -->