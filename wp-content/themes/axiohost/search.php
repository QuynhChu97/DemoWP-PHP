<?php get_header(); ?>
      <!-- End Post Title Area -->
      <section class="post-title-area bg-color2">
          <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php echo esc_html__('Search Query For : ', 'axiohost');  ?><strong><?php echo get_search_query(); ?></strong></h1>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
      <!-- End Post Title  Area -->
      <div class="blog-area space-top">
         <div class="blog-wrapper">
            <div class="container">
               <div class="row">
                   <?php 
                       if(have_posts()){
                           get_template_part('template-parts/blog-list', 'blog-gird');
                           
                       }else{?>
                           <div class="col-lg-8 result-not-found">
                            <h2 class="text-left search-empty"><?php echo esc_html__('Nothing Found', 'axiohost');  ?></h2>
                                <p class="text-left search-empty"><?php echo esc_html__('Sorry, nothing matched your search terms. Please try again with some different keywords.', 'axiohost');  ?></p>
                                
                                <div id="search-3" class="widget widget_search nothing-found-search">
                                    <form class="search-form-widget" method="get" action="<?php echo esc_url(site_url()); ?>">
                                        <div class="input-group">
                                            <input type="search" value="" class="form-control" placeholder="<?php echo esc_attr_e('Search', 'axiohost');  ?>" name="s" aria-label="Search">
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                       <?php 
                       }
                    ?>
                  
               </div>
            </div>
         </div>
      </div>
      <!-- End Blog Area -->
      
      <?php get_footer(); ?>