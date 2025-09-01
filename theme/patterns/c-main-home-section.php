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
<!-- wp:group {"metadata":{"name":"c - KiP - Main Home Section","categories":["bootscore"],"patternName":"bootscore/hero-img-right"},"className":"row min-vh-75 my-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<div class="wp-block-group row min-vh-75 my-5 hide-wp-block-classes">
	<!-- wp:group {"metadata":{"name":"col-lg-6 order-lg-2"},"className":"col-lg-6 order-lg-2","layout":{"type":"default"}} -->
	<div class="wp-block-group col-lg-6 order-lg-2">
		<!-- wp:group {"metadata":{"name":"position-relative h-100 rounded-dot-image-stack","layout":{"type":"default"}} -->
		<div class="wp-block-group position-relative h-100 rounded-dot-image-stack">
			<!-- wp:group {"className":"position-absolute top-75 top-lg-60 start-0 translate-middle-y ms-md-4 ms-lg-3 z-1"} -->
			<div class="wp-block-group position-absolute top-75 top-lg-60 start-0 translate-middle-y ms-md-4 ms-lg-3 z-1">
				<!-- wp:image {"sizeSlug":"large","className":"rounded-dot-image mb-0"} -->
				<figure class="wp-block-image size-large rounded-dot-image mb-0">
					<img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/rounded-dot-image_1.avif' ) ); ?>" alt="">
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"className":" position-absolute top-50 top-lg-25 end-0 translate-middle-y me-md-5 me-lg-0"} -->
			<div class="wp-block-group position-absolute top-40 top-md-40 top-lg-25 end-0 translate-middle-y me-md-5 me-lg-0">
				<!-- wp:image {"sizeSlug":"large","className":"rounded-dot-image rounded-dot-image-sm mb-0 d-inline-flex align-items-end"} -->
				<figure class="wp-block-image size-large rounded-dot-image rounded-dot-image-sm mb-0 d-inline-flex align-items-end">
					<img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/rounded-dot-image_2.avif' ) ); ?>" alt="">
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"col-lg-6"},"className":"col-lg-6","layout":{"type":"default"}} -->
	<div class="wp-block-group col-lg-6">
		<!-- wp:group {"metadata":{"name":"h-100 d-flex align-items-center"},"className":"h-100 d-flex align-items-center mt-sm-5 mt-lg-0","layout":{"type":"default"}} -->
		<div class="wp-block-group h-100 d-flex align-items-center mt-sm-5 mt-lg-0">
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
