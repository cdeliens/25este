<?php get_header(); ?>

<div class="static">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>

</div><!-- .static -->

<?php get_footer(); ?>
