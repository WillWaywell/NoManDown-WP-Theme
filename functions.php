<?php

/**
 * Disable admin bar.
 */
add_action('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );

/**
 * Register sidebar and widget areas.
 */
function nmd_widgets_init() {
	
}
add_action( 'widgets_init', 'nmd_widgets_init' );


if ( ! function_exists( 'nmd_theme_setup' ) ) :
/**
 * Theme setup function.
 */
function nmd_theme_setup() {

	require 'lib/arma2query.php'; 
	
	register_nav_menu('navigation', 'Navigation Menu');

	register_sidebar(array(
	  'name' => 'Home Widgets 1',
	  'id' => 'home-widgets-1',
	  'description' => 'Front page widgets container #1.',
	  'before_title' => '<h2 class="widget-title">',
	  'after_title' => '</h2><div class="widget-content">',
	  'after_widget' => '</div></li>',
	));
	
	register_sidebar(array(
	  'name' => 'Home Widgets 2',
	  'id' => 'home-widgets-2',
	  'description' => 'Front page widgets container #2.',
	  'before_title' => '<h2 class="widget-title">',
	  'after_title' => '</h2>'
	));
	
}
add_action( 'after_setup_theme', 'nmd_theme_setup', 0 );
endif;	//ends check for nmd_theme_setup()


if ( !function_exists( 'nmd_cleanhead' ) ) :
/**
 * Clean up and remove unnecessary WP meta
 */
function nmd_cleanhead() { 

	//remove_action( 'wp_head', 'rsd_link' );
	//remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	
}
add_action( 'init', 'nmd_cleanhead' );
endif;	//ends check for nmd_cleanhead()


if ( !function_exists( 'nmd_enqueue_scripts' ) ) :
/**
 * Enqueue Javascript and Stylesheets
 */
function nmd_enqueue_scripts() {

	// Theme Style
	wp_enqueue_style( 'nmd-style', get_stylesheet_uri() );

	// jQuery CSS3 Plugin
	wp_register_script( 'jquery-css3', get_template_directory_uri().'/js/jquery/plugins/jquery.css3.js', array( 'jquery' ), "1.0" );
	wp_enqueue_script( 'jquery-css3' );
	
	// jQuery Teletype Plugin
	wp_register_script( 'jquery-teletype', get_template_directory_uri().'/js/jquery/plugins/jquery.teletype.js', array( 'jquery' ), "1.0" );
	wp_enqueue_script( 'jquery-teletype' );
	
	// Theme JS
	wp_register_script( 'nmd', get_template_directory_uri().'/js/nmd/nmd.js', array( 'jquery', 'jquery-css3', 'jquery-teletype' ), "1.0" );
	wp_enqueue_script( 'nmd' );
	
	// Lightbox
	wp_register_script( 'lightbox', get_template_directory_uri().'/js/lightbox/js/lightbox.js', array(), "2.51" );
	wp_enqueue_script( 'lightbox' );
	wp_register_style( 'lightbox', get_template_directory_uri().'/js/lightbox/css/lightbox.css' );
	wp_enqueue_style( 'lightbox' );
	
	// Overlays
	wp_register_script( 'nmd_overlays', get_template_directory_uri().'/js/nmd/overlays.js', array( 'jquery', 'nmd' ), "1.0" );
	wp_enqueue_script( 'nmd_overlays' );
	
	$servers_overlay_params = array(
		'login_nonce' 			=> wp_create_nonce( 'servers-overlay-action' )
	);

	wp_localize_script( 'nmd_overlays', 'servers_overlay_params', $servers_overlay_params );
	
}
add_action( 'wp_enqueue_scripts', 'nmd_enqueue_scripts' );
endif;	//ends check for nmd_enqueue_scripts()


if ( !function_exists( 'nmd_servers_overlay_ajax' ) ) :
/**
 * Servers Overlay Ajax
 */
function nmd_servers_overlay_ajax() {

	check_ajax_referer('servers-overlay-action', 'security' );
	
	$nmd_dayz = query_server("94.76.229.69", 2302);
	$nmd_ace = query_server("94.76.229.69", 2316);


	$return = array(
		'nmd_dayz'	 => array(
			'numplayers' =>	$nmd_dayz['numplayers'],
			'maxplayers' =>	$nmd_dayz['maxplayers'],
		), 
		'nmd_ace'	 => array(
			'numplayers' =>	$nmd_ace['numplayers'],
			'maxplayers' =>	$nmd_ace['maxplayers'],
		)
	);
		
	echo json_encode( $return );
	die();
	
}
add_action( 'wp_ajax_servers_overlay_process', 'nmd_servers_overlay_ajax' );
add_action( 'wp_ajax_nopriv_servers_overlay_process', 'nmd_servers_overlay_ajax' );
endif;	//ends check for nmd_servers_overlay_ajax()


if ( !function_exists( 'nmd_login_enqueue_scripts' ) ) :
/**
 * Login Page Scripts
 */
function nmd_login_enqueue_scripts() { 

	?> <link rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/login.css'; ?>" type="text/css" media="all" /> <?php 

}
add_action( 'login_enqueue_scripts', 'nmd_login_enqueue_scripts' );
endif;	//ends check for nmd_login_enqueue_scripts()


if ( !function_exists( 'nmd_sanitize_allowedtags' ) ) :
/**
 * Set allowed tags for posts.
 */
function nmd_sanitize_allowedtags( $input ) {

  global $allowedposttags, $allowedtags;
    $allowedtags["ol"] = array();
    $allowedtags["ul"] = array();
    $allowedtags["li"] = array();
    $allowedtags["span"]["style"] = array();
	
	$allowedtags["img"]["src"] = array();
	$allowedtags["img"]["alt"] = array();
	$allowedtags["img"]["title"] = array();
	
	$allowedtags["p"]["style"] = array();
	$allowedtags["h1"]= array();
	$allowedtags["h2"]= array();
	$allowedtags["h3"]= array();
	$allowedtags["h4"]= array();
	$allowedtags["h5"]= array();
	$allowedtags["h6"]= array();
	$allowedtags["pre"]= array();
	$allowedtags["address"]= array();
	$allowedtags["hr"]= array();
	
	$allowedtags["a"]["target"] = array();
	$allowedtags["a"]["class"] = array();
	
	return wpautop(wp_kses( $input, $allowedtags));
	
}
add_action('init', 'nmd_sanitize_allowedtags', 10);
endif;	//ends check for nmd_sanitize_allowedtags()


if ( ! function_exists( 'nmd_post_links' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function nmd_post_links() {

	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="post-nav">
			<span class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts' ); ?></span>
			<span class="nav-next"><?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>' ); ?></span>
			<div class="clear"></div>
		</nav><!-- #nav-above -->
	<?php endif;
	
}
endif;	// ends check for nmd_post_links()

?>