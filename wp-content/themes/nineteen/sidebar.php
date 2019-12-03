<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nineteen
 */
?>
<div class="col-md-4 sidebar">
	<?php if ( is_active_sidebar( 'sidebar-primary' ) ) {
		dynamic_sidebar ( 'sidebar-primary' );
	} ?>
</div>