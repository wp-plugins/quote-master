<?php
function quote_load_widgets() 
{
	register_widget( 'Quote_Master_Widget' );
}

class Quote_Master_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Quote_Master_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'quotes', 'description' => __('Adds a random quote to the sidebar', 'quotes') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'quote-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'quote-widget', __('Quote Master Widget', 'quotes'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
	        $chosen = get_quotes(2);

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

                printf( '<p>' . __('%1$s', 'quotes') . '</p>', $chosen );
		/* After widget (defined by themes). */
\		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Quotes', 'quotes') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

	<?php
	}
}

?>