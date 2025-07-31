<?php
/**
 * Title: KIP - Hero image left
 * Slug: bootscore/s-hero-img-left
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
    <!-- wp:group {"metadata":{"name":"container h-100"},"className":"container h-100","layout":{"type":"default"}} -->
    <div class="wp-block-group container h-100">
        <!-- wp:group {"metadata":{"name":"c - Hero image left - row hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/c.hero-img-left"},"className":"row h-100 hide-wp-block-classes","layout":{"type":"default"}} -->
        <div class="wp-block-group row hide-wp-block-classes">
            <!-- wp:group {"metadata":{"name":"col-lg-6 mb-3 mb-lg-0"},"className":"col-lg-6 mb-3 mb-lg-0","layout":{"type":"default"}} -->
            <div class="wp-block-group col-lg-6 mb-3 mb-lg-0">
                <!-- wp:group {"metadata":{"name":"h-100 d-flex align-items-center"},"className":"h-100 d-flex align-items-center","layout":{"type":"default"}} -->
                <div class="wp-block-group h-100 d-flex align-items-center">
                    <!-- wp:image {"sizeSlug":"large","metadata":{"name":"rounded mb-0"},"className":"rounded mb-0 w-100 hero-section-img"} -->
                    <figure class="wp-block-image size-large w-100 rounded mb-0 hero-section-img"">
                        <img src=" https://dummyimage.com/1200x900/6c757d/ffffff" alt="" />
                    </figure>
                    <!-- /wp:image -->

                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"col-lg-6"},"className":"col-lg-6","layout":{"type":"default"}} -->
            <div class="wp-block-group col-lg-6">
                <!-- wp:group {"metadata":{"name":"h-100 d-flex align-items-center"},"className":"h-100 d-flex align-items-center","layout":{"type":"default"}} -->
                <div class="wp-block-group h-100 d-flex align-items-center">
                    <!-- wp:group {"metadata":{"name":"text-block"},"className":"text-block p-3","layout":{"type":"default"}} -->
                    <div class="wp-block-group text-block p-3">
                        <!-- wp:heading {"metadata":{"name":"display-5 fw-bold"},"className":"display-5 fw-bold"} -->
                        <h2 class="wp-block-heading display-5 fw-bold mb-2">
                            Section with <span class="text-primary">hero</span>
                        </h2> <!-- /wp:heading -->

                        <!-- wp:paragraph {"metadata":{"name":"lead"},"className":"lead"} -->
                        <p class="lead"> This section features a two-column hero with a right-aligned image
                            and CTA buttons wrapped in a container. Use it on the page-blank
                            template.</p>
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

                        <!-- wp:paragraph {"metadata":{"name":"mb-0"},"className":"mb-0"} -->
                        <p class="mb-0"><a class="btn btn-lg btn-secondary" href="#">Button</a> <a
                                class="btn btn-lg btn-outline-secondary" href="#">Button</a></p>
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