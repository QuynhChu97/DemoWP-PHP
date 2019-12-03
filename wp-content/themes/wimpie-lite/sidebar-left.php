<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package wimpie lite
 */
global $post;
$wimpie_lite_post_id = "";
if(is_front_page()){
	$wimpie_lite_post_id = get_option('page_on_front');
}else{
	$wimpie_lite_post_id = $post->ID;
}
$wimpie_lite_post_class = get_post_meta( $wimpie_lite_post_id, 'wimpie_lite_sidebar_layout', true );
if(empty($wimpie_lite_post_class) && is_archive()){
	$wimpie_lite_post_class = "left-sidebar";
}elseif(is_single() || is_search()){
	$wimpie_lite_post_class = "right-sidebar";
}
if($wimpie_lite_post_class=='left-sidebar' || $wimpie_lite_post_class=='both-sidebar'){
    ?>
    <div id="secondary-left" class="widget-area left-sidebar sidebar">
        <?php if ( is_active_sidebar( 'wimpie-lite-left-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'wimpie-lite-left-sidebar' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}
?>
