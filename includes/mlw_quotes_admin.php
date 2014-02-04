<?php
/*
This page creates the main dashboard for the Quiz Master Next plugin
Copyright 2014, My Local Webstop (email : fpcorso@mylocalwebstop.com)
*/

function mlw_quotes_generate_admin(){
	
	//Page Variables
	global $wpdb;
	$mlw_quotes_table_name = $wpdb->prefix . "mlw_quotes";
	$mlw_quotes_hasAddedQuotes = false;
	$mlw_quotes_hasDeletedQuotes = false;
	$mlw_quotes_hasEditedQuotes = false;
	$mlw_quotes_isQueryError = false;
	
	//Add New Quote Form Submitted
	if (isset($_POST["add_quote_form"]) && $_POST["add_quote_form"] == "confirmation")
	{
		$mlw_quotes_quote = $_POST["quote"];
		$mlw_quotes_author = $_POST["author"];
		$mlw_quotes_query_results = $wpdb->query( $wpdb->prepare( "INSERT INTO " . $mlw_quotes_table_name . " ( quote, author, category, category_id, deleted )  VALUES ( %s, %s, %s, %d, %d )", $mlw_quotes_quote, $mlw_quotes_author, " ", 0, 0 ) );
		if ($mlw_quotes_query_results != false)
		{
			$mlw_quotes_hasAddedQuotes = true;		
		}
		else
		{
			$mlw_quotes_isQueryError = true;
		}
	}
	
	//Edit Quote Form Submitted
	if (isset($_POST["edit_quote_form"]) && $_POST["edit_quote_form"] == "confirmation")
	{
		$mlw_quotes_edit_id = $_POST["edit_quote_id"];
		$mlw_quotes_edit_quote = $_POST["edit_quote"];
		$mlw_quotes_edit_author = $_POST["edit_author"];
		$mlw_quotes_query_results = $wpdb->query( $wpdb->prepare( "UPDATE " . $mlw_quotes_table_name . " SET quote='%s', author='%s' WHERE quote_id='%d'", $mlw_quotes_edit_quote, $mlw_quotes_edit_author, $mlw_quotes_edit_id ) );
		if ($mlw_quotes_query_results != false)
		{
			$mlw_quotes_hasEditedQuotes = true;	
		}
		else
		{
			$mlw_quotes_isQueryError = true;
		}
	}
	
	//Delete Quote Form Submitted
	if (isset($_POST["delete_quote_form"]) && $_POST["delete_quote_form"] == "confirmation")
	{
		$mlw_quotes_delete_id = $_POST["delete_quote_id"];
		$mlw_quotes_query_results = $wpdb->query( $wpdb->prepare( "UPDATE " . $mlw_quotes_table_name . " SET deleted='1' WHERE quote_id='%d'", $mlw_quotes_delete_id ) );
		if ($mlw_quotes_query_results != false)
		{
			$mlw_quotes_hasDeletedQuotes = true;	
		}
		else
		{
			$mlw_quotes_isQueryError = true;
		}
	}
	
	//Retrieve list of quizzes
	$mlw_quotes_sql = "SELECT * FROM " . $wpdb->prefix . "mlw_quotes WHERE deleted='0'";
	$mlw_quotes_sql .= "ORDER BY quote_id DESC";

	$mlw_quotes_data = $wpdb->get_results($mlw_quotes_sql);	
	?>
	
	
	<!-- css -->
	<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" />
	<!-- jquery scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		var $j = jQuery.noConflict();
		// increase the default animation speed to exaggerate the effect
		$j.fx.speeds._default = 1000;
		$j(function() {
			$j("button").button();
		
		});
		$j(function() {
			$j('#new_quote_dialog').dialog({
				autoOpen: false,
				show: 'blind',
				width:700,
				hide: 'explode',
				buttons: {
				Cancel: function() {
					$j(this).dialog('close');
					}
				}
			});
		
			$j('#new_quote_button').click(function() {
				$j('#new_quote_dialog').dialog('open');
				return false;
			});
			$j('#new_quote_button_two').click(function() {
				$j('#new_quote_dialog').dialog('open');
				return false;
			});
		});
		function deleteQuote(id){
			$j("#delete_quote_dialog").dialog({
				autoOpen: false,
				show: 'blind',
				width:700,
				hide: 'explode',
				buttons: {
				Cancel: function() {
					$j(this).dialog('close');
					}
				}
			});
			$j("#delete_quote_dialog").dialog('open');
			var idHidden = document.getElementById("delete_quote_id");
			idHidden.value = id;
		};
		function editQuote(id, quote, author){
			$j("#edit_quote_dialog").dialog({
				autoOpen: false,
				show: 'blind',
				width:700,
				hide: 'explode',
				buttons: {
				Cancel: function() {
					$j(this).dialog('close');
					}
				}
			});
			$j("#edit_quote_dialog").dialog('open');
			var idHidden = document.getElementById("edit_quote_id");
			var quoteText = document.getElementById("edit_quote");
			var authorText = document.getElementById("edit_author");
			idHidden.value = id;
			quoteText.value = quote;
			authorText.value = author;
		};
	</script>
	
	<!--Begin Page Content-->
	<div class="wrap">		
		<h2>Quote Master</h2>
		<p>Use the shortcode [mlw_quotes] in a page or post to load a quote randomly. Or use the Quote Master widget!</p>
		<?php if ($mlw_quotes_isQueryError)
		{
			?>
			<div class="ui-state-error ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Oh-No!</strong> There appears to have been an error in the last request! Please share this with the developer.</p>
			</div>
			<?php
		}
		if ($mlw_quotes_hasEditedQuotes)
		{
			?>
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Hey!</strong> The quote has been edited successfully.</p>
			</div>
			<?php
		}
		if ($mlw_quotes_hasDeletedQuotes)
		{
			?>
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Hey!</strong> The quote has been deleted successfully.</p>
			</div>
			<?php
		}
		if ($mlw_quotes_hasAddedQuotes)
		{
			?>
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
				<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<strong>Hey!</strong> The quote has been added successfully.</p>
			</div>
			<?php
		}
		?>
		<button id="new_quote_button_two">Add Quote</button>
		<?php
		
		//Generate Table Of Quotes
		$mlw_quotes_list = "";
		$mlw_quotes_display = "";
		foreach($mlw_quotes_data as $mlw_quotes_info) {
			if($alternate) $alternate = "";
			else $alternate = " class=\"alternate\"";
			$mlw_quotes_list .= "<tr{$alternate}>";
			$mlw_quotes_list .= "<td><span style='font-size:16px;'>" . $mlw_quotes_info->quote ." </span><div><span style='color:green;font-size:12px;'><a onclick=\"editQuote('".$mlw_quotes_info->quote_id."','".$mlw_quotes_info->quote."','".$mlw_quotes_info->author."')\"href='#'>Edit</a> | <a onclick=\"deleteQuote('".$mlw_quotes_info->quote_id."')\"href='#'>Delete</a></span></div></td>";
			$mlw_quotes_list .= "<td><span style='font-size:16px;'>" . $mlw_quotes_info->author ." </span></td>";
			$mlw_quotes_list .= "</tr>";
		}
	
		$mlw_quotes_display .= "<table class=\"widefat\">";
			$mlw_quotes_display .= "<thead><tr>
				<th>Quote</th>
				<th>Author</th>
			</tr></thead>";
			$mlw_quotes_display .= "<tbody id=\"the-list\">{$mlw_quotes_list}</tbody>";
			$mlw_quotes_display .= "</table>";
		echo $mlw_quotes_display;
		?>
		<button id="new_quote_button">Add Quote</button>
		
		<!--New Quote Dialog-->
		<div id="new_quote_dialog" title="Add Quote" style="display:none;">
			<?php
			echo "<form action='" . $PHP_SELF . "' method='post'>";
			echo "<input type='hidden' name='add_quote_form' value='confirmation' />";
			?>
			<table class="wide" style="text-align: left; white-space: nowrap;">
				<tr valign="top">
					<td></td>
				</tr>
				<tr valign="top">
					<td><h3>Add Quote</h3></td>
				</tr>
				<tr valign="top">
					<td><span style='font-weight:bold;'>Quote</span></td>
					<td><input type="text" name="quote" value="" /></td>
				</tr>
				<tr valign="top">
					<td><span style='font-weight:bold;'>Author</span></td>
					<td><input type="text" name="author" value="" /></td>
				</tr>
			</table>
			<?php
			echo "<p class='submit'><input type='submit' class='button-primary' value='Add Quote' /></p>";
			echo "</form>";
			?>
		</div>
		
		<!--Edit Quote Dialog-->
		<div id="edit_quote_dialog" title="Edit Quote" style="display:none;">
			<?php
			echo "<form action='" . $PHP_SELF . "' method='post'>";
			echo "<input type='hidden' name='edit_quote_form' value='confirmation' />";
			echo "<input type='hidden' id='edit_quote_id' name='edit_quote_id' value='' />";
			?>
			<table class="wide" style="text-align: left; white-space: nowrap;">
				<tr valign="top">
					<td></td>
				</tr>
				<tr valign="top">
					<td><h3>Edit Quote</h3></td>
				</tr>
				<tr valign="top">
					<td><span style='font-weight:bold;'>Quote</span></td>
					<td><input type="text" id="edit_quote" name="edit_quote" value="" /></td>
				</tr>
				<tr valign="top">
					<td><span style='font-weight:bold;'>Author</span></td>
					<td><input type="text" id="edit_author" name="edit_author" value="" /></td>
				</tr>
			</table>
			<?php
			echo "<p class='submit'><input type='submit' class='button-primary' value='Edit Quote' /></p>";
			echo "</form>";
			?>
		</div>
		
		<!--Delete Quote Dialog-->
		<div id="delete_quote_dialog" title="Delete Quote" style="display:none;">
			<?php
			echo "<form action='" . $PHP_SELF . "' method='post'>";
			echo "<input type='hidden' name='delete_quote_form' value='confirmation' />";
			echo "<input type='hidden' id='delete_quote_id' name='delete_quote_id' value='' />";
			?>
			<table class="wide" style="text-align: left; white-space: nowrap;">
				<tr valign="top">
					<td></td>
				</tr>
				<tr valign="top">
					<td><h3>Are You Sure You Want To Delete This Quote?</h3></td>
				</tr>
			</table>
			<?php
			echo "<p class='submit'><input type='submit' class='button-primary' value='Delete Quote' /></p>";
			echo "</form>";
			?>
		</div>
	</div>	
	</div>
	<?php
}
?>