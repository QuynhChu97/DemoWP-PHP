<?php global $axiohost; ?>
<!--End Hosting Solution Area -->
    <footer class="footer-area bg-color1">
        <div class="container ">
            <?php 
                if(is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4')){?>
                    <div class="footer-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer1'); ?>   
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer2'); ?>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer3'); ?>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer4'); ?>
                            </div>  
                        </div>
                    </div>
                <?php
                }
            ?>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright-text">
                          <?php esc_html_e('&copy; Copyright ', 'axiohost'); ?> <?php bloginfo( 'name' ); ?> <?php esc_html_e(' - Developed by ', 'axiohost'); ?><a href="<?php echo esc_url('https//themeix.com'); ?>"><?php  esc_html_e('themeix', 'axiohost');?></a>   
                        </div>
                    </div>
					<?php if ( is_active_sidebar('footer-menu') ) : ?>
                    <div class="col-md-6">
                        <?php dynamic_sidebar('footer-menu'); ?>
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
   
    <?php if ( true == get_theme_mod( 'back_to_top') ) : ?>
    	<a id="scrollUp" href="#top" title="<?php esc_html_e('Scroll to top', 'axiohost'); ?>"><i class="fa fa-chevron-up"> </i></a> 
    <?php endif; ?>
    <!-- End Footer Area -->
    <?php wp_footer(); ?>

</body>
</html>