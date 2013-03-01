<?php

global $optionimg;
global $themename;
global $style;
global $csspath;

/**** clean up wp_head ******/
if (!is_admin()){
	add_filter( 'pre_comment_content', 'wp_specialchars' );
	add_filter( 'the_generator', create_function('$a', "return null;") );
	wp_deregister_script('jquery');
	wp_deregister_script('optionsjs');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_print_styles', 'pagenavi_stylesheets');
	remove_action('wp_head', 'optionscss');
	remove_action('wp_head', 'optionsjs');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wpcf_css');

} // admin


$optionimg = get_bloginfo('template_url').'/lib/admin/img/';
$themename =  get_current_theme();

	$csspath = get_bloginfo('template_url').'/css/'.$style;
	$imgpath = get_bloginfo('template_url').'/img';	


/******MAKE SEARCH FORM VALID ********************************/

function valid_search_form ($form) {
    return str_replace('role="search" ', '', $form);
}

add_filter('get_search_form', 'valid_search_form');


/***** GET OPTIONS *******************************************/

include_once (TEMPLATEPATH . '/lib/admin/options/options.php');
include_once (TEMPLATEPATH . '/lib/admin/metabox.php');
include_once (TEMPLATEPATH . '/lib/functions/custom-comments.php');
include_once (TEMPLATEPATH . '/lib/functions/widgets.php');
include_once (TEMPLATEPATH . '/lib/functions/cooolzine.php');

$widgetbars = array(
	'boxes' => array(
		'Sidebar Front Top5',
		'Sidebar Front Top10',
		'Sidebar Front End',
		'Sidebar Category Top5',
		'Sidebar Category Top10',
		'Sidebar Category End',
		'Sidebar Post Page',
		'Sidebar Banner Page'
	),
	
	'footer' => array(
		'Footer Column 1',
		'Footer Column 2',
		'Footer Column 3'
	),
	'tabs' => array(
		'1' => 'FrontPage Tab 1',
		'2' => 'FrontPage Tab 2',
		'3' => 'FrontPage Tab 3',
		'4' => 'FrontPage Tab 4'
	),
    'banner_300px' => array(
		'Sidebar SWF300px'
	),
	'banner_300px_down' => array(
      'Sidebar SWF300px-B'
	),
	'box-special' => array(
		'Sidebar Special'
	),
	'ad-special' => array(
		'Sidebar-Ad Special'
	)
	);

if (function_exists('register_sidebar')) {
   foreach($widgetbars['banner_300px'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '<div class="box swf_ad">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3>',
		        'after_title' => '</h3>',
		    ));
	} // foreach
	 foreach($widgetbars['banner_300px_down'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '<div class="box swf_ad">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3>',
		        'after_title' => '</h3>',
		    ));
	} // foreach
	foreach($widgetbars['boxes'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '<div class="box article adblock">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3>',
		        'after_title' => '</h3>',
		    ));
	} // foreach
	foreach($widgetbars['box-special'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '<div class="box sidebar adblock">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3>',
		        'after_title' => '</h3>',
		    ));
	} // foreac
		foreach($widgetbars['ad-special'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '<!--div id="tagmenu">Hoy</div--><div id="bigadd" class="box bigadd bigarticle adblock">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3>',
		        'after_title' => '</h3>',
		    ));
	} // foreac
	foreach($widgetbars['footer'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '',
		        'after_widget' => '',
		        'before_title' => '<h2>',
		        'after_title' => '</h2>',
		    ));
	} // foreach
	
	foreach($widgetbars['tabs'] as $wb) {
		   register_sidebar(array(
		    	'name' => $wb,
		        'before_widget' => '',
		        'after_widget' => '',
		        'before_title' => '<h2>',
		        'after_title' => '</h2>',
		    ));
	} // foreach

} // if

// menues 
function register_cooolzine_menus(){
	register_nav_menus(array(
		'main-menu' => __( 'Main Navigation'),
		'social-menu' => __( 'Social Links'),
		'service-menu' => __( 'Service Sites')
	));
} // menues

add_action( 'init', 'register_cooolzine_menus');



?>