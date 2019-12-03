<?php
/*
 * Theme setup functions
 *
 * @package nirvana
 * @subpackage Functions
 */

// site width
$nirvana_totalSize = $nirvanas['nirvana_sidebar'] + $nirvanas['nirvana_sidewidth'];


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = $nirvanas['nirvana_sidewidth'];


/** Tell WordPress to run nirvana_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'nirvana_setup' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override nirvana_setup() in a child theme, add your own nirvana_setup to your child theme's
 * functions.php file.
 *
 * @since nirvana 0.5
 */
if ( ! function_exists( 'nirvana_setup' ) ):
function nirvana_setup() {

	global $nirvanas;
	global $nirvana_totalSize;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	if ($nirvanas['nirvana_editorstyle']) add_editor_style( "styles/editor-style.css" );

	// Support title tag since WP 4.1
	add_theme_support( 'title-tag' );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions (cropped)

	// WooCommerce compatibility tag
	add_theme_support( 'woocommerce' );
	// WooCommerce 3.0 gallery support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status','audio', 'video') );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'nirvana', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in 3 locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'nirvana' ),
		'top' => __( 'Top Navigation', 'nirvana' ),
		'footer' => __( 'Footer Navigation', 'nirvana' ),
	) );

	// This theme allows users to set a custom background
	add_theme_support( 'custom-background' );

	$nirvanas['nirvana_hheight'] = (int)$nirvanas['nirvana_hheight'];
	//set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	add_image_size( 'header', $nirvana_totalSize, $nirvanas['nirvana_hheight'], apply_filters( 'nirvana_header_crop', true ) );

	add_image_size( 'slider', $nirvanas['nirvana_fpsliderwidth'], $nirvanas['nirvana_fpsliderheight'], true );
	add_image_size( 'columns', $nirvanas['nirvana_colimagewidth'], $nirvanas['nirvana_colimageheight'], true );

	// Custom image size for use with post thumbnails
	if ( $nirvanas['nirvana_fcrop'] ) {
		add_image_size( 'custom', absint( $nirvanas['nirvana_fwidth'] ), absint( $nirvanas['nirvana_fheight'] ), true );
	} else {
		add_image_size( 'custom', absint( $nirvanas['nirvana_fwidth'] ), absint( $nirvanas['nirvana_fheight'] ) );
	}

	// Add support for flexible headers
	$header_args = array(
		'flex-height' 	=> true,
		'height' 		=> $nirvanas['nirvana_hheight'],
		'flex-width' 	=> true,
		'width' 		=> $nirvana_totalSize,
		'max-width' 	=> 1920,
		'default-image' => '',
	);
	add_theme_support( 'custom-header', $header_args );

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'nirvana' => array(
			'url' => '%s/images/headers/nirvana.png',
			'thumbnail_url' => '%s/images/headers/nirvana_thumbnail.png',
			'description' => __( 'Nirvana Default Header Image', 'nirvana' )
		),

	) );
}
endif;

// Backwards compatibility for the title-tag
if ( ! function_exists( '_wp_render_title_tag' ) ) :
	add_action( 'wp_head', 'nirvana_render_title' );
	add_filter( 'wp_title', 'nirvana_filter_wp_title' );
	add_filter( 'wp_title_rss', 'nirvana_filter_wp_title_rss' );
endif;

function nirvana_render_title() { ?>
		<title><?php wp_title( '', true, 'right' ); ?></title>
<?php } // nirvana_render_title()

function nirvana_filter_wp_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend name
    $filtered_title = (((strlen($site_name)>0)&&(strlen($title)>0))?$title.' - '.$site_name:$title.$site_name);
	// Get the Site Description
 	$site_description = get_bloginfo( 'description' );
    // If site front page, append description
    if ( (is_home() || is_front_page()) && $site_description ) {
        // Append Site Description to title
        $filtered_title = ((strlen($site_name)>0)&&(strlen($site_description)>0))?$site_name. " | ".$site_description:$site_name.$site_description;
    }
	// Add pagination if that's the case
	global $page, $paged;
	if ( $paged >= 2 || $page >= 2 )
	$filtered_title .=	 ' | ' . sprintf( __( 'Page %s', 'nirvana' ), max( $paged, $page ) );

    // Return the modified title
    return $filtered_title;
} // nirvana_filter_wp_title()

function nirvana_filter_wp_title_rss($title) {
	return ' ';
} // nirvana_filter_wp_title_rss()


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since nirvana 0.5
 */
function nirvana_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'nirvana_page_menu_args' );

/**
 * Create menus
 */
function nirvana_top_menu() {
	if ( has_nav_menu( 'top' ) )
	wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'topmenu', 'theme_location' => 'top', 'depth' => 1 ) );
}
add_action( 'cryout_topbar_hook', 'nirvana_top_menu', 15 );

function nirvana_main_menu() {
	/*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
	<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'nirvana' ); ?>"><?php _e( 'Skip to content', 'nirvana' ); ?></a></div>
	<?php /* Main navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */
	wp_nav_menu( array( 'container_class' => 'menu', 'menu_id' =>'prime_nav', 'theme_location' => 'primary', 'link_before' => '<span>', 'link_after' => '</span>' ) );
}
add_action( 'cryout_access_hook', 'nirvana_main_menu' );

function nirvana_footer_menu() {
	if ( has_nav_menu( 'footer' ) )
		wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'footermenu', 'theme_location' => 'footer', 'depth' =>1 ) );
}
add_action( 'cryout_footer_hook', 'nirvana_footer_menu', 10 );


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override nirvana_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since nirvana 0.5
 * @uses register_sidebar
 */
function nirvana_widgets_init() {
	global $nirvanas;

	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'nirvana' ),
		'id' => 'left-widget-area',
		'description' => __( 'Left sidebar', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'nirvana' ),
		'id' => 'right-widget-area',
		'description' => __( 'Right sidebar', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Area', 'nirvana' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'First footer area', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Area', 'nirvana' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Second footer area', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 7, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Area', 'nirvana' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer area', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 8, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Area', 'nirvana' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer area', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

		// Area 9, located above the content area. Empty by default.
	register_sidebar( array(
		'name' => __( 'Above Content Area', 'nirvana' ),
		'id' => 'above-content-widget-area',
		'description' => __( 'Above Content Area', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

		// Area 10, located below the content area. Empty by default.
	register_sidebar( array(
		'name' => __( 'Below Content Area', 'nirvana' ),
		'id' => 'below-content-widget-area',
		'description' => __( 'Below Content Area', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

		// Area 0, located inside the header
	register_sidebar( array(
		'name' => __( 'Header Widgets', 'nirvana' ),
		'id' => 'header-widget-area',
		'description' => __( 'Header Widgets', 'nirvana' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 11, the presentation page columns
	register_sidebar( array(
		'name' => __( 'Presentation Page Columns', 'nirvana' ),
		'id' => 'presentation-page-columns-area',
		'description' => sprintf(__('Only drag [Cryout Column] widgets here. Recommended size for uploaded images: %1$dpx (width) x %2$dpx (height). Go to the Nirvana Settings page >> Presentation Page Settings >> Columns to edit sizes and more.','nirvana' ), $nirvanas['nirvana_colimagewidth'],$nirvanas['nirvana_colimageheight']),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

} // nirvana_widgets_init()
add_action( 'widgets_init', 'nirvana_widgets_init' );


/**
 * Creates different class names for footer widgets depending on their number.
 * This way they can fit the footer area.
 */
function nirvana_footer_sidebar_class(){
	$count = 0;

	if ( is_active_sidebar( 'first-footer-widget-area' ) )
		$count++;

	if ( is_active_sidebar( 'second-footer-widget-area' ) )
		$count++;

	if ( is_active_sidebar( 'third-footer-widget-area' ) )
		$count++;

	if ( is_active_sidebar( 'fourth-footer-widget-area' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="footer' . $class . '"';
}

/**
 * Outputs widget areas 
 */
function nirvana_header_widget() {
	if ( is_active_sidebar( 'header-widget-area' )) { ?>
		<div id="header-widget-area">
			<ul class="yoyo">
				<?php dynamic_sidebar( 'header-widget-area' ); ?>
			</ul>
		</div>
	<?php }
} // nirvana_header_widget()
add_action ('cryout_header_widgets_hook','nirvana_header_widget');

function nirvana_above_widget() {
	if ( is_active_sidebar( 'above-content-widget-area' )) { ?>
			<ul class="yoyo">
				<?php dynamic_sidebar( 'above-content-widget-area' ); ?>
			</ul>
	<?php }
} // nirvana_above_widget()
add_action( 'cryout_before_content_hook', 'nirvana_above_widget' );

function nirvana_below_widget() {
	if ( is_active_sidebar( 'below-content-widget-area' )) { ?>
			<ul class="yoyo">
				<?php dynamic_sidebar( 'below-content-widget-area' ); ?>
			</ul>
	<?php }
} // nirvana_below_widget()
add_action( 'cryout_after_content_hook', 'nirvana_below_widget' );


// FIN