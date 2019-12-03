<?php

namespace ExtendBuilder;

function get_templates_style( $template, $path = '', $fallback = null ) {
	$path_base = "global.templates.{$template}.props.descendants";
	if ( $path ) {
		$path = "{$path_base}.{$path}";
	} else {
		$path = $path_base;
	}

	$value = get_current_theme_data( $path );

	if ( $value === null ) {
		$value = $fallback;
	}

	return $value;
}

function get_templates_prop( $template, $path = '', $fallback = null ) {
	$path_base = "global.templates.{$template}.props.descendants";
	if ( $path ) {
		$path = "{$path_base}.{$path}";
	} else {
		$path = $path_base;
	}

	$value = get_current_theme_data( $path );

	if ( $value === null ) {
		$value = $fallback;
	}

	return $value;
}


function is_partial_visible( $post_id_in_lang, $type ) {
	$theme_data = get_current_data( - 1, true );
	return array_get_value( $theme_data, "options.theme.global.visible_partials.{$type}.{$post_id_in_lang}", true );
}

add_filter( 'colibriwp_theme_main_section_class', function ( $classes ) {
	$current_width = get_templates_prop( 'blog', 'section.width', 'boxed' );
	$width_classes = array(
		'boxed'      => 'h-section-boxed-container',
		'full-width' => 'h-section-fluid-container',
	);

	$classes['inner_class'] = array_diff( $classes['inner_class'], $width_classes );
	array_push( $classes['inner_class'], $width_classes[ $current_width ] );

	return $classes;
} );


add_filter( 'colibriwp_theme_main_row_class', function ( $classes ) {
	$classes = get_templates_prop( 'blog', 'row.layout-classes', array(
		'outer_class' => array(),
		'inner_class' => array(),
	) );

	return $classes;
} );


function is_blog_right_sidebar_enabled() {
	$visible_partials_value = false;

	$theme_data             = get_current_data( - 1, true );
	$post_id                = array_get_value( $theme_data, "options.theme.defaults.partials.sidebar.post", null );
	$lang                   = get_current_language();
	$post_id_in_lang        = get_post_in_language( $post_id, $lang );
	$visible_partials_value = array_get_value( $theme_data, "options.theme.global.visible_partials.sidebar.{$post_id_in_lang}", true );

	return get_templates_prop( 'blog', "section.sidebars.right", $visible_partials_value );
}

add_filter( 'colibriwp_theme_blog_sidebar_enabled', function ( $value, $side ) {

	if ( is_customize_preview() ) {
		return true;
	}

	if ( $side === 'right' ) {
		return is_blog_right_sidebar_enabled();
	} else {
		return get_templates_prop( 'blog', "section.sidebars.{$side}", true );
	}

}, 20, 2 );

add_filter( 'colibriwp_theme_blog_sidebar_column_class', function ( $classes, $side ) {

	if ( is_customize_preview() ) {
		if ( $side === 'right' ) {
			if ( ! is_blog_right_sidebar_enabled() ) {
				$classes[] = 'colibri-force-hide';
			}
		}
	}


	return $classes;

}, 10, 2 );
