 // ===== Scroll to Top ==== 
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
jQuery('#return-to-top').click(function() {      // When arrow is clicked
    jQuery('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

 //--home-slider--//
  var swiper = new Swiper('.home_slider', {
    slidesPerView: 'auto',
	autoHeight: true, 
    centeredSlides: true,
    spaceBetween: 0,
      navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

 //--home-blog--//  
	var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });

 //-menu--//
jQuery(document).ready(function() {
    if( jQuery(window).width() > 1024) {
       jQuery('.nav li.dropdown').hover(function() {
           jQuery(this).addClass('open');
       }, function() {
           jQuery(this).removeClass('open');
       });
       jQuery('.nav li.dropdown-submenu').hover(function() {
           jQuery(this).addClass('open');
       }, function() {
           jQuery(this).removeClass('open');
       });
    }
    
    jQuery('li.dropdown').find('.caret').each(function(){
        jQuery(this).on('click', function(){
            if( jQuery(window).width() < 1024) {
                jQuery(this).parent().next().slideToggle();
            }
            return false;
        });
    });
});