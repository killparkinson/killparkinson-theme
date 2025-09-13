<?php
/**
 * Title: KiP - Accordion - single item
 * Slug: theme/c-accordion-single-item
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 *
 * @package Bootscore
 * @version 6.0.0
 */

$accordion_id = uniqid( 'accordion_' );
?>

<!-- wp:group {"className":"accordion hide-wp-block-classes"} -->
<div class="wp-block-group accordion accordion-details hide-wp-block-classes">
	<!-- wp:details {"summary":"Accordion item 1", "showContent": true, className="accordion-item", "name": "<?php echo esc_attr( $accordion_id ); ?>"} -->
	<details class="wp-block-details accordion-item" name="<?php echo esc_attr( $accordion_id ); ?>">
		<summary>Accordion title</summary>
		<!-- wp:group {"className":"accordion-collapse hide-wp-block-classes"} -->
		<div class="wp-block-group accordion-collapse hide-wp-block-classes">
			<!-- wp:group {"className":"accordion-inner hide-wp-block-classes"} -->
			<div class="wp-block-group accordion-inner hide-wp-block-classes">
				<!-- wp:group {"className":"accordion-body hide-wp-block-classes"} -->
				<div class="wp-block-group accordion-body hide-wp-block-classes">
					<!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nulla possimus obcaecati hic cumque amet totam, labore placeat. Laudantium consequatur expedita nihil ipsam at porro!</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</details>
	<!-- /wp:details -->
</div>
<!-- /wp:group -->
