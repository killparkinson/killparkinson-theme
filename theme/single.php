<?php
/**
 * Template Post Type: post
 *
 * @package Bootscore
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="content" class="site-content <?php echo esc_attr( apply_filters( 'bootscore/class/container', 'container', 'single-sidebar-none' ) ); ?> <?php echo esc_attr( apply_filters( 'bootscore/class/content/spacer', 'pt-3 pb-5', 'single-sidebar-none' ) ); ?>">
	<div id="primary" class="content-area">
	
	<?php do_action( 'bootscore_after_primary_open', 'single-sidebar-none' ); ?>

	<?php the_breadcrumb(); ?>

	<main id="main" class="site-main">

		<?php the_post(); ?>
		<header class="entry-header mb-4">
		<div class="d-flex justify-content-between align">
		<div class="d-flex align-items-center gap-2">
			<?php bootscore_category_badge(); ?>
			<div class="d-flex gap-2 align-items-center">
			<?php echo do_blocks( '<!-- wp:post-time-to-read {"className": "mb-3"} /-->' ); ?>
			<p>
			<?php echo esc_html__( ' read', 'bootscore-child' ); ?>
		</p>
			</div>

		</div>
		<span class="post-date d-md-block d-none"><?php echo get_the_date( 'j M Y' ); ?></span>
		</div>
		
		<?php do_action( 'bootscore_before_title', 'single-sidebar-none' ); ?>
		<?php the_title( '<h1 class="entry-title display-5 fw-bold mb-3">', '</h1>' ); ?>
		<?php do_action( 'bootscore_after_title', 'single-sidebar-none' ); ?>

		<div class="d-flex flex-md-row flex-wrap gap-2 justify-content-between align-items-md-center">
		<div class="author-box d-flex align-items-center mb-2 mb-md-0">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 48, '', '', [ 'class' => 'rounded-circle me-2 bg-light author-avatar' ] ); ?>
		<h6 class="mb-1">
			<?php echo esc_attr( get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) ); ?>
		</h6>     
		</div>
			<span class="post-date mt-1 d-md-none"><?php echo get_the_date( 'j M Y' ); ?></span>
			<?php echo do_shortcode( '[addtoany]' ); ?>
		</div>
	<div class="entry-featured-image my-4">
			<?php bootscore_post_thumbnail( 'large' ); ?>
		</div>
		</header>

		<div class="entry-entry-content w-md-75 mx-auto">
		<?php the_content(); ?>
		</div>

		<?php do_action( 'bootscore_before_entry_footer', 'single-sidebar-none' ); ?>

		<footer class="entry-footer mt-5 entry-content w-md-75 mx-auto">
		<div class="border-bottom pb-2">
			<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center pt-4 mt-5">
		<div class="author-box d-flex align-items-center">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 48, '', '', [ 'class' => 'rounded-circle me-3 bg-light' ] ); ?>
		<div>
		<?php echo esc_attr( get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) ); ?>
			<p class="small text-muted mb-0"><?php the_author_meta( 'email' ); ?></p>
			</div>
		</div>
<div class="pt-4 pt-md-0">
	<p class="fw-semibold mb-1">Share this post</p>
		<?php
		echo do_shortcode( '[addtoany]' );
		?>
</div>

			</div>
		<div class="mt-4 mb-3">
			<?php bootscore_tags(); ?>
		</div>
			</div>

		<?php comments_template(); ?>
		</footer>

	</main>

	</div>
</div>

<?php get_footer(); ?>
