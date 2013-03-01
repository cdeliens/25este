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

//llama a los post eventos
$id_event = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE slug = 'evento';"));
$id_event_exp = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE slug = 'evento-pasado';"));
query_posts($query_string . '&cat=' . $id_event. ',- ' . $id_event_exp . '&posts_per_page=6'.'&paged='.$paged);


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
		print cooolzine_boxarticle($list['top']['0']);	
}
else {
		print cooolzine_boxarticle($list['top5']['0']);
		unset($list['top5']['0']);	
}

if (array_key_exists('top5',$list)) {
	foreach($list['top5'] as $t) {
		$topcdn = get_post_meta($t->ID, 'topcdn', true);
		if ($topcdn == 1)
		print cooolzine_boxarticle($t);
		else
		print cooolzine_boxarticle($t);	
	}
}

if (get_option(get_current_theme().'_adside') == 'true') {
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Front Top5')) {}
    // if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Special')) {}
} // ads

//////////////////////// tabs //////////////////////

?>
<!-- div class="tabs box">
        <ul class="tabnav">

           	<?php
           	
           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab1',true)){
				 	echo '<li><a href="#tab1">'.get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab1',true).'</a></li>';
           		}

           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab2',true)){
				 	echo '<li><a href="#tab2">'.get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab2',true).'</a></li>';
           		}
           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab3',true)){
				 	echo '<li><a href="#tab3">'.get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab3',true).'</a></li>';
           		}
           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab4',true)){
				 	echo '<li><a href="#tab4">'.get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab4',true).'</a></li>';
           		}

          	
           	?>
        </ul>
			
			
			<?php
			
			    if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab1',true)){
					print '<div class="tabcontent" id="tab1">';
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('FrontPage Tab 1')) {}           	
					print '</div>';
           		}

           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab2',true)){
					print '<div class="tabcontent" id="tab2">';
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('FrontPage Tab 2')) {}           	
					print '</div>';
           		}
           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab3',true)){
					print '<div class="tabcontent" id="tab3">';
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('FrontPage Tab 3')) {}           	
					print '</div>';
           		}
           		if (get_post_meta($fid,'_'.strtolower(get_current_theme()).'_tab4',true)){
					print '<div class="tabcontent" id="tab4">';
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('FrontPage Tab 4')) {}           	
					print '</div>';
           		}
           	
           	?>


</div --><!--tabcon-->


<?php
if (array_key_exists('default',$list)) {
	foreach($list['default'] as $k => $d) {
		$topcdn = get_post_meta($d->ID, 'topcdn', true);
		if ($topcdn == 1)
		print cooolzine_boxarticle($d);
		else
		print cooolzine_boxarticle($d);	
		
			if ($k == 3) {
				if (get_option(get_current_theme().'_adside') == 'true') {
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Front Top10')) {}
				}
			} // 10
	}
} // default

if (get_option(get_current_theme().'_adside') == 'true') {
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Front End')) {}
}	


?>