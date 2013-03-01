<?php
/*
Template Name: Eventos
*/
?>

<?php get_header(); ?>
<div id="subtittle" class="box subtitle .style_1 .article "><a href="<?php echo bloginfo('url') ?>/category/evento" tittle="Vamos a HOME!">eventos de esta semana...</a></div>
<?php
  get_template_part( 'loop', 'eventsActual' );
?>
<div class="box">
<a href="http://www.fidcr.com" target="_blank">
  <img src="http://fidcr.com/banners/25este-a.gif " style="margin: 20px 0px 20px 100px;"/>
</a></div>
<div id="subtittle" class="box subtitle .style_1 .article "><a href="<?php echo bloginfo('url') ?>/category/evento" tittle="Vamos a HOME!">eventos pasados...</a></div>
<?php
  get_template_part( 'loop', 'eventsPast' );
?>

<?php get_footer(); ?>
