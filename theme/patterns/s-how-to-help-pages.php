<?php
/**
 * Title: KiP - How to help
 * Slug: bootscore-child/s-how-to-help-pages
 * Categories: bootscore
 * Block Types: core/query
 *
 * @package Bootscore Child
 */

defined('ABSPATH') || exit;
?>

<!-- wp:group {"tagName":"section","className":"wp-block-group py-5 hide-wp-block-classes","layout":{"type":"default"}} -->
<section class="wp-block-group py-5 hide-wp-block-classes">

	<!-- wp:heading {"className":"display-5 fw-bold colour-last-word"} -->
	<h2 class="wp-block-heading display-5 fw-bold colour-last-word">
		How can you <span class="text-primary">help</span>
	</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"query":{"perPage":4,"postType":"page","order":"desc","inherit":false},"layout":{"type":"default"}} -->
	<div class="wp-block-query mb-3">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->

		<!-- wp:group -->
		<div class="wp-block-group">
			<!-- wp:post-featured-image {"aspectRatio":"4/3","className":"rounded"} /-->
			<!-- wp:post-title {"className":"h5"} /-->
			<!-- wp:post-excerpt {"excerptLength":999} /-->
			<!-- wp:read-more {"content":"Read more"} /-->
		</div>
		<!-- /wp:group -->

		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->

</section>
<!-- /wp:group -->