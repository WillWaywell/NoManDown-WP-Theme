<?php
/*
Template Name: Edit Profile
*/

 get_header();?>
<section id="content">
	<header></header>
		<div class="content">
			<header class="entry-header">
				<h1 class="entry-title"><a href=""><?php the_title(); ?></a></h1>
			</header>
			<?php the_post(); ?>
			<?php the_content(); ?>
		</div>
	<footer></footer>
</section>

<?php get_footer(); ?>