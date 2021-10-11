<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package essentials
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area pix-mb-40">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h5 class="comments-title text-heading-default text-center font-weight-bold my-3">
			<?php
			$essentials_comment_count = get_comments_number();
			if ( '1' === $essentials_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_attr__( '1 Comment', 'essentials' )
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments', '%1$s Comments', $essentials_comment_count, 'comments title', 'essentials' ) ),
					number_format_i18n( $essentials_comment_count )
				);
			}
			?>
		</h5><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="comment-list">
			<?php
			$args = array(
				'style'             => 'div',
				'callback'          => 'essentials_comment_template',
				'type'              => 'all',
				'reply_text'        => esc_attr__( 'Reply', 'essentials' ),
				'avatar_size'		=> 80
			);
			wp_list_comments($args);
			?>
		</div><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'essentials' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
