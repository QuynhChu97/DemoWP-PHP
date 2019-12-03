<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'axiohost-sidebar' ) ) {
	return;
}
?>
<div class="col-md-5 col-lg-4">
    <!-- Start Sidebar Area -->
    <?php dynamic_sidebar('axiohost-sidebar'); ?>
</div>