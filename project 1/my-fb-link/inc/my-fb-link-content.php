<?php 

/**
 * @package My facebook Link
 * @version 1.0
	@ Plugin content template.
 */
 
 function mfl_content_generation($content){
	global $mfl_setting;
	if($mfl_setting['enable']){
		if($mfl_setting['sibp']){
			$mfl_content = '
					<hr />
					<div class="mfpl">
						<a target="_blank" title="Like me on facebook" href="'.$mfl_setting['url'].'"><span class=" dashicons dashicons-facebook-alt" ></span>Like me</a>
					</div>
			
			';
			
		}else{
			if(is_single()){
				$mfl_content = '
					
					<div class="mfpl">
						<a target="_blank" title="Like me on facebook" href="'.$mfl_setting['url'].'">
							<span class="dashicons dashicons-facebook-alt" ></span>
							Like me
							</a>
					</div>
			
			';
			}else{
				$mfl_content ='';
			}
		}
		
	}else{
		$mfl_content ='';
		
	}
	
	return $content.$mfl_content;
	
	 
 }
 add_filter('the_content', 'mfl_content_generation');
 