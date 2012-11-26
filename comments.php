<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to nmd_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<div id="comments">
		
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
	</div>
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">Comments</h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'nmd' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
			<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ul class="comments">
			<?php wp_list_comments( array( 'callback' => 'nmd_comment' ) ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'nmd' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
			<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'nmd' ); ?></p>
	<?php endif; ?>

	
		<?php 
		
		
		
		
		$comments_args = array(
        'title_reply'=>'Leave a Comment',
        'logged_in_as'=>'',
        'comment_notes_after' => '',);

comment_form($comments_args);
		
		
		







		?>
</div>
