<?php
/**
 * Title: Kip - Page Loop
 * Slug: bootscore-child/s-pages-loop
 * Categories: bootscore
 * Block Types: core/query
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Example page IDs.
$page_ids = [ 168, 171, 174, 177 ];

// Fetch pages.
$items = get_pages(
	[
		'include'     => $page_ids,
		'sort_column' => 'post__in',
	]
);
?>

<!-- wp:group {"tagName":"section","className":"py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="py-5 hide-wp-block-classes">
	<!-- wp:heading {"className":"display-5 fw-bold colour-last-word"} -->
	<h2 class="wp-block-heading display-5 fw-bold colour-last-word">
		How can you <span class="text-primary">help</span>
	</h2>
	<!-- /wp:heading -->

	<?php if ( $items ) : ?>
		<!-- wp:group {"className":"container py-5","layout":{"type":"default"}} -->
		<div class="container py-5">

			<!-- wp:columns -->
			<div class="wp-block-columns">
				<?php foreach ( $items as $item ) : ?>
					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full rounded">
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( $item->ID, 'medium' ) ); ?>" alt="" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"level":4} -->
						<h4 class="wp-block-heading"><?php echo esc_html( get_the_title( $item->ID ) ); ?></h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php echo esc_html( get_the_excerpt( $item->ID ) ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button -->
							<div class="wp-block-button icon-end-chevron-right btn-link">
								<a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>">
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