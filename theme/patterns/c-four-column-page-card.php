<?php
/**
 * Title: KiP - Four Column Page Card
 * Slug: themeslug/c-four-column-page-card
 * Categories: bootscore
 * https://developer.wordpress.org/themes/features/block-patterns/
 *
 * @package Bootscore
 * @version 6.0.0
 */

$items = [
	[
		'image'     => get_theme_file_uri( 'assets/img/default.jpg' ),
		'title'     => 'Promote our initiative',
		'text'      => 'Spread the word by following us and sharing our mission with your friends.',
		'link'      => '/promote-our-initiative',
		'link_text' => 'Follow us',
	],
	[
		'image'     => get_theme_file_uri( 'assets/img/default.jpg' ),
		'title'     => 'Collaborate',
		'text'      => 'Partner with us as a doctor, therapist, medical clinic, journalist, etc.',
		'link'      => '/collaborate',
		'link_text' => 'Collaborate',
	],
	[
		'image'     => get_theme_file_uri( 'assets/img/default.jpg' ),
		'title'     => 'Join our team',
		'text'      => 'Become a part of our amazing team and support our cause.',
		'link'      => '/join-our-team',
		'link_text' => 'Join us',
	],
	[
		'image'     => get_theme_file_uri( 'assets/img/default.jpg' ),
		'title'     => 'Donate',
		'text'      => 'Contribute financially to support our research and operations.',
		'link'      => '/donate',
		'link_text' => 'Donate',
	],
];
?>



<!-- wp:group {"tagName":"section","className":"py-5 hide-wp-block-classes"} -->
<section class="wp-block-group py-5 hide-wp-block-classes">
	<!-- wp:heading {"className":"display-5 fw-bold colour-last-word"} -->
	<h2 class="wp-block-heading display-5 fw-bold colour-last-word">
		How can you <span class="text-primary">help</span>
	</h2>
	<!-- /wp:heading -->

	<?php if ( $items ) : ?>
		<!-- wp:group {"className":"container py-5","layout":{"type":"default"}} -->
		<div class="wp-block-group container py-5">

			<!-- wp:columns -->
			<div class="wp-block-columns">
				<?php foreach ( $items as $item ) : ?>
					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full rounded">
							<img src="https://dummyimage.com/300x200/6c757d/ffffff" alt="" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"level":4, "className":"fw-bold"} -->
						<h4 class="wp-block-heading fw-bold"><?php echo esc_html( $item['title'] ); ?></h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p><?php echo esc_html( $item['text'] ); ?></p>
						<!-- /wp:paragraph -->
						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button {"className": "icon-end-chevron-right"} -->
							<div class="wp-block-button icon-end-chevron-right fw-bold btn-link">
								<a class="wp-block-button__link wp-element-button" href="<?php echo esc_html( $item['link'] ); ?> "><?php echo esc_html( $item['link_text'] ); ?></a>
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