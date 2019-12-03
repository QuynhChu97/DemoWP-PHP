<?php
defined( 'ABSPATH' ) or die();

function nineteen_fonts_url() {
    $fonts_url = '';

    $font_families = array();

    $font_families[] = 'Montserrat:400,600,800';
    $font_families[] = 'Open+Sans:400,600,800';

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}

function nineteen_scripts_head() {
    /* Css files */
    wp_enqueue_style( 'nineteen-font', nineteen_fonts_url(), array(), null );
    wp_enqueue_style( 'nineteen-main-style', get_theme_file_uri( '/assets/css/main_style.min.css' ) );
    wp_enqueue_style( 'nineteen-responsive-js', get_theme_file_uri( '/assets/css/responsive.min.css' ) );
    wp_enqueue_style( 'nineteen-bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
    wp_enqueue_style( 'nineteen-animations', get_theme_file_uri( '/assets/css/animations.min.css' ) );
    wp_enqueue_style( 'nineteen-font-awesome', get_theme_file_uri( '/assets/font-awesome/css/fontawesome-all-v5.3.1.min.css' ) );
    wp_enqueue_style( 'nineteen-swiper', get_theme_file_uri( '/assets/css/swiper.min.css' ) );

    /* Jquery */
    wp_enqueue_script( 'jquery' );
}

function nineteen_scripts_footer() {
    /* Js files */       
    wp_enqueue_script( 'nineteen-bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ) );
    wp_enqueue_script( 'nineteen-popper', get_theme_file_uri( '/assets/js/popper.min.js' ) );
    wp_enqueue_script( 'nineteen-animations-min', get_theme_file_uri( '/assets/js/animations.min.js' ) );
    wp_enqueue_script( 'nineteen-swiper', get_theme_file_uri( '/assets/js/swiper.min.js' ), array( 'jquery' ), true, true  );
    wp_enqueue_script( 'nineteen-custom-script', get_theme_file_uri( '/assets/js/custom-script.min.js' ), array( 'jquery' ), true, true  );

}

/* Enqueue Theme Style and Script Files in header */
add_action( 'wp_enqueue_scripts', 'nineteen_scripts_head' );

/* Enqueue Theme Style and Script Files in Footer */
add_action( 'wp_enqueue_scripts', 'nineteen_scripts_footer' );

?>