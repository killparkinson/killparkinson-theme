<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area border-t">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>

	<h2 class="comments-title mt-3 mb-2">
		<?php
		_e( 'Comments', 'bootscore' );
		?>
	</h2><!-- .comments-title -->



		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
			?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bootscore' ); ?></h2>
		<div class="nav-links">

			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bootscore' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bootscore' ) ); ?></div>

		</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
			<?php
	endif; // Check for comment navigation.
		?>

	<ul class="comment-list">
		<?php
		wp_list_comments( array( 'callback' => 'kip_custom_comment' ) );
		?>
	</ul><!-- .comment-list -->

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
			?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bootscore' ); ?></h2>
		<div class="nav-links pagination justify-content-center">

			<div class="nav-previous page-item"><?php previous_comments_link( esc_html__( 'Older Comments', 'bootscore' ) ); ?></div>
			<div class="nav-next page-item"><?php next_comments_link( esc_html__( 'Newer Comments', 'bootscore' ) ); ?></div>

		</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
			<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

	<p class="no-comments alert alert-info"><?php esc_html_e( 'Comments are closed.', 'bootscore' ); ?></p>
		<?php
	endif;
	?>

<?php
comment_form(
    array(
        'id_submit'         => 'commentsubmit',
        'title_reply'       => __( 'Add a comment', 'bootscore' ),
        'title_reply_to'    => __( 'Leave a Comment to %s', 'bootscore' ),
        'cancel_reply_link' => __( 'Cancel', 'bootscore' ),
        'label_submit'      => __( 'Post Comment', 'bootscore' ),
        'class_submit'      => 'btn btn-secondary',

        // Custom Bootstrap fields
        'fields'            => apply_filters(
            'comment_form_default_fields',
            array(
                'author' =>
                    '<div class="row order-3">
                        <div class="col-md-6 mb-3">
                            <label for="author">' . __( 'Name', 'bootscore' ) . ' <span class="text-danger">*</span></label>
                            <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
                        </div>',

                'email'  =>
                        '<div class="col-md-6 mb-3">
                            <label for="email">' . __( 'Email', 'bootscore' ) . ' <span class="text-danger">*</span></label>
                            <input id="email" class="form-control" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" />
                        </div>
                    </div>', // close row
            )
        ),
				        // Comment textarea field
        'comment_field'     => '
            <div class="mb-3">
                <label for="comment">' . __( 'Comment', 'bootscore' ) . ' <span class="text-danger">*</span></label>
                <textarea id="comment" class="form-control" name="comment" rows="5" aria-required="true"></textarea>
            </div>
        ',

    )
);
?>


</div><!-- #comments -->
