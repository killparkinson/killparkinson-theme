<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.2.0
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
get_header();
?>
<div id="content" class="site-content <?php echo apply_filters( 'bootscore/class/container', 'container', 'archive' ); ?> <?php echo apply_filters( 'bootscore/class/content/spacer', 'pt-4 pb-5', 'archive' ); ?>">
	<div id="primary" class="content-area">
	<?php do_action( 'bootscore_after_primary_open', 'archive' ); ?>
	<div class="row">
		<main id="main" class="site-main">
		<div class="entry-header">
			<?php do_action( 'bootscore_before_title', 'archive' ); ?>
			<?php the_archive_title( '<h1 class="colour-last-word ' . apply_filters( 'bootscore/class/entry/title', '', 'archive' ) . '">', '</h1>' ); ?>
			<?php do_action( 'bootscore_after_title', 'archive' ); ?>
			<?php the_archive_description( '<div class="archive-description ' . apply_filters( 'bootscore/class/entry/archive-description', '' ) . '">', '</div>' ); ?>
		</div>
		<?php do_action( 'bootscore_before_loop', 'archive' ); ?>
		<?php if ( have_posts() ) : ?>
			<?php do_action( 'bootscore_before_loop_item', 'archive' ); ?>
			<?php
			$read_more = esc_html__( 'Read more', 'bootscore-child' );
			$read_text = esc_html__( 'Read', 'bootscore-child' );
			?>
			<div class="my-5">
		<?php
echo do_blocks(
  '
<!-- wp:query {"query":{"inherit":true},"layout":{"type":"grid","columnCount":3}} -->
  <!-- wp:post-template -->
    <!-- wp:group {"className":"card h-100 d-flex flex-column position-relative"} -->
      <div class="card border-0 h-100 d-flex flex-column position-relative">
        <!-- wp:post-featured-image {"className":"card-img-top mb-3","aspectRatio":"4/3"} /-->
        <div class="d-flex gap-2 align-items-center mb-2 flex-wrap">
          <!-- wp:post-terms {"term":"category"} /-->
          <!-- wp:post-time-to-read /-->
          <p class="mb-0">' . $read_text . '</p>
        </div>
        <!-- wp:post-title {"className":"h5 mb-2"} /-->
        <!-- wp:post-excerpt {"showMoreOnNewLine":true,"className":"flex-grow-1 d-flex flex-column justify-content-between","moreText":"' . $read_more . '","moreTextSuffix":"<i class=\"ms-2 fa-solid fa-chevron-right\"></i>","moreTextClassName":"stretched-link","excerptLength":50} /-->
      </div>
    <!-- /wp:group -->
  <!-- /wp:post-template -->

  <!-- wp:query-pagination {"className":"hide-wp-block-classes pagination justify-content-center mt-4"} -->
    <!-- wp:query-pagination-previous {"label":"Previous","className":"prev-next icon-start-chevron-left"} /-->
    <!-- wp:query-pagination-numbers {"className":"d-flex"} /-->
    <!-- wp:query-pagination-next {"label":"Next","className":"prev-next icon-end-chevron-right"} /-->
  <!-- /wp:query-pagination -->
<!-- /wp:query -->
'
);
?>

			</div>
			<?php do_action( 'bootscore_after_loop_item', 'archive' ); ?>
		<?php endif; ?>
		<?php do_action( 'bootscore_after_loop', 'archive' ); ?>
		</main>
	</div>
	</div>
</div>
<?php
get_footer();

