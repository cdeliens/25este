<?php get_header(); ?>
<?php
/*
Template Name: Single
*/
?>
<div class="story">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php $ani = get_post_meta($post->ID, 'animada', true); ?>
<?php
	$images = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'DES') );
	switch ($ani) {
	
	case 1:
	print '<div id="images">';
	
		foreach ($images as $iid => $img) {
			$src = wp_get_attachment_image_src($iid,'large', false);
			$large = wp_get_attachment_image_src($iid,'large');		
			print '<img src="'.$src[0].'" alt="'.$large[0].'" title="'.$img->post_title.'" />';	
		}
	print '</div>';	
	break;
	case 2:
	//tomar el id de la galeria asociado al post
	$Galeria = get_post_meta($post->ID, 'Galeria', true);
	//tomar la direccion de la galeria
	$rutaGaleria = $wpdb->get_var( "SELECT path FROM wp_ngg_gallery WHERE gid = $Galeria" );
	$imagenes = $wpdb->get_results( "SELECT filename, description FROM wp_ngg_pictures WHERE galleryid = $Galeria");
	$count = count($imagenes);
	print '<div id="slider">';
	print '<div id="mask-gallery">';
	print '<ul id="gallery">';
	print '<a href="#" id="btn-prev" class= "button-gal" ><<</a>';
	print '<a href="#" id="btn-next" class= "button-gal" >>></a>';
	foreach ($imagenes as $imagen) {
				echo "<li>";
				echo "<img src='"?><?php bloginfo('url'); ?>/<?php echo "" . $rutaGaleria . "/" . $imagen->filename . "'> </img>";
				echo "</li>";
	}
	print '</ul></div></div>';
	break;
	case null:
	print '<div id="GaleriaSimple">';
		foreach ($images as $iid => $img) {
			    $src = wp_get_attachment_image_src($iid,'large', false);
			    $large = wp_get_attachment_image_src($iid,'large');	
				echo "<ul><li>";
				print '<img src="'.$src[0].'" alt="'.$large[0].'" title="'.$img->post_title.'" />';
				echo "</li></ul>";
				break;
	}
	print '</ul></div>';
	
	break;
	}
?>
<!--images-->
			


<div id="texto" class="text">
	<div id="titulo-single"><h1><?php print $post->post_title; ?></h1></div>

	<div class="meta">
	<?php 
		$cat = get_the_category();

		foreach($cat as $c) {
			print '<a class="cat-'.strtolower($c->name).'" href="'.get_category_link($c->term_id).'">'.$c->name.'</a> - ';
		}
		
	?>
	<span class="author"><?php print date('F, jS Y',strtotime($post->post_date)); ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by this author"><?php the_author() ?></a></span>

</div><!--meta-->
<?php if(get_the_tag_list()) {  print get_the_tag_list('<ul class="tags"><li>','</li><li>','</li></ul>'); 	}?>

	<?php print the_content(); ?>
	
	</div><!--text-->

<!--tags-->

<!-- div class="socialize">
	<span class="numcomment"><?php if ($post->comment_count !=1) print $post->comment_count.' Comments'; else print $post->comment_count.' Comment' ?></span>
	<h4>Socialize</h4>
	<a id="socialpoptrigger"></a>
	<div id="socialpopbox">
		<ul>
			<li class="comment_reply"><a id="addnewcomment" href="#"></a></li>
			<li class="tweet"><?php tweet_this() ?></li>
			<li class="facebook">
			<a target="_blank" href="http://www.facebook.com/sharer.php?u='<?php print get_permalink() ?>'&amp;t=<?php print $post->post_title ?>" class="si_facebook">Share with facebook</a>				
			</li>
			<li class="fav">
			<a target="_blank" class="si_del" href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title), 'delicious','toolbar=no,width=550,height=550'); return false;">Delicious</a>
			</li>
			<li class="fav">
			<a target="_blank" class="si_digg" href="http://digg.com/submit?url='<?php print get_permalink() ?>'&amp;title=<?php print $post->post_title ?>&amp;bodytext=<?php print $post->post_title ?>,0,350); ?&gt;">Digg</a></li>
		</ul>
	</div>
</div --><!--socialize-->


<?php comments_template(); ?>



<?php endwhile; // end of the loop. ?>

</div><!--story-->
<?php
if (get_option(get_current_theme().'_adside') == 'true') {
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Post Page')) {}
}
print cooolzine_related($post); ?>
<?php get_footer(); ?>