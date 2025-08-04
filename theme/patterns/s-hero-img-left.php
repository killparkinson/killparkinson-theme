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

// Exit if accessed directly
defined('ABSPATH') || exit;

?>
<!-- wp:group {"tagName":"section","metadata":{"name":"s - Hero image left - bg-body-tertiary py-5 hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/section-hero-img-left"},"className":"bg-body-tertiary py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="wp-block-group py-5 hide-wp-block-classes">
    <!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"metadata":{"name":"c - Hero image left - row align-items-center hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/c.hero-img-left"},"className":"row hide-wp-block-classes","layout":{"type":"default"}} -->
        <div class="wp-block-group row hero-section align-items-stretch hide-wp-block-classes">
            <!-- wp:group {"metadata":{"name":"col-lg-6 mb-3 mb-lg-0"},"className":"col-lg-6 mb-3 mb-lg-0","layout":{"type":"default"}} -->
            <div class="wp-block-group col-xl-6 mb-3 mb-lg-0 ">
                    <!-- wp:image {"sizeSlug":"full","metadata":{"name":"rounded mb-0"},"className":"rounded mb-0 h-100ss"} -->
                    <figure class="wp-block-image size-full rounded mb-0 h-100"><img
                            src="https://dummyimage.com/1200x900/6c757d/ffffff" alt="" /></figure>
                    <!-- /wp:image -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"metadata":{"name":"col-lg-6"},"className":"col-lg-6","layout":{"type":"default"}} -->
            <div class="wp-block-group col-xk-6">
                <!-- wp:group {"metadata":{"name":" d-flex align-items-center"},"className":"h-100 d-flex align-items-center","layout":{"type":"default"}} -->
                <div class="wp-block-group d-flex align-items-center p-md-4">
                    <!-- wp:group {"metadata":{"name":"text-block"},"className":"text-block py-6","layout":{"type":"default"}} -->
                    <div class="wp-block-group text-block py-6 ">
                        <!-- wp:heading {"metadata":{"name":"display-5 fw-bold mb-2"},"className":"display-5 fw-bold"} -->
                        <h2 class="wp-block-heading display-5 fw-bold mb-2">Section with <span
                                class="text-primary">hero</span></h2> <!-- /wp:heading -->

                        <!-- wp:paragraph {"metadata":{"name":"lead"},"className":"lead"} -->
                        <p class="lead">This section features a two-column hero with a right-aligned image and CTA
                            buttons wrapped in a container. Use it on the page-blanktemplate.</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"metadata":{"name":"mb-0"},"className":"mb-0 d-flex gap-2"} -->
                        <p class="mb-0 d-flex flex-xl-row flex-column w-full gap-2">
                            <button class="btn btn-secondary">Secondary
                                button</button> <button class="btn icon-end btn-outline-secondary">
                                Button

                                <svg class="icon">
                                    <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-right" />
                                </svg>
                            </button></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
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