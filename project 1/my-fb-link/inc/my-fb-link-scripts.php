<?php 
/**
 * @package My facebook Link
 * @version 1.0
	Template of plugin scripis
 */
 
function mfl_add_style(){
	// Add Style
	wp_enqueue_style(' mfl-style',  plugins_url().'/my-fb-link/css/style.css' );
	
	
	
}
add_action('wp_head', 'mfl_add_style');

function mfl_add_scripts(){
	// Add Style
	wp_enqueue_script(' mfl-script',  plugins_url().'/my-fb-link/js/main.js', array('jquery') );
	
	
	
}
add_action('wp_footer', 'mfl_add_scripts');

