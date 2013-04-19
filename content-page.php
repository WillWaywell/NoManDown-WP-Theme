<header id="page_header">
	<div id="page_bg_image" style="background-image: url('<?php echo get_post_custom_values( "header_bg", get_the_ID() )[0]; ?>')"></div>
	<hgroup>
		<h1 id="page_title">
			<noscript><?php the_title(); ?></noscript>
			<span id="title_console"></span>
			<span class="blinking">_</span>
		</h1>
	</hgroup>
</header>

<article id="page" <?php post_class(); ?>>
	<?php the_content(); ?>
</article>
