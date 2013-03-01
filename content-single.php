<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-thumb">
		<?php if ( has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
			?>
			<img src="<?php echo $thumbnail['0']; ?>" alt />
			</a>
		<?php endif; ?>
	</div>

	<div class="post-margin">
		<header class="post-header">
			<h1 class="post-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nmd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>	
			</h1>
		</header>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		<footer class="post-meta">
			<address class="author">
			by <span><?php echo get_the_author() ?></span>
			</address>
			<time datetime="<?php echo get_the_date( "c" ); ?>" class="date"><?php echo get_the_date( "d.m.Y h:i" ); ?></time>
		</footer>
	</div>
	
</article>
