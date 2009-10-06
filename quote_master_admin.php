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

<div class="donation">
<p><a href='http://www.pledgie.com/campaigns/6398'><img alt='Click here to lend your support to: Quote Master and make a donation at www.pledgie.com !' src='http://www.pledgie.com/campaigns/6398.png?skin_name=chrome' border='0' /></a><em>Is this plugin useful for you? If you like it, please help the developer by donating today.</em></p></div>


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

<tr valign="top">
<th scope="row">Quotes Subject:</th>
<td><select name="quote_category"><?php $opt_ply = get_option('quote_category'); ?>
        <option value="0" <?php if( $opt_ply == '0'){ echo 'selected'; } ?>>All</option> 
        <option value="1" <?php if( $opt_ply == '1'){ echo 'selected'; } ?>>Ability</option>
        <option value="2" <?php if( $opt_ply == '2'){ echo 'selected'; } ?>>Action</option>
        <option value="3" <?php if( $opt_ply == '3'){ echo 'selected'; } ?>>Advice</option>
        <option value="4" <?php if( $opt_ply == '4'){ echo 'selected'; } ?>>Age</option>
       </select>
</td>
</tr>
</thead>
</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="show_dashboard_quotes,change_on_load,quote_master_reload_time,quote_category" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}

?>