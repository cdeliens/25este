<?php get_header();?> 

  <div id="subtittle" class="box subtitle events .style_1 .article ">
    <a href="<?php echo bloginfo('url') ?>/eventos" tittle="Vamos a HOME!">eventos de esta semana...</a>
    <a class="right" href="<?php echo bloginfo('url') ?>/eventos" tittle="+ eventos">+ eventos...</a>
  </div>
  <div id="content_eventos">
    <?php get_template_part( 'loop', 'events' );?>
      <div class="box">
        <a href="https://www.facebook.com/CervezaImperial/app_552369711440459" target="_blank" >
            <img src="http://www.25este75sur.com/banners/730X55.jpg" style="margin: 0px 0px 20px 100px;"/> 
        </a>
      </div>

  </div>

  <div id="subtittle" class="box subtitle galleries .style_1 .article">
    <a href="<?php echo bloginfo('url') ?>/category/galeria" tittle="Vamos a HOME!">galerias...</a>
    <a class="right" href="<?php echo bloginfo('url') ?>/category/galeria" tittle="+ galerias">+ galerias...</a>
  </div>
	<?php get_template_part( 'loop', 'gallery' );?>
  
  <div id="subtittle" class="box subtitle articles .style_1 .article ">
    <a href="<?php echo bloginfo('url') ?>/category/articulo" tittle="Vamos a HOME!">articulos, reviews, noticias...</a>
    <a class="right" href="<?php echo bloginfo('url') ?>/category/articulo" tittle="+ articulos">+ articulos...</a>
  </div>
	<?php get_template_part( 'loop', 'articles' );?>
  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar SWF300px')) {};?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Special')) {};?>
  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar SWF300px_Down')) {};?>
	
<?php get_footer(); ?>
