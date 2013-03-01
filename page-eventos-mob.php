<?php
/*
Template Name: Eventos-Mobile
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  <?php language_attributes(); ?>>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; user-scalable=0;">
  <script>
  
		function checkOrientation() {
			switch (window.orientation) {
				case -90:
					alert ('Orientation: Landscape');
					break;
			}
		}
		addEventListener("orientationchange", checkOrientation);
		checkOrientation();
	
  </script>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link href="<?php bloginfo('template_url') ?>/css/cooolzine.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js" ></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.bgiframe.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.colorbox-min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.hint.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.masonry.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.tipsy.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/Hyphenator.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/markup.js"></script>
  <script type="text/javascript" src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.2-min.js"></script>
  <script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.2.72.js"></script>
</head>
<body class="mobile">
<div id="content-mob">
  <img src="<?php print get_option(get_current_theme().'_logo') ?>" alt="<?php echo get_option('blogname'); ?>" />
  <div id="subtittle-event" class="box subtitle .style_1 .article "><a href="<?php echo bloginfo('url') ?>/eventos" tittle="Vamos a HOME!">EVENTOS pr&oacute;ximos</a></div>
<div id="content_eventos-mob">
<?php get_template_part( 'loop', 'events' );?>
</div>
</div>
</body>
</html>