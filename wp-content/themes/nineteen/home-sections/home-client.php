<?php
    if ( wl_theme_is_companion_active() ) {
    	if ( get_theme_mod( 'client_home','1' ) == "1" ) {
	        /* Executes the action for clients section hook named 'wl_companion_client' */
	        do_action( 'wl_companion_client');
	     }
	 }
?>