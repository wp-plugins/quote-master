<?php

/*

Plugin Name: Quote Master

Description: This adds a widget that displays random quotes as well as features new easy to use shortcode: [quotemaster] for your posts.  Also, this has the option to add random quotes to the admin dashboard.  Use option menu to configure.  

Author: Frank Corso

Version: 5.2.1


*/



/*  Copyright 2010, fpcorso  (email : fpcorso@vasculus.com)



    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License as published by

    the Free Software Foundation; either version 2 of the License, or

    (at your option) any later version.



    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.



    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/





///Files to Include

include("quote_master_admin.php");

include("quote_master_dashboard.php");

include("quote_master_support.php");

include("quote_master_install_uninstall.php");

include("quote_master_get_quotes.php");

include("quote_master_widget.php");







///Activation Actions

register_activation_hook( __FILE__, 'quote_install');

register_deactivation_hook( __FILE__, 'quote_deactivate');

add_action('admin_footer', 'quotes');

add_action('admin_head', 'quote_css');

add_shortcode('quotemaster', 'quote_shortcode');

add_action( 'widgets_init', 'quote_load_widgets' );

add_action('admin_menu', 'add_quote_master_menu');





function add_quote_master_menu() 

{

         if (function_exists('add_menu_page'))

	{

            add_menu_page('Quote Master', 'Quote Master', 8, __FILE__, 'generate_quote_master_admin');

            add_submenu_page(__FILE__, 'Quotes', 'Quotes', 8, 'quotes_list', 'generate_quotes_master_quote_page');

         }

}



///Creates the shortcode function

function quote_shortcode($atts) 
{

	extract(shortcode_atts(array(

		'category' => 'no cat',

		'bar' => 'default bar',

	), $atts));

        $chosen = get_quotes();



	return "{$chosen}";

}




?>