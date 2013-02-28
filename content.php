<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php if ( is_sticky() ) : ?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nmd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php the_title(); ?></a>
			<time class="post-date"><?php echo get_the_date(); ?></time>
		</h2>
		<?php else : ?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nmd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php the_title(); ?></a>
			<time class="post-date"><?php echo get_the_date(); ?></time>
		</h2>
		<?php endif; ?>
	</header>
	<div class="post-inner">
		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="post-summary">
			<?php the_excerpt(); ?>
		</div>
		<?php else : ?>
		<div class="post-content">
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'nmd' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<footer class="post-meta">
			<?php $show_sep = false; ?>
			<span class="post-author">Posted by <a href="<?php echo site_url('/forums/users/'.get_the_author()) ?>"><?php echo get_the_author() ?></a></span>
		</footer>
		<?php endif; // End if 'post' == get_post_type() ?>
	</div>
</article>
