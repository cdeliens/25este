<?php

function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'" title="delete this comment">delete</a> ';
  }
}


function cooolzine_toparticle($post){
	
	if (!empty($post)) {

	///*** get first picture ***///
	$image = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC') );
	
	$firstimage = key($image);
	$src = wp_get_attachment_image_src($image[$firstimage]->ID,'toparticle', false);
	

	///*** get category ***///
	$cat = get_the_category($post->ID);
	$firstcat = key($cat);
	foreach($cat as $cdn) {
		if($cdn->slug == 'evento'){
		$fecha = get_post_meta($post->ID, 'fecha', true);
		}
	}
	
	$tags = get_the_tags($post->ID);

	$tagclass = '';
	
	if (!empty($tags)) {
		foreach($tags as $t){
			$tagclass .= $t->slug.' ';
		}
	}

	///******** excerpt *********///
	$extralen = 600;

	$headrows = 0;
	
	$tlen = strlen(get_the_title($post->ID));
													
	
$ret = '
<div class="box toparticle '.$cat[$firstcat]->slug.' '.$tagclass.'">
<div class="text">';

	if (!empty($image)){
	
		$extralen = 0;
		
		$ret .= '
			<div class="thumb">
			<div id="fechaEvento" class="cat-'.$cat[$firstcat]->slug.'">'.$fecha.'</div>
				<img src="'.$src[0].'" alt="'.$post->post_title.'" title="'.$post->post_title.'" />
				<a href="'.get_permalink($post->ID).'">leer más</a>
			</div><!--thumb-->
		';
		
	} // has images
	
	if ($tlen >= 1 && $tlen <= 36) {
		$headrows = 1;
		$alen = 290 + $extralen;
	}
	
	if ($tlen > 36 && $tlen <= 50) {
		$headrows = 2;
		$alen = 220 + $extralen;
	}
	
	if ($tlen > 50 && $tlen <= 76) {
		$headrows = 3;
		$alen = 210 + $extralen;
	}
	
	if ($tlen > 76 && $tlen <= 98) {
		$headrows = 4;
		$alen = 180 + $extralen;
	}
	
	if ($tlen > 98) {
		$alen = 180 + $extralen;
	}

	$clean = strip_tags($post->post_content);
	
	$cut = substr($clean,0,$alen);

$ret .= '<div class="meta"><a class="cat-'.$cat[$firstcat]->slug.'" href="'.get_permalink($post->ID).'">'.$cat[0]->slug.'-'.$cat[1]->slug.'</a></div><!--meta-->
	<h1 class="hyphenate"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h1>
	<iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink($post->ID).'&amp;layout=button_count&amp;show_faces=true&amp;width=130&amp;action=like&amp;font=segoe+ui&amp;colorscheme=dark&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:21px;" allowTransparency="true"></iframe>
	<a href="'.get_permalink($post->ID).'">
		<span class="hyphenate">
		'.$cut.' &rsaquo;
		</span>
	</a>
</div><!--text-->
</div><!--article-->
	';
	
	return $ret;
	
	} // post
}



function cooolzine_boxarticle($post){
	
	if (!empty($post)) {


	///*** get first picture ***///
	$image = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC') );
	$firstimage = key($image);
	$src = wp_get_attachment_image_src($image[$firstimage]->ID,'thumbnail', false);
	
	///*** get category ***///
	$cat = get_the_category($post->ID);
	$firstcat = key($cat);
	foreach($cat as $cdn) {
		if($cdn->slug == 'evento'){
		$fecha = get_post_meta($post->ID, 'fecha', true);
		}
	}
	
		
	$tags = get_the_tags($post->ID);

	$tagclass = '';
	if (!empty($tags)) {
		foreach($tags as $t){
			$tagclass .= $t->slug.' ';
		}
	}

	///******** excerpt *********///
	$extralen = 260;

	$headrows = 0;
	
	$tlen = strlen(get_the_title($post->ID));
	///****** fecha **********///
	
	
$ret = '
<div class="box article '.$cat[$firstcat]->slug.' '.$tagclass.'">
<div class="text">';

	if (!empty($image)){
	
		$extralen = 0;
		
		$ret .= '
		  <div id="fechaEvento" class="cat-'.$cat[$firstcat]->slug.'">'.$fecha.'</div>
			<div class="thumb">	
				<img src="'.$src[0].'" alt="'.$post->post_title.'" title="'.$post->post_title.'" />
				<a href="'.get_permalink($post->ID).'">leer más</a>
			</div><!--thumb-->
		';
		
	} // has images


	if ($tlen >= 1 && $tlen <= 20) {
		$headrows = 1;
		$alen = 160 + $extralen;
	}
	
	if ($tlen > 20 && $tlen <= 40) {
		$headrows = 2;
		$alen = 115 + $extralen;
	}
	
	if ($tlen > 40 && $tlen <= 66) {
		$headrows = 3;
		$alen = 100 + $extralen;
	}
	
	if ($tlen > 66 && $tlen <= 88) {
		$headrows = 4;
		$alen = 55 + $extralen;
	}
	
	if ($tlen > 88) {
		$alen = 55 + $extralen;
	}
													
	$clean = strip_tags($post->post_content);
	
	$cut = substr($clean,0,$alen);



$ret .= '<div class="meta"><a class="cat-'.$cat[$firstcat]->slug.'" href="'.get_permalink($post->ID).'">'.$cat[0]->name.'-'.$cat[1]->name.'</a></div><!--meta-->
	<h2 class="hyphenate"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>
	<a href="'.get_permalink($post->ID).'">
		<span class="hyphenate">
		'.$cut.' &rsaquo;
		</span>
	</a>
</div><!--text-->
</div><!--article-->
	';
	return $ret;
	} // post
}

function cooolzine_extended_boxarticle($post){
	
	if (!empty($post)) {


	///*** get first picture ***///
	$image = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC') );
	$firstimage = key($image);
	$src = wp_get_attachment_image_src($image[$firstimage]->ID,'extended', false);
	
	///*** get category ***///
	$cat = get_the_category($post->ID);
	$firstcat = key($cat);
	foreach($cat as $cdn) {
		if($cdn->slug == 'evento'){
		$fecha = get_post_meta($post->ID, 'fecha', true);
		}
	}
	
		
	$tags = get_the_tags($post->ID);

	$tagclass = '';
	if (!empty($tags)) {
		foreach($tags as $t){
			$tagclass .= $t->slug.' ';
		}
	}

	///******** excerpt *********///
	$extralen = 800;

	$headrows = 0;
	
	$tlen = strlen(get_the_title($post->ID));
	///****** fecha **********///
	
	
$ret = '
<div class="box extended_article  '.$cat[$firstcat]->slug.' '.$tagclass.'">
<div class="text">';

	if (!empty($image)){
	
		$extralen = 0;
		
		$ret .= '
			<div id="fechaEvento" class="cat-'.$cat[$firstcat]->slug.'">'.$fecha.'</div>		
			<div class="thumb">	
				<img src="'.$src[0].'" alt="'.$post->post_title.'" title="'.$post->post_title.'" />
				<a href="'.get_permalink($post->ID).'">leer más</a>
			</div><!--thumb-->
		';
		
	} // has images

  $headrows = 1;
	$alen = 290 + $extralen;
	$clean = strip_tags($post->post_content);
	
	$cut = substr($clean,0,$alen);
	
  // 
  // if(get_the_tag_list()) {  print get_the_tag_list('<ul class="tags"><li>','</li><li>','</li></ul>');"

  $ret .= '<div class="meta"><a class="cat-'.$cat[$firstcat]->slug.'" href="'.get_permalink($post->ID).'">'.$cat[0]->slug.'-'.$cat[1]->slug.'</a></div><!--meta-->
  	<h1 class="hyphenate"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h1>
  	<div id="facebook-like-box"><iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink($post->ID).'&amp;layout=button_count&amp;show_faces=true&amp;width=130&amp;action=like&amp;font=segoe+ui&amp;colorscheme=dark&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:21px;" allowTransparency="true"></iframe></div>
  	<a href="'.get_permalink($post->ID).'">
  		<span class="hyphenate">
  		'.$cut.' &rsaquo;
  		</span>
  	</a>
  </div><!--text-->
  </div><!--article-->
  	';

  	return $ret;

	} // post
}

function cooolzine_related($p) {

	$ret = '';

	$tags = wp_get_post_tags($p->ID);
	$cats = wp_get_post_categories($p->ID);

		$tag_ids = array();
		$cat_ids = array();
	
	if ($tags) {

		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;	

	} // if tags
	
	if ($cats) {
		foreach($cats as $individual_cat) $cat_ids[] = $individual_cat;	
	}

	
	if (!empty($tag_ids)) {

		$argst = array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($p->ID),
				'showposts'=>5, // Number of related posts that will be shown.
				'caller_get_posts'=>1
			);

		$relatedt = get_posts($argst);
		
		foreach($relatedt as $rpt) {
			$ret .= cooolzine_boxarticle($rpt);
		}
	
	} // has tags
	
	
	if (!empty($cat_ids)) {

		$argsc = array(
				'category__in' => $cat_ids,
				'post__not_in' => array($p->ID),
				'showposts'=>5, // Number of related posts that will be shown.
				'caller_get_posts'=>1
			);

		$relatedc = get_posts($argsc);
		
		foreach($relatedc as $rpc) {
			$ret .= cooolzine_boxarticle($rpc);
		}
	
	} // has tags
	
	

	return $ret;
}


function cooolzine_color(){
	
	global $themename;

	$cats = get_categories(array('hide_empty' => false)); 

	$pic = get_bloginfo('template_url').'/img/arrowblack.png';

	$upldir = wp_upload_dir();
	$cooolzinepath = $upldir['basedir'] .'/cooolzine';
	
	$out = "<style type=\"text/css\">\r\n";
		
		foreach($cats as $cat) {
			
				$setting = get_option($themename.'_color_'.$cat->slug);
				
				if ($setting != '') {
					$out .= '
						a.cat-'.$cat->slug.',a.cat-'.$cat->slug.':hover, li.cat-'.$cat->slug.' a,li.cat-'.$cat->slug.':hover a{
							color: '.$setting.';
						}';
						
					
					/// create colored arrow ///
					$pname = 'cat-'.$cat->slug.'.png';
				
					if (cooolzine_colorpic($pic, $setting, $pname)){
						
						$out .= 'li.cat-'.$cat->slug.' {
								background-image:url('.$upldir['baseurl'].'/cooolzine/cat-'.$cat->slug.'.png);
								background-repeat:no-repeat;
						}
						';
					};
				


				/*
						
						
						li.cat-'.$cat->slug.' {
							background-image:url('.get_bloginfo('template_url').'/img/cat-'.$cat->slug.'.png);
							background-repeat:no-repeat;
						}					
					';
				*/
				}
				else {
					$out .= '
						li.cat-'.$cat->slug.' {
							background-image:url('.get_bloginfo('template_url').'/img/arrowblank.png);
							background-repeat:no-repeat;
						}					
					';
				}
			
		}
		
	$out .= '</style>';

	return $out;
		
}

function cooolzine_hextorgb($hex) {

		$hex = ereg_replace("#", "", $hex);
		$color = array();
		
		if(strlen($hex) == 3) {
			$color['red'] = hexdec(substr($hex, 0, 1) . $r);
			$color['green'] = hexdec(substr($hex, 1, 1) . $g);
			$color['blue'] = hexdec(substr($hex, 2, 1) . $b);
			$color['alpha'] = '0';
		}
		else if(strlen($hex) == 6) {
			$color['red'] = hexdec(substr($hex, 0, 2));
			$color['green'] = hexdec(substr($hex, 2, 2));
			$color['blue'] = hexdec(substr($hex, 4, 2));
			$color['alpha'] = '0';
		}
		
		return $color;
}


function cooolzine_colorpic($img,$color,$pname){
		
		/* create path */
		$upldir = wp_upload_dir();
		$cooolzinepath = $upldir['basedir'] .'/cooolzine';

		$p = $cooolzinepath.'/'.$pname;
		
		if (!is_dir($cooolzinepath)) {
			mkdir($cooolzinepath,0777);
		}

		$rgbcolor = cooolzine_hextorgb($color);
		
		/* check if gd is compiled */
		
		if(function_exists(imagefilter)){
	
			/* check existing image */
			if (file_exists($p)) {
	
				$oldim = imagecreatefrompng($p);
				$oldrgb = imagecolorat($oldim, 1, 1);
				$oldcolors = imagecolorsforindex($oldim, $oldrgb);
	
			/// if color has changed create new image ////
				$diff = array_diff($rgbcolor, $oldcolors);
	
				if (!empty($diff)) {
					
					$im = imagecreatefrompng($img);
			
					imagealphablending($im, true); // setting alpha blending on
					imagesavealpha($im, true); // save alphablending setting (important)
					
					imagefilter($im,IMG_FILTER_COLORIZE,$rgbcolor['red'],$rgbcolor['green'],$rgbcolor['blue'],$rgbcolor['alpha']);
					
					imagepng($im,$p);
					imagedestroy($im);
	
				}
	
			} // file exists
			else {
	
					$im = imagecreatefrompng($img);
			
					imagealphablending($im, true); // setting alpha blending on
					imagesavealpha($im, true); // save alphablending setting (important)
					
					imagefilter($im,IMG_FILTER_COLORIZE,$rgbcolor['red'],$rgbcolor['green'],$rgbcolor['blue'],$rgbcolor['alpha']);
					
					imagepng($im,$p);
					imagedestroy($im);
			}


		} // function exists
		else {
			$arrowblank = get_bloginfo('template_url').'/img/'.'/arrowblank.png';
			file_copy($arrowblank,$p,FILE_EXISTS_REPLACE);

		}
		
		return true;
}

class noid_walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li ' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}





?>