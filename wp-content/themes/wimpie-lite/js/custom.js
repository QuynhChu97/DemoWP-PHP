jQuery(document).ready(function($) {

  $('#site-navigation').show();

  if ( $('.site-description').css('clip') != "rect(1px 1px 1px 1px)" ){
    $('.search-icon .wl-search').css('margin-top','3px'); 
  }

  $('.wl_footer_social .social-icons > a').each(function(){
    $(this).wrap('<span></span>');
  });

    //Search Box Toogle
    $('.search-icon .fa-search').click(function(){
      $('.wl-search').slideToggle('slow');
    });

    $(window).scroll(function(){
      if($(this).scrollTop() > 150){
        $('.wl-search').hide('slow');
      }
    });

    //$('.error404 .number404').addClass('animated bounce');

    var winwidth = $('.clients-logo-wrapper').width();
    var mslide = 4; var slidew = 300;
    if(winwidth >= 1097){var mslide = 4; slidew = 300;}
    else if(winwidth <= 1096 && winwidth >= 801){var mslide = 3; slidew = 300;}
    else if(winwidth <= 800 && winwidth >= 641){var mslide = 3; slidew = 640;}
    else if(winwidth <= 640 && winwidth >= 541){var mslide = 2; slidew = 640;}
    else if(winwidth <= 540 && winwidth >= 320){var mslide = 1; slidew = 540;}

    $('.scroll').bxSlider({
      pager:false,
      controls: true,
      auto : 'true',
      minSlides: mslide,
      maxSlides: mslide,
      slideWidth: slidew,
      moveSlides:1
    });


    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });


    $('.menu-toggle').click(function() {
      $('.menu-main-menu-container').toggle('slow');
    });
    $('#wltop').css('right',-65);
    $(window).scroll(function(){
      if($(this).scrollTop() > 300){
        $('#wltop').css('right',20);
      }else{
        $('#wltop').css('right',-65);
      }
    });

    $("#wltop").click(function(){
      $('html,body').animate({scrollTop:0},600);
    });
  });

new WOW().init();
