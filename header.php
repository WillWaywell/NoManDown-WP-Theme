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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>?ver=5.92" />
<link rel='icon' href='<?php bloginfo('url'); ?>/favicon.ico' type='image/x-icon' />
<link rel='shortcut icon' href='<?php bloginfo('url'); ?>/favicon.ico' type='image/x-icon' />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav id="nav">
	<div class="wrap">
		<?php 
			
			$defaults = array(
				'menu'            => 'Navigation', 
				'container'       => false, 
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
			);
		
			wp_nav_menu( $defaults );
		?>
		<div class="nav-right">
			<div class="account">
				<?php if ( is_user_logged_in() ) : ?> 
				<?php $current_user = wp_get_current_user(); ?>
					<a href="<?php echo wp_logout_url(); ?>" title="Logout">Logout</a>
					<a href="<?php echo site_url('/forums/users/'.$current_user->user_login); ?>">Profile<?php echo get_avatar($current_user->user_email, 26); ?></a>
				<?php else : ?> 
					<a href="<?php echo wp_login_url(); ?>?action=register" title="Register">Register</a>
					<a href="<?php echo wp_login_url(); ?>" title="Login">Login</a>
				<?php endif; ?> 
			</div>	
		</div>
	</div>
</nav>
<header id="head" class="wrap">
	<h1 class="site-title">No Man Down</h1>
	<p class="tagline">&#8220;You're only as strong as your weakest link&#8221;</p>
</header>
<div id="links" class="wrap">
	<a class="link six" title="Join a server">Play</a>
	<a href="http://www.youtube.com/user/HepHeppington" target="_blank" class="link youtube" title="Youtube channel">Youtube</a>
	<a href="http://www.facebook.com/NoManDownCommunity" target="_blank" class="link facebook" title="Facebook community">Facebook</a>
	<a href="<?php bloginfo('rss2_url'); ?>" target="_blank" class="link rss" title="RSS Feed">Feeds</a>
	<div class="clear"></div>
</div>
