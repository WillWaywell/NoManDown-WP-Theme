<?php get_header(); ?>

<section id="content" class="wrap">
	<section id="articles" class="left">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			

		<?php endwhile; // end of the loop. ?>

	</section>	

</section>

<?php get_footer(); ?>