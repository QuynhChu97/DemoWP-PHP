/* global jQuery */

;(function ($) {
  $('.custom-bg').each(function () {
    var background = $(this).attr('data-background')
    $(this).css('background', 'url(' + background + ') no-repeat center / cover')
  })
}(jQuery))

/* global jQuery */

;(function ($) {
  $(window).click(function () {
    $('.dropdown').removeClass('is-active')
    $('.hasMenu').removeClass('menuSelected')
  })

  $('.dropdown').click(function (event) {
    event.stopPropagation()
  })

  $('.hasMenu').click(function (event) {
    event.stopPropagation()
    var dropdown = '#dropdown-' + $(this).attr('id')
    $('.hasMenu').removeClass('menuSelected')
    $('.dropdown').not($(dropdown)).removeClass('is-active')
    $(dropdown).toggleClass('is-active')
    if ($(dropdown).hasClass('is-active')) {
      $(this).addClass('menuSelected')
    }
  })
})(jQuery)

/* global jQuery */

;(function ($) {
  var toggle = $('.mainNav-menuMobile')
  var close = $('.sidebar-close')
  var overlay = $('.overlay')
  var sidebar = $('.sidebar')
  var body = $('body')
  var removeSidebar = function () {
    body.css({
      'overflow': 'inherit',
      'height': 'inherit'
    })
    sidebar.removeClass('is-active')
    overlay.removeClass('is-active')
  }
  toggle.on('click', function () {
    overlay.addClass('is-active')
    sidebar.addClass('is-active')
    return body.css({
      'overflow': 'hidden',
      'height': '100%'
    })
  })
  overlay.on('click', removeSidebar)
  close.on('click', removeSidebar)
})(jQuery)

;(function ($) {
  var rwdMenu = $('.rwd-menu')
  var topMenu = $('.rwd-menu > li > a')
  var parentLi = $('.rwd-menu > li')
  var backBtn = $('.back-btn')

  topMenu.on('click', function (e) {
    var thisTopMenu = $(this).parent()
    rwdMenu.addClass('rwd-menu-view')
    parentLi.removeClass('open-submenu')
    thisTopMenu.addClass('open-submenu')
  })

  backBtn.click(function () {
    var thisBackBtn = $(this)
    parentLi.removeClass()
    rwdMenu.removeClass('rwd-menu-view')
  })
})(jQuery);

// Navigation Toggle
jQuery(function($) {
  $('.navbar-toggler').on('click', function () {
    var target = $(this).attr('data-target');
    $(this).toggleClass('active');

    console.log("It's working!");

    $(target).slideToggle(300);
  });
});
