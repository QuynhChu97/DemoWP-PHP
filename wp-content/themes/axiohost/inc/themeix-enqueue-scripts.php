<?php
/**
 * Loader Functions
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function axiohost_scripts()
{

	 


	//====================ALL CSS FILE HERE=====================================//

	//Bootstrap CSS
	wp_enqueue_style('bootstrap', AXIOHOST_CSS_URL . '/bootstrap.min.css', null, 'v4.3.1', 'all');

	//Nivo Slider CSS
	wp_enqueue_style('nivo-slider', AXIOHOST_CSS_URL . '/nivo-slider.css', null, 'v3.2', 'all');

	//Font Awesome CSS
	wp_enqueue_style('font-awesome', AXIOHOST_CSS_URL . '/font-awesome.min.css', null, '4.7.0', 'all');

	//Animate CSS
	wp_enqueue_style('animate', AXIOHOST_CSS_URL . '/animate.min.css', null, '3.5.2', 'all');

	//Slick CSS
	wp_enqueue_style('slick', AXIOHOST_CSS_URL . '/slick.css', null, 'v1.0', 'all');

	//Owl Carousel CSS
	wp_enqueue_style('owl-carousel', AXIOHOST_CSS_URL . '/owl.carousel.min.css', null, 'v2.3.4', 'all');


	//Stylesheet CSS
	wp_enqueue_style('axiohost-style', get_stylesheet_uri());

	//Responsive CSS
	wp_enqueue_style('axiohost-responsive', AXIOHOST_CSS_URL . '/responsive.css', null, 'v1.0', 'all');

	//-- ====================ALL JS FILE HERE===================================== -//


	//Bootstrap
	wp_enqueue_script('bootstrap', AXIOHOST_JS_URL . '/bootstrap.min.js', array('jquery'), 'v4.3.1', true);

	//Nivo slider JS    
	wp_enqueue_script('jquery-nivo-slider', AXIOHOST_JS_URL . '/jquery.nivo.slider.js', array('jquery'), 'v3.2', true);


	//Propper JS    
	wp_enqueue_script('popper', AXIOHOST_JS_URL . '/popper.min.js', array('jquery'), 'v1.14', true);

	//owl slider JS    
	wp_enqueue_script('owl-carousel', AXIOHOST_JS_URL . '/owl.carousel.min.js', array('jquery'), 'v2.3.4', true);

	//Slick JS    
	wp_enqueue_script('slick', AXIOHOST_JS_URL . '/slick.min.js', array('jquery'), 'v1.0', true);


	//WOW JS 
	wp_enqueue_script('wow', AXIOHOST_JS_URL . '/wow.min.js', array('jquery'), 'v1.1.3', true);

	//axiohost script 
	wp_enqueue_script('axiohost-script', AXIOHOST_JS_URL . '/axiohost-nav.js', array('jquery'), 'v1.0', true);

	wp_enqueue_script('axiohost-skip-link-focus-fix', AXIOHOST_JS_URL . '/skip-link-focus-fix.js', array(), '20151215', true);

	//Main JS
	wp_enqueue_script('axiohost-custom', AXIOHOST_JS_URL . '/custom.js', array('jquery'), 'v1.0', true);

	wp_enqueue_script("comment-reply");
	
		wp_localize_script(
		'axiohost-script',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'axiohost' ),
			'collapse' => __( 'collapse child menu', 'axiohost' ),
		)
	);
	
}
add_action('wp_enqueue_scripts', 'axiohost_scripts');


function axiohost_admin_style()
{
	wp_enqueue_style('admin-style', AXIOHOST_CSS_URL . '/admin.css');
}
add_action('admin_enqueue_scripts', 'axiohost_admin_style');