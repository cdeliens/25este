<?php


class TagcloudWidget extends WP_Widget {

    function TagcloudWidget() {
        parent::WP_Widget(false, $name = get_current_theme().' TagCloud');	
    }


    function widget($args, $instance) {		
        extract( $args );

		$args = array(
		    'smallest'  => 1, 
		    'largest'   => 3,
		    'unit'      => 'em', 
		    'number'    => 100,  
		    'format'    => 'flat',
		    'separator' => ' ',
		    'orderby'   => 'name', 
		    'order'     => 'RAND',
		    'link'      => 'view', 
		    'taxonomy'  => 'post_tag', 
		    'echo'      => true );

		echo '<div class="tagcloud"><h2>'.esc_attr($instance['title']).'</h2>';
		echo wp_tag_cloud( $args );
        echo '</div>'; 
    
                      
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
    	
    	echo '<label>Title </label><input name="'.$this->get_field_name('title').'" type="text" size="10" value="'.$instance['title'].'" /><br class="clear"/>';
	
	}
} // class TagcloudWidget



class FilterWidget extends WP_Widget {

    function FilterWidget() {
        parent::WP_Widget(false, $name = get_current_theme().' TagFilter');	
    }

    function widget($args, $instance) {		
        extract( $args );
	
	$terms = get_terms(array('category','post_tag'), 'orderby=name&hide_empty=1');
		echo '<ul id="filtering">';
		echo '<li><a href="#" class="all">show all</a></li>';
		foreach($terms as $t) {
			$lnk = get_term_link($t, $t->taxonomy);
			
			echo '<li><a class="'.$t->slug.'" href="'.$lnk.'">'.$t->name.'</a></li>';
		}

        echo '</ul>'; 

    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
    	if (!empty($instance)) {
    		$title = esc_attr($instance['title']);
    	}
    	else {
	        $title = '';
    	}		

    }
} // class FilterWidget



class MostCommentedWidget extends WP_Widget {

    function MostCommentedWidget() {
        parent::WP_Widget(false, $name = get_current_theme().' MostPopular');	
    }

    function widget($args, $instance) {		
        extract( $args );
		$cat = apply_filters('widget_title', $instance['cat']);
		
		$args = array(
			'post_type'	=> 'post',
			'orderby' => 'comment_count',
			'order' => 'DESC',
			'numberposts'	=> 12
		);
		
		if ($cat != 0) {
			$args['category'] = $cat;
		}
		
		$posts = get_posts($args);
		
		$r = '<ul>';
			
			foreach($posts as $p) {
				$c = get_the_category($p->ID);
				$l = get_permalink($p->ID);

				$r .= '<li class="cat-'.$c['0']->slug.'"><a class="cat-'.$c['0']->slug.'" href="'.$l.'">'.substr($p->post_title,0,42).' &rsaquo;<span class="ccount">'.$p->comment_count.'</span></a></li>';
			}
			
		$r .= '</ul>';
		
		print $r;
		
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
    	if (!empty($instance)) {
    		$cat = esc_attr($instance['cat']);
    	}
    	else {
	        $cat = '0';
    	}
    	    	
    	$cats = get_categories(array('hide_empty' => true));
    	    	
    	$ret = '<label>Category </label><select id="'.$this->get_field_id('cat').'" name="'.$this->get_field_name('cat').'">';	
    	$ret .= '<option value="0">all</option>';
    		foreach($cats as $c) {
    			$ret .= '<option value="'.$c->term_id.'"';
    				
    				if ($cat == $c->term_id) {
    					$ret .= ' selected="selected"';
    				}
    				
    			$ret .='>'.$c->name.'</option>';
    		}
    	$ret .= '</select>';	
		
		print $ret;

    }
} // class MostCommentedWidget




add_action('widgets_init', create_function('', 'return register_widget("TagcloudWidget");'));
add_action('widgets_init', create_function('', 'return register_widget("FilterWidget");'));
add_action('widgets_init', create_function('', 'return register_widget("MostCommentedWidget");'));


?>