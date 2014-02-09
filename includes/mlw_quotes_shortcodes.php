<?php
/*
This function displays the quote to the user when using the shortcode.
*/
function mlw_quotes_shortcode($atts)
{
	extract(shortcode_atts(array(
		'quotes' => 0
	), $atts));
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
		return $mlw_quotes_display;
}
?>