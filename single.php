<?php get_header(); ?>

<section id="site_content">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

		<?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>