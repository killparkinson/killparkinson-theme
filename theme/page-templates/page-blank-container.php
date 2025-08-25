<?php

/**
 * Template Name: Custom Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="content" class="site-content <?php echo apply_filters( 'bootscore/class/container', 'container', 'page-blank-with-container' ); ?>">
	<div id="primary" class="content-area">

	<main id="main" class="site-main">

		<div class="entry-content">
		<?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>

		<?php the_post(); ?>
		<?php the_content(); ?>
		</div>

	</main>

	</div>
</div>

<?php
get_footer();
