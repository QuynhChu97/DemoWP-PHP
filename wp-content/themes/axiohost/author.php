<?php get_header(); ?>
      <!-- End Post Title Area -->
      <section class="post-title-area bg-color2">
          <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php the_archive_title(); ?></h1>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
      
      <!-- End Post Title  Area -->
      <div id="content" class="blog-area space-top">
         <div class="blog-wrapper">
            <div class="container">
               <div class="row">
                   <?php get_template_part('template-parts/blog-list', 'blog-list'); ?>
               </div>
            </div>
         </div>
      </div>
      <!-- End Blog Area -->
      
      <?php get_footer(); ?>