<?php 
/**
 * @package Your Facebook Page
 * @version 1.0
 * @widget class
 */
 
class Yfbp_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'Yfbp_widget',
			'description' => 'Show Facebook Page.',
		);
		parent::__construct( 'Yfbp_widget', 'Facebook Page Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	
}