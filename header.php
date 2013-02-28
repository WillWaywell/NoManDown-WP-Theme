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

