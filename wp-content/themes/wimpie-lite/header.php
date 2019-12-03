<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wimpie lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <div id="outer-wrap">
            <div id="inner-wrap">
                <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wimpie-lite' ); ?></a>
                <?php 
                $wimpie_lite_wl_logo_alignment = '';
                $wimpie_lite_wl_nav_alignment = '';
                $wimpie_lite_no_slider = 'no_slider';
                $wimpie_lite_header_style_class ='';
                $wimpie_lite_header_style =get_theme_mod('wimpie_lite_header_type');
                $wimpie_lite_wl_nav = get_theme_mod('wimpie_lite_logo_alignment');
                $wimpie_lite_wl_search_placeholder  =   get_theme_mod('wimpie_lite_search_placeholder');
                $wimpie_lite_wl_search_button_text  =   get_theme_mod('wimpie_lite_search_button_text');
                if($wimpie_lite_wl_nav=='center'){
                    $wimpie_lite_wl_logo_alignment = 'logo-center';
                    $wimpie_lite_wl_nav_alignment = 'menu-center';
                }
                elseif($wimpie_lite_wl_nav=='right'){
                    $wimpie_lite_wl_logo_alignment = 'logo-right';
                    $wimpie_lite_wl_nav_alignment = 'menu-right';
                }
                if(get_theme_mod('wimpie_lite_slider_setting_option')=='enable'){ $wimpie_lite_no_slider=""; }
                if($wimpie_lite_header_style=='classic'){ $wimpie_lite_header_style_class = 'classic'; }    
                ?>

                <header id="masthead" class="site-header <?php echo esc_attr($wimpie_lite_no_slider, 'wimpie-lite')." ".esc_attr($wimpie_lite_header_style_class, 'wimpie-lite'); ?>" role="banner">
                    <div class="ed-container">
                        <div class="site-branding <?php echo esc_attr($wimpie_lite_wl_logo_alignment, 'wimpie-lite') ?>">
                            <?php
                            if ( function_exists( 'the_custom_logo' ) ) {
                                if ( has_custom_logo() ) :
                                the_custom_logo();
                                endif;
                            }else{
                                ?>
                                <?php if ( get_header_image() ) : ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                                    </a>
                                <?php endif; 
                            }// End header image check. ?>
                            <div class="site-text">
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <?php echo bloginfo('title'); ?></a></h1>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="tagline site-description"><?php echo bloginfo('description'); ?></div></a>
                            </div>
                        </div>
                        <div class="menu-wrap <?php echo esc_attr($wimpie_lite_wl_nav_alignment, 'wimpie-lite'); ?>">
                            <?php if($wimpie_lite_wl_nav == 'left' || $wimpie_lite_wl_nav == 'right' || $wimpie_lite_wl_nav=='' ){?>
                            <?php if(get_theme_mod('wimpie_lite_search_options')==1){ ?>                        
                            <?php wimpie_lite_get_search_form_header() ?>
                            <?php }}?>            
                            <nav id="site-navigation" class="main-navigation" role="navigation">
                                <button class="menu-toggle"><?php _e( 'Primary Menu', 'wimpie-lite' ); ?></button>
                                <div class="clearfix"> </div>
                                <?php 
                                if( has_nav_menu( 'primary' ) ){
                                    wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu' ) );    
                                }else{
                                    wp_page_menu();
                                }
                                ?>  
                            </nav><!-- #site-navigation -->
                            <?php if($wimpie_lite_wl_nav == 'center'){?>
                            <?php if(get_theme_mod('wimpie_lite_search_options')==1){ ?>                        
                            <?php wimpie_lite_get_search_form_header() ?>
                            <?php }}?>   
                        </div>
                        <div class="responsive-header <?php echo esc_attr($wimpie_lite_wl_nav_alignment, 'wimpie-lite'); ?>">
                            <a class="nav-btn" id="nav-open-btn" href="#nav"></a>
                        </div>   
                    </div>
                </header><!-- #masthead -->
                <nav id="nav">
                    <div class="block">
                        <div class="menu-responsive-header-container">
                            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>  
                        </div>
                        <a class="close-btn" id="nav-close-btn" href="#top"><i class="fa fa-close"> </i> </a>
                    </div>
                </nav><!-- #site-navigation -->
                <div id="content" class="site-content">
                    <?php 
                    if(is_home() || is_front_page()) :
                        $wimpie_lite_ed_slider = get_theme_mod('wimpie_lite_slider_setting_option');
                    if($wimpie_lite_ed_slider=='enable'):
                        ?>
                    <div class="slider-wrapper">
                        <?php do_action('wimpie_bxslider');?>
                    </div>
                    <?php
                    endif;
                    endif;
                    ?>