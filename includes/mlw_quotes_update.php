<?php
/*
This is the update function for the plugin. When the plugin gets updated, the database changes are done here. This function is placed in the init of wordpress.
*/
function mlw_quotes_update()
{
	
	//Update this variable each update. This is what is checked when the plugin is deciding to run the upgrade script or not.
	$data = "6.2.3";
	if ( ! get_option('mlw_quotes_version'))
	{
		add_option('mlw_quotes_version' , $data);
	}
	elseif (get_option('mlw_quotes_version') != $data)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "mlw_quotes_cate";

		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) 
	
		{
	
			$sql = "CREATE TABLE " . $table_name . " (
	
				category_id mediumint(9) NOT NULL AUTO_INCREMENT,
				
				category TEXT NOT NULL,
				
				deleted INT NOT NULL,
	
				PRIMARY KEY  (category_id)
	
			);";
	
			$results = $wpdb->query( $sql );
	
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			
			$insert = "INSERT INTO " . $table_name .
			"(category, deleted) " .
	           	"VALUES ('Ability', 0)";
			$results = $wpdb->query( $insert );
			
			$insert = "INSERT INTO " . $table_name .
			"(category, deleted) " .
	           	"VALUES ('Action', 0)";
			$results = $wpdb->query( $insert );
			
			$insert = "INSERT INTO " . $table_name .
			"(category, deleted) " .
	           	"VALUES ('Argument', 0)";
			$results = $wpdb->query( $insert );
		}
		update_option('mlw_quotes_version' , $data);
	}
}
?>