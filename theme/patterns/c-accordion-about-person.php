<?php
/**
 * Title: KiP - About Person - Three items
 * Slug: theme/c-accordion-about-person-three
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 *
 * @package Bootscore
 * @version 6.0.0
 */

$accordion_id = 'accordion_' . uniqid();
?>

<!-- wp:group {"className":"accordion accordion-details mb-3 hide-wp-block-classes"} -->
<div class="wp-block-group accordion accordion-details mb-3 hide-wp-block-classes">
	<!-- wp:group {"className":"amb-3 hide-wp-block-classes"} -->
	<div class="wp-block-group mb-3 hide-wp-block-classes">
		<!-- wp:details {"className":"accordion-item icon-start-logo","name":"<?php echo esc_attr( $accordion_id ); ?>"} -->
		<details class="wp-block-details accordion-item accordion-icon-primary icon-start-kp-logo" name="<?php echo esc_attr( $accordion_id ); ?>">
			<summary>About me</summary>
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

	<!-- wp:group {"className":"amb-3 hide-wp-block-classes"} -->
	<div class="wp-block-group mb-3 hide-wp-block-classes">
		<!-- wp:details {"className":"accordion-item icon-start-logo","name":"<?php echo esc_attr( $accordion_id ); ?>"} -->
		<details class="wp-block-details accordion-item accordion-icon-primary icon-start-kp-logo" name="<?php echo esc_attr( $accordion_id ); ?>">
			<summary>Parkinson’s & I</summary>
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

	<!-- wp:group {"className":"amb-3 hide-wp-block-classes"} -->
	<div class="wp-block-group mb-3 hide-wp-block-classes">
		<!-- wp:details {"className":"accordion-item icon-start-logo","name":"<?php echo esc_attr( $accordion_id ); ?>"} -->
		<details class="wp-block-details accordion-item accordion-icon-primary icon-start-kp-logo" name="<?php echo esc_attr( $accordion_id ); ?>">
			<summary>My role in Kill Parkinson</summary>
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
</div>
<!-- /wp:group -->
