<?php get_header(); ?>
      <!-- End Post Title Area -->
      <section class="post-title-area bg-color2">
          <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php echo esc_html('404', 'axiohost'); ?></h1>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
     
      <!-- End Post Title Area -->
      <section id="content" class="blog-area section-spacing bg-color1">
         <div class="container">
            <div class="error-content">
                <div class="error-logo"><img src="<?php echo esc_url(AXIOHOST_IMG_URL.'/404.png'); ?>" alt="<?php esc_attr_e('404', 'axiohost'); ?>" /></div>
				<h4 class="heading-4"><?php echo wp_kses_post($axiohost['error-text']); ?></h4>
				<a href="<?php echo esc_url(site_url()); ?>" class="error-btn btn btn-primary"><?php echo esc_html('Back to Home', 'axiohost'); ?></a>
            </div>
         </div>
      </section>
      <!-- End Blog Area -->
 <?php get_footer(); ?>