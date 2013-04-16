<!DOCTYPE html>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<link rel="icon" href="<?php bloginfo( 'url' ); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo( 'url' ); ?>/favicon.ico" type="image/x-icon" />
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
				<li><a href="http://www.arma2.com" target="_blank">ArmA 2</a></li>
				<li><a href="http://www.bistudio.com" target="_blank">bistudio.com</a></li>
			</ul>
		</div>
	</div>
	<div id="container">
		<header id="site_header">
			<nav id="site_navigation">
				<ul>
					<li><a href="<?php bloginfo( 'url' ); ?>">Home</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/intel">Intel</a></li>
					<li><a href="#">Media</a></li>
					<li class="logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/navigation_logo.png" />
					</li>
					<li><a href="#">Forums</a></li>
					<li><a href="#">Servers</a></li>
					<li><a href="#">About</a></li>
				</ul>
				<div class="background"></div>
			</nav>
		</header>