<?php
/**
 * Title: Blog posts
 * Slug: bootscore-child/s-all-posts
 * Categories: bootscore
 *
 * @package Bootscore Child
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- wp:query {"query":{"perPage":6,"pages":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"layout":{"type":"default"}, "className":"hide-wp-block-classes"} -->
<div class="wp-block-query hide-wp-block-classes alignwide mb-3">

	<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->

	<!-- wp:group {"className":" hide-wp-block-classes h-100 d-flex flex-column position-relative border-0","layout":{"type":"default"}} -->
	<div class="wp-block-group h-100 d-flex flex-column position-relative">

		<!-- wp:post-featured-image {"className":"mb-3 rounded","aspectRatio":"4/3"} /-->

		<!-- wp:group {"className":"d-flex gap-2 align-items-center mb-2 flex-wrap","layout":{"type":"default"}} -->
		<div class="wp-block-group d-flex gap-2 align-items-center mb-2 flex-wrap">
		<!-- wp:post-terms { "term": "category" } /-->

		<!-- wp:post-time-to-read /-->
		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><?php echo esc_html__( 'Read', 'bootscore-child' ); ?></p>
		<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:post-title {"className":"h5 mb-2"} /-->

		<!-- wp:post-excerpt {"showMoreOnNewLine":true,"className":"flex-grow-1 d-flex flex-column justify-content-between","showMoreOnNewLineClassName":"mb-0","moreText":"<?php echo esc_html__( 'Read more', 'bootscore-child' ); ?>","moreTextSuffix":"<svg class=\"icon\"><use href=\"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/fonts/icon.svg#chevron-right\" aria-hidden=\"true\"></use></svg>","moreTextClassName":"stretched-link icon-link","excerptLength":80} /-->

	</div>
	<!-- /wp:group -->

	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"className":"hide-wp-block-classes pagination justify-content-center mt-4"} -->
		<!-- wp:query-pagination-previous {"label":"Previous","className":"prev-next icon-start-chevron-left"} /-->
		<!-- wp:query-pagination-numbers {"className":"d-flex"} /-->
		<!-- wp:query-pagination-next {"label":"Next", "className":"prev-next icon-end-chevron-right"} /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
