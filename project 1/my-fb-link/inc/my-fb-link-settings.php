<?php 
/**
 * @package My facebook Link
 * @version 1.0
	@settings Page
 */

 
 // Add settings page for plugin
 
 function mfl_add_sttings_page(){
	 add_options_page( 
				__('My Facebook Page', 'mfl_textdomain'), 
			__('FB Link', 'mfl_textdomain'), 
			'manage_options', 
			'fb_link', 
			'mfl_add_sttings_page_callback'
		);
 }
 add_action('admin_menu', 'mfl_add_sttings_page');
 
 // setting page callback function 
 
 function mfl_add_sttings_page_callback(){
	global $mfl_setting;
	
	?>
		<div class="warp">
			<h1><?php _e('My Facebook PAge Link', 'mfl_textdomain'); ?></h1>
			<p><?php _e('Change Your facebook page plugin settings from here.', 'mfl_textdomain'); ?></p>
			<form action="options.php" method="post"  >
				<?php settings_fields( 'mafl_settings_group' ); ?>
				<table class="form-table" >
					<!-- enable plugin field -->
					<tr scope="row" >
					<?php echo $mfl_setting['enable']; ?>
						<th>
							<label for="mfl_setting[enable]"><?php _e('Enable Plugin', 'mfl_textdomain'); ?></label>
						</th>
						<td>
							<input type="checkbox"  <?php checked('1', $mfl_setting['enable'] ); ?>  name="mfl_setting[enable]" value="1" id="mfl_setting[enable]" />
						</td>
					</tr>
					
					<!-- facebook url field -->
					<tr>
						<th>
							<label for="mfl_setting[url]"><?php _e('Your facebook page url', 'mfl_textdomain'); ?></label>
						</th>
						<td>
							<input  class="regular-text" type="text"  name="mfl_setting[url]" value="<?php echo  esc_attr($mfl_setting['url']);  ?>" id="mfl_setting[url]" />
						</td>
					</tr>
					<!-- Show in Blog page -->
					<tr scope="row" >
						<th>
							<label for="mfl_setting[sibp]"><?php _e('Show In Blog Page', 'mfl_textdomain'); ?></label>
						</th>
						<td>
							<input type="checkbox"  <?php checked('1', $mfl_setting['sibp'] ); ?>  name="mfl_setting[sibp]" value="1" id="mfl_setting[sibp]" />
						</td>
					</tr>
					
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
			</form>
		</div>
	
	
	<?php
 }
 
 //Create Setting gruop
 function mfl_register_setting(){
		register_setting( 'mafl_settings_group', 'mfl_setting');
 }
 add_action('admin_init', 'mfl_register_setting');
 
 
 