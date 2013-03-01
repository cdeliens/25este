<?php 

//*********** create post list ***********//
$list = array();

	$fid = get_option('page_on_front');
	$toppost = get_post_meta($fid,'_'.strtolower(get_current_theme()).'_toppost',true);
	$toppost1 = get_post_meta($fid,'_'.strtolower(get_current_theme()).'_1toppost',true);
	$toppost2 = get_post_meta($fid,'_'.strtolower(get_current_theme()).'_2toppost',true);
	$toppost3 = get_post_meta($fid,'_'.strtolower(get_current_theme()).'_3toppost',true);
	$toppost4 = get_post_meta($fid,'_'.strtolower(get_current_theme()).'_4toppost',true);
	
	$excl = array();

	
	if ($toppost != 0) {
		$list['top']['0'] = get_post($toppost,OBJECT);
		$excl[] = $toppost;
	}
	
	if ($toppost1 != 0) {
		$list['top5']['0'] = get_post($toppost1,OBJECT);
		$excl[] = $toppost1;
	}
	
	if ($toppost2 != 0) {
		$list['top5']['1'] = get_post($toppost2,OBJECT);
		$excl[] = $toppost2;
	}
	
	if ($toppost3 != 0) {
		$list['top5']['2'] = get_post($toppost3,OBJECT);
		$excl[] = $toppost3;
	}
	
	if ($toppost4 != 0) {
		$list['top5']['3'] = get_post($toppost4,OBJECT);
		$excl[] = $toppost4;
	}

// //llama a los post eventos
// query_posts($query_string . '&posts_per_page=2'.'&paged='.$paged);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('paged=' . $paged . '&category_name=galeria&posts_per_page=2'.'&paged='.$paged); // show posts in category 76 with pagination enabled


if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	$appearence = get_post_meta($post->ID,'_'.strtolower(get_current_theme()).'_appearence',true);
	
	/// exclude manually set top posts ///
	
	if (!in_array($post->ID, $excl)) {
		
	switch($appearence) {
			
			case '1':
				if (empty($list['top'])) {
					$list['top'][] = $post;
				}
				else {
					if (count($list['top5']) < 4) {
						$list['top5'][] = $post;
					}
					else {
						$list['default'][] = $post;
					}

				}
				
			break;
					
			case '0':
					if (count($list['top5']) < 4) {
						$list['top5'][] = $post;
					}
					else {
						$list['default'][] = $post;
					}
			break;
		
			case '':
					if (count($list['top5']) < 4) {
						$list['top5'][] = $post;
					}
					else {
						$list['default'][] = $post;
					}
			break;
		
		} // switch

	} // not excluded
	

endwhile; 
endif; 
//************ start custom loop ************//


if (array_key_exists('top',$list)) {
		print cooolzine_toparticle($list['top']['0']);	
}
else {
		print cooolzine_toparticle($list['top5']['0']);
		unset($list['top5']['0']);	
}

if (array_key_exists('top5',$list)) {
	foreach($list['top5'] as $t) {
		$layout = get_post_meta($t->ID, 'topcdn', true);
		switch($layout){
		  case '':
		    print cooolzine_toparticle($t);
		    break;
		  case '1':
		    print cooolzine_toparticle($t);	
		    break;
	    case '2':
		    print cooolzine_extended_boxarticle($t);	
		    break;
		}
	}
}

if (get_option(get_current_theme().'_adside') == 'true') {
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Front Top5')) {}
} // ads


?>
