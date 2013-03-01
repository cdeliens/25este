<?php get_header(); 

	  get_template_part( 'loop', 'category' );
	  	
?>
	
	<!--most commented-->
	<div class="box toplist <?php print strtolower(single_cat_title( '', false )) ?>">
		<div class="meta">
			<a class="cat-<?php print strtolower(single_cat_title( '', false )) ?>" href="<?php print get_category_link(get_cat_ID(single_cat_title( '', false ))); ?>"><?php _e('Most popular','cooolzine'); ?></a>
		</div>
		<ul>
		<?php $popular = new WP_Query('orderby=comment_count&posts_per_page=16&cat='.get_cat_ID(single_cat_title( '', false ))); ?>
			<?php while ($popular->have_posts()) : $popular->the_post(); ?>	
		
			<li class="cat-<?php print strtolower(single_cat_title( '', false )) ?>"><a class="cat-<?php print strtolower(single_cat_title( '', false )) ?>" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php print substr(get_the_title(),0,16).'  &rsaquo;'; ?><span class="ccount"><?php comments_number('0','1','%'); ?></span></a></li>	

		<?php endwhile; ?>
		</ul>

	</div><!--toplist--><!--most commente-->

<?php get_footer(); ?>

