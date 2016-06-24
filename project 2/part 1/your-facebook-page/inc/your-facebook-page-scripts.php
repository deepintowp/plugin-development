<?php 
/**
 * @package Your Facebook Page
 * @version 1.0
 * @ enqueue style and scipts
 */
 function yfbp_style_n_scripts(){
	 //ADD STYLE
	 wp_enqueue_style('yfbp-style', plugins_url().'/your-facebook-page/css/style.css' );
	 //ADD Scripts
	 wp_enqueue_script('yfbp-scripts', plugins_url().'/your-facebook-page/js/main.js', array('jquery') );
	 
 }
 add_action('wp_enqueue_scripts', 'yfbp_style_n_scripts');