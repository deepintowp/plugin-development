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
			$widget_content = array();
			$title = $instance['title'] ?  $instance['title'] : 'Title';
			$widget_content['page_url'] =  $instance['page_url'] ?  $instance['page_url'] : 'https://www.facebook.com/facebook/';
			$widget_content['tabs'] =  $instance['tabs'] ?  $instance['tabs'] : 'timeline';
			$widget_content['width']  =  $instance['width'] ?  $instance['width'] : 300;
			$widget_content['height'] =  $instance['height'] ?  $instance['height'] : 300;
			$widget_content['small_header'] =  $instance['small_header'] ?  $instance['small_header'] :'yes';
			$widget_content['adopt_con_wid'] =  $instance['adopt_con_wid'] ?  $instance['adopt_con_wid'] :'yes';
			$widget_content['hide_cover'] =  $instance['hide_cover'] ?  $instance['hide_cover'] :'no';
			$widget_content['firend_faces'] =  $instance['firend_faces'] ?  $instance['firend_faces'] :'yes';
		// outputs the content of the widget
		
		echo $args['before_widget'];
		echo $args['before_title'];
		echo $title;
		echo $args['after_title'];
		$this->yfbp_widget_frontend_content( $instance );
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
			
		// outputs the options form on admin
		$this->yfbp_widget_form( $instance );
		
		
	}
	/*
	*	Widget backend form
	*
	*/
	public function yfbp_widget_form( $instance ){
		$title = $instance['title'] ?  $instance['title'] : 'Title';
		$page_url =  $instance['page_url'] ?  $instance['page_url'] : 'https://www.facebook.com/facebook/';
		$tabs =  $instance['tabs'] ?  $instance['tabs'] : 'timeline';
		$width =  $instance['width'] ?  $instance['width'] : 300;
		$height =  $instance['height'] ?  $instance['height'] : 300;
		$small_header =  $instance['small_header'] ?  $instance['small_header'] :'yes';
		$adopt_con_wid =  $instance['adopt_con_wid'] ?  $instance['adopt_con_wid'] :'yes';
		$hide_cover =  $instance['hide_cover'] ?  $instance['hide_cover'] :'no';
		$firend_faces =  $instance['firend_faces'] ?  $instance['firend_faces'] :'yes';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'yfbp'); ?></label>
			<input name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Your Facebook PAge URL', 'yfbp'); ?></label>
			<input name="<?php echo $this->get_field_name('page_url'); ?>" value="<?php echo esc_attr($page_url); ?>" id="<?php echo $this->get_field_id('page_url'); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tabs'); ?>"><?php _e('Choose Tabs below.', 'yfbp'); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name('tabs'); ?>" id="<?php echo $this->get_field_id('tabs'); ?>">
				<option <?php echo $tabs=='timeline' ? 'selected' : ''; ?> value="timeline"><?php _e('Timeline', 'yfbp'); ?></option>
				<option <?php echo $tabs=='events' ? 'selected' : ''; ?> value="events"><?php _e('Events', 'yfbp'); ?></option>
				<option <?php echo $tabs=='messages' ? 'selected' : ''; ?> value="messages"><?php _e('Messages', 'yfbp'); ?></option>
				<option <?php echo $tabs=='shownotabs' ? 'selected' : ''; ?> value="shownotabs"><?php _e('Show No Tabs', 'yfbp'); ?></option>
				
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('adopt_con_wid'); ?>"><?php _e('Adopt container Width.', 'yfbp'); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name('adopt_con_wid'); ?>" id="<?php echo $this->get_field_id('adopt_con_wid'); ?>">
				<option <?php echo $adopt_con_wid=='yes' ? 'selected' : ''; ?> value="yes"><?php _e('YES', 'yfbp'); ?></option>
				<option <?php echo $adopt_con_wid=='no' ? 'selected' : ''; ?> value="no"><?php _e('NO', 'yfbp'); ?></option>
				
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', 'yfbp'); ?></label>
			<input name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($width); ?>" id="<?php echo $this->get_field_id('width'); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height', 'yfbp'); ?></label>
			<input name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($height); ?>" id="<?php echo $this->get_field_id('height'); ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('small_header'); ?>"><?php _e('Use small header?', 'yfbp'); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name('small_header'); ?>" id="<?php echo $this->get_field_id('small_header'); ?>">
				<option <?php echo $small_header=='yes' ? 'selected' : ''; ?> value="yes"><?php _e('YES', 'yfbp'); ?></option>
				<option <?php echo $small_header=='no' ? 'selected' : ''; ?> value="no"><?php _e('NO', 'yfbp'); ?></option>
				
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('firend_faces'); ?>"><?php _e('Show Firend Faces?', 'yfbp'); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name('firend_faces'); ?>" id="<?php echo $this->get_field_id('firend_faces'); ?>">
				<option <?php echo $firend_faces=='yes' ? 'selected' : ''; ?> value="yes"><?php _e('YES', 'yfbp'); ?></option>
				<option <?php echo $firend_faces=='no' ? 'selected' : ''; ?> value="no"><?php _e('NO', 'yfbp'); ?></option>
				
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('hide_cover'); ?>"><?php _e('Hide Cover Photo?', 'yfbp'); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name('hide_cover'); ?>" id="<?php echo $this->get_field_id('hide_cover'); ?>">
				<option <?php echo $hide_cover=='yes' ? 'selected' : ''; ?> value="yes"><?php _e('YES', 'yfbp'); ?></option>
				<option <?php echo $hide_cover=='no' ? 'selected' : ''; ?> value="no"><?php _e('NO', 'yfbp'); ?></option>
				
			</select>
		</p>
		
		
		
		<?php
	}
	
	/*
	*	Widget front end Content.
	*/
	
	public function yfbp_widget_frontend_content( $widget_content ){
			// $widget_content['page_url'] =  $instance['page_url'] ?  $instance['page_url'] : 'https://www.facebook.com/facebook/';
			// $widget_content['tabs'] =  $instance['tabs'] ?  $instance['tabs'] : 'timeline';
			// $widget_content['width']  =  $instance['width'] ?  $instance['width'] : 300;
			// $widget_content['height'] =  $instance['height'] ?  $instance['height'] : 300;
			// $widget_content['small_header'] =  $instance['small_header'] ?  $instance['small_header'] :'yes';
			// $widget_content['adopt_con_wid'] =  $instance['adopt_con_wid'] ?  $instance['adopt_con_wid'] :'yes';
			// $widget_content['hide_cover'] =  $instance['hide_cover'] ?  $instance['hide_cover'] :'no';
			// $widget_content['firend_faces'] =  $instance['firend_faces'] ?  $instance['firend_faces'] :'yes';
			?>
			<div class="fb-page" 
				data-href="<?php echo $widget_content['page_url']; ?>" 
				
				<?php if($widget_content['tabs'] != 'shownotabs' ): ?>
				data-tabs="<?php if($widget_content['tabs'] == 'timeline' ){ echo 'timeline'; }elseif($widget_content['tabs'] == 'events'){ echo 'events'; } else{ echo 'messages'; } ?>" 
				<?php endif; ?>
				data-small-header="<?php if($widget_content['small_header'] == 'yes' ){ echo 'true'; }else{ echo 'false';}  ?>" 
				data-adapt-container-width="<?php if($widget_content['adopt_con_wid'] == 'yes' ){ echo 'true'; }else{ echo 'false';}  ?>" 
				data-hide-cover="<?php if($widget_content['hide_cover'] == 'yes' ){ echo 'true'; }else{ echo 'false';}  ?>" 
				<?php if($widget_content['adopt_con_wid'] == 'no' ){ 
				echo 'data-height="'.$widget_content['height'].'"';
				echo 'data-width="'.$widget_content['width'].'"';
				
				}
				
				?>
				
				
				data-show-facepile="<?php if($widget_content['firend_faces'] == 'yes' ){ echo 'true'; }else{ echo 'false';}  ?>">
					<blockquote cite="<?php echo $widget_content['page_url']; ?>" class="fb-xfbml-parse-ignore">
						<a href="<?php echo $widget_content['page_url']; ?>">Manna 3w</a>
					</blockquote>
			</div>
			
			<?php
			
			
		
	}
	
	
	
	
	
	
	
	
}