<?php get_header(); ?>

<section id="content" class="wrap">
	<section id="articles" class="left">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>
			
			<?php nmd_post_links(); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<h1 class="entry-title">Nothing Found</h1>
				<div class="entry-content">
					<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
					<?php get_search_form(); ?>
					<br />
				</div>
			</article>

		<?php endif; ?>
	</section>	
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</section>

<?php get_footer(); ?>