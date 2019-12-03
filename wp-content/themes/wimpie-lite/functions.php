<?php
/**
 * wimpie lite functions and definitions
 *
 * @package wimpie lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wimpie_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wimpie_lite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wimpie lite, use a find and replace
	 * to change 'wimpie-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wimpie-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('wimpie-lite-singlepage-image', 855, 300, true);

	add_image_size('wimpie-lite-portfolio-thumbnail', 360, 300,  true);

	add_image_size('wimpie-lite-archive-image', 853, 350, true);

	add_image_size('wimpie-lite-archive-image-medium', 370, 350, true);

	add_image_size('wimpie-lite-feature-grid-image', 368, 150, true);

	add_image_size('wimpie-lite-blog-image', 184, 150, true);

	add_image_size('wimpie-lite-about-image', 561, 362, true);

	add_image_size('wimpie-lite-services-image', 364, 273, true);

	add_image_size('wimpie-lite-feature-image', 99, 99, true);

	add_image_size('wimpie-lite-team-image', 270, 192, true);

	add_image_size('wimpie-lite-port-image', 360, 360, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wimpie-lite' ),
		'wimpie_lite_footer_menu' => __('Custom Footer Menu','wimpie-lite'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'eightstore_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo' , array(
		'header-text' => array( 'site-title', 'site-description' ),
	));

	add_editor_style( array( 'css/editor-style.css') );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // wimpie_lite_setup
add_action( 'after_setup_theme', 'wimpie_lite_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wimpie_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'wimpie-lite' ),
		'id'            => 'wimpie-lite-right-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wimpie-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'wimpie-lite' ),
		'id'            => 'wimpie-lite-left-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'wimpie-lite' ),
		'id'            => 'wimpie-lite-footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'wimpie-lite' ),
		'id'            => 'wimpie-lite-footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'wimpie-lite' ),
		'id'            => 'wimpie-lite-footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'wimpie-lite' ),
		'id'            => 'wimpie-lite-footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="title-border"></div>',
	) );
	
}
add_action( 'widgets_init', 'wimpie_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wimpie_lite_scripts() {

	$font_args = array(
		'family' => 'Open+Sans:400,600,700,300|Oswald:400,700,300|Dosis:400,300,500,600,700|Raleway:400,500,600,700,800,900,300,100,200|Roboto+Slab:400,700,300,100|PT+Sans:400,400italic,700,700italic,'
	);
	wp_enqueue_style('wimpie-lite-google-fonts', add_query_arg($font_args, "//fonts.googleapis.com/css"));
	wp_enqueue_style( 'wimpie-lite-step3css', get_template_directory_uri() . '/css/step3.css');
	wp_enqueue_style( 'wimpie-lite-animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'wimpie-lite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'wimpie-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wimpie-lite-responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style( 'wimpie-lite-keyboard', get_template_directory_uri() . '/css/keyboard.css');
	if(is_rtl()){
		wp_enqueue_style( 'wimpie-lite-rtl', get_template_directory_uri() . '/css/rtl.css');
	}
	wp_enqueue_script( 'wimpie-lite-wow', get_template_directory_uri() . '/js/wow.min.js');

	wp_enqueue_script( 'wimpie-lite-bx_slider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'wimpie-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'wimpie-lite-jquery-counterup', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'wimpie-lite-jquery-waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'wimpie-lite-modernizer', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', false);
	wp_enqueue_script( 'wimpie-lite-main-menu', get_template_directory_uri() . '/js/main-menu.js', array('jquery'), '2.6.2', true);
	
	wp_enqueue_script( 'wimpie-lite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
    //wp_enqueue_script( 'wimpie-lite-superfish', get_template_directory_uri() . '/js/superfish.min.js', array(), '20120206', true );

	wp_enqueue_script( 'wimpie-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
}
add_action( 'wp_enqueue_scripts', 'wimpie_lite_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom header options
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Customizer additions.
 */
require get_template_directory() . '/inc/wimpielite-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Options Custom function.
 */
require get_template_directory() . '/inc/wimpielite-function.php';

/**
 * Load Options Custom metabox.
 */
require get_template_directory() . '/inc/wimpielite-custom-metabox.php';
/**
 * Load Typography Dropdown
 */
require get_template_directory() . '/inc/typography-dropdown.php';
/**
 * Load Custom Styles
 */
require get_template_directory() . '/css/config-styles.php';
/**
 * Recommended Plugins
 */
require get_template_directory() . '/welcome/welcome-config.php';
add_filter('adi_git_config_location', 'wimpie_lite_git_url_config' );
function wimpie_lite_git_url_config(){
	$git_url = 'https://raw.githubusercontent.com/8degreethemes/8degreethemes.github.io/master/demos/wimpie-lite/config.json';
	return $git_url;
}

//Added by sadip
if (class_exists('WP_Customize_Control')) {
	class Wimpie_Lite_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
        	$dropdown = wp_dropdown_categories(
        		array(
        			'name'              => '_customize-dropdown-categories-' . $this->id,
        			'echo'              => 0,
        			'show_option_none'  => __( '&mdash; Select &mdash;','wimpie-lite' ),
        			'option_none_value' => '0',
        			'selected'          => $this->value(),
        		)
        	);
        	
            // Hackily add in the data link parameter.
        	$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
        	
        	printf(
        		'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
        		$this->label,
        		$dropdown
        	);
        }
    }
}

  /**
 * 
 * more then 4 product
 * 
 */
  add_filter('loop_shop_columns', 'wimpie_lite_loop_columns'); 
  if (!function_exists('wimpie_lite_loop_columns')) { 

  	function wimpie_lite_loop_columns() { 
  		$xr = 4; 
  		return $xr; 
  	}
  }

//Declare Woocommerce support
  add_action( 'after_setup_theme', 'wimpie_lite_woocommerce_support' );
  function wimpie_lite_woocommerce_support() {
  	add_theme_support( 'woocommerce' );
  }

  remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
  remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

  function wimpie_lite_wrapper_start() {
  	echo '<div class="ed-container"><div id="primary">';
  }
  add_action('woocommerce_before_main_content', 'wimpie_lite_wrapper_start', 10);

  function wimpie_lite_wrapper_end() {
  	echo '</div>';
  	do_action( 'woocommerce_sidebar' );
  	echo '</div>';
  }
  add_action('woocommerce_after_main_content','wimpie_lite_wrapper_end',9);