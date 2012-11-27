<?php

/**
 * Disable admin bar.
 */
add_action('show_admin_bar', '__return_false');


/**
 * Register sidebar and widget areas.
 */
function nmd_widgets_init() {

	register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2><div class="widget-content">',
	));
	
}
add_action( 'widgets_init', 'nmd_widgets_init' );


if ( ! function_exists( 'nmd_theme_setup' ) ) :
/**
 * Theme setup function.
 */
function nmd_theme_setup() {

	require 'lib/GameQ.php'; 
	
	register_nav_menu('navigation', 'Navigation Menu');
	
}
add_action( 'after_setup_theme', 'nmd_theme_setup', 0 );
endif;	//ends check for nmd_theme_setup()


if ( !function_exists( 'nmd_cleanhead' ) ) :
/**
 * Clean up and remove unnecessary WP meta
 */
function nmd_cleanhead() { 

	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	
}
add_action( 'init', 'nmd_cleanhead' );
endif;	//ends check for nmd_cleanhead()


if ( !function_exists( 'nmd_enqueue_scripts' ) ) :
/**
 * Enqueue Javascript and Stylesheets
 */
function nmd_enqueue_scripts() {

	// Theme Enqueue
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery/jquery-1.8.3.min.js', array(), "1.8.3" );
    wp_enqueue_script( 'jquery' );
	wp_register_script( 'jquery-ptransition', get_template_directory_uri().'/js/jquery/plugins/jquery.preparetransition.js', array( 'jquery' ), "0.1.3" );
	wp_enqueue_script( 'jquery-ptransition' );
	wp_register_script( 'nmd', get_template_directory_uri().'/js/nmd/nmd.js', array('jquery'), "1.0" );
	wp_enqueue_script( 'nmd' );
	wp_register_script( 'tinymce', get_template_directory_uri().'/js/tinymce/tiny_mce.js', array('jquery'), "3.5.8" );
	wp_enqueue_script( 'tinymce' );
	
	// Lightbox Enqueue
	wp_register_script( 'lightbox', get_template_directory_uri().'/js/lightbox/js/lightbox.js', array(), "2.51" );
	wp_enqueue_script( 'lightbox' );
	wp_register_style( 'lightbox', get_template_directory_uri().'/js/lightbox/css/lightbox.css' );
	wp_enqueue_style( 'lightbox' );
	
	// WP Thickbox
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_script( 'thickbox' );
	
	// Overlays
	wp_register_script( 'nmd_overlays', get_template_directory_uri().'/js/nmd/overlays.js', array( 'jquery', 'nmd' ), "1.0" );
	wp_enqueue_script( 'nmd_overlays' );
	
	$servers_overlay_params = array(
		'ajax_url' 				=> admin_url( 'admin-ajax.php' ),
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
	$results = $gq->requestData();
	

	$return = array(
		'nmd_dayz'	 => array(
			'numplayers' =>	$results['nmd_dayz']['numplayers'],
			'maxplayers' =>	$results['nmd_dayz']['maxplayers'],
		), 
		'nmd_ace'	 => array(
			'numplayers' =>	$results['nmd_ace']['numplayers'],
			'maxplayers' =>	$results['nmd_ace']['maxplayers'],
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


/**
 * Load TinyMCE.
 */
function nmd_load_tinyMCE() {

?>
<script type="text/javascript">
	tinyMCE.init({
		theme : "advanced",
		mode: "exact",
		skin : "default",
		document_base_url : "<?php echo get_site_url(); ?>",
		relative_urls : false,
		plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,forecolor,styleprops,code,preview",
		theme_advanced_buttons2: 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,hr,removeformat,outdent,indent,blockquote,|,link,unlink,emotions,|,spellchecker,image,|,fullscreen',
		theme_advanced_buttons3: '',
		theme_advanced_buttons4: '',
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		width: '100%',
		height: '220',
		theme_advanced_resizing : false,
		elements: 'comment'
	});
</script>
<?php

}
add_action( 'wp_head', 'nmd_load_tinyMCE' );


if ( ! function_exists( 'nmd_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function nmd_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	$comment->comment_type;
	switch ( $comment->comment_type ) :
		case 'pingback':
		case 'trackback':
		break;
	
		default :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-title">
			<h3><?php echo get_comment_author_link() ?></h3>
		</div>
		<div class="vcard">
			<?php echo get_avatar($comment, 100); ?>
			<time><?php echo get_comment_date() ?></time>
		</div>
		<div class="comment-content">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'nmd' ); ?></em>
				<br />
			<?php else : ?>
				<?php comment_text(); ?>
				<?php edit_comment_link('Edit', '<span class="edit-link">', '</span>'); ?>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</li>
	<?php
		break;
	endswitch;
	
}
endif; // ends check for nmd_comment()


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