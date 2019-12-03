<?php 
/*
    Template Name: Page with Right Sidebar
*/
get_header(); 
?>
      <!-- Start Post Title Area -->
       <section class="post-title-area bg-color2">
         <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php wp_title(' '); ?></h1>
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
                     <div id="post-<?php the_ID(); ?>" <?php post_class('single-post');?>>
                            <?php 
                                 get_template_part('template-parts/content', 'content'); 
                                 get_template_part('template-parts/comments-template', 'comments-template');
                            ?>  
                     </div>
                  </div>           
                  
                  <?php get_sidebar();  ?>

               </div>
            </div>
         </div>
      </div>
      <!-- End Blog Area -->
      
      <?php get_footer(); ?>