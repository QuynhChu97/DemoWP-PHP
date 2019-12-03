<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package 8Store Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses wimpie_lite_header_style()
 * @uses wimpie_lite_admin_header_style()
 * @uses wimpie_lite_admin_header_image()
 */
function wimpie_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'wimpie_lite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'wimpie_lite_header_style',
		'admin-head-callback'    => 'wimpie_lite_admin_header_style',
		'admin-preview-callback' => 'wimpie_lite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'wimpie_lite_custom_header_setup' );

if ( ! function_exists( 'wimpie_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see wimpie_lite_custom_header_setup().
 */
function wimpie_lite_header_style() {
	$wimpie_lite_header_text_color = get_header_textcolor();

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $wimpie_lite_header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $wimpie_lite_header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // wimpie_lite_header_style

if ( ! function_exists( 'wimpie_lite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see wimpie_lite_custom_header_setup().
 */
function wimpie_lite_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // wimpie_lite_admin_header_style

if ( ! function_exists( 'wimpie_lite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see wimpie_lite_custom_header_setup().
 */
function wimpie_lite_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // wimpie_lite_admin_header_image
