<?php
    if ( wl_theme_is_companion_active() ) {
    	if ( get_theme_mod( 'portfolio_home','1' ) == "1" ) {
	       /* Executes the action for portfolios section hook named 'wl_companion_portfolio' */
	        do_action( 'wl_companion_portfolio');
	     }
	 }
?>