<?php
/**
 * Title: KiP - Main Home Section
 * Slug: theme/c-main-home-section
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- wp:group {"metadata":{"name":"c - Hero image right - row mb-3 hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/hero-img-right"},"className":"row h-100 mb-3 hide-wp-block-classes","layout":{"type":"default"}} -->
<div class="wp-block-group row min-vh-75 mb-3 mt-6 hide-wp-block-classes">
	<!-- wp:group {"metadata":{"name":"col-lg-6 order-lg-2"},"className":"col-lg-6 order-lg-2","layout":{"type":"default"}} -->
	<div class="wp-block-group col-lg-6 order-lg-2">
		<!-- wp:group {"metadata":{"name":"h-100 d-flex align-items-center"},"className":"h-100 d-flex align-items-center justify-content-end","layout":{"type":"default"}} -->
		<div class="wp-block-group d-flex align-items-center justify-content-end relative main-section-img-container">
			<!-- wp:group {"className":"main-section-img-first rounded-circle"} -->
			<div class="wp-block-group main-section-img-first rounded-circle"">
				<!-- wp:image {"sizeSlug":"large","className":"rounded-circle mb-0"} -->
				<figure class="wp-block-image size-large rounded-circle mb-0 "><img
						src="http://localhost:8080/wp-content/uploads/2025/08/52e5b36d2ace146e7fa001b2becd8b853aec7f32.png"
						alt="" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"className":"main-section-img-second"} -->
			<div class="wp-block-group main-section-img-second rounded-circle"">
				<!-- wp:image {"sizeSlug":"large","className":"rounded-circle mb-0 bg-"} -->
				<figure class="wp-block-image size-large rounded-circle mb-0"><img
						src="http://localhost:8080/wp-content/uploads/2025/08/52e5b36d2ace146e7fa001b2becd8b853aec7f32.png"
						alt="" /></figure>
				<!-- /wp:image -->
			</div>

			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"col-lg-6"},"className":"col-lg-6","layout":{"type":"default"}} -->
	<div class="wp-block-group col-lg-6">
		<!-- wp:group {"metadata":{"name":"h-100 d-flex align-items-center"},"className":"h-100 d-flex align-items-center","layout":{"type":"default"}} -->
		<div class="wp-block-group h-100 d-flex align-items-center">
			<!-- wp:group -->
			<div class="wp-block-group">

				<!-- wp:heading {"metadata":{"name":"display-5 fw-bold mb-2"},"className":"display-5 fw-bold"} -->
				<h2 class="wp-block-heading display-5 fw-bold mb-2">Let’s kill Parkinson's by providing our <span
						class="text-primary">data</span></h2> <!-- /wp:heading -->

				<!-- wp:paragraph {"metadata":{"name":""},"className":"lead"} -->
				<p class="lead">Join our mission to build a global, patient-led Parkinson's registry. We provide
					anonymized data to leading researchers to help them find a cure.</p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"btn-primary"} -->
					<div class="wp-block-button btn-primary">
						<a class="wp-block-button__link" href="#">Primary Button</a>
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