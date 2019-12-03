<?php 
/**
 * Template for displaying search forms in Theme
 *
 * @package nineteen
 */
 ?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row m-0">
		<input type="text" class="form-control"  name="s" id="s" placeholder="Type Your Search Here">
		<input type="submit" id="searchsubmit" value="Search">
	</div>
</form>