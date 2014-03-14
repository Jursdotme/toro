<?php the_tags( __( 'Tags: ', 'toro' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

<p><?php _e( 'Categorised in: ', 'toro' ); the_category(', '); // Separated by commas ?></p>

<p><?php _e( 'This post was written by ', 'toro' ); the_author(); ?></p>

<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

<?php comments_template(); ?>