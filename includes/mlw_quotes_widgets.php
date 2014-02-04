<?php
/*
This is the file that contains all the widgets for the plugin
*/

class Mlw_Quotes_Quote_Widget extends WP_Widget {
   	
   	// constructor
    function Mlw_Quotes_Quote_Widget() {
        parent::WP_Widget(false, $name = __('Quote Master Quote Widget', 'mlw_quotes_text_domain'));
    }
    
    // widget form creation
    function form($instance) { 
	    // Check values
		if( $instance) {
	     	$title = esc_attr($instance['title']);
		} else {
			$title = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'mlw_quotes_text_domain'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php
	}
	
    // widget update
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
      	// Fields
      	$instance['title'] = strip_tags($new_instance['title']);
     	return $instance;
    }
    
    // widget display
    function widget($args, $instance) {
        extract( $args );
   		// these are the widget options
   		$title = apply_filters('widget_title', $instance['title']);
    	echo $before_widget;
   		// Display the widget
   		echo '<div class="widget-text wp_widget_plugin_box">';
   		// Check if title is set
   		if ( $title ) {
      		echo $before_title . $title . $after_title;
   		}
		$mlw_quotes_display = "";
		global $wpdb;
		$mlw_quotes_table_name = $wpdb->prefix . "mlw_quotes";
		$mlw_quotes_data = $wpdb->get_results( "SELECT * FROM " .$mlw_quotes_table_name. " WHERE deleted='0' ORDER BY RAND() LIMIT 1" );
		foreach($mlw_quotes_data as $mlw_quotes_each) {
			$mlw_quotes_data = $mlw_quotes_each;
			break;
		}
		$mlw_quotes_display .= "<p>'".$mlw_quotes_data->quote."'</p>";
		$mlw_quotes_display .= "<p>~".$mlw_quotes_data->author."</p>";
		echo $mlw_quotes_display;
   		echo '</div>';
   		echo $after_widget;
    }
}
?>