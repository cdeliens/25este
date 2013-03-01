<?php if(!is_single()){ print '</div><!--fluid-->'; } ?>

</div><!--content-->

<div class="pusher"></div>

</div><!--wrapper-->

<div id="footer">
<div id="cooolpager">
<?php

if(function_exists('wp_paginate')) {
    wp_paginate();
}
else {
if ( $wp_query->max_num_pages > 3 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'cooolzine' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'cooolzine' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif;
}

?>
</div><!--cooolpager-->




	<div class="footercontent">
		<div id="fcol1">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 1')) {} ?>
		</div><!--fcol1-->
		<div id="fcol2">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 2')) {} ?>
		</div><!--fcol1-->
		<div id="fcol3">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 3')) {} ?>
		</div><!--fcol1-->

	<a title="25este75sur.com :)" class="beam">25este75sur.com :)</a>
<span class="footer-message">© 2010. 25ESTE75SUR. Derechos Reservados. Cualquier modalidad de utilización de los contenidos de 25este75sur.com como reproducción, difusión, enlaces informáticos en Internet, total o parcialmente, solo podrá hacerse con la autorización previa y por escrito del 25ESTE75SUR.COM, S. A. Si usted necesita mayor información o brindar recomendaciones, escriba a info@25este75sur.com. </span>
	</div><!--footercontent-->	
	
</div><!--footer-->

</body>
</html>