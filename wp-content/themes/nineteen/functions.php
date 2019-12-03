<?php
/**
 * VW Education Academy functions and definitions
 *
 * @package nineteen
 */

defined( 'ABSPATH' ) or die();

require( get_template_directory() . '/inc/functions/breadcrumb/wl-custom-breadcrumb.php' );
require( get_template_directory() . '/inc/functions/comment/wl-comment.php' );
require( get_template_directory() . '/inc/functions/menu/wl-nav-walker.php' );
require( get_template_directory() . '/inc/functions/menu/default-menu-walker.php' );
require( get_template_directory() . '/inc/admin/controllers/wl-scripts.php' );
require( get_template_directory() . '/inc/functions/general-functions.php' );
require( get_template_directory() . '/inc/admin/controllers/theme-setup.php' );
require( get_template_directory() . '/inc/admin/admin.php' );
require( get_template_directory() . '/inc/admin/class-tgm-plugin-activation.php' );
?>