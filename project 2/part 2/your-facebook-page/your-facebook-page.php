<?php
/**
 * @package Your Facebook Page
 * @version 1.0
 */
/*
Plugin Name: Your Facebook Page
Plugin URI: http://wordpress.org/plugins/your-facebook-page/
Description:  Show Your facebook page.
Author: Subhasih Mann
Version: 1.0
Author URI: http://b.subho.host22.com
*/
// make sure the plugin runs on wordprss only
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  stop kidding. Runs me on wordpress.';
	exit;
}

// exit if someone want to access directly plugin files
if(!defined('ABSPATH')){
	exit;
}

//Add Scripts File
require_once(plugin_dir_path(__FILE__).'/inc/your-facebook-page-scripts.php');
//Add class file
require_once(plugin_dir_path(__FILE__).'/inc/your-facebook-page-class.php');


// Register Facebook Page widget

add_action( 'widgets_init', function(){
	register_widget( 'Yfbp_widget' );
});


















