<?php
defined( 'ABSPATH' ) or die();

function wl__nineteen_theme_setup() {
	/* Load child theme text domain. */
	if ( is_child_theme() ) {
		load_child_theme_textdomain( 'nineteen', get_stylesheet_directory() . '/languages' );
	}

	/* Load theme text domain. */
	load_theme_textdomain( 'nineteen', get_template_directory() . '/languages' );

	/* Register custom menu. */
	register_nav_menu( 'primary', __( 'Primary Menu', 'nineteen' ) );

	/* Gutenberg */
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Block Color Palettes */
	add_theme_support( 'editor-color-palette', array(
	    array(
	        'name' => __( 'strong magenta', 'nineteen' ),
	        'slug' => 'strong-magenta',
	        'color' => '#a156b4',
	    ),
	    array(
	        'name' => __( 'light grayish magenta', 'nineteen' ),
	        'slug' => 'light-grayish-magenta',
	        'color' => '#d0a5db',
	    ),
	    array(
	        'name' => __( 'very light gray', 'nineteen' ),
	        'slug' => 'very-light-gray',
	        'color' => '#eee',
	    ),
	    array(
	        'name' => __( 'very dark gray', 'nineteen' ),
	        'slug' => 'very-dark-gray',
	        'color' => '#444',
	    ),
	) );

	/* Block Font Sizes */
	add_theme_support( 'editor-font-sizes', array(
	    array(
	        'name' => __( 'small', 'nineteen' ),
	        'shortName' => __( 'S', 'nineteen' ),
	        'size' => 12,
	        'slug' => 'small'
	    ),
	    array(
	        'name' => __( 'regular', 'nineteen' ),
	        'shortName' => __( 'M', 'nineteen' ),
	        'size' => 16,
	        'slug' => 'regular'
	    ),
	    array(
	        'name' => __( 'large', 'nineteen' ),
	        'shortName' => __( 'L', 'nineteen' ),
	        'size' => 36,
	        'slug' => 'large'
	    ),
	    array(
	        'name' => __( 'larger', 'nineteen' ),
	        'shortName' => __( 'XL', 'nineteen' ),
	        'size' => 50,
	        'slug' => 'larger'
	    )
	) );

	/* Disabling custom colors in block Color Palettes */
	add_theme_support( 'disable-custom-colors' );

	/* Add editor style. */
	add_theme_support( 'editor-styles' );
	add_theme_support( 'dark-editor-style' );

	/* Load editor style. */
	add_editor_style();

	/* Add default posts and comments RSS feed links to head. */
	add_theme_support( 'automatic-feed-links' );

	/* Enable support for Post Thumbnails. */
	add_theme_support( 'post-thumbnails' );

	/* Add title tag support. */
	add_theme_support( 'title-tag' );

	/* Allow shortcodes in widgets. */
	add_filter( 'widget_text', 'do_shortcode' );

	/* Create upload dir. */
	wp_upload_dir();

	/* Enable support for Woocommerce */
  	add_theme_support( 'woocommerce' );
  	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    /* Enable support for HTML5 */
    add_theme_support( 'html5', array(
	    'comment-form',
	    'comment-list',
	    'gallery',
	    'caption',
	  ) );

     $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );

    $defaults = array(
    'default-image'          => get_template_directory_uri().'/assets/images/header-bg.jpg',
    'flex-width'             => true,
	'width'                  => 980,
	'flex-height'            => true,
	'height'                 => 400,
    'uploads'                => true,
    'random-default'         => true,
    'header-text'            => true,
    'default-text-color'     => '#fff',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
    );
  add_theme_support( 'custom-header', $defaults );

  add_theme_support( 'custom-background' );

  if ( ! isset( $content_width ) ) $content_width = 900;

}

function wl__nineteen_widgets_init() {

  /*sidebar*/
  register_sidebar( array(
      'name' => __( 'Sidebar', 'nineteen' ),
      'id' => 'sidebar-primary',
      'description' => __( 'The primary widget area', 'nineteen' ),
      'before_widget' => '<div id="%1$s" class="blog-sidebar-widgets %2$s">',
	  'after_widget' => '</div>',
	  'before_title' => '<h4 class="widgets-title"> <span>',
	  'after_title' => '</h4>',
    ) );

  register_sidebar( array(
      'name' => __( 'Footer Widgets', 'nineteen' ),
      'id' => 'footer-widget-area',
      'description' => __( 'footer widget area', 'nineteen' ),
      'before_widget' => '<div id="%1$s" class="col-md-4 widgets-col %2$s">',
	  'after_widget' => '</div>',
	  'before_title' => '<h3 class="widgets-title">',
	  'after_title' => '</h3>',
    ) ); 
}

/** Theme setup **/
add_action( 'after_setup_theme', 'wl__nineteen_theme_setup', 5 );

/** Theme **/
add_action( 'widgets_init', 'wl__nineteen_widgets_init' );

//Plugin Recommend
add_action('tgmpa_register','nineteen_plugin_recommend');
function nineteen_plugin_recommend(){
	$plugins = array(
	array(
            'name'      => 'weblizar-companion',
            'slug'      => 'weblizar-companion',
            'required'  => true,
        )
		
	);
    tgmpa( $plugins );
}
?>