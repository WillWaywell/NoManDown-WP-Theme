<div id="comments">
	
<?php if ( post_password_required() ) : ?>
	<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
</div>
<?php return; endif; ?>

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

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'nmd' ); ?></p>
<?php endif; ?>

</div>

<?php
$comments_args = array(
'title_reply'=>'Leave a Comment',
'logged_in_as'=>'',
'comment_notes_after' => '',);

comment_form($comments_args);
?>
