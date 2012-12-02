<?php
/*
Template Name: NMD - Servers
*/
?>

<?php $nmd_dayz = query_server("94.76.229.69", 2302); ?>
<?php $nmd_ace = query_server("94.76.229.69", 2316); ?>
<?php //$nmd_ace = query_server("198.144.179.202", 2302); ?>

<?php get_header(); ?>

<section id="content" class="wrap">
	<section id="articles" class="left">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="post-header">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nmd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<?php the_title(); ?></a>
				</h2>
			</header>
			<div class="post-inner">
				<div class="post-content">
				<?php if($nmd_ace) : ?>
				<?php if($nmd_ace['numplayers'] > 0) : ?>
					<table>
						<tr>
							<th>Player</th>
							<th>Score</th>
							<th>Deaths</th>
						</tr>
						
						<?php foreach($nmd_ace['players'] as $player) : ?>
						
						<tr>
							<td><?php echo $player['name']; ?></td>
							<td><?php echo $player['score']; ?></td>
							<td><?php echo $player['deaths']; ?></td>
						</tr>
						
						<?php endforeach; ?>
						
					</table>
				<?php endif; ?>
				<?php endif; ?>
				<?php //print_r($nmd_ace); ?>
				</div>
			</div>
		</article>

	</section>	
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</section>

<?php get_footer(); ?>