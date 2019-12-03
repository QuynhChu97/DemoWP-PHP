<?php get_header(); ?>
  <section class="posts">
    <div class="container">
      <div class="row">
          <?php
        		if ( have_posts() ) : 
              while ( have_posts() ) : the_post();
        			get_template_part( 'content', get_post_format() );
          		endwhile; 
              ?>
              <div class="col-md-12">
                  <div class="nav-pagination">
                  <?php
                    echo paginate_links();
                  ?>
                  </div>
              </div>
              <?php
            endif;
        	?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>