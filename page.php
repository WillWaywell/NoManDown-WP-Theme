<?php get_header(); ?>

<section id="content" class="wrap">
	<section id="articles">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="post-header">
					<h2 class="post-title"><?php _e( 'Nothing Found', 'nmd' ); ?></h2>
				</header>

				<div class="post-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'nmd' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>

		<?php endif; ?>
	</section>	
</section>

<?php get_footer(); ?>