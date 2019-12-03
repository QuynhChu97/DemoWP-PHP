<?php
/**
 * The Template for displaying all single posts.
 * Template Name: Fullwidth Layout
 * Template Post Type: Post
 * @package nineteen
 */

get_header(); ?>
<!--blogo-page-cont-->
<div class="page-blog main-container"style="background-color: #<?php background_color(); ?>">
    <div class="margin-100">  </div>
    <div class="blog-post-all container animate" data-anim-type="fadeInLeft" data-anim-delay="400">
        <!--blogo-post-->
        <div class="row">
            <?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
            <div class="col-md-12">
                <div class="blog-post-img ">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                    <?php } ?>
                    <div class="margin-40 clearfix"> </div>
                    <div class="blog-post col">
                        <h1><?php the_title(); ?></h1>
                        <p class="post_date"> 
                            <?php echo esc_html( wl_theme_get_post_publish_date( get_the_id() ) ); ?> / 
                            <span> 
                                <?php esc_html_e( 'By', 'nineteen' ); ?>
                                <?php echo wl_theme_get_post_author_name( get_the_id() ); ?> 
                            </span> 
                        </p>
                        <p class="mb-4"><?php the_content(); ?></p>
                        <p>
                           <?php $page_link = array(
								'before'           => '<p>' . __( 'Pages:', 'nineteen' ),
								'after'            => '</p>',
								'link_before'      => '',
								'link_after'       => '',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => __( 'Next page', 'nineteen'),
								'previouspagelink' => __( 'Previous page', 'nineteen' ),
								'pagelink'         => '%',
								'echo'             => 1
							);
							esc_html( wp_link_pages( $page_link ) ); ?>
                        </p>
                    </div>
                </div>
                <div class="margin-40 clearfix"> </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 blog-post_tag">
                        <?php if(get_the_tag_list() != '') { ?>         
                            <p class="mb-0">
                                <?php the_tags(); ?>
                            </p>
                        <?php } ?>
                        <p class="mb-0"> 
                            <span> <?php esc_html_e( 'Categories:', 'nineteen' ); ?> </span>  
                            <?php $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a> ';
                                } ?> 
                        </p>
                    </div>
                </div>
        <!--commaent-area-->
        <?php comments_template( '', true ); ?>      
        </div>
        <?php endwhile; endif; ?>
        </div>
        <!--commaent-area-->
    </div>
    <div class="margin-100 "> </div>
<?php get_footer(); ?>