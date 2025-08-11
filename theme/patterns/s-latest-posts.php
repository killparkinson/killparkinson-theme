<?php
/**
 * Title: Latest posts
 * Slug: bootscore-child/s-latest-posts
 * Categories: bootscore
 * Block Types: core/query
 *
 * @package Bootscore Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- wp:group {"tagName":"section","metadata":{"name":"s - Latest posts","categories":["bootscore"],"patternName":"bootscore-child/s-latest-posts"},"className":"wp-block-group py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="wp-block-group py-5 hide-wp-block-classes">
	<!-- wp:heading {
		"metadata": {"name": "display-5 fw-bold colour-last-word"},
		"className": "display-5 fw-bold colour-last-word"
	} -->
	<h2 class="wp-block-heading display-5 fw-bold colour-last-word">
		Latest <span class="text-primary">insights</span>
	</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>Explore our latest articles on Parkinson's disease</p>
	<!-- /wp:paragraph -->
	<!-- wp:query {
		"query": {
			"perPage": 4,
			"pages": 0,
			"offset": 0,
			"postType": "post",
			"order": "desc",
			"orderBy": "date",
			"author": "",
			"search": "",
			"exclude": [],
			"sticky": "",
			"inherit": false
		},
		"layout": { "type": "default" }
		} -->
	<div class="wp-block-query alignwide mb-3">
		<!-- wp:post-template {
		"style": {
			"spacing": {
			"blockGap": "var:preset|spacing|40"
			}
		},
		"layout": {
			"type": "grid",
			"columnCount": 2
		}
		} -->
		<!-- wp:group {
			"metadata": { "name": "row position-relative" },
			"className": "row position-relative",
			"layout": { "type": "default" }
		} -->
		<div class="wp-block-group row position-relative">
			<!-- wp:group {
			"metadata": {
				"name": "col-lg-6"
			},
			"className": "col-lg-6",
			"layout": {
				"type": "default"
			}
			} -->
			<div class="wp-block-group col-lg-6">
			<!-- wp:post-featured-image {
				"className": "rounded",
				"aspectRatio": "4/3"
			} /-->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {
			"metadata": { "name": "col-lg-6 d-flex flex-column" },
			"className": "col-lg-6 d-flex flex-column",
			"layout": { "type": "default" }
			} -->
			<div class="wp-block-group col-lg-6 d-flex flex-column">
			<!-- wp:group {
				"metadata": { "name": "d-flex gap-2 align-items-center position-relative z-2 mb-2 flex-wrap" },
				"className": "d-flex gap-2 align-items-center position-relative z-2 mb-2 flex-wrap",
				"layout": { "type": "default" }
			} -->
			<div class="wp-block-group d-flex gap-2 position-relative z-2 mb-2 flex-wrap">
				<!-- wp:post-terms { "term": "category" } /-->
				<!-- wp:group { 
					"className": "d-flex gap-1",
					"layout": { "type": "default" }
				} -->
				<div class="wp-block-group d-flex gap-1">
				<!-- wp:post-time-to-read /-->
				<!-- wp:paragraph {"metadata":{"name":"mb-0"},"className":"mb-0"} -->
				<p class="mb-0">
					<?php echo esc_html_e( 'Read', 'bootscore-child' ); ?>
				</p>
				<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- wp:post-title { "className": "h5" } /-->
			<!-- wp:post-excerpt {
				"showMoreOnNewLine": true,
				"className": "flex-grow-1 d-flex flex-column justify-content-between",
				"showMoreOnNewLineClassName": "mb-0",
				"moreText": "<?php esc_html_e( 'Read more', 'bootscore-child' ); ?>",
				"moreTextSuffix": "<i class=\"ms-2 fa-solid fa-chevron-right\"></i>",
				"moreTextClassName": "stretched-link",
				"excerptLength": 50
			} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

	<!-- wp:buttons {"className":"text-end hide-wp-block-classes","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
	<div class="wp-block-buttons text-end hide-wp-block-classes">
		<!-- wp:button -->
		<div class="wp-block-button">
			<a class="wp-block-button__link wp-element-button btn btn-secondary icon-end" href="/blog">
				View all
				<svg class="icon">
					<use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-right" />
				</svg>
			</a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
