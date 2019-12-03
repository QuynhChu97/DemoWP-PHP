/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	//Sadip codes from here
    
    //footer copyright
    wp.customize( 'wimpie_lite_footer_copyright', function( value ) {
		value.bind( function( to ) {
			$('.dynamic_copyright').text( to );
            //alert( to );
		} );
	} );
    
    //search placeholder
    wp.customize( 'wimpie_lite_search_placeholder', function( value ) {
		value.bind( function( to ) {
			$('.search-field').attr('placeholder',to);
		} );
	} );
    
    //search button text
    wp.customize( 'wimpie_lite_search_button_text', function( value ) {
		value.bind( function( to ) {
			$('.search-submit').val(to);
		} );
	} );
    
    //homepage about us section viewmore button text
    wp.customize( 'wimpie_lite_aboutus_viewmore_text', function( value ) {
		value.bind( function( to ) {
			$('.about .ed-container .btn-wrapper a.btn').text(to);
		} );
	} );
    
    //services Section Title
    wp.customize( 'wimpie_lite_services_title', function( value ) {
		value.bind( function( to ) {
			$('.our-services h2.home-title').text(to);
		} );
	} );
    
    //services Section Description
    wp.customize( 'wimpie_lite_services_desc', function( value ) {
		value.bind( function( to ) {
			$('.our-services div.home-description').text(to);
		} );
	} );
    
    //services Section Button Text
    wp.customize( 'wimpie_lite_services_button_text', function( value ) {
		value.bind( function( to ) {
			$('.service-block-wrapper .btn-wrapper a').text(to);
		} );
	} );
    
    //Feature Section Title
    wp.customize( 'wimpie_lite_awesome_feature_title', function( value ) {
		value.bind( function( to ) {
			$('.awesome-feature h2.home-title').text(to);
		} );
	} );
    
    //Feature Section Description
    wp.customize( 'wimpie_lite_awesome_feature_desc', function( value ) {
		value.bind( function( to ) {
			$('.awesome-feature div.home-description').text(to);
		} );
	} );
    
    //Feature Section Button Text
    wp.customize( 'wimpie_lite_awesome_feature_button_text', function( value ) {
		value.bind( function( to ) {
			$('.awesome-feature .btn-wrapper a').text(to);
		} );
	} );
    
    //Portfolio Section Title
    wp.customize( 'wimpie_lite_portfolio_title', function( value ) {
		value.bind( function( to ) {
			$('.portfolio h2.home-title').text(to);
		} );
	} );
    
    //Portfolio Section Description
    wp.customize( 'wimpie_lite_portfolio_desc', function( value ) {
		value.bind( function( to ) {
			$('.portfolio div.home-description').text(to);
		} );
	} );

	//Portfolio Section Button Text
    wp.customize( 'wimpie_lite_portfolio_button_text', function( value ) {
		value.bind( function( to ) {
			$('.portfolio .btn-wrapper a').text(to);
		} );
	} );
    
    //clientlogo Section Title
    wp.customize( 'wimpie_lite_clientlogo_title', function( value ) {
		value.bind( function( to ) {
			$('.clients-logo clients-logo-title').text(to);
		} );
	} );
    
    //call to Action title
    wp.customize( 'wimpie_lite_callto_title', function( value ) {
		value.bind( function( to ) {
			$('.call-to-action .home-title').text(to);
		} );
	} );
    
    //call to Action desc
    wp.customize( 'wimpie_lite_callto_desc', function( value ) {
		value.bind( function( to ) {
			$('.call-to-action div.home-description').text(to);
		} );
	} );
    
    //call to Action readmore button text
    wp.customize( 'wimpie_lite_callto_readmore', function( value ) {
		value.bind( function( to ) {
			$('.call-to-action .cta-link a').text(to);
		} );
	} );
    
    //call to Action link
    wp.customize( 'wimpie_lite_callto_link', function( value ) {
		value.bind( function( to ) {
			$('.call-to-action .cta-link a').attr('href',to);
		} );
	} );
    
     //Teammember title
    wp.customize( 'wimpie_lite_teammember_title', function( value ) {
		value.bind( function( to ) {
			$('.our-team-member .home-title').text(to);
		} );
	} );
    
    //Blog Section Title
    wp.customize( 'wimpie_lite_blog_title', function( value ) {
		value.bind( function( to ) {
			$('.blogs .blog-title').text(to);
		} );
	} );
    //Blog Section Desc
    wp.customize( 'wimpie_lite_blog_desc', function( value ) {
		value.bind( function( to ) {
			$('.blogs .blog-desc').text(to);
		} );
	} );
    
    //Blog Section Single Readmore
    wp.customize( 'wimpie_lite_blog_single_readmore', function( value ) {
		value.bind( function( to ) {
			$('.blogs .blog-content span > a').text(to);
		} );
	} );
    //Blog Section Category View more button
    wp.customize( 'wimpie_lite_blog_button_text', function( value ) {
		value.bind( function( to ) {
			$('.blogs .btn-wrapper > a').text(to);
		} );
	} );
    
    //header text fonts
    wp.customize( 'heading_typography', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2 , h3 , h4 , h5 , h6' ).css( 'font-family' , to );
		} );
	} );
    
    wp.customize( 'typography_format_h1', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_format_h2', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_format_h3', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_format_h4', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_format_h5', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_format_h6', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    //color settings
    wp.customize( 'typography_color_h1', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'color' , to );
		} );
	} );
    
    wp.customize( 'typography_color_h2', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'color' , to );
		} );
	} );
    
    wp.customize( 'typography_color_h3', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'color' , to );
		} );
	} );
    
    wp.customize( 'typography_color_h4', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'color' , to );
		} );
	} );
    
    wp.customize( 'typography_color_h5', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'color' , to );
		} );
	} );
    
    wp.customize( 'typography_color_h6', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'color' , to );
		} );
	} );
    
    //body text fonts
    wp.customize( 'body_typography', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-family' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_size_body', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-size' , to+'px' );
		} );
	} );
    
    wp.customize( 'typography_color_body', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'color' , to );
		} );
	} );
    
} )( jQuery );