<?php
/**
 * Title: KIP - Hero image right
 * Slug:  theme/s-hero-img-right
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 * 
 * @package Bootscore
 * @version 6.2.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>
<!-- wp:group {"tagName":"section","metadata":{"name":"s - Hero image right - bg-body-tertiary py-5 hide-wp-block-classes","categories":["bootscore"],"patternName":"bootscore/section-hero-img-right"},"className":"bg-body-tertiary py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="wp-block-group py-5 hide-wp-block-classes">
  <!-- wp:group {"metadata":{"name":"container h-100"},"className":"container h-100","layout":{"type":"default"}} -->
  <div class="wp-block-group container h-100">
    <!-- wp:group {"metadata":{"name":"c - Hero image right - row h-100 hide-wp-block-classes banner-image-text","categories":["bootscore"],"patternName":"bootscore/hero-img-right"},"className":"row h-100 hide-wp-block-classes","layout":{"type":"default"}} -->
    <div class="wp-block-group row align-items-stretch hide-wp-block-classes banner-image-text">
      <!-- wp:group {"metadata":{"name":"col-lg-6 mb-3 mb-lg-0 order-lg-2"},"className":"col-lg-6 mb-3 mb-lg-0 order-lg-2","layout":{"type":"default"}} -->
      <div class="wp-block-group col-lg-6 mb-3 mb-lg-0 order-lg-2">
        <!-- wp:group {"metadata":{"name":"h-100 d-flex align-items-center"},"className":"h-100 d-flex align-items-center","layout":{"type":"default"}} -->
        <div class="wp-block-group h-100 d-flex align-items-stretch">
          <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"w-100 rounded mb-0 h-100 w-100"} -->
          <figure class="wp-block-image size-large w-100 rounded mb-0 hero-image-right">
            <img src="https://dummyimage.com/1200x900/6c757d/ffffff" alt="" class="img-fluid" />
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
          <!-- wp:group {"metadata":{"name":"text-block"},"className":"text-block","layout":{"type":"default"}} -->
          <div class="wp-block-group text-block">
            <!-- wp:heading {"className":"display-5 fw-bold mb-2"} -->
            <h2 class="wp-block-heading display-5 fw-bold mb-2">
              Section with <span class="text-primary">hero</span>
            </h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"metadata":{"name":""},"className":"lead"} -->
            <p class="lead">
              This section features a two-column hero with a right-aligned image
              and CTA buttons wrapped in a container. Use it on the page-blank
              template.
            </p>
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
            <div class="mb-0 d-flex flex-row gap-2">
              <button class="btn btn-lg btn-secondary" href="#">
                Primary Button
              </button>
              <button class="btn btn-lg btn-outline-secondary d-flex flex-row align-items-center" href="#">
                <span>Outline Secondary</span><i class="fa-solid fa-chevron-right ps-1"></i>
              </button>
            </div>
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