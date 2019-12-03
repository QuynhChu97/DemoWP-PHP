<?php

function neolo_scripts_styles() {
    wp_enqueue_style( 'neolo-main-css', get_template_directory_uri() . '/assets/styles/main.min.css' );
    wp_enqueue_style( 'neolo-vendor-css', get_template_directory_uri() . '/assets/styles/vendor.css' );
    wp_enqueue_style( 'neolo-blog-css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'neolo-app-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), null, true);

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'neolo_scripts_styles' );

function neolo_theme_features() {

    $args = array(
        'width'         => 200,
        'height'        => 60,
        'default-image' => get_template_directory_uri() . '/assets/img/logo.png',
    );
    
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background');
    add_theme_support( 'automatic-feed-links' );
    add_image_size( 'post-preview', 490, 300, array( 'center', 'top' ) );
    add_editor_style();

}
add_action( 'after_setup_theme', 'neolo_theme_features' );

function neolo_google_fonts() {
	wp_enqueue_style('neolo-theme-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Merriweather:300,400,400i,700&display=swap');
}
add_action('wp_enqueue_scripts', 'neolo_google_fonts');

function neolo_remove_website_field($fields) {
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','neolo_remove_website_field');

function neolo_register_main_menu() {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu', 'neolo')
        )
    );
}
add_action('init', 'neolo_register_main_menu');

function neolo_sidebar_widgets_init() {

    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => 'default_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'neolo_sidebar_widgets_init' );
