<?php
class NMDContentWidget extends WP_Widget {

	public function __construct() {
		parent::__construct( false, 'NMD Content Widget' );
	}

	public function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$id = $instance[ 'id' ];
		$class = $instance[ 'class' ];
		$style = $instance[ 'style' ];
		$text = $instance[ 'text' ];
		
		
		if ( $id ) {
			if( strpos( $before_widget, 'id=' ) === false ) {
				$before_widget = str_replace( '>', 'id="'. $id . '">', $before_widget );
			} else {
				$before_widget = str_replace( 'id="', 'id="'. $id . ' ', $before_widget );
			}
		}
		
		if ( $class ) {
			if( strpos( $before_widget, 'class=' ) === false ) {
				$before_widget = str_replace( '>', 'class="'. $class . '">', $before_widget );
			} else {
				$before_widget = str_replace( 'class="', 'class="'. $class . ' ', $before_widget );
			}
		}
		
		if ( $style ) {
			if( strpos( $before_widget, 'style=' ) === false ) {
				$before_widget = str_replace( '>', 'style="'. $style . '">', $before_widget );
			} else {
				$before_widget = str_replace( 'style="', 'style="'. $style . ' ', $before_widget );
			}
		}
		
		echo $before_widget;
		
		echo $before_title . $title . $after_title;		
		
		
		?>
		
		<div class="widget-content">
			<?php echo $text ?>
			
		</div>
		
		<?php
		
		echo $after_widget;
	}

	public function form( $instance ) {
		$title = "Widget";
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		
		$id = "";
		if ( isset( $instance[ 'id' ] ) ) {
			$id = $instance[ 'id' ];
		}
		
		$class = "";
		if ( isset( $instance[ 'class' ] ) ) {
			$class = $instance[ 'class' ];
		}
		
		$style = "";
		if ( isset( $instance[ 'style' ] ) ) {
			$style = $instance[ 'style' ];
		}
		
		$text = "";
		if ( isset( $instance[ 'text' ] ) ) {
			$text = $instance[ 'text' ];
		}
	
	
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			
			<label for="<?php echo $this->get_field_id( 'id' ); ?>">ID</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" />
			
			<label for="<?php echo $this->get_field_id( 'class' ); ?>">Class</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo esc_attr( $class ); ?>" />
			
			<label for="<?php echo $this->get_field_id( 'style' ); ?>">Style</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" type="text" value="<?php echo esc_attr( $style ); ?>" />
			
			<label for="<?php echo $this->get_field_id( 'text' ); ?>">Content</label> 
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'id' ] = strip_tags( $new_instance[ 'id' ] );
		$instance[ 'class' ] = strip_tags( $new_instance[ 'class' ] );
		$instance[ 'style' ] = strip_tags( $new_instance[ 'style' ] );
		$instance[ 'text' ] = $new_instance[ 'text' ];

		return $instance;
	}

}

function nmd_register_widgets() {
	register_widget( 'NMDContentWidget' );
}
add_action( 'widgets_init', 'nmd_register_widgets' );

?>