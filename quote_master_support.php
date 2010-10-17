<?php
/*
This function generates the quotes page
*/
function generate_quotes_master_quote_page()
{
	$random_var = false;
	global $wpdb;
	$success = $_POST["add_quote"];
	if ($success == "confirmation")
	{
		$quote = $_POST["quote"];
		$author = $_POST["author"];
		$cate = $_POST["category"];
		$insert = "INSERT INTO " . $wpdb->prefix . "quotesmaster " .
			"(quote_id, quote, author, cate) " .
			"VALUES (NULL , '" . $quote . "' , '" . $author . "' , '" . $cate . "')";
		$results = $wpdb->query( $insert );
		$random_var = true;
	
	}

	global $wpdb;
	$sql = "SELECT quote_id, quote, author, cate 
	FROM " . $wpdb->prefix . "quotesmaster ";

	$quotes = $wpdb->get_results($sql);
?>
	<div class="wrap">
	<h2>Quote Master Quote List</h2>
	<?php
	if ($random_var)
	{
		echo "<p style='font-size:16px;color:green;'>Quote Added</p>";
	}
	?>
	<table class="wide" style="text-align: left; white-space: nowrap;">
	<thead>
	
	<tr valign="top">
	<td>
	&nbsp;
	</td>
	</tr>
	
	<tr valign="top">
	<td>
	<div style="border:1px  solid; width:1050px; height:300px; overflow:auto;">
	<?php 
	$quotes_list = "";
	$display = "";
	foreach($quotes as $quote_data) {
		if($alternate) $alternate = "";
		else $alternate = " class=\"alternate\"";
		$quotes_list .= "<tr{$alternate}>";
		$quotes_list .= "<td><span style='font-size:16px;'>" . $quote_data->quote_id . "</span></td>";
		$quotes_list .= "<td><span style='font-size:16px;'>" . $quote_data->quote . "</span></td>";
		$quotes_list .= "<td><span style='font-size:16px;'>" . $quote_data->author ."</span></td>";
		$quotes_list .= "</tr>";
	}

	$display .= "<table class=\"widefat\">";
		$display .= "<thead><tr>
			<th>ID</th>
			<th>Quote</th>
			<th>Author</th>
		</tr></thead>";
		$display .= "<tbody id=\"the-list\">{$quotes_list}</tbody>";
		$display .= "</table>";
	echo $display;
	?>
	
	</div>
	</td>
	</tr>
	</thead>
	</table>
	
	<table class="wide" style="text-align: left; white-space: nowrap;">
	<thead>
	
	<tr valign="top">
	<th scope="row">&nbsp;</th>
	<td></td>
	</tr>
	<?php
	echo "<form action='" . $PHP_SELF . "' method='post'>";
	echo "<input type='hidden' name='add_quote' value='confirmation' />";
	?>
	
	
	<tr valign="top">
	<th scope="row"><h3>Add a Quote</h3></th>
	<td></td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><h3>Quote</h3></th>
	<td><input type="text" name="quote" value="" style="border-color:#000000;
		color:#3300CC; 
		cursor:hand;" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><h3>Author</h3></th>
	<td><input type="text" name="author" value="" style="border-color:#000000;
		color:#3300CC; 
		cursor:hand;" /></td>
	</tr>
	
	</thead>
	</table>
	
	<?php
	echo "<p class='submit'><input type='submit' class='button-primary' value='Add Quote' /></p>";
	echo "</form>";
	?>
	
	</div>
<?php
}
?>