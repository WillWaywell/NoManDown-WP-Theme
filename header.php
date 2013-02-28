<!DOCTYPE html>
<head>
<title>
<?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title( '-', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " - $site_description";
?>
</title>
<meta charset="<?php bloginfo('charset'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>?ver=1.0" />
<link rel='icon' href='<?php bloginfo('url'); ?>/favicon.ico' type='image/x-icon' />
<link rel='shortcut icon' href='<?php bloginfo('url'); ?>/favicon.ico' type='image/x-icon' />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="site_info">
		<div class="content">
			<ul class="social">
				<li class="facebook"><a href="http://www.facebook.com/NoManDownCommunity" target="_blank" title="No Man Down Facebook">Facebook</a></li>
				<li class="youtube"><a href="http://www.youtube.com/user/HepHeppington" target="_blank" title="No Man Down YouTube Channel">Youtube</a></li>
			</ul>
			<ul class="links">
				<li><a href="http://www.arma3.com/buy" target="_blank">ArmA 3 Alpha</a></li>
				<li><a href="http://forums.bistudio.com" target="_blank">BI Forums</a></li>
				<li><a href="http://www.bistudio.com" target="_blank">bistudio.com</a></li>
			</ul>
		</div>
	</div>
