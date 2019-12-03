	<?php
	/**
	 * The template for displaying the footer.
	 *
	 * Contains the closing of the #content div and all content after
	 *
	 * @package wimpie lite
	 */
	?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
		        <?php
				if ( is_active_sidebar( 'wimpie-lite-footer-1' ) ||  is_active_sidebar( 'wimpie-lite-footer-2' )  || is_active_sidebar( 'wimpie-lite-footer-3' )  || is_active_sidebar( 'wimpie-lite-footer-4' )) : ?>
				<div class="top-footer wow fadeInUp" >
    				<div class="ed-container">
    					<div class="footer-block-1 footer-block">
    						<?php if ( is_active_sidebar( 'wimpie-lite-footer-1' ) ) : ?>
    							<?php dynamic_sidebar( 'wimpie-lite-footer-1' ); ?>
    						<?php endif; ?>	
    					</div>
    
    					<div class="footer-block-2 footer-block">
    						<?php if ( is_active_sidebar( 'wimpie-lite-footer-2' ) ) : ?>
    							<?php dynamic_sidebar( 'wimpie-lite-footer-2' ); ?>
    						<?php endif; ?>	
    					</div>
    
    					<div class="footer-block-3 footer-block">
    						<?php if ( is_active_sidebar( 'wimpie-lite-footer-3' ) ) : ?>
    							<?php dynamic_sidebar( 'wimpie-lite-footer-3' ); ?>
    						<?php endif; ?>	
    					</div>
    
    					<div class="footer-block-4 footer-block">
    						<?php if ( is_active_sidebar( 'wimpie-lite-footer-4' ) ) : ?>
    							<?php dynamic_sidebar( 'wimpie-lite-footer-4' ); ?>
    		                     <?php endif; ?>
    		            </div>
    		            </div>
                    </div>
		            <?php endif; ?>
		         
				<div class="site-info">
					<div id="bottom-footer">
        				<div class="ed-container">
        					<div class="menu-copyrt wow fadeInLeft">
                                <div class="footer-menu">
                                    <?php wp_nav_menu( array( 'theme_location' => 'wimpie_lite_footer_menu' ) ); ?>  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="copyright">
            						Copyright &copy; <?php echo date('Y') ?> 
            						<a href="<?php echo home_url(); ?>">
                						<?php
                		                $wimpie_lite_copyright = get_theme_mod( 'wimpie_lite_footer_copyright' );
                		                 ?>
                                         <span class="dynamic_copyright">
                                         <?php
                                         if(!empty($wimpie_lite_copyright)){
            							     echo esc_attr($wimpie_lite_copyright); 
            							 }else{
            								echo bloginfo('name');
            							 }
                                         ?>
                                         </span>
            						</a>
            		                <span class="free-credit"> | <?php _e('WordPress Theme: Wimpie Lite by', 'wimpie-lite')?> <a href="<?php echo esc_url('http://8degreethemes.com/','wimpie-lite')?>" target="_blank" rel="nofollow"><?php _e('8degree Themes', 'wimpie-lite')?></a></span>
            					</div>
                            </div>
        		            <?php if(get_theme_mod('wimpie_lite_social_setting_option_footer')=='enable'){ ?>
        		            <div class="wl_footer_social wow fadeInRight">
        		              <?php do_action('wimpie_social'); ?>
        		            </div>
        		            <?php } ?>
        				</div>
				    </div>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div> <!-- #inner wrap -->
	</div> <!-- #outer-wrap -->
</div><!-- #page -->
<div id="wltop"><i class="fa fa-anchor"></i></div>
<?php wp_footer(); ?>
</body>
</html>