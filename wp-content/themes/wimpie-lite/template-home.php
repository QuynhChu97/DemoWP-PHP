<?php
/**
 * Template Name:Front Page
 *
 * This is the front page code
 */
get_header();

if (get_theme_mod('wimpie_lite_about_setting_option')=='enable') {
    $wimpie_lite_post_id = get_theme_mod('wimpie_lite_about_setting_post');
    if(!empty($wimpie_lite_post_id)):
        ?>
    <section class="about">
        <div class="ed-container">
            <?php 
            $wimpie_lite_about_args  = array('post_type'=>'post', 'page_id' => $wimpie_lite_post_id, 'post_status' => 'publish','posts_per_page'=>1);
            $wimpie_lite_about_query = new WP_Query($wimpie_lite_about_args);
            if ($wimpie_lite_about_query->have_posts()):
                while ($wimpie_lite_about_query->have_posts()):
                    $wimpie_lite_about_query->the_post();
                ?>
                <h2 class="title home-title wow flipInX"><b><?php the_title(); ?></b></h2><div class="title-border"></div>
                <figure class="about-img wow fadeInRight" data-wow-delay="0.8s">
                  <?php if (has_post_thumbnail()):
                  $wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-lite-about-image'); ?>
                  <img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
                  endif;
                  ?>
              </figure>
              <div class="about-excerpt home-description wow fadeInLeft "><?php the_content(); ?></div>

              <div class="btn-wrapper wow fadeInUp" data-wow-delay="0.5s"><a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_attr(get_theme_mod('wimpie_lite_aboutus_viewmore_text')); ?></a></div>
              <?php
              endwhile;
              endif;

              ?>
          </div>
      </section>
      <?php
      endif;
  }
  ?>
  <?php 

  if (get_theme_mod('wimpie_lite_services_setting_option') == 'enable') {
    $wimpie_lite_service_cat = get_theme_mod('wimpie_lite_services_setting_category');

    if(!empty($wimpie_lite_service_cat)):
        ?>
    <section class="our-services" data-wow-delay="0.8s">
        <?php 

        $wimpie_lite_service_title = get_theme_mod('wimpie_lite_services_title');
        $wimpie_lite_service_desc = get_theme_mod('wimpie_lite_services_desc'); 
        ?>
        <div class="ed-container">  
            <h2 class="title home-title wow flipInX"><b><?php echo esc_attr($wimpie_lite_service_title); ?></b></h2><div class="title-border"></div>
            <div class="services-desc home-description wow fadeInLeft"><?php echo esc_textarea($wimpie_lite_service_desc); ?></div>
            <div class="service-block-wrapper wow fadeInRight">
                <?php 
                $wimpie_lite_services_args   = array('cat'=>$wimpie_lite_service_cat, 'posts_per_page'=>3, 'post_status'=>'publish');
                $wimpie_lite_services_query  = new WP_Query($wimpie_lite_services_args);
                $wimpie_lite_i = 0;
                if($wimpie_lite_services_query->have_posts()):
                    while($wimpie_lite_services_query->have_posts()):$wimpie_lite_services_query->the_post();
                $wimpie_lite_i++
                ?>
                <div class="service-<?php echo $wimpie_lite_i; ?> service-block">
                    <figure class="service-icons">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()):
                            $wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-lite-services-image'); ?>
                            <img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
                            else:
                               ?>
                           <i class="fa fa-desktop"> </i>
                           <?php                             
                           endif;
                           ?>
                       </a>
                   </figure>
                   <div class="service-title">
                    <a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
                    <div class="title-border"></div>
                </div>
                <div class="service-content">
                    <?php echo wimpie_lite_excerpt(get_the_content(), 75, true); ?>
                </div>
            </div>
            <?php
            endwhile;
            endif;
            if(get_theme_mod('wimpie_lite_services_button_option')=='enable'){
                $wimpie_lite_service_cat_url = get_category_link($wimpie_lite_service_cat);
                ?> 
                <div class="clearfix"> </div>
                <div class="btn-wrapper wow FadeInUp" data-wow-delay="0.5s"><a href="<?php echo esc_url($wimpie_lite_service_cat_url); ?>"><?php echo esc_attr(get_theme_mod('wimpie_lite_services_button_text')); ?></a></div>
                <?php
            }
            endif;
            ?>  
        </div> 
    </div>
</section>
<?php 
}
?>
<?php
if (get_theme_mod('wimpie_lite_awesome_feature_setting_option') == 'enable') {
    $wimpie_lite_wl_af_title    =   get_theme_mod('wimpie_lite_awesome_feature_title');
    $wimpie_lite_wl_af_desc     =   get_theme_mod('wimpie_lite_awesome_feature_desc');
    $wimpie_lite_wl_af_cat      =   get_theme_mod('wimpie_lite_awesome_feature_setting_category');
    if(!empty($wimpie_lite_wl_af_cat)){
        ?>
        <section class="awesome-feature">
            <div class="ed-container">    
                <h2 class="title home-title wow flipInX"><?php echo esc_attr($wimpie_lite_wl_af_title);?></h2>
                <div class="awesome-feature-desc home-description wow fadeInLeft"><?php echo esc_textarea($wimpie_lite_wl_af_desc);?></div>
                <?php $wimpie_lite_a=0;?>
                <div class="clearfix"> </div>
                <div class="aw-block-wrapper wow fadeInRight" data-wow-delay="0.5s">
                 <?php 
                 $wimpie_lite_af_args    =   array('cat'=>$wimpie_lite_wl_af_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
                 $wimpie_lite_af_query   =   new WP_Query($wimpie_lite_af_args);
                 if($wimpie_lite_af_query->have_posts()):
                    while($wimpie_lite_af_query->have_posts()):$wimpie_lite_af_query->the_post();    
                $wimpie_lite_a++;
                ?><div class="<?php if ($wimpie_lite_a%2==0){echo 'aw-right';} else{ echo 'aw-left';}?>">
                <div class="aw-wrapper clearfix">
                    <figure class="awesome-icons">
                        <span> 
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()):
                                $wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-lite-feature-image'); ?>
                                <img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
                                else:
                                   ?>
                               <i class="fa fa-font"></i>
                               <?php                             
                               endif;
                               ?>
                           </a>
                       </span>
                   </figure>
                   <div class="aw-content">
                    <div class="aw-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></div>
                    <div class="aw-excerpt"><?php echo wimpie_lite_excerpt(get_the_content(), 120);?></div>
                </div>
            </div>
        </div>

        <?php 
        endwhile;
        endif;
        ?>
    </div>
    <div class="clearfix"></div>
    <?php
    if(get_theme_mod('wimpie_lite_awesome_feature_button_option')=='enable'){
        $wimpie_lite_wl_af_cat_url = get_category_link($wimpie_lite_wl_af_cat);
        ?> 
        <div class="btn-wrapper wow fadeInUp" data-wow-delay="0.5s"><a href="<?php echo esc_url($wimpie_lite_wl_af_cat_url); ?>" class="btn"><?php echo esc_attr(get_theme_mod('wimpie_lite_awesome_feature_button_text')); ?></a></div> 
        <?php } ?>  
    </div>
</section>
<?php }
} ?>
<?php
if(get_theme_mod( 'wimpie_lite_portfolio_setting_option')=='enable'){
    $wimpie_lite_wl_port_cat    =   get_theme_mod('wimpie_lite_portfolio_setting_category');
    if($wimpie_lite_wl_port_cat!=0):
        ?>
    <section class="portfolio">
        <div class="ed-container">
            <h2 class="title home-title wow flipInX"><b><?php echo esc_attr(get_theme_mod('wimpie_lite_portfolio_title')); ?></b></h2><div class="title-border"></div>
            <div class="port-desc home-description wow fadeInLeft"><?php echo esc_textarea(get_theme_mod('wimpie_lite_portfolio_desc')); ?></div>
            <div id="portfolio-grid" class="masinory">
                <?php
                $wimpie_lite_port_args      =   array('cat'=>$wimpie_lite_wl_port_cat, 'post_status'=>'publish', 'posts_per_page'=>6);
                $wimpie_lite_port_query     =   new WP_Query($wimpie_lite_port_args);
                if($wimpie_lite_port_query->have_posts()):
                    $wimpie_lite_i=0;
                while($wimpie_lite_port_query->have_posts()):
                    $wimpie_lite_i++;
                $wimpie_lite_port_query->the_post();
                ?>
                <div class="port-wrap wow fadeInRight">
                    <figure class="portfolio-image">
                        <?php  if (has_post_thumbnail()):
                        $wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-lite-port-image'); ?>
                        <img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
                        endif; ?>
                    </figure>
                    <div class="portfolio-content">
                        <div class="portfolio-content-wrapper">
                            <div class="port-title"><?php the_title(); ?></div>
                            <a href="<?php the_permalink() ?> " class="read-more"><?php _e( 'View Project', 'wimpie-lite' ); ?></a>
                        </div>
                    </div>
                </div>
                <?php
                if($wimpie_lite_i%3==0){ ?><?php }
                    endwhile;
                endif;            
                ?>       
                <div class="clearfix"></div>
                <?php
                if(get_theme_mod('wimpie_lite_portfolio_button_option')=='enable'){
                    $wimpie_lite_wl_port_cat_url = get_category_link($wimpie_lite_wl_port_cat);
                    ?> 
                    <div class="btn-wrapper wow fadeInUp" data-wow-delay="0.5s"><a href="<?php echo esc_url($wimpie_lite_wl_port_cat_url); ?>" class="btn"><?php echo esc_attr(get_theme_mod('wimpie_lite_portfolio_button_text')); ?></a></div> 
                    <?php } ?>     
                </div>
            </div>
        </section>

        <?php
        endif;
    }
    ?>    


    <?php
    if(get_theme_mod('wimpie_lite_callto_setting_option')=='enable'){
        $wimpie_lite_call_to_action = get_theme_mod('wimpie_lite_callto_desc');
        if(!empty($wimpie_lite_call_to_action)):
            ?>
        <section class="call-to-action">
            <div class="ed-container">
                <h2 class="title home-title wow fadeInDown"><?php echo esc_attr(get_theme_mod('wimpie_lite_callto_title')); ?></h2>
                <div class="call-to-action-desc home-description wow fadeInLeft"><?php echo esc_textarea(get_theme_mod('wimpie_lite_callto_desc')); ?></div>
                <div class="cta-link wow fadeInRight" data-wow-delay="0.5s"><a href="<?php echo esc_url(get_theme_mod('wimpie_lite_callto_link')); ?>"><?php echo esc_attr(get_theme_mod('wimpie_lite_callto_readmore')); ?></a></div>
            </div>
        </section>
        <?php
        endif;
    }
    ?>
    <?php
    if(get_theme_mod('wimpie_lite_teammember_setting_option')=='enable'){
        $wimpie_lite_wl_team_cat    =   get_theme_mod('wimpie_lite_teammember_setting_category');
        if($wimpie_lite_wl_team_cat!='0'):
            ?>
        <section class="our-team-member">
            <div class="ed-container">
               <h2 class="title home-title wow flipInX"><?php echo esc_attr(get_theme_mod('wimpie_lite_teammember_title')); ?></h2>
               <?php

               $wimpie_lite_team_args      =   array('cat'=>$wimpie_lite_wl_team_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
               $wimpie_lite_team_query     =   new WP_Query($wimpie_lite_team_args);
               $wimpie_lite_i=0;
               if($wimpie_lite_team_query->have_posts()):
                while($wimpie_lite_team_query->have_posts()):$wimpie_lite_team_query->the_post();
            $wimpie_lite_i++;
            ?>
            <div class="team-block <?php if($wimpie_lite_i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
                <a href="<?php the_permalink(); ?>">
                    <figure class="team-image">
                        <?php if (has_post_thumbnail()):
                        $wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-lite-team-image'); ?>
                        <img src="<?php echo esc_attr($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
                        endif;
                        ?>
                        <div class="team-hover">
                            <div class="team-hover-title"> <?php echo get_the_title();?> 
                                <div class="team-hover-text"><?php echo wimpie_lite_excerpt(get_the_content(), 60);?></div>
                            </div>
                        </div>
                    </figure>
                </a>
            </div>
            <?php 
            endwhile;
            endif;
            
            ?>
            <div class="clearfix"></div>
            <?php
            if(get_theme_mod('wimpie_lite_teammember_button_option')=='enable'){
                $wimpie_lite_wl_team_cat_url = get_category_link($wimpie_lite_wl_team_cat);
                ?> 
                <div class="btn-wrapper wow FadeInUp" data-wow-delay="0.5s"><a href="<?php echo esc_url($wimpie_lite_wl_team_cat_url); ?>" class="btn"><?php echo esc_attr(get_theme_mod('wimpie_lite_teammember_button_text')); ?></a></div> 
                <?php } ?>
            </div>
        </section>
        <?php
        endif;
    }
    ?>

    <?php
    if(get_theme_mod('wimpie_lite_clientlogo_setting_option')=='enable'){
     $wimpie_lite_wl_cl_cat  = get_theme_mod('wimpie_lite_clientlogo_category_setting');
     if($wimpie_lite_wl_cl_cat!=0){ ?>
     <section class="clients-logo">
        <div class="ed-container">
            <h2 class="clients-logo-title wow flipInX"><b><?php echo esc_attr(get_theme_mod('wimpie_lite_clientlogo_title')); ?></b></h2><div class="title-border"></div>
            <div class="clients-logo-wrapper <?php echo get_theme_mod('wimpie_lite_clientlogo_viewtype');?>  wow fadeInUp">
                <?php
                $wimpie_lite_port_args      =   array('cat'=>$wimpie_lite_wl_cl_cat, 'post_status'=>'publish', 'posts_per_page'=>-1);
                $wimpie_lite_port_query     =   new WP_Query($wimpie_lite_port_args);
                if($wimpie_lite_port_query->have_posts()):
                    while($wimpie_lite_port_query->have_posts()):
                        $wimpie_lite_port_query->the_post();
                    ?>
                    <div class="client-slider">
                        <a href="<?php echo esc_url(the_permalink()); ?>">
                            <?php if (has_post_thumbnail()):
                            $wimpie_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'wimpie-lite-port-image'); ?>
                            <img src="<?php echo esc_url($wimpie_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                    </a>
                </div>
                <?php
                endwhile;
                endif;            
                ?>
            </div>
        </div>
        <div class="client-border wow fadeInUp"></div>
    </section>

    <?php }
}
?>

<?php
if(get_theme_mod('wimpie_lite_statcounter_setting_option')=='enable'){
    $wimpie_lite_stat_num1 = get_theme_mod('wimpie_lite_statcounter1_number');
    $wimpie_lite_stat_num2 = get_theme_mod('wimpie_lite_statcounter2_number');
    $wimpie_lite_stat_num3 = get_theme_mod('wimpie_lite_statcounter3_number');
    $wimpie_lite_stat_num4 = get_theme_mod('wimpie_lite_statcounter4_number');
    if(!empty($wimpie_lite_stat_num1) || !empty($wimpie_lite_stat_num2) || !empty($wimpie_lite_stat_num3) || !empty($wimpie_lite_stat_num4)):
        ?>
    <section class="stat-counter">
        <div class="ed-container">
            <h2 class="stat-counter-title wow flipInX"><b><?php echo get_theme_mod('wimpie_lite_statcounter_title'); ?></b></h2>
            <div class="stat-counter-desc wow fadeInLeft"><?php echo get_theme_mod('wimpie_lite_statcounter_desc'); ?></div>
            <?php
            if(get_theme_mod('wimpie_lite_statcounter1_setting_option')=="enable"){
                ?>
                <div class="statcounters statcounter-1">
                    <div class="statcounter-circle wow fadeInRight">
                        <div class="inner-circle"><h2><span class="counter"><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter1_number')) ?></span></h2></div>
                        <div class="stat-fa wow fadeInUp"><i class="fa <?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter1_fatext')); ?>"></i></div>
                        <div class="coutner-title wow fadeInUp"><h2><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter1_title')); ?></h2></div>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
            if(get_theme_mod('wimpie_lite_statcounter2_setting_option')=="enable"){
                ?>
                <div class="statcounters statcounter-2 wow fadeInRight">
                    <div class="statcounter-circle">
                        <div class="inner-circle"><h2><span class="counter"><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter2_number')); ?></span></h2></div>
                        <div class="stat-fa wow fadeInUp"><i class="fa <?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter2_fatext')); ?>"></i></div>
                        <div class="coutner-title  wow fadeInUp"><h2><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter2_title')); ?></h2></div>
                    </div>
                </div>

                <?php
            }
            ?>
            <?php
            if(get_theme_mod('wimpie_lite_statcounter3_setting_option')=="enable"){
                ?>
                <div class="statcounters statcounter-3 wow fadeInRight">
                    <div class="statcounter-circle">
                        <div class="inner-circle"><h2><span class="counter"><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter3_number')); ?></span></h2></div>
                        <div class="stat-fa wow fadeInUp"><i class="fa <?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter3_fatext')); ?>"></i></div>
                        <div class="coutner-title wow fadeInUp"><h2><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter3_title')); ?></h2></div>
                    </div>
                </div>

                <?php
            }
            ?>
            <?php
            if(get_theme_mod('wimpie_lite_statcounter4_setting_option')=="enable"){
                ?>
                <div class="statcounters statcounter-4 wow fadeInRight">
                    <div class="statcounter-circle">
                        <div class="inner-circle"><h2><span class="counter"><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter4_number')); ?></span></h2></div>
                        <div class="stat-fa wow fadeInUp"><i class="fa <?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter4_fatext')); ?>"></i></div>
                        <div class="coutner-title wow fadeInUp"><h2><?php echo esc_attr(get_theme_mod('wimpie_lite_statcounter4_title')); ?></h2></div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </section>
    <?php
    endif;
}
?>

<?php
if(get_theme_mod('wimpie_lite_blog_setting_option')=='enable'){
    $wimpie_lite_wl_blog_cat    =   get_theme_mod('wimpie_lite_blog_setting_category');
    ?>
    <?php 
    if($wimpie_lite_wl_blog_cat!=0):?>

    <section class="blogs" data-wow-delay="0.8s">
     <div class="ed-container">
        <h2 class="home-title wow flipInX"><b><?php echo esc_attr(get_theme_mod('wimpie_lite_blog_title')); ?></b></h2><div class="title-border"></div>
        <div class="blog-desc wow fadeInLeft"><?php echo esc_textarea(get_theme_mod('wimpie_lite_blog_desc')); ?></div>
        <div class="blog-wrap wow fadeInRight clearfix">
         <?php
         $wimpie_lite_blog_args      =   array('cat'=>$wimpie_lite_wl_blog_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
         $wimpie_lite_blog_query     =   new WP_Query($wimpie_lite_blog_args);
         if($wimpie_lite_blog_query->have_posts()):
            $wimpie_lite_j=0;
        while($wimpie_lite_blog_query->have_posts()):
            $wimpie_lite_blog_query->the_post();
        $wimpie_lite_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wimpie-lite-blog-image', true);
        ?>
        <div class="blog-in-wrap <?php if($wimpie_lite_j%2==0){echo "even";} else{echo "odd";}?>">
            <div class="blog-image"><img src="<?php echo esc_url($wimpie_lite_blog_image[0]); ?>" alt="<?php the_title(); ?>" /></div>
            <div class="blog-title-comment">
                <div class="blog-single-title"><?php the_title(); ?></div>
                <div class="blog-date"><?php echo get_the_date('d, M Y'); ?></div>
                <div class="blog-comment">
                    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                      <span class="comments-link">
                        <?php comments_popup_link( __( 'No comment', 'wimpie-lite' ), __( '1 Comment', 'wimpie-lite' ), __( '% Comments', 'wimpie-lite' ) ); ?>
                    </span>
                    <?php
                    endif; ?>
                </div>
                <a href="<?php echo  get_author_posts_url( get_the_author_meta( 'ID' ) );  ?>">
                    <div class="blog-author">
                        <?php echo __('<span>By:</span>', 'wimpie-lite')?> <?php the_author(); ?>
                    </div>
                </a>
            </div>
            <div class="blog-content"><?php echo wimpie_lite_excerpt(get_the_content(), 120); ?>
                <span><a href="<?php the_permalink() ?>"><?php echo esc_attr(get_theme_mod('wimpie_lite_blog_single_readmore')); ?></a></span>
            </div>
        </div>
        <?php
        $wimpie_lite_j++;
        endwhile;
        endif;
        ?>
    </div>
    <?php
    if(get_theme_mod('wimpie_lite_blog_button_option')=='enable'){
        $wimpie_lite_wl_blog_cat_url = get_category_link($wimpie_lite_wl_blog_cat);
        ?>
        <div class="btn-wrapper wow fadeInUp" data-wow-delay="0.5s" ><a href="<?php echo esc_url($wimpie_lite_wl_blog_cat_url); ?>" class="btn"><?php echo esc_attr(get_theme_mod('wimpie_lite_blog_button_text')); ?></a></div> 
        <?php
    } ?>  
</div>
<div class="client-border wow fadeInUp"></div>
</section>
<?php    
endif;    
}
?>
<?php
get_footer();
?>