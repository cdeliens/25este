<?php
	
	global $themename;
	global $optionimg;

	$themename = get_current_theme();
	

function create_option_menu(){

	global $themename;
	
	add_menu_page('cooolZine', 'cooolZine', 7, 'options.php', 'cooolzine_options');
	
}

function cooolzine_options(){
	global $themename;
	global $optionimg;

	save_options();
	
	$styles = array(
    	'1'=>'baroque',
    	'2'=>'bokeh',
    	'3'=>'statement',
    	'4'=>'wood',
    	'5'=>'leafy'
	);
	
	$layout = array(
		'cooolfull' => 'liquid layout',
		'cooolfixed' => 'fixed layout'
	);
	
	
	$ads = array(
		'false' => 'no sidebar boxes',
		'true'	=> 'display sidebar boxes'
	);
	
	$categories =  get_categories(array('hide_empty' => false)); 
	
	/** start option form ***/
	?>
	<div class="wrap bloooming">
		<form method="post" action="">
		<h2>cooolZine options</h2>

			<br class="clear" />
			<ul class="inputlist">
				<li>
				<label>Style</label>
				<select name="<?php print $themename ?>_style">
					<?php
					
						foreach ($styles as $id => $s) {
						  	$option = '<option value="'.$id.'" ';
						  		
						  		if (get_option($themename.'_style') == $id) {
						  			
						  			$option .= 'selected="selected"';
						  		}
						  		
						  	$option .= ' >';
							$option .= $s;
							$option .= '</option>';
							echo $option;
						  }
					?>
				</select>
				<a class="tooltip" title="Define your prefered background style">help</a>
				</li>


				<li>
				<label>Layout</label>
				<select name="<?php print $themename ?>_layout">
					<?php
					
						foreach ($layout as $wid => $w) {
						  	$option = '<option value="'.$wid.'" ';
						  		
						  		if (get_option($themename.'_layout') == $wid) {
						  			
						  			$option .= 'selected="selected"';
						  		}
						  		
						  	$option .= ' >';
							$option .= $w;
							$option .= '</option>';
							echo $option;
						  }
					?>
				</select>
				<a class="tooltip" title="Define your prefered site width">help</a>
				</li>


				<li>
				<label>Logo</label>
				<input name="<?php print $themename ?>_logo" type="text" value="<?php print get_option($themename.'_logo'); ?>" />
				<a href="media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true&amp;width=640&amp;height=580&amp;rel=Boooster_logo" id="add_image" class="thickbox" title="Add an Image"><img src="images/media-button-image.gif" alt="Add an Image"></a>
			
				<a class="tooltip" title="Choose your image or upload a new one, and just copy the 'file url' here (optional). Max. height is 40 pixels.">help</a>
				</li>

				<li>
				<label>Sidebar boxes</label>
				<select name="<?php print $themename ?>_adside">
					<?php
					
						foreach ($ads as $aid => $d) {
						  	$option = '<option value="'.$aid.'" ';
						  		
						  		if (get_option($themename.'_adside') == $aid) {
						  			
						  			$option .= 'selected="selected"';
						  		}
						  		
						  	$option .= ' >';
							$option .= $d;
							$option .= '</option>';
							echo $option;
						  }
					?>
				</select>
				<a class="tooltip" title="The sidebar boxes are going to be displayed after the top 5 articles, the top 10 articles, and at the end of the list.">help</a>
				</li>


			
			<h2>Category colors</h2>
			<li>
			<?php
				foreach($categories as $cat) {
				
						print '<label>'.$cat->name.'</label>';
						print '<input type="text" title="Add an hex color" name="'.$themename.'_color_'.$cat->slug.'" id="'.$themename.'_color_'.$cat->slug.'" value="'.get_option($themename.'_color_'.$cat->slug).'" />';
						
						print '<a class="tooltip" title="Insert a color hex code, starting with #">help</a>';
										
				}
			
			?>
		</li>	
		<li>
		<h2>Google Analytics</h2>
				<label>ID</label>
				<input name="<?php print $themename ?>_analytics" type="text" value="<?php print get_option($themename.'_analytics'); ?>" />
						
				<a class="tooltip" title="Paste your Google Analytics ID here (UA-123456-78)">help</a>
		</li>
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />	
			</ul>

		</form>
	</div>	
	<?php


	/** start option form ***/

}

add_action('admin_menu', 'create_option_menu');

function save_options() {

	if ($_POST) {
		
		foreach($_POST as $k => $p) {

			update_option($k,$p);
			
		}
	
	}

}


function options_head(){
	$url = get_bloginfo('template_url');
	
	if (is_admin()) {
	
		wp_register_script('jquery', $url .'/js/jquery-1.4.2.min.js');
		wp_register_script('optionsjs', $url .'/lib/admin/options/options.js');
		wp_register_style('optionscss', $url .'/lib/admin/options/options.css');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('optionsjs');
		wp_enqueue_style('thickbox');
		wp_enqueue_style('optionscss');
	} // admin
		
}

//add_action('admin_head', 'options_head');
add_action('init', 'options_head');

	
?>