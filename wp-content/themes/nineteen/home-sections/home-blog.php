<?php if ( get_theme_mod( 'blog_home','1' ) == "1" ) { ?>
	    <!--our-blogs-->
		<section class="our-cases clearfix">
		    <div class="container">
		        <div class="section-heading text-center animate " data-anim-type="zoomIn" data-anim-delay="600">
		            <h2 class="section-title "> 
		            	<span> <?php echo esc_html( get_theme_mod( 'nineteen_blog_title','Our Blogs') ); ?> </span> 
		            </h2>
		            <h4 class="section-description "><?php echo esc_html( get_theme_mod( 'nineteen_blog_desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.') ); ?></h4>
		        </div>
		        <div class="margin-60 clearfix"> </div>

		        <div class="row ">

		            <div class="col-md-6 cases-catipon tab-content">
		                <?php 
		                    $post_data = array( 'post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option( 'sticky_posts' ) ); 
		                    $post_data = new WP_Query( $post_data );
		                    if ( $post_data->have_posts() ) { $count = 1;
		                    while ( $post_data->have_posts() ) : $post_data->the_post(); 
		                ?>
		                <div id="post_<?php echo get_the_ID(); ?>" class="tab-pane <?php if ( $count == '1' ) : echo 'active'; endif; ?> show">
		                    <div class="our_work-catipon-inner text-left">
		                        <a href="<?php esc_url( the_permalink() ); ?>">
		                            <h2><b><?php echo esc_html( $count ); ?>. <?php the_title(); ?></b></h2>
		                        </a>
		                        <?php echo esc_html( substr( get_the_excerpt(), 0, get_theme_mod( 'excerpt_blog', 200 ) ) ); ?>
		                        <div class="margin-60 xs-hiddn"> </div>
		                        <a class="btn main-btn" href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e('Read More','nineteen'); ?></a>
		                    </div>
		                </div>
		                <?php 
		                    $count++; 
		                    endwhile; 
		                    } 
		                ?>
		            </div>

		            <div class="col-md-6 cases-img">        
		                <div class="cases-img-inner row nav nav-pills">
		                    <?php 
		                        $post_data = array( 'post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option( 'sticky_posts' ) ); 
		                        $post_data = new WP_Query( $post_data );
		                        if ( $post_data->have_posts() ) { 
		                        while ( $post_data->have_posts() ) : $post_data->the_post(); 
		                    ?>
		                    <a class="col-md-6 col-cases_img nav-link" data-toggle="pill" href="#post_<?php echo get_the_ID(); ?>">
		                        <?php if ( has_post_thumbnail() ) { ?>
		                            <img src="<?php esc_url( the_post_thumbnail_url() ); ?>" class="img-fluid img-responsive" alt="<?php the_title(); ?>">
		                        <?php } ?>
		                        <div class="team_mmbr_overlay">
		                            <div class="team_mmbr_overlay-inner">
		                                <h4>  <?php the_title(); ?> </h4>
		                                <p> <span><?php echo esc_html( get_the_author() ); ?></span>
		                            </div>
		                        </div>
		                    </a>
		                    <?php
		                        endwhile; } 
		                    ?>
		                </div>
		            </div>

		        </div>
		    </div>
		</section>

	<?php } ?>