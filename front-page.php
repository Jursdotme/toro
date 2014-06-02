<?php get_header();?>

<!-- Slider -->
<?php get_template_part( 'partials/objects/slider' ); ?>

<div class="hero-unit wow fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <p class="lead wow fadeInUp delay-2">
          Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.
        </p>
      </div>
    </div>
  </div>
</div>

<hr>


  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 wow fadeInUp">
        <div class="thumbnail">
          <img src="http://placehold.it/640x480" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn btn-primary" role="button">Read More <span class="fa fa-arrow-right"></span></a>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 wow fadeInUp delay-1">
        <div class="thumbnail">
          <img src="http://placehold.it/640x480" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn btn-primary" role="button">Read More <span class="fa fa-arrow-right"></span></a>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 wow fadeInUp delay-2">
        <div class="thumbnail">
          <img src="http://placehold.it/640x480" alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn btn-primary" role="button">Read More <span class="fa fa-arrow-right"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="bg-gray-lighter">
<div class="container">
  <div class="row">
    <div class="col-sm-7 wow fadeInLeft">
      <h3>Vivamus sagittis lacus vel augue laoreet rutrum faucibus auctor.</h3>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <div class="col-sm-4 col-sm-offset-1">
      <h3 class="wow fadeInRight">Latest News</h3>
      <div class="list-group">
        <a href="#" class="list-group-item active wow fadeInRight delay-1">
          <h4 class="list-group-item-heading">List group item heading</h4>
          <p class="list-group-item-text">Nulla vitae elit libero, a pharetra augue.</p>
        </a>
        <a href="#" class="list-group-item wow fadeInRight delay-2">
          <h4 class="list-group-item-heading">List group item heading</h4>
          <p class="list-group-item-text">Nulla vitae elit libero, a pharetra augue.</p>
        </a>
        <a href="#" class="list-group-item wow fadeInRight delay-3">
          <h4 class="list-group-item-heading">List group item heading</h4>
          <p class="list-group-item-text">Nulla vitae elit libero, a pharetra augue.</p>
        </a>
        <a href="#" class="list-group-item wow fadeInRight delay-4">
          <h4 class="list-group-item-heading">List group item heading</h4>
          <p class="list-group-item-text">Nulla vitae elit libero, a pharetra augue.</p>
        </a>
      </div>
    </div>
  </div>
</div>
</div>


<?php get_footer();?>
