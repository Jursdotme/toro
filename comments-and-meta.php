<div class="tags-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php the_tags('<ul class="tags"><li>', '</li><li>', '</li></ul>'); // Output as <ul class="tags"> ?>
      </div>
    </div>
  </div>
</div>


<p><?php _e( 'Categorised in: ', 'toro' ); the_category(', '); // Separated by commas ?></p>

<p><?php _e( 'This post was written by ', 'toro' ); the_author(); ?></p>

<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

<?php comments_template(); ?>
