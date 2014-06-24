<?php

/*********************** CUSTOM COMMENT FORM ***********************/



function toro_comment_form_fields( $fields ) {

if (!isset($req)){ $req = ""; };
if (!isset($html5)){ $html5 = ""; };
if (!isset($aria_req)){ $aria_req = ""; };
if (!isset($commenter['comment_author'])){ $commenter['comment_author'] = ""; };
if (!isset($commenter['comment_author_email'])){ $commenter['comment_author_email'] = ""; };
if (!isset($commenter['comment_author_url'])){ $commenter['comment_author_url'] = ""; };

    $fields['author'] = '<div class="comment-form-author form-group">' . '<label for="author">' . __( 'Name' , 'toro' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                       '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>';

    $fields['email'] = '<div class="comment-form-email form-group"><label for="email">' . __( 'Email' , 'toro' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                       '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>';

    $fields['url'] = '<div class="comment-form-url form-group"><label for="url">' . __( 'Website' , 'toro' ) . '</label> ' .
                       '<input id="url" class="form-control" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>';

  return $fields;
}



function my_comment_form_defaults( $defaults ) {


      $defaults['comment_field'] = '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';

    return $defaults;
}


add_filter( 'comment_form_defaults', 'my_comment_form_defaults' );

add_filter('comment_form_default_fields','toro_comment_form_fields');


if ( ! function_exists( '_toro_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function _toro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', '_toro' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', '_toro' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body media">
			<a class="pull-left" href="#">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</a>

			<div class="media-body">
				<div class="media-body-wrap panel panel-default">

					<div class="panel-heading">
						<h5 class="media-heading"><?php printf( __( '%s <span class="says">says:</span>', '_toro' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h5>
						<div class="comment-meta">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', '_toro' ), get_comment_date(), get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', '_toro' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', '_toro' ); ?></p>
					<?php endif; ?>

					<div class="comment-content panel-body">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

					<?php comment_reply_link(
						array_merge(
							$args, array(
                'reply_text' => __('<span class="fa fa-reply"></span> Reply', 'toro' ),
								'add_below' => 'div-comment',
								'depth' 	=> $depth,
								'max_depth' => $args['max_depth'],
								'before' 	=> '<footer class="reply comment-reply panel-footer">',
								'after' 	=> '</footer><!-- .reply -->'
							)
						)
					); ?>

				</div>
			</div><!-- .media-body -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for _toro_comment()
 ?>