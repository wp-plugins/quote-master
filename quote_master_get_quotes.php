<?php
/*
This function retrieves the quote from the table
*/
function get_quotes() 
{
	$quotes_cat = get_option('quote_category');
	global $wpdb;
	$sql = "SELECT quote_id, quote, author, cate
		FROM " . $wpdb->prefix . "quotesmaster";
	if ($quotes_cat != 0)
		$sql .= " WHERE cate=" . $quotes_cat;
	$sql .= " ORDER BY RAND() LIMIT 1";
	$random_quote = $wpdb->get_row($sql, ARRAY_A);



	if ( get_option('change_on_load'))
	{
		if ( !empty($random_quote) )
		{
			return $random_quote["quote"];
		}
		else
			return 0;
	}
	elseif ( get_option('last_time') < time() - (get_option('quote_master_reload_time') * 60))
	{
		$numbers = time();
		update_option('last_time' , $numbers);
		if ( !empty($random_quote) ) 
		{
			$data = $random_quote["quote"];
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