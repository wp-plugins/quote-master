<?php


/*
Plugin Name: Quote Master
Description: Use this plugin to add quotes to your website.
Version: 6.1.1
Author: Frank Corso
Author URI: http://www.mylocalwebstop.com/
Plugin URI: http://www.mylocalwebstop.com/
*/

/* 
Copyright 2014, My Local Webstop (email : fpcorso@mylocalwebstop.com)

Disclaimer of Warranties. 

The plugin is provided "as is". My Local Webstop and its suppliers and licensors hereby disclaim all warranties of any kind, 
express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. 
Neither My Local Webstop nor its suppliers and licensors, makes any warranty that the plugin will be error free or that access thereto will be continuous or uninterrupted.
You understand that you install, operate, and unistall the plugin at your own discretion and risk.
*/

///Files to Include
include("includes/mlw_quotes_admin.php");
include("includes/mlw_quotes_category.php");
include("includes/mlw_quotes_install.php");
include("includes/mlw_quotes_update.php");
include("includes/mlw_quotes_shortcodes.php");
include("includes/mlw_quotes_widgets.php");
include("includes/mlw_quotes_help.php");

///Activation Actions
register_activation_hook( __FILE__, 'mlw_quotes_activate');
add_action('admin_menu', 'mlw_quotes_add_menu');
add_action('init', 'mlw_quotes_update');
add_action('widgets_init', create_function('', 'return register_widget("Mlw_Quotes_Quote_Widget");'));
add_shortcode('mlw_quotes', 'mlw_quotes_shortcode');

//Setup Translations
function mlw_quotes_translation_setup() {
  load_plugin_textdomain( 'mlw_quotes_text_domain', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action('plugins_loaded', 'mlw_quotes_translation_setup');

///Create Admin Pages
function mlw_quotes_add_menu()
{
	if (function_exists('add_menu_page'))
	{
		add_menu_page('Quote Master', 'Quote Master', 8, __FILE__, 'mlw_quotes_generate_admin');
		add_submenu_page(__FILE__, 'Categories', 'Categories', 8, 'mlw_quotes_category', 'mlw_quotes_generate_category_page');
		add_submenu_page(__FILE__, 'Help', 'Help', 8, 'mlw_quotes_help', 'mlw_quotes_generate_help_page');
	}
}
?>