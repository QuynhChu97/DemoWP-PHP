<?php

namespace ExtendBuilder;

function colibri_user_can_customize() {
	return is_user_logged_in() && current_user_can( 'edit_theme_options' );
}

function is_shortcode_refresh() {
	return apply_filters( 'mesmerize_is_shortcode_refresh',
		false );
}

// we are in browser preview
function is_customize_changeset_preview() {
	return \is_customize_preview()
	       && ! isset( $_GET['customize_messenger_channel'] );
}

function is_customize_preview() {
	$in_customizer       = \is_customize_preview()
	                       && isset( $_GET['customize_messenger_channel'] );
	$is_shortcode_render = apply_filters( 'mesmerize_is_shortcode_refresh',
		false );

	return ( $in_customizer || $is_shortcode_render );

}

function extend_builder_path() {
	return __DIR__;
}

require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/multilanguage.php';
require_once __DIR__ . '/custom-posts.php';
require_once __DIR__ . '/data/index.php';

require_once __DIR__ . '/save.php';
if ( file_exists( __DIR__ . '/../pro/index.php' ) ) {
	require_once __DIR__ . '/../pro/index.php';
}
require_once __DIR__ . '/assets.php';
require_once __DIR__ . '/fonts.php';

require_once __DIR__ . '/partials/index.php';

require_once __DIR__ . '/api/index.php';
require_once __DIR__ . '/shortcodes/index.php';

require_once __DIR__ . '/register.php';
require_once __DIR__ . '/gutenberg.php';

require_once __DIR__ . '/import.php';
require_once __DIR__ . '/customizer/index.php';
require_once __DIR__ . '/admin/index.php';
require_once __DIR__ . '/integrations/index.php';

function colibri_editor_add_editor_role() {

	if ( get_role( 'colibri_content_editor' ) ) {
		return;
	}

	$editor       = get_role( 'editor' );
	$capabilities = array_merge(
		$editor->capabilities,
		array(
			'edit_theme_options' => true,
			'customize'          => true,
		)
	);

	add_role(
		'colibri_content_editor',
		__( 'Content Editor' ),
		$capabilities
	);
}

colibri_editor_add_editor_role();


function colibri_theme_default_theme_data() {
	$front_page_design = get_option( 'colibriwp_predesign_front_page_index', 0 );
	if ( $front_page_design != 0 ) {
		return;
	}

	include( 'import_theme_data.php' );
	colibri_theme_import_theme_data();
	Regenerate::schedule();
}

add_action( 'colibri_page_builder/default_theme_data', 'ExtendBuilder\colibri_theme_default_theme_data' );

add_filter( 'colibri_page_builder/plugin-activated', function ( $response, $slug, $plugin_data ) {
	if ( $slug === 'mailchimp-for-wp' ) {

		$response[ $slug ] = get_mailchimp_form_shortcode();
	}

	return $response;
}, 10, 3 );


add_action( 'admin_init', function () {
	add_action( 'admin_notices', array( Regenerate::class, 'printSiteImportedNotice' ) );
} );

//used to show cropped images in the media picker
add_filter('add_post_metadata', function($check, $object_id, $meta_key, $meta_value, $unique) {
    if($meta_key === '_wp_attachment_context' && preg_match('/custom-image-cropper/i',$meta_value)) {
        return true;
    }
    return $check;
},10 ,5);


function colibri_crop_image_copy_alt($data, $new_attachment_id) {

    $original_attachment_id = colibri_cache_get('colibri_crop_original_attachment_id');
    $image_alt = get_post_meta($original_attachment_id, '_wp_attachment_image_alt', true);

    if($image_alt) {
        update_post_meta($new_attachment_id, '_wp_attachment_image_alt', $image_alt);
    }

    //remove the current function from the filter because it's not needed anymore.
    remove_filter('wp_update_attachment_metadata', 'ExtendBuilder\colibri_crop_image_copy_alt');
    return $data;
}

//when cropping copy the alt of the original image
add_action('wp_ajax_crop_image_pre_save', function($context, $attachment_id, $cropped) {
    if(!preg_match('/custom-image-cropper/i',$context)) {
        return;
    }
    colibri_cache_set('colibri_crop_original_attachment_id', $attachment_id);
    add_filter('wp_update_attachment_metadata','ExtendBuilder\colibri_crop_image_copy_alt', 10, 2);
},10, 3);
function colibri_add_images_alts( $content ) {
    if ( ! preg_match_all( '/<img [^>]+>/', $content, $matches ) ) {
        return $content;
    }

    $selected_images = $attachment_ids = array();

    foreach ( $matches[0] as $image ) {
        if ( false === strpos( $image, ' alt=' ) && preg_match( '/wp-image-([0-9]+)/i', $image, $class_id ) &&
            ( $attachment_id = absint( $class_id[1] ) ) ) {

            /*
             * If exactly the same image tag is used more than once, overwrite it.
             * All identical tags will be replaced later with 'str_replace()'.
             */
            $selected_images[ $image ] = $attachment_id;
            // Overwrite the ID when the same image is included more than once.
            $attachment_ids[ $attachment_id ] = true;
        }
    }

    if ( count( $attachment_ids ) > 1 ) {
        /*
         * Warm the object cache with post and meta information for all found
         * images to avoid making individual database calls.
         */
        _prime_post_caches( array_keys( $attachment_ids ), false, true );
    }

    foreach ( $selected_images as $image => $attachment_id ) {
        $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        $context = get_post_meta($attachment_id, '_wp_attachment_context', true);

        // fix already saved images missing from media gallery//
        if (strpos($context, "custom-image-cropper") !== FALSE) {
            delete_post_meta($attachment_id, '_wp_attachment_context');
        }
        $new_image = preg_replace( '/<img ([^>]+?)[\/ ]*>/', '<img $1 alt="' . $image_alt . '" />', $image );
        $content    = str_replace( $image, $new_image, $content );
    }

    return $content;
}

add_filter( 'the_content', 'ExtendBuilder\colibri_add_images_alts' );
