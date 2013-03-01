<?php get_header(); ?>

<section id="site_content">

		<header id="page_header">
			<h1>
				News and <strong>Intel</strong>
				<span class="blinking">_</span>
			</h1>
		</header>
		
		<div id="news_wrapper">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>
		
		<?php nmd_post_links(); ?>
		
		</div>

</section>

<?php get_footer(); ?>