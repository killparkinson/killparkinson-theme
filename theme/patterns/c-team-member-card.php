<?php
/**
 * Title: KiP - Team Member Card
 * Slug: theme/c-team-member-card
 * Categories: bootscore
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$accordion_id = 'accordion_' . uniqid();
?>

<!-- wp:group {"metadata":{"name":"l - Container - container hide-wp-block-classes",
							"categories":["bootscore"],"patternName":"bootscore/l.container"},
							"className":"container hide-wp-block-classes col-md-8 offset-md-2",
							"layout":{"type":"default"}} -->
<div class="wp-block-group col-md-8 offset-md-2 hide-wp-block-classes">

<!-- wp:group {"metadata":{"categories":["bootscore"],"patternName":"theme/c-team-member-card","name":"KiP -  Team Member Card"},"className":"d-flex flex-wrap align-items-center gap-5","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-group d-flex flex-wrap align-items-center gap-5 mb-4"><!-- wp:image {"width":"250px","sizeSlug":"full","linkDestination":"none","className":"size-large rounded-circle"} -->
<figure class="wp-block-image size-full is-resized size-large rounded-circle"><img src="https://dummyimage.com/250x250/6c757d/ffffff" alt="" style="width:250px"/></figure>
<!-- /wp:image -->



<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":"mb-1"} -->
<h4 class="wp-block-heading mb-1">Team Member</h4>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"mb-2 lead"} -->
<p class="mb-2 lead">Role</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:navigation-link {"label":"Linkedin","opensInNewTab":true,"url":"https://www.linkedin.com/in/","className":"icon-only-linkedin border-circle border p-2 border-secondary rounded-circle text-secondary"} /-->

<!-- wp:navigation-link {"label":"Email","opensInNewTab":true,"url":"mailto:","className":"icon-only-mail border-circle border p-2 border-secondary rounded-circle text-secondary"} /-->

<!-- wp:navigation-link {"label":"Website","opensInNewTab":true,"url":"/","kind":"custom","className":"icon-only-globe border-circle border p-2 border-secondary rounded-circle text-secondary"} /--></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

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

</div>
<!-- /wp:group -->

