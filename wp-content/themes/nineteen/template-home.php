<?php // Template Name: Home-page 
	 if ( wl_theme_is_companion_active() ) {
    	get_header('1'); 
	    get_template_part( 'home-sections/home', 'service' ); 
		get_template_part( 'home-sections/home', 'portfolio' );
		get_template_part( 'home-sections/home', 'client' );
		get_template_part( 'home-sections/home', 'blog' ); 
		get_template_part( 'home-sections/home', 'team' );
	} else {
		get_header(); 
		get_template_part( 'home-sections/no', 'content' );
	}
	get_footer(); 
?>