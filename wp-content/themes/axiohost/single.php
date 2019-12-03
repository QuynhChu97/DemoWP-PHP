<?php get_header(); ?>
      <!-- End Post Title Area -->
      <section class="post-title-area bg-color2">
          <div class="container">
            <div class="post-title-content post">
               <h1 class="heading-1"><?php the_title(); ?></h1>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
      
      <!-- End Post Title  Area -->
      <div id="content" class="blog-area section-spacing">
         <div class="blog-wrapper">
            <div class="container">
               <div class="row">
                  <?php do_action( 'axiohost_full_post_column' ); ?>  
                     <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                            <?php 
                                 get_template_part('template-parts/content', 'content'); 
                                 get_template_part('template-parts/tags-share', 'tags-share'); 
                                 get_template_part('template-parts/single-admin', 'single-admin'); 
                                 get_template_part('template-parts/pagination-links', 'pagination-links'); 
                                 get_template_part('template-parts/comments-template', 'comments-template');
                            ?>  
                     </div>
                  </div>
                  
                  <?php get_sidebar(); ?>

               </div>
            </div>
         </div>
      </div>
      <?php get_footer(); ?>