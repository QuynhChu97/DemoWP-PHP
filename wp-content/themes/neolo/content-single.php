

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
      <?php
        if(has_post_thumbnail()){
      ?>
        <section class="row hero large">
          <?php
                the_post_thumbnail('large');
            ?>
        </section>
      <?php } ?>
      <div class="row">
          <div class="col-md-12">
            <ul class="post-list ">
              <li><?php the_category(); ?></li>
              <li class="post--date"><?php the_date(); ?></li>
            </ul>
            <div class="post-tags"><?php the_tags(); ?></div>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <footer>
              <div class="post--author">
                <div class="post--author__img">
                  <?php echo get_avatar( get_the_author_meta('user_email'), $size = '110'); ?>
                </div>
                <div class="post--author__text">
                  <h5><?php the_author(); ?></h5>
                  <p><?php the_author_meta('description'); ?></p>
                </div>
              </div>
            </footer>
          </div>
      </div>
  </div>
</div>