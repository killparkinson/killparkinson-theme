<?php
/**
 * Breadcrumbs template
 *
 * @package Bootscore
 * @version 6.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

<nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'%3E%3Cpolyline points='9 18 15 12 9 6'%3E%3C/polyline%3E%3C/svg%3E&quot;);">
	<ol class="breadcrumb py-3">
		<!-- Home -->
		<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>

		<?php if ( is_home() || is_front_page() ) : ?>
			<!-- Nothing more -->

			<?php
		elseif ( is_single() ) :
			$current_post_type = get_post_type();
			if ( 'post' === $current_post_type ) :
				$category = get_the_category();
				if ( $category ) :
					$cat_link = get_category_link( $category[0]->term_id );
					?>
					<li class="breadcrumb-item"><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $category[0]->name ); ?></a></li>
					<?php
				endif;
			else :
				$post_type_obj = get_post_type_object( $current_post_type );
				if ( $post_type_obj && ! empty( $post_type_obj->has_archive ) ) :
					?>
					<li class="breadcrumb-item"><a href="<?php echo esc_url( get_post_type_archive_link( $current_post_type ) ); ?>"><?php echo esc_html( $post_type_obj->labels->singular_name ); ?></a></li>
					<?php
				endif;
			endif;
			?>
			<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( get_the_title() ); ?></li>

			<?php
		elseif ( is_page() ) :
			global $post;
			if ( $post->post_parent ) :
				$parents = array_reverse( get_post_ancestors( $post->ID ) );
				foreach ( $parents as $parent ) :
					?>
					<li class="breadcrumb-item"><a href="<?php echo esc_url( get_permalink( $parent ) ); ?>"><?php echo esc_html( get_the_title( $parent ) ); ?></a></li>
					<?php
				endforeach;
			endif;
			?>
			<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( get_the_title() ); ?></li>

		<?php elseif ( is_category() || is_tax() ) : ?>
			<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( single_term_title( '', false ) ); ?></li>

		<?php elseif ( is_tag() ) : ?>
			<li class="breadcrumb-item active" aria-current="page">Tag: <?php echo esc_html( single_term_title( '', false ) ); ?></li>

		<?php elseif ( is_author() ) : ?>
			<li class="breadcrumb-item active" aria-current="page">Author: <?php echo esc_html( get_the_author() ); ?></li>

			<?php
		elseif ( is_date() ) :
			if ( is_day() ) :
				?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( get_the_date() ); ?></li>
			<?php elseif ( is_month() ) : ?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( get_the_date( 'F Y' ) ); ?></li>
			<?php elseif ( is_year() ) : ?>
				<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( get_the_date( 'Y' ) ); ?></li>
				<?php
			endif;

		elseif ( is_search() ) :
			?>
			<li class="breadcrumb-item active" aria-current="page">Search results for: <?php echo esc_html( get_search_query() ); ?></li>

		<?php elseif ( is_404() ) : ?>
			<li class="breadcrumb-item active" aria-current="page">404 Not Found</li>

		<?php endif; ?>
	</ol>
</nav>
