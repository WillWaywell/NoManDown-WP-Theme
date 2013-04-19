<header id="page_header">
	<div id="page_bg_image" style="background-image: url('<?php echo get_post_custom_values( "header_bg", get_the_ID() )[0]; ?>')"></div>
	<hgroup>
		<h1 id="page_title">
			<noscript><?php the_title(); ?></noscript>
			<span id="title_console"></span>
			<span class="blinking">_</span>
		</h1>
		<h2 class="date">
			<time datetime="<?php echo get_the_date( "c" ); ?>">reported on <?php echo get_the_date( "l jS F Y" ); ?></time>
			<address class="author">
				by <span><?php echo get_the_author() ?></span>
			</address>
		</h2>
	</hgroup>
</header>

<article id="post" <?php post_class(); ?>>

	<div id="post_content">
	
		<div id="post_top_links">
			<a href="http://www.facebook.com/sharer.php?u=<?php echo get_page_link( get_the_ID() ); ?>">FB Share</a>
			<a href="http://twitter.com/share?text=<?php echo get_page_link( get_the_ID() ); ?>&url=<?php echo get_page_link( get_the_ID() ); ?>">Twitter Share</a>
			<a id="back_btn" href="<?php bloginfo('url'); ?>/intel">LATEST INTEL</a>
		</div>
	
		<div id="post_text_wrapper">
			<?php the_content(); ?>
		</div>

	</div>
	
</article>
