<?php

/**
 * Title: Kip - Help pages
 * Slug: bootscore-child/help-pages-loop
 * Categories: bootscore
 * Block Types: core/query
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Example page IDs
$page_ids = [168,171,174,177];

// Fetch pages
$pages = get_pages(
    [
        'include'     => $page_ids,
        'sort_column' => 'post__in', 
    ]
);
?>

<!-- wp:group {"tagName":"section","className":"wp-block-group py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="wp-block-group py-5 hide-wp-block-classes">
    <!-- wp:heading {"className":"display-5 fw-bold colour-last-word"} -->
    <h2 class="wp-block-heading display-5 fw-bold colour-last-word">How can you <span class="text-primary">help</span></h2>
    <!-- /wp:heading -->

    <?php if ($pages) : ?>
        <!-- wp:group {"tagName":"section","className":"wp-block-group py-5","layout":{"type":"default"}} -->
        <div class="wp-block-group py-5">

            <!-- wp:columns -->
            <div class="wp-block-columns">
                <?php foreach ($pages as $page) : ?>
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:image {sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full rounded">
                            <img
                                src="<?php echo esc_url(get_the_post_thumbnail_url($page->ID, 'medium')); ?>" alt="" />
                        </figure>
                        <!-- /wp:image -->
                        <!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading"><?php echo esc_html(get_the_title($page->ID)); ?></h4>
                        <!-- /wp:heading -->
                        <!-- wp:paragraph -->
                        <p><?php echo get_the_excerpt($page->ID); ?>
                        </p>
                        <!-- /wp:paragraph -->
                         
                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button -->
                            <div class="wp-block-button icon-end-chevron-right btn-mini-primary">
                                <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url(get_permalink($page->ID)); ?>">
                                    Read more
                                </a>
                            </div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:column -->
                <?php endforeach; ?>
            </div>
            <!-- /wp:columns -->

        </div>
        <!-- /wp:group -->
    <?php endif; ?>

</section>
<!-- /wp:group -->