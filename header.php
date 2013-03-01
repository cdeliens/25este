<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php bloginfo('template_url') ?>/css/cooolzine.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js" ></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.bgiframe.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/hoverIntent.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/supersubs.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.hint.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.masonry.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/Hyphenator.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/galleria.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/swfobject.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/css/galleria/classic/galleria.classic.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/markup.js"></script>
	<script type="text/javascript" src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.2-min.js"></script>
	<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.2.72.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/slider.js" type="text/javascript"></script>	<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
	<script src="http://connect.facebook.net/en_US/all.js"></script>
	<script>
	  FB.init({
	    appId  : '164992340185878',
		status : true, // check login status
	    cookie : true, // enable cookies to allow the server to access the session
	    xfbml  : true  // parse XFBML
  });
</script>
<script type="text/javascript">

    function getRandomFilename()
    {
        var names = ['/swf/marzo/tienda_728x90.swf','/swf/marzo/columpio_728x90.swf','/swf/marzo/hi5_728x90.swf','/swf/marzo/tapa_728x90.swf','/swf/marzo/mensajes_728x90.swf'];
        var r = Math.floor(Math.random() * names.length);
        return names[r];
    }

    var flashvars = {clickTag: "http://www.coca-cola.co.cr/&clickTarget=_blank' "};
    var params = {};
    var attributes = { style: "margin: 0 0 25px;text-align: center;"};
    swfobject.embedSWF(getRandomFilename(), "mainBanner", "728", "90", "9.0.0", false, flashvars, params, attributes);
</script>



	<!--[if lt IE 7]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
	<![endif]-->

	<?php
		
		
		print cooolzine_color();

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	if (get_option(get_current_theme().'_analytics') != '') { ?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php print get_option(get_current_theme().'_analytics') ?>']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
	<?php	
	}		
	wp_head();
	?>
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
</head>
  <?php
  	$cooolstyle = get_option(get_current_theme().'_style');
  	$cooolwidth = get_option(get_current_theme().'_layout');
  	  	
  ?>
  <body class="<?php print 'style_'.$cooolstyle.' '.$cooolwidth; ?>">
	<div id="pre-wrapper">
	</div>
	<div id="wrapper">
	<div id="fb-root"></div>
	<div id="fb-root"></div>
		<div id="header">
		
			<div class="headercontent">


			<div id="logo">
			<a href="<?php echo get_option('home'); ?>"><div id="imagenLogo"><img src="<?php print get_option(get_current_theme().'_logo') ?>" alt="<?php echo get_option('blogname'); ?>" /></a></div>	
			<div id="catmenu">
				<div class="menu-cat-menu-container">
					<ul class="menu-cat-menu-container">
						<li>
							<a href="<?php echo bloginfo('url') ?>/eventos" tittle="Vamos a HOME!">
								<small>¿donde son?</small>
								<span>EVENTOS</span>
								<small class="bottom">¿hoy qué?</small>
							</a>
						</li>
						<li>
							<a href="<?php echo bloginfo('url') ?>/category/galeria" tittle="Vamos a HOME!">
								<small>para ver..!</small>
								<span>GALERIAS</span>
								<small class="bottom">solo bueno!</small>
							</a>
						</li>
						<li>
							<a href="<?php echo bloginfo('url') ?>/category/articulo" tittle="Vamos a HOME!">
								<small>¿que hay de nuevo?</small>
								<span>ARTICULOS</span>
								<small class="bottom">en este mundo...</small>
							</a>
						</li>
						<li>
							<a href="<?php echo bloginfo('url') ?>/contacto" tittle="Vamos a HOME!">
						<small>Anunciate aqui! </small>
								<span>CONTACTO</span>
								<small class="bottom">pasame el chisme..</small>
							</a>
						</li>
					</ul>
				</div>
				
				<!--?php wp_nav_menu(array('menu' => 'cat-menu')); ?-->

	      
				</div>	
				<div id="topMenu">
      <!--div id="sociallinks"-->     
      <a href="http://www.twitter.com/25este75sur"><img src="http://twitter-badges.s3.amazonaws.com/follow_me-c.png" alt="Follow 25este75sur on Twitter"/></a>
      
        		<div id="facebook-topMenu">
        		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2F25este75surcom%2F109267679139655&amp;send=false&amp;layout=button_count&amp;width=170&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:170px; height:21px;" allowTransparency="true"></iframe>
				 <!--/div-->
				</div>
				
				
			</div><!--logo-->
          <div id="main_banner">
           
          </div>
			</div><!--headercontent-->
		</div><!--header-->


		
		<div id="content">
		<div class="box" style="margin: 0 0 5px;text-align: center; position: relative" >
	         <input type=button class="box" style="cursor: pointer; color: transparent; background-color: transparent; border-color: transparent;width: 760px;height: 90px;position: absolute;" onClick="window.open('http://www.coca-cola.co.cr/', '_blank');window.focus();">
	         	<div id="mainBanner"></div>
	 <!--         	<a href="http://www.coca-cola.co.cr/" onClick="_gaq.push(['_trackEvent', 'Banner', 'Click', 'Coca Cola']);" target="_blank" style="cursor: pointer;display:block;">
		  	<object type='application/x-shockwave-flash' data='/swf/marzo/columpio_728x90.swf' width='728' height='90'><param name='flashvars' value='clickTag=http://www.coca-cola.co.cr/es/index.html&clickTarget=_blank' /><param name='allowScriptAccess' value='always' /><param name='movie' value='/swf/marzo/columpio_728x90.swf' /><param name='bgcolor' value='#000000'></object>
	 -->	  
	<!-- </a> -->
	        </input></div>
		<?php if(!is_single()){ print '<div class="fluid">'; }
