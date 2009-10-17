<?php
function quotes() {
	$chosen = get_quotes(1);
	if ( get_option('show_dashboard_quotes') )
	{
		echo "$chosen";
	}
	else
	{
		echo "<p id='QS_quote'></p>";
	}
}


function quote_css() {
	echo "
	<style type='text/css'>
	#QS_quote {
		position: absolute;
		top: 5.7em;
		margin: 0;
		padding: 0;
		right: 5px;
		font-size: 12px;
	}
	</style>
	";
	
	echo "
	<style type='text/css'>
	#QS_author {
		position: absolute;
		top: 6.7em;
		margin: 0;
		padding: 0;
		right: 5px;
		font-size: 12px;
	}
	</style>
	";
}

?>