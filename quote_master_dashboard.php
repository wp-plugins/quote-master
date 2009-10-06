<?php
function quotes() {
	$chosen = get_quotes();
	if ( get_option('show_dashboard_quotes') )
	{
		echo "<p id='newquotes'>$chosen</p>";
	}
	else
	{
		echo "<p id='newquotes'></p>";
	}
}


function quote_css() {
	echo "
	<style type='text/css'>
	#newquotes {
		position: absolute;
		top: 5.7em;
		margin: 0;
		padding: 0;
		right: 5px;
		font-size: 12px;
	}
	</style>
	";
}

?>