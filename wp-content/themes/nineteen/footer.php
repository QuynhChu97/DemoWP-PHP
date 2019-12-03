<?php 
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nineteen
 */
?>
<!--footer-strart-->
<footer>
    <div class="footer_inner">
        <div class="margin-80 clearfix"> </div>
        <div class="container">
            <!--footer-widgets-->
            <div class="footer-widgets animate " data-anim-type="fadeInDownLarge" data-anim-delay="400">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-widget-area' ) ) { 
                            dynamic_sidebar( 'footer-widget-area' ); 
                        } else { 
						$args = array(
						'before_widget' => '<div class="col-md-4 widgets-col">',
						'after_widget'  => '</div>',
						'before_title'  => '<h3 class="widgets-title>',
						'after_title'   => '</h3>' );
						the_widget( 'WP_Widget_Calendar', null, $args );			
						} ?>
                </div>
            </div>
        </div>
        <!--//footer-widgets-->
        <!--coppy-right-->
        <div class="margin-80 xs-hiddn clearfix"> </div>
        <div class="coppy-right text-center">
            <?php if ( wl_theme_is_companion_active() ) { ?>
                <p class="copy_nineteen">
                    <i class="fa fa-copyright"></i> 
                    <?php echo esc_html( get_theme_mod( 'nineteen_footer_customization', 'Powered by WordPress' ), 'nineteen' ); ?> 
                    <i class="fa fa-heart"></i>
                    <a href="<?php echo esc_url( get_theme_mod( 'nineteen_deve_link', '' ) ); ?>"> 
                        <?php echo esc_html( get_theme_mod( 'nineteen_develop_by', '' ), 'nineteen' ); ?> 
                    </a>
                </p>
            <?php } ?>
        </div>
        <!--./coppy-right-->
    </div>

</footer>

<!-- Return to Top -->
<?php if ( wl_theme_is_companion_active() ) { 
if ( get_theme_mod( 'nineteen_return_top', '1' ) == "1" ) { ?>
<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-alt-circle-up h4"></i></a>
<?php } } ?>

<?php wp_footer(); ?>
<?php if( get_theme_mod( 'show_fs' ) ){
        $output = get_theme_mod( 'footer_script' ); 
        echo ( $output );
        }
?>
</body>
</html>