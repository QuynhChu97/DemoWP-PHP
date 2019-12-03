<?php
    if ( wl_theme_is_companion_active() ) {
    	if ( get_theme_mod( 'team_home','1' ) == "1" ) {
	        /* Executes the action for Team section hook named 'wl_companion_team' */
	        do_action( 'wl_companion_team');
	     }
	 }
?>