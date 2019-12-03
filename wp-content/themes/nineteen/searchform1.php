<?php 
/**
 * Template for displaying search forms in Theme
 *
 * @package nineteen
 */
 ?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="float-right head_feedbck flex-row">
	    <div class="select_lng search-focus">
	        <div class="search_form flex-row">
	            <a href="#"><i class="fa fa-search"> </i> </a>
	            <input type="text" class="search-hover" name="s" id="s" placeholder="<?php esc_attr_e('search here...','nineteen'); ?>">
	        </div>
	    </div>
	</div>
</form>