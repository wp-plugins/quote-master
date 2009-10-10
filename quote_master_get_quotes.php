<?php
/*
This function retrieves the quote from the table
*/
function get_quotes( $arg_author ) 
{	$QS_quote = "";
	$quotes_cat = get_option('quote_category');
	global $wpdb;
	$sql = "SELECT quote_id, quote, author, cate
		FROM " . $wpdb->prefix . "quotesmaster";
	if ($quotes_cat != 0)
		$sql .= " WHERE cate=" . $quotes_cat;
	$sql .= " ORDER BY RAND() LIMIT 1";
	$QS_random = $wpdb->get_row($sql, ARRAY_A);
	
	if ($arg_author == 1)
	{
		$class_value = "id='QS_quote'";
		$author_class_vaule = "id='QS_author'";
	}
	else
	{
		$class_value = "";
		$author_class_vaule = "";
	}



	if ( get_option('change_on_load'))
	{
		if ( !empty($QS_random) )
		{
			$QS_quote = "<p " . $class_value . "> &nbsp;" . $QS_random["quote"] . "</p>";
			$QS_quote .= "<p " . $author_class_vaule . "> &nbsp; -" . $QS_random["author"] . "</p>";

			return $QS_quote;
		}
		else
			return 0;
	}
	elseif ( get_option('last_time') < time() - (get_option('quote_master_reload_time') * 60))
	{
		$numbers = time();
		update_option('last_time' , $numbers);
		if ( !empty($QS_random) )
		{
			$QS_quote = "<p " . $class_value . "> &nbsp;" . $QS_random["quote"] . "</p>";
			$QS_quote .= "<p " . $author_class_vaule . "> &nbsp; -" . $QS_random["author"] . "</p>";
			$data = $QS_quote;
		}
		else
			$data = 0;
		update_option('current_quote',$data);
		return $data;
	}
	else
	{
		$data = get_option('current_quote');
		return $data;
	}
}
?>