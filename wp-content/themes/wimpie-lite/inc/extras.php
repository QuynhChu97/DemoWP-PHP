<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wimpie lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $wimpie_lite_args Configuration arguments.
 * @return array
 */
function wimpie_lite_page_menu_args( $wimpie_lite_args ) {
	$wimpie_lite_args['show_home'] = true;
	return $wimpie_lite_args;
}
add_filter( 'wp_page_menu_args', 'wimpie_lite_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $wimpie_lite_classes Classes for the body element.
 * @return array
 */
function wimpie_lite_body_classes( $wimpie_lite_classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$wimpie_lite_classes[] = 'group-blog';
	}

	return $wimpie_lite_classes;
}
add_filter( 'body_class', 'wimpie_lite_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $wimpie_lite_title Default title text for current view.
 * @param string $wimpie_lite_sep Optional separator.
 * @return string The filtered title.
 */
function wimpie_lite_wp_title( $wimpie_lite_title, $wimpie_lite_sep ) {
	if ( is_feed() ) {
		return $wimpie_lite_title;
	}

	global $wimpie_lite_page, $wimpie_lite_paged;

	// Add the blog name
	$wimpie_lite_title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$wimpie_lite_site_description = get_bloginfo( 'description', 'display' );
	if ( $wimpie_lite_site_description && ( is_home() || is_front_page() ) ) {
		$wimpie_lite_title .= " $wimpie_lite_sep $wimpie_lite_site_description";
	}

	// Add a page number if necessary:
	if ( ( $wimpie_lite_paged >= 2 || $wimpie_lite_page >= 2 ) && ! is_404() ) {
		$wimpie_lite_title .= " $wimpie_lite_sep " . sprintf( __( 'Page %s', 'wimpie-lite' ), max( $wimpie_lite_paged, $wimpie_lite_page ) );
	}

	return $wimpie_lite_title;
}
add_filter( 'wp_title', 'wimpie_lite_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wimpie_lite_wp_query WordPress Query object.
 * @return void
 */
function wimpie_lite_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'wimpie_lite_setup_author' );