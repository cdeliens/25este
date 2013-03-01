<?php

global $prefix;
	
$prefix = '_'.strtolower(get_current_theme()).'_';
$args = array(
	'post_type'	=> 'post',
	'order' => 'ASC',
	'numberposts'	=> 50
);

$tops = array('0' => 'auto');

$posts = get_posts($args);
$c = count($posts) -1;
for ($i=0; $i<=$c; $i++){

	$tops[$posts[$i]->ID] = $posts[$i]->post_title;

}

global $customFields;
$customFields = array(
	array(
		'section'	=>		"Appearence",
		'appear'	=>		"post",
		'template'	=>		"all",
		'help'		=>		'Define where this article appears on summary page.',
		'fields'	=>		array(
			
							array(
								"name"			=> "appearence",
								"title"			=> "Position",
								"description"	=> "",
								"type"			=> "select",
								"scope"			=>	array("post"),
								"capability"	=> "edit_posts",
								"options"		=> array(
									'0' =>	'Default',
									'1'	=>	'Top article'
								)
							)
			
		) // fields array
	), // 1
	array(
		'section'	=>		"Frontpage",
		'appear'	=>		"page",
		'template'	=>		"all",
		'help'		=>		'Define the top articles on the frontpage.',
		'fields'	=>		array(
			
								array(
									"name"			=> "toppost",
									"title"			=> "Leading post",
									"description"	=> "",
									"type"			=> "select",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page",
									"options"		=> $tops
								),
								array(
									"name"			=> "1toppost",
									"title"			=> "1. Top post",
									"description"	=> "",
									"type"			=> "select",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page",
									"options"		=> $tops
								),
								array(
									"name"			=> "2toppost",
									"title"			=> "2. Top post",
									"description"	=> "",
									"type"			=> "select",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page",
									"options"		=> $tops
								),
								array(
									"name"			=> "3toppost",
									"title"			=> "3. Top post",
									"description"	=> "",
									"type"			=> "select",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page",
									"options"		=> $tops
								),
								array(
									"name"			=> "4toppost",
									"title"			=> "4. Top post",
									"description"	=> "",
									"type"			=> "select",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page",
									"options"		=> $tops
								)
			
		) // fields array
	), // 2
	array(
		'section'	=>		"Tabs",
		'appear'	=>		"page",
		'template'	=>		"all",
		'help'		=>		'Define the headlines for the tabs on the front page. If there is no headline actual tab will not be displayed ',
		'fields'	=>		array(
			
								array(
									"name"			=> "tab1",
									"title"			=> "Headline Tab 1",
									"description"	=> "",
									"type"			=> "text",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page"
								),
								array(
									"name"			=> "tab2",
									"title"			=> "Headline Tab 2",
									"description"	=> "",
									"type"			=> "text",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page"
								),
								array(
									"name"			=> "tab3",
									"title"			=> "Headline Tab 3",
									"description"	=> "",
									"type"			=> "text",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page"
								),
								array(
									"name"			=> "tab4",
									"title"			=> "Headline Tab 4",
									"description"	=> "",
									"type"			=> "text",
									"scope"			=>	array("page"),
									"capability"	=> "edit_page"
								),

		) // fields array
	) // 3
);



function create_meta_box() {
	global $customFields;
	
	if (function_exists('add_meta_box') && isset($customFields) && count($customFields) > 0) {  
		foreach($customFields as $cf) {
		
				add_meta_box(get_current_theme().'_'.$cf['section'].'_box', get_current_theme().' '.$cf['section'], 'display_meta_box_'.strtolower($cf['section']), $cf['appear'], 'normal', 'high' );  

		}
	}
} // create  



function display_meta_box_appearence() {
	print meta_box_contents('Appearence');	
}

function display_meta_box_frontpage() {
	print meta_box_contents('Frontpage');	
}

function display_meta_box_tabs() {
	print meta_box_contents('Tabs');	
}


function meta_box_contents($section) {
	
	global $customFields;
	global $prefix;
	global $optionimg;

	
	global $post;
	
	$out = '';
	$page_template = '';
	$tname = '';
	
	foreach($customFields as $cf) {
		
		
		
		// find section
		if ($cf['section'] == $section) {
			
			if (array_key_exists('picture',$cf)) {
				
				$out .= '<img class="metascreenshot" src="'.$optionimg.'/'.$cf['picture'].'" alt="screenshot" />';
				
			}
			
			$out .= '<p class="helpmeta">'.$cf['help'].'</p>';
				
			$page_template = get_post_meta($post->ID, '_wp_page_template', true);
			$tname = ucfirst(str_replace('-',' ',str_replace('.php','',substr($cf['template'],9))));
			
			
			if (array_key_exists('count',$cf)) {
				
				for ($i=1;$i<=$cf['count'];$i++) {
					
					$out .= '<div class="bloooming">';
					$out .= '<h4 class="metahead">'.$cf['section'].' '.$i.'</h4>';
					foreach($cf['fields'] as $f) {
						
						$out .= meta_box_formfield($f,$i);
					}		
					$out .= '</div><!--bloooming-->';
				} // for

				
			} // count
			else {

					$out .= '<div class="bloooming">';

					foreach($cf['fields'] as $f) {
						$out .= meta_box_formfield($f);
					}		

					$out .= '</div><!--bloooming-->';

			} // no count
			
			
			if ($cf['template'] != 'all') {
				
				if ($cf['template'] == $page_template) {
					return $out;
				}
				else {
					return 'These funtions are available for following page templates: <b>'.$tname.'<b/>';
				}
				
			}
			else {
					return $out;
			}
						
		} // section
		
	} // foreach

	
}


function meta_box_formfield($data, $i = null){
		
	global $prefix;	
	global $post;

	$out = '';
	$counter = '';
	
	if ($i) {
		$counter = '_'.$i;
	}
	
	$field = $prefix.$data['name'].$counter;
	$class = $prefix.$data['name'];

	switch($data['type']) {
		
		case 'text' :
			$out .= '<fieldset class="metafield"><label for="'.$prefix.$data['title'].$counter.'">'.$data['title'].'</label>
			<input class="metainput" type="text" name="'.$field.'" value="'.get_post_meta($post->ID, $field, true).'" />';
				if ($data['description'] != '') {
					$out .= '<a class="tooltip" title="'.$data['description'].'">help</a>';
				}
			$out .= '</fieldset>';
			
		break;

		case "checkbox":
		
		$checked = get_post_meta($post->ID, $field, true) == 'on' ? 'checked="checked"' : '';
		
		$out .= '<fieldset class="metafield"><input value="'.get_post_meta($post->ID, $field, true).'" class="check '.$class.'" type="checkbox" name="'.$field.'" '.$checked.' />
		<label for="'.$field.'">'.$data['title'].'</label>';
			if ($data['description'] != '') {
				$out .= '<a class="tooltip" title="'.$data['description'].'">help</a>';
			}
		$out .= '</fieldset>';
		break;

		case "link":
		$out .= '<fieldset class="metafield '.$class.'"><label for="'.$field.'">'.$data['title'].'</label>
		<input class="metainput" type="text" name="'.$field.'" value="'.get_post_meta($post->ID, $field, true).'" />';
			if ($data['description'] != '') {
				$out .= '<a class="tooltip" title="'.$data['description'].'">help</a>';
			}
		$out .= '</fieldset>';
		break;
		case "image":
		$out .= '<fieldset class="metafield"><label for="'.$field.'">'.$data['title'].'</label>
				<input class="metainput" type="text" name="'.$field.'" value="'.get_post_meta($post->ID, $field, true).'" />
				<a href="media-upload.php?post_id='.$post->ID.'&amp;type=image&amp;TB_iframe=true&amp;width=640&amp;height=628" id="add_image" class="thickbox" title="Add an Image" onclick="return false;"><img src="images/media-button-image.gif" alt="Add an Image"></a>';
			
			if ($data['description'] != '') {
				$out .= '<a class="tooltip" title="'.$data['description'].'">help</a>';
			}

		$out .= '</fieldset>';
		break;

		case "select":
		$out .= '<fieldset class="metafield"><label for="'.$prefix.$data['title'].'">'.$data['title'].'</label>
		<select class="metaselect" name="'.$field.'" value="'.get_post_meta($post->ID, $field, true).'">';
			
			foreach($data['options'] as $ok => $o) {
				
				$sel = '';
				
				if (get_post_meta($post->ID, $field, true) == $ok) {
					$sel = ' selected="selected"';
				}
				
				$out .= '<option value="'.$ok.'" '.$sel.'>'.$o.'</option>';
			
			}
		$out .= '</select>';
			if ($data['description'] != '') {
				$out .= '<a class="tooltip" title="'.$data['description'].'">help</a>';
			}
		$out .= '</fieldset>';
		break;
		
	} // switch type
	
	return $out;
	
}



function save_meta_box($post_id) {
	global $customFields;
	global $prefix;

	foreach($_POST as $k => $p) {
				
		// get custom vars
		if (substr($k,0,strlen($prefix)) == $prefix)  {
	
			check_meta_field($post_id,$p,$k);

		}
		
	}
	
}

function check_meta_field($post_id, $value, $field) {
		
	$oldvar = get_post_meta($post_id, $field, true);
	
	update_post_meta($post_id, $field, $value, $oldvar);

}



add_action('admin_menu', 'create_meta_box'); 
add_action('save_post', 'save_meta_box'); 

	
?>
