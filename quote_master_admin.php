<?php
/*
Generates the main admin page for Quote Master.
Please be careful when editing this file.
*/


function generate_quote_master_admin() {
?>
<style type="text/css">
div.donation {
	border-width: 1px;
	border-style: solid;
	padding: 0 0.6em;
	margin: 5px 0 15px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	background-color: #ffffe0;
	border-color: #e6db55;
	text-align: center;
}
p {	margin: 0.5em 0;
	line-height: 1;
	padding: 2px;}
p em {
	padding-left: 1em;
	color: #555;
	font-weight: bold;
}
</style>
<div class="wrap">
<h2>Quote Master</h2>
<br />

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<p>To turn off the dashboard quotes, uncheck the first box.  If you would rather the quote change in a certain amount of time rather than every time the page is loaded, uncheck the second box.  If you uncheck this setting, enter in the amount of minutes to the next change in the third setting.  <?php /*Lastly, if you want the quotes in a different language, change the fourth option. */ ?></p>

<table class="wide" style="text-align: left; white-space: nowrap;">
<thead>

<tr valign="top">
<th class="check-column">Show Quotes in Dashboard</th>
<td>
<input name="show_dashboard_quotes" id="show_dashboard_quotes" type="checkbox" value="1" <?php checked('1', get_option('show_dashboard_quotes')); ?> />
</td>
</tr>

<tr valign="top">
<th scope="row">Change Quote with Every Load (If this is not checked, quote will change according to setting below)</th>
<td>
<input name="change_on_load" id="change_on_load" type="checkbox" value="1" <?php checked('1', get_option('change_on_load')); ?> />
</td>
</tr>



<tr>
<th scope="row">Minutes to Reload (For daily quotes: 1440 equals 1 day)</th>
<td>
<input type="text" maxlength="6" size="10" id="quote_master_reload_time" name="quote_master_reload_time" value="<?php echo stripcslashes( get_option( 'quote_master_reload_time' ) ); ?>" />
</td>
</tr>
<!-- Will use this later
<tr>
<td>
<a class="thickbox" href="<?php get_bloginfo('wpurl') ?>/wp-admin/options-general.php?page=WordPress%20File%20Monitor&amp;display=alertDesc" title="Test" style="color:#ff0;font-weight:bold;">Click Me</a>
</td>
</tr>-->


</thead>
</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="show_dashboard_quotes,change_on_load,quote_master_reload_time" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}

?>