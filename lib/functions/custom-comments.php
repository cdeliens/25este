<?php

function custom_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
    global $imgpath;
    $av = $imgpath.'/avatar.png';


	switch ( $comment->comment_type ) :
		case '' :

	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		
		<div class="avatarbox">
			<div class="picuture">
				<a <?php if (get_comment_author_url() != '') {print 'href="'.get_comment_author_url().'"'; }?> >
					<?php echo get_avatar( $comment, 85,$default=$av); ?>
				</a>
			</div><!--picture-->
			 <ul class="links">
			  	<li class="comment_info"><a href="#" title="<?php print get_comment_date().' '.get_comment_time().' by '. get_comment_author();?>">info</a></li>
			  	<li class="comment_reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></li>
			  	
			  	<?php
			  	if (current_user_can('edit_post')) {
			  	?>
			  	<li class="comment_edit"><a href="<? print get_edit_comment_link() ?>" title="<?php _e( 'Edit this comment', 'cooolzine' ); ?>">edit</a></li>
			  	<li class="comment_delete"><?php delete_comment_link(get_comment_ID()) ?></li>
				<?php
				} // can edit
		  		?>
			  </ul>
			
		</div><!-- avatarbox -->
			<h3><?php print get_comment_author_link() ?> <?php _e( 'says', 'cooolzine' ); ?></h3>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'cooolzine' ); ?></em>
				<br />
			<?php endif; ?>
			<?php comment_text(); ?>	

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'cooolzine' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'cooolzine'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
