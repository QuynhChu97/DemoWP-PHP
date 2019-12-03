<?php
if (!defined('AXIOHOST_THEME_URI')) {
	define('AXIOHOST_THEME_URI', get_template_directory_uri());
}
define('AXIOHOST_THEME_DIR', get_template_directory());
define('AXIOHOST_CSS_URL', get_template_directory_uri() . '/assets/css');
define('AXIOHOST_JS_URL', get_template_directory_uri() . '/assets/js');
define('AXIOHOST_IMG_URL', AXIOHOST_THEME_URI . '/assets/images');
define('AXIOHOST_INC_DIR', AXIOHOST_THEME_DIR . '/inc');
define('AXIOHOST_THEME', true);
function axiohost_setup()
{
	/*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*
    	 * Make theme available for translation.
    	 * Translations can be filed in the /languages/ directory.
    	 * If you're building a theme based on Laundry, use a find and replace
    	 * to change 'laundry' to the name of your theme in all the template files.
    	 */
	load_theme_textdomain('axiohost', get_template_directory() . '/languages');

	// Set the default content width.
	$GLOBALS['content_width'] = 900;

	//Support Automatic Feed Links 
	add_theme_support('automatic-feed-links');

	//Support Post-Thumbnails
	add_theme_support('post-thumbnails');

	//Support Titile Tag
	add_theme_support('title-tag');

	//Add Image Size
	add_image_size('axiohost-featured-image', 2000, 1200, false);

	// Load regular editor styles into the new block-based editor.
	add_theme_support('editor-styles');

	//enqueue editor style
	add_editor_style('style-editor.css');

	// Load default block styles.
	add_theme_support('wp-block-styles');

	// Add support for responsive embeds.
	add_theme_support('responsive-embeds');

	//Add support for theme logo
	add_theme_support('custom-logo');

	add_theme_support("custom-header");

	add_theme_support("custom-background");
}
add_action('after_setup_theme', 'axiohost_setup');

//axiohost customizer
require get_template_directory() . '/inc/customizer/class-customizer.php';
 
//axiohost comments layout
require get_template_directory() . '/inc/comments-layout.php';

//axiohost theme info
require get_template_directory() . '/inc/welcome-page.php';

//axiohost customizer
require get_template_directory() . '/inc/themeix-enqueue-scripts.php';
 
//axiohost customizer
require get_template_directory() . '/inc/themeix-dynamic-styles.php';
 
//axiohost TGM Plugin Activation
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm/recommended-plugins.php';

//custom comments form label
function axiohost_comment_form_text($fields)
{
	$fields['label_submit'] = esc_html__('Add Comment', 'axiohost');
	$fields['title_reply'] = esc_html__('Leave a Comment', 'axiohost');

	return $fields;
}
add_filter('comment_form_defaults', 'axiohost_comment_form_text');



//comment field move to bottom
function axiohost_move_comment_field_to_bottom($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields', 'axiohost_move_comment_field_to_bottom');

//axiohost Nav Menus
function axiohost_nav_menus()
{
	register_nav_menus(array(
		'primary' =>  esc_html__('Primary Menu', 'axiohost'),
		'footer_menu' =>  esc_html__('Footer Menu', 'axiohost'),
	));
}
add_action('init', 'axiohost_nav_menus');

//axiohost Sidebar
function axiohost_sidebar()
{
	register_sidebar(array(
		'name' => esc_html__('Axiohost Sidebar', 'axiohost'),
		'id'  => 'axiohost-sidebar',
		'description' =>  esc_html__('Axiohost sidebar', 'axiohost'),
		'before_title' => '<h4 class="sidebar-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
		'after_title' => '</h4>',
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer One', 'axiohost'),
		'id'  => 'footer1',
		'description' =>  esc_html__('Footer one sidebar', 'axiohost'),
		'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
		'after_title' => '</h4>',
		'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Two', 'axiohost'),
		'id'  => 'footer2',
		'description' =>  esc_html__('Footer two sidebar', 'axiohost'),
		'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
		'after_title' => '</h4>',
		'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Three', 'axiohost'),
		'id'  => 'footer3',
		'description' =>  esc_html__('Footer three sidebar', 'axiohost'),
		'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
		'after_title' => '</h4>',
		'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Four', 'axiohost'),
		'id'  => 'footer4',
		'description' =>  esc_html__('Footer four sidebar', 'axiohost'),
		'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
		'after_title' => '</h4>',
		'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Links', 'axiohost'),
		'id'  => 'footer-menu',
		'description' =>  esc_html__('Footer links widget', 'axiohost'),
		'before_widget' => '<div id="%1$s"  class="footer-copyright-menu">',
		'after_widget' => '</div>'
	));
}
add_action('widgets_init', 'axiohost_sidebar');


//axiohost excerpt
function axiohost_excerpt($limits = 25)
{
	$limits = $limits + 1;
	$content = strip_tags(get_the_content());
	$make_index = explode(' ', $content, $limits);
	if (count($make_index) <= $limits) {
		array_pop($make_index);
	}
	$excerpt = implode(' ', $make_index);
	return $excerpt;
}


add_filter('wp_list_categories', 'axiohost_add_span');
function axiohost_add_span($links)
{
	$links = str_replace('</a> (', '</a> <span class="cat-count">', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}

add_filter('get_archives_link', 'axiohost_add_span_in_archive');
function axiohost_add_span_in_archive($links)
{
	$links = str_replace('</a>&nbsp;(', '</a> <span class="archive-count">', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}

function axiohost_search_form($form)
{

	$form = '<form class="search-form-widget" method="get" action="' . home_url('/') . '">
           <div class="input-group">
              <input type="search" value="' . get_search_query() . '" class="form-control" placeholder="Search" name="s" aria-label="Search" >
              <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
              </span>
           </div>
        </form>';

	return $form;
}
add_filter('get_search_form', 'axiohost_search_form');




//Add custom post class
function axiohost_custom_post_class($classes)
{
	if (is_single()) {
		$classes[] = 'single-post';
	} else {
		$classes[] = 'blog-post blog-spacing blog-list wow fadeIn';
	}
	return $classes;
}
add_filter('post_class', 'axiohost_custom_post_class');

//Axiohost Search Form
function axiohost_get_search_form()
{ ?>
	<form class="formSearch" action="<?php echo esc_url(site_url()); ?>" method="get">
		<div class="input-group">
			<input class="form-control" type="search" name="s" value="" placeholder="<?php esc_attr_e('Search…', 'axiohost'); ?>" autocomplete="off" />
			<div class="input-group-prepend">
				<button class="btn " type="submit">
					<span class="btnSearchText"><?php echo esc_html('Search', 'axiohost'); ?></span>
				</button>
			</div>
		</div>
	</form>
<?php
}
if (!function_exists('axiohost_dynamic_class_full_width')) {
	function axiohost_dynamic_class_full_width()
	{
		if (!is_active_sidebar('axiohost-sidebar')) {
			echo '<div class="col-md-12">';
		} else {
			echo '<div class="col-md-7 col-lg-8">';
		}
	}
}
add_action('axiohost_full_column', 'axiohost_dynamic_class_full_width', 10);
if (!function_exists('axiohost_dynamic_class_full_width_post')) {
	function axiohost_dynamic_class_full_width_post()
	{
		if (!is_active_sidebar('axiohost-sidebar')) {
			echo '<div class="col-md-10 mx-auto">';
		} else {
			echo '<div class="col-md-7 col-lg-8">';
		}
	}
}

add_action('axiohost_full_post_column', 'axiohost_dynamic_class_full_width_post', 10);


?>