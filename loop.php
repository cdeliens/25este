<?php 

//*********** create post list ***********//
$list = array();


if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	$appearence = get_post_meta($post->ID,'_'.strtolower(get_current_theme()).'_appearence',true);
		
	switch($appearence) {
			
			case '1':

				if (empty($list['top'])) {
					$list['top'][] = $post;
				}
				else {
					$list['default'][] = $post;
				}
				
			break;
					
			case '0':
			
				$list['default'][] = $post;
			break;
		
			case '':
			
				$list['default'][] = $post;
			break;
		
		} // switch

endwhile; 

endif; 
//************ start custom loop ************//


// top article is set

if (array_key_exists('top',$list)) {
		print cooolzine_toparticle($list['top']['0']);	
		
}
else {
		print cooolzine_toparticle($list['default']['0']);
		unset($list['default']['0']);	
}


if(array_key_exists('default',$list)) {

		foreach($list['default'] as $k => $a) {
			$topcdn = get_post_meta($a->ID, 'topcdn', true);
		if ($topcdn == 1)
		print cooolzine_toparticle($a);
		else
		print cooolzine_boxarticle($a);	
			
	
			if (get_option(get_current_theme().'_adside') == 'true') {
				$c = count($list['default']) - 1;
				if ($k == 10 || $k == $c) {
					if (get_option(get_current_theme().'_adside') == 'true') {
						if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Category Top10')) {}
					}
				} // 10
			} // ads
		}
}



if (get_option(get_current_theme().'_adside') == 'true') {
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Category End')) {}
}

?>
