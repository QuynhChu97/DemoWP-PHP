<div class="blog-post-all row animate " data-anim-type="fadeInLeft" data-anim-delay="400">
    <!--blogo-post-->
    <div class="col-md-8">
    <?php 
    if ( have_posts() ): 
        $count = 0;
        while ( have_posts() ): the_post();
    ?> 
    <div class="blog-post mb-5 <?php post_class(); ?>">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="blog-post-img mb-3">
            <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
        </div>
        <?php } ?>
        <div class="blog-post-cnt">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php 
            if ( get_post_type ( get_the_ID() )== 'post' ) { 
            ?>
                <p class="post_date"> 
                    <?php echo esc_html( wl_theme_get_post_publish_date( get_the_id() ) ); ?> / 
                    <span> 
                        <?php esc_html_e( 'By', 'nineteen' ); ?>
                        <?php echo wl_theme_get_post_author_name( get_the_id() ); ?> 
                    </span> 
                </p>
            <?php 
            } 
            ?>
            <p class="mb-4"><?php the_excerpt(); ?></p>
            <?php 
            if ( get_post_type ( get_the_ID() ) == 'post' ) { 
            ?>
                <a class="btn main-btn mt-3 white px-5" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Article', 'nineteen' ); ?></a>
            <?php 
            } elseif ( get_post_type ( get_the_ID() ) == 'page' ) { ?>
                <a class="btn main-btn mt-3 white px-5" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Page', 'nineteen' ); ?></a>
            <?php 
            }
            ?>
        </div>
    </div>
    <?php
        $count++;
        endwhile;
        else:    
            esc_html_e( 'Oops, there are no posts.', 'nineteen' );
        endif;
    ?>
    <div class="margin-100"> </div>
    <?php esc_html( wl_theme_get_the_pagination() ); ?>
    </div>
    <?php get_sidebar(); ?>
    <div id="ajax-posts"></div>
    <div class="margin-100"> </div>
</div>