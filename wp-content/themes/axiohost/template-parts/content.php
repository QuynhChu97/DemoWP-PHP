<?php 
      if(have_posts()){
            while(have_posts()) : the_post();
                 if(has_post_thumbnail()){?>
                    <div class="single-img">
                       <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php
               }
              ?>
                
                <div class="single-content entry-content">
                     <?php 
                       the_content();
                       wp_link_pages( array(
                          'before'      => '<div class="single-page-pagination"><div class="single-page-numbers"><span class="page-links-title">' . esc_html__( 'Pages : ', 'axiohost' ) . '</span>',
                          'after'       => '</div></div>',
                          'separator'   => ' ',
                      ) ); 
                    ?>   

				</div>
            <?php   endwhile;
        }
  ?>