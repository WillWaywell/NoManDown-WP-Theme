<?php
/**
 * OCM Product List Widget
 *
 */
class OCM_Product_List_Widget extends WP_Widget {

	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function OCM_Product_List_Widget() {
		$widget_ops = array( 'classname' => 'widget_ocm_productlist', 'description' => __( 'Use this widget to list your recent Aside, Status, Quote, and Link posts', 'ocm' ) );
		$this->WP_Widget( 'widget_ocm_productlist', __( 'Twenty Eleven Ephemera', 'ocm' ), $widget_ops );
		$this->alt_option_name = 'widget_ocm_productlist';

		add_action( 'save_post', array(&$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache' ) );
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array An array of standard parameters for widgets in this theme
	 * @param array An array of settings for this widget instance
	 * @return void Echoes it's output
	 **/
	function widget( $args, $instance ) {
		$cache = wp_cache_get( 'widget_ocm_productlist', 'widget' );

		if ( !is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Ephemera', 'ocm' ) : $instance['title'], $instance, $this->id_base);

		if ( ! isset( $instance['number'] ) )
			$instance['number'] = '10';

		if ( ! $number = absint( $instance['number'] ) )
 			$number = 10;

		$ephemera_args = array(
			'order' => 'DESC',
			'posts_per_page' => $number,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'post__not_in' => get_option( 'sticky_posts' ),
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'terms' => array( 'post-format-aside', 'post-format-link', 'post-format-status', 'post-format-quote' ),
					'field' => 'slug',
					'operator' => 'IN',
				),
			),
		);
		$ephemera = new WP_Query( $ephemera_args );

		if ( $ephemera->have_posts() ) :

		echo $before_widget;
		echo $before_title;
		echo $title; // Can set this with a widget option, or omit altogether
		echo $after_title;

		?>
		<ol>
		<?php while ( $ephemera->have_posts() ) : $ephemera->the_post(); ?>

			<?php if ( 'link' != get_post_format() ) : ?>

			<li class="widget-entry-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'ocm' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<span class="comments-link">
					<?php comments_popup_link( __( '0 <span class="reply">comments &rarr;</span>', 'ocm' ), __( '1 <span class="reply">comment &rarr;</span>', 'ocm' ), __( '% <span class="reply">comments &rarr;</span>', 'ocm' ) ); ?>
				</span>
			</li>

			<?php else : ?>

			<li class="widget-entry-title">
				<?php
					// Grab first link from the post content. If none found, use the post permalink as fallback.
					$link_url = twentyeleven_url_grabber();

					if ( empty( $link_url ) )
						$link_url = get_permalink();
				?>
				<a href="<?php echo esc_url( $link_url ); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'ocm' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>&nbsp;<span>&rarr;</span></a>
				<span class="comments-link">
					<?php comments_popup_link( __( '0 <span class="reply">comments &rarr;</span>', 'ocm' ), __( '1 <span class="reply">comment &rarr;</span>', 'ocm' ), __( '% <span class="reply">comments &rarr;</span>', 'ocm' ) ); ?>
				</span>
			</li>

			<?php endif; ?>

		<?php endwhile; ?>
		</ol>
		<?php

		echo $after_widget;

		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();

		// end check for ephemeral posts
		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_ocm_productlist', $cache, 'widget' );
	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_ocm_productlist'] ) )
			delete_option( 'widget_ocm_productlist' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_ocm_productlist', 'widget' );
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 **/
	function form( $instance ) {
		$products_id = isset( $instance['solutions_id'] ) ? absint( $instance['number'] ) : 1;
		$solutions_id = isset( $instance['solutions_id'] ) ? absint( $instance['number'] ) : 1;
?>

		<?php
	}


}