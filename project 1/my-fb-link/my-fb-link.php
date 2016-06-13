<?php
/**
 * @package My facebook Link
 * @version 1.0
 */
/*
Plugin Name: My facebook Link
Plugin URI: http://wordpress.org/plugins/my-facebook-link
Description: Give your facebook profile link to user after a post published.
Author: Subhasish Manna
Version: 1.0
Author URI: http://b.subho.host22.com/
*/

$mfl_setting = get_option('mfl_setting');
// Add Scripts
require(plugin_dir_path(__FILE__).'inc/my-fb-link-scripts.php');


// Add Scripts
if(is_admin()){
require(plugin_dir_path(__FILE__).'inc/my-fb-link-settings.php');
}

// Add Scripts
require(plugin_dir_path(__FILE__).'inc/my-fb-link-content.php');