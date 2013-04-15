<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header">
		<h1 class="post-title">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nmd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>	
		</h1>
	</header>
	<?php the_post(); ?>
	<footer class="post-meta">
		<address class="author">
		by <span><?php echo get_the_author() ?></span>
		</address>
		<time datetime="<?php echo get_the_date( "c" ); ?>" class="date"><?php echo get_the_date( "d.m.Y h:i" ); ?></time>
	</footer>
	
</article>
