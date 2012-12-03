<?php
/*
Template Name: NMD - Servers
*/

$servers = array();
array_push($servers, query_server("94.76.229.69", 2302));
array_push($servers, query_server("94.76.229.69", 2316));

?>


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
				
				<?php foreach( $servers as $server ) : ?>
					<?php if( $server ) : ?>
						<ul>
							<li><?php echo $server['hostname']; ?></li>
							<li><?php echo $server['gametype']; ?></li>
							<li><?php echo $server['mapname']; ?></li>
							<li><?php echo $server['numplayers']; ?></li>
							<li><?php echo $server['maxplayers']; ?></li>
							<li><?php echo $server['password']; ?></li>
							<li><?php echo $server['currentversion']; ?></li>
						</ul>
						<?php if( $server['numplayers'] > 0 ) : ?>
							<table>
								<tr>
									<th>Player</th>
									<th>Score</th>
									<th>Deaths</th>
								</tr>
								
								<?php foreach( $server['players'] as $player ) : ?>

								<tr>
									<td><?php echo $player['name']; ?></td>
									<td><?php echo $player['score']; ?></td>
									<td><?php echo $player['deaths']; ?></td>
								</tr>
								
								<?php endforeach; ?>
								
							</table>
						<?php endif; // End player count check ?>
					<?php endif; // End online status check ?>
					
				<?php endforeach; ?>
				
				
				<?php //print_r($nmd_ace); ?>
				</div>
			</div>
		</article>

	</section>	
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</section>

<?php get_footer(); ?>