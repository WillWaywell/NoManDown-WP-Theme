<?php
/*
Template Name: NMD - Servers
*/
?>

<?php

$gq = new GameQ();
$servers = array(
	array(
		'id' => 'nmd_dayz',
		'type' => 'armedassault2oa',
		'host' => '94.76.229.69:2302',
	),
	array(
		'id' => 'nmd_ace',
		'type' => 'armedassault2oa',
		'host' => '94.76.229.69:2316',
	)
);

$gq = new GameQ();
$gq->addServers( $servers );
$gq->setOption( 'timeout', 4 );
$gq->setFilter( 'normalise' );

$results = $gq->requestData();

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
					<p><?php print_r($results); ?></p>
				</div>
			</div>
		</article>

	</section>	
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</section>

<?php get_footer(); ?>