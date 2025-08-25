<?php
/**
 * Title: KiP - Hero image left
 * Slug: theme/s-hero-img-left
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 *
 * @package Bootscore
 * @version 6.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- wp:group {"tagName":"section","metadata":{"name":"s - Hero image left - bg-body-tertiary py-5 hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/section-hero-img-left"},"className":"bg-body-tertiary py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="wp-block-group py-5 hide-wp-block-classes">
	<!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"metadata":{"name":"c - Hero image left - row align-items-center hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/c.hero-img-left"},"className":"row hide-wp-block-classes","layout":{"type":"default"}} -->
		<div class="wp-block-group row hero-section hide-wp-block-classes">
			<!-- wp:group {"metadata":{"name":"col-lg-6 mb-3 mb-lg-0"},"className":"col-lg-6 mb-3 mb-lg-0","layout":{"type":"default"}} -->
			<div class="wp-block-group col-lg-6 mb-3 mb-lg-0 h-full">
				<!-- wp:image {"sizeSlug":"full","metadata":{"name":"rounded h-full mb-0"},"className":"rounded h-full mb-0"} -->
				<figure class="wp-block-image h-full rounded mb-0 h-full hero-section-image"><img
						src="https://dummyimage.com/1200x900/6c757d/ffffff" alt="" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"metadata":{"name":"col-lg-6"},"className":"col-lg-6","layout":{"type":"default"}} -->
			<div class="wp-block-group col-lg-6 d-flex align-items-center p-md-4 w-full">
				<!-- wp:group {"metadata":{"name":"text-block"},"className":"text-block py-6","layout":{"type":"default"}} -->
				<div class="wp-block-group text-block w-full my-4">
					<!-- wp:heading {"metadata":{"name":"display-5 fw-bold mb-2 colour-last-word"},"className":"display-5 fw-bold mb-2 colour-last-word"} -->
					<h2 class="wp-block-heading display-5 fw-bold mb-2 colour-last-word">
						Section with <span class="text-primary">hero</span>
					</h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"metadata":{"name":"lead"},"className":"lead"} -->
					<p class="lead">This section features a two-column hero with a right-aligned image and CTA
						buttons wrapped in a container. Use it on the page-blanktemplate.</p>
					<!-- /wp:paragraph -->

					<!-- wp:list -->
					<ul class="wp-block-list">
						<!-- wp:list-item -->
						<li>List Item 1</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>List Item 2</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>List Item 3</li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"btn-secondary full-width-mobile-button"} -->
						<div class="wp-block-button btn-secondary w-100 d-grid d-md-inline-block w-md-auto">
							<a class="wp-block-button__link">Page Link</a>
						</div>
						<!-- /wp:button -->
						<!-- wp:button {"className":"btn-outline-secondary full-width-mobile-button"} -->
						<div class="wp-block-button btn-outline-secondary icon-end-chevron-right w-100 d-grid d-md-inline-block w-md-auto">
							<a class="wp-block-button__link">Action Link</a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->