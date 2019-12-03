(function($) {

    "use strict";

    /* ==========================================
          2.    Preloader 
    ========================================== */
    if (jQuery('.loader-wrapper').length > 0) {
        jQuery(window).on('load', function() {
            jQuery('.loader-wrapper').fadeOut();
            jQuery('.lds-roller').delay(350).fadeOut("slow", 0.0);
            jQuery('body').css({
                'overflow-y': 'scroll'
            });
        });
    }	

    /* ==========================================
          2.    Search popup 
    ========================================== */

    jQuery(".search-popup-icon").on('click',  function() {
        jQuery('.searchBoxTop').toggleClass('active');
    });
    jQuery(".searchClose").on('click',  function() {
        jQuery('.searchBoxTop').removeClass('active');
    });

    /* ==========================================
          2.    banner-slider   
    ========================================== */
    if ( jQuery('.mainSlider').length ) {
        jQuery('.mainSlider').nivoSlider({
            manualAdvance: false,  
            directionNav: true,
            animSpeed: 500,
            slices: 18,
            pauseTime: 10000,
            pauseOnHover: true,
            controlNav: false,
            prevText: '<i class="fa fa-angle-left nivo-prev-icon"></i>',
            nextText: '<i class="fa fa-angle-right nivo-next-icon"></i>'
          });
        }

		if (jQuery('.banner-carousel2').length) {
		jQuery('.banner-carousel2').owlCarousel({
			animateOut: 'slideOutUp',
    		animateIn: 'fadeDown',
			loop:true,
			margin:0,
			nav:true,
			singleItem:true,
			smartSpeed: 500,
			autoHeight: false,
			autoplay: true,
			autoplayTimeout:10000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				},
			}
		});    		
	}
    /* ==========================================
          2.    testimonial-slider   
    ========================================== */

 jQuery('.testimonial-slider').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed:5000,
      arrows:false,
      infinite: true,
      speed: 500,
      fade: false,
  });
    /* ==========================================
          2.    shop product slider   
    ========================================== */



jQuery('.shop-product-slider').slick({
  arrows: false,
  dots: false,
  autoplay: true,
  autoplaySpeed:2000,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 510,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


    /*=============================================
        8. Paralax Active JS
    ===============================================*/
   
    
  
	/*=============================================
        8. Active WoW JS
    ===============================================*/

    new WOW().init();
	
	
	
	/*=============================================
        8. Shop Thumbnail Slider Slick
    ===============================================*/
	
	if ( jQuery('.shop-thumbnail-big').length ) {
        var $slider = jQuery('.shop-thumbnail-big')
            .on('init', function(slick) {
                jQuery('.shop-thumbnail-big').fadeIn(1000);
            })
            .slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
				draggable:false,
				fade:true,
                autoplaySpeed: 3000,
                asNavFor: '.shop-thumbnail-small'
            });

    var $slider2 = jQuery('.shop-thumbnail-small')
            .on('init', function(slick) {
                jQuery('.shop-thumbnail-small').fadeIn(2000);
            })
            .slick({
                slidesToShow: 3,
				swipe:false,
				arrows: false,
                slidesToScroll: 1,
                asNavFor: '.shop-thumbnail-big',
                dots: false,
                centerMode: false,
                focusOnSelect: true
            });

 jQuery('.shop-thumbnail-small .slick-slide').removeClass('slick-active');
 jQuery('.shop-thumbnail-small .slick-slide').eq(0).addClass('slick-active');
 jQuery('.shop-thumbnail-big').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
 	var mySlideNumber = nextSlide;
 	jQuery('.shop-thumbnail-small .slick-slide').removeClass('slick-active');
 	jQuery('.shop-thumbnail-small .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
  
jQuery(['js-sliderWithProgressbar'], function(slider) {

    jQuery('.shop-thumbnail-big').each(function() {

        me.slider = new slider(jQuery(this), options, sliderOptions, previewSliderOptions);

    });
});
  var options = {
    progressbarSelector    : '.bJS_progressbar'
    , slideSelector        : '.bJS_slider'
    , previewSlideSelector : '.bJS_previewSlider'
    , progressInterval     : ''
    , onCustomProgressbar : function($slide, $progressbar) {}
}
var sliderOptions = {
    slidesToShow   : 1,
    slidesToScroll : 1,
    arrows         : false,
    fade           : true,
    autoplay       : true
}
var previewSliderOptions = {
    slidesToShow   : 3,
    slidesToScroll : 1,
    dots           : false,
    focusOnSelect  : true,
    centerMode     : true
}
}

	
	

})(jQuery);

 