<?php





/*********************** CUSTOM COMMENT FORM ***********************/


function toro_comment_form_fields($fields) {
  

    $fields['author'] = '<div class="comment-form-author form-group">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                       '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>';


    $fields['email'] = '<div class="comment-form-email form-group"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                       '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>';


    $fields['url'] = '<div class="comment-form-url form-group"><label for="url">' . __( 'Website' ) . '</label> ' .
                       '<input id="url" class="form-control" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>';

  return $fields;
}



function my_comment_form_defaults( $defaults ) {
    

      $defaults['comment_field'] = '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';

      $defaults['comment_notes_after'] = '';


    return $defaults;
}


add_filter( 'comment_form_defaults', 'my_comment_form_defaults' );

add_filter('comment_form_default_fields','toro_comment_form_fields');




/*********************** CUSTOM COMMENTS CALLBACK ***********************/


function torocomments($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

      <?php if ( 'div' != $args['style'] ) : ?>
      <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
      <?php endif; ?>


          <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>


          <div class="comment-author vcard">
            <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
          </div>


          <?php if ($comment->comment_approved == '0') : ?>
          <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
          <?php endif; ?>


          <div class="comment-content">

            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
              <?php
                printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
              ?>
            </div>

            <?php comment_text() ?>

          </div>


          <div class="reply">
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div>


      <?php if ( 'div' != $args['style'] ) : ?>
      </div>
      <?php endif; ?>

<?php } ?>